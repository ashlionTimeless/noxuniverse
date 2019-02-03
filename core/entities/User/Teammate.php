<?php

namespace core\entities\User;

use Yii;
use core\forms\User\TeammateForm;
/**
 * This is the model class for table "wallets".
 *
 * @property int $id
 * @property string $name
 * @property string $title
 * @property string $bio
 * @property string $photo
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
        $new->photo=$form->photo;
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
        $this->photo=$form->photo;
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'nox_teammates';
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
            'photo'=>'Photo'
        ];
    }
}
