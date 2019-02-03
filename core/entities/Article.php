<?php

namespace core\entities;

use core\forms\ArticleForm;
use lhs\Yii2SaveRelationsBehavior\SaveRelationsBehavior;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\web\UploadedFile;

/**
 * This is the model class for table "nox_news".
 *
 * @property int $id
 * @property string $title_ua
 * @property string $title_en
 * @property string $short_desc_ua
 * @property string $short_desc_en
 * @property string $description_ua
 * @property string $description_en
 * @property  int $created_at
 */
class Article extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    public static function create(ArticleForm $form)
    {
        $new = new static();
        $new->setAttributes($form->getAttributes());
        $new->created_at=time();
        return $new;
    }
    public function rules()
    {
        $rules= new ArticleForm();
        return $rules->rules();
    }

    public function edit(ArticleForm $form)
    {
        $this->setAttributes($form->getAttributes());
    }

    public static function tableName()
    {
        return 'nox_news';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title_ua' => 'Title Ua',
            'title_en' => 'Title En',
            'short_desc_ua' => 'Short Desc Ua',
            'short_desc_en' => 'Short Desc En',
            'description_ua' => 'Description Ua',
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
        return $this->hasMany(ArticlePhoto::className(),['owner_id'=>'id']);
    }

    public function getAvatar()
    {
        return $this->hasOne(ArticlePhoto::className(),['id'=>'avatar_id']);
    }

    public function addPhoto(UploadedFile $file)
    {
        $photos = $this->photos;
        $photos[] = ArticlePhoto::create($file);
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
