<?php

namespace core\entities;

use core\forms\EventForm;
use core\repositories\EventRepository;
use lhs\Yii2SaveRelationsBehavior\SaveRelationsBehavior;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\web\UploadedFile;

/**
 * This is the model class for table "nox_events".
 *
 * @property int $id
 * @property string $date_start
 * @property string $date_end
 * @property string $name_en
 * @property string $description_ua
 * @property string $name_ua
 * @property string $description_en
 */
class Event extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function create(EventForm $form)
    {
        $new = new static();
        $new->setAttributes($form->getAttributes());
        return $new;
    }

    public function edit(EventForm $form)
    {
        $this->setAttributes($form->getAttributes());
    }

    public static function tableName()
    {
        return 'nox_events';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        $rules= new EventForm();
        return $rules->rules();
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date_start' => 'Date Start',
            'date_end' => 'Date End',
            'name_en' => 'Name En',
            'description_ua' => 'Description Ua',
            'name_ua' => 'Name Ua',
            'description_en' => 'Description En',
        ];
    }
    public function behaviors()
    {
        return [
            [
                'class'=>SaveRelationsBehavior::className(),
                'relations'=>['photos'],
            ]
        ];
    }



    public function getPhotos()
    {
        return $this->hasMany(EventPhoto::className(),['owner_id'=>'id']);
    }

    public function getAvatar()
    {
        return $this->hasOne(EventPhoto::className(),['id'=>'avatar_id']);
    }

    public function addPhoto(UploadedFile $file)
    {
        $photos = $this->photos;
        $photos[] = EventPhoto::create($file);
        $this->updatePhotos($photos);
    }

    public function removePhoto($id)
    {
        $photos = $this->photos;
        foreach ($photos as $i => $photo) {
            if ($photo->isIdEqualTo($id)) {
                unset($photos[$i]);
                $this->updatePhotos($photos);
                return;
            }
        }
        throw new \DomainException('Photo is not found.');
    }

    public function removePhotos()
    {
        $this->updatePhotos([]);
    }

    private function updatePhotos(array $photos)
    {
        foreach ($photos as $i => $photo) {
            $photo->setSort($i);
        }
        $this->photos = $photos;
    }

    public function getName()
    {
        if(Yii::$app->params['language']=='en')
        {
            return $this->name_en;
        }
        else
        {
            return $this->name_ua;
        }
    }

    public function getDateSpan($format='date')//datetime or date
    {
        $start=$this->date_start;
        $end=$this->date_end;

        if($format=='date')
        {
            $start=date_format(date_create($start),"Y/m/d");
            $end=date_format(date_create($end),"Y/m/d");
        }
        if($start==$end)
        {
            return $start;
        }
        return $start.' - '.$end;
    }


    public function getShortDescription()
    {
        $desc=$this->getDescription();
        return substr($desc,0,200);
    }

    public function getDescription()
    {
        if(Yii::$app->params['language']=='en')
        {
            return $this->description_en;
        }
        else
        {
            return $this->description_ua;
        }
    }

    public function getMainPhoto()
    {

        return count($this->photos)>0?$this->photos[0]->getImageFileUrl('file'):'';
    }

    public function getNext()
    {
        $repository=Yii::$container->get(EventRepository::class);
        $next=false;
        $id=$this->id+1;
        while($next==false && $id<($this->id+100))
        {
            $next=$repository->findOne($id);

            if(!$next)
            {
                $id++;
            }
            else
            {
                break;
            }

        }
        return $next;
    }

    public function getPrev()
    {
        $repository=Yii::$container->get(EventRepository::class);
        $prev=false;
        $id=$this->id-1;
        while($prev==false && $id>0)
        {
            $prev=$repository->findOne($id);
            if(!$prev)
            {
                $id--;
            }
            else
            {
                break;
            }

        }
        return $prev;
    }
}
