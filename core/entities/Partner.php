<?php

namespace core\entities;

use core\forms\PartnerForm;
use lhs\Yii2SaveRelationsBehavior\SaveRelationsBehavior;
use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "nox_partners".
 *
 * @property int $id
 * @property string $name_ua
 * @property string $url
 * @property string $description_ua
 * @property string $name_en
 * @property string $description_en
 */
class Partner extends \yii\db\ActiveRecord
{
    public static function create(PartnerForm $form)
    {
        $new = new static();
        $new->setAttributes($form->getAttributes());
        return $new;
    }

    public function edit(PartnerForm $form)
    {
        $this->setAttributes($form->getAttributes());
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'nox_partners';
    }

    public function rules()
    {
        $rules= new PartnerForm();
        return $rules->rules();
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name_ua' => 'Name Ua',
            'url' => 'Url',
            'description_ua' => 'Description Ua',
            'name_en' => 'Name En',
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
        return $this->hasMany(PartnerPhoto::class,['owner_id'=>'id']);
    }

    public function addPhoto(UploadedFile $file)
    {
        $photos = $this->photos;
        $photos[] = PartnerPhoto::create($file);
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
