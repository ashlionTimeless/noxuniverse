<?php

namespace core\entities;

use yii\db\ActiveRecord;
use yii\web\UploadedFile;
use yiidreamteam\upload\ImageUploadBehavior;

/**
 * @property integer $id
 * @property string $file
 * @property integer $sort
 *
 * @mixin ImageUploadBehavior
 */
class EventPhoto extends ActiveRecord
{
    public static function create(UploadedFile $file)
    {
        $photo = new static();
        $photo->file = $file;
        return $photo;
    }

    public function setSort($sort)
    {
        $this->sort = $sort;
    }

    public function isIdEqualTo($id)
    {
        return $this->id == $id;
    }

    public static function tableName()
    {
        return '{{%nox_event_photos}}';
    }

    public function behaviors()
    {
        return [
            [
                'class' => ImageUploadBehavior::className(),
                'attribute' => 'file',
                'createThumbsOnRequest' => true,
                'filePath' => '@staticRoot/origin/events/[[attribute_owner_id]]/[[id]].[[extension]]',
                'fileUrl' => '/static/origin/events/[[attribute_owner_id]]/[[id]].[[extension]]',
                'thumbPath' => '@staticRoot/cache/events/[[attribute_owner_id]]/[[profile]]_[[id]].[[extension]]',
                'thumbUrl' => '/static/cache/events/[[attribute_owner_id]]/[[profile]]_[[id]].[[extension]]',
                'thumbs' => [
                    'thumb' => ['width' => 640, 'height' => 480],
                ],
            ],
        ];
    }
}