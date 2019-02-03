<?php

namespace core\entities;

use lhs\Yii2SaveRelationsBehavior\SaveRelationsBehavior;
use Yii;
use core\forms\TeammateForm;
use yii\web\UploadedFile;

/**
 * This is the model class for table "wallets".
 *
 * @property int $id
 * @property string $name
 * @property string $title
 * @property string $bio
 */
class Teammate extends \yii\db\ActiveRecord
{

    public static function create(TeammateForm $form)
    {
        $new = new static();
        $new->bio_ua=$form->bio_ua;
        $new->name_ua=$form->name_ua;
        $new->title_ua=$form->title_ua;
        $new->bio_en=$form->bio_en;
        $new->name_en=$form->name_en;
        $new->title_en=$form->title_en;
        return $new;
    }

    public function edit(TeammateForm $form)
    {
        $this->name_ua=$form->name_ua;
        $this->title_ua=$form->title_ua;
        $this->bio_ua=$form->bio_ua;
        $this->bio_en=$form->bio_en;
        $this->name_en=$form->name_en;
        $this->title_en=$form->title_en;
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'nox_teammates';
    }

    public function rules()
    {
        $rules= new TeammateForm();
        return $rules->rules();
    }


    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'bio_en' => 'Biography(EN)',
            'name_en' => 'Name(EN)',
            'title_en' => 'Title(EN)',
            'bio_ua' => 'Biography(UA)',
            'name_ua' => 'Name(UA)',
            'title_ua' => 'Title(UA)',
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
        return $this->hasMany(TeammatePhoto::class,['owner_id'=>'id']);
    }

    public function addPhoto(UploadedFile $file)
    {
        $photos = $this->photos;
        $photos[] = TeammatePhoto::create($file);
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

}
