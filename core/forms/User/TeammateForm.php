<?php

namespace core\forms\User;

use core\entities\User\User;
use core\entities\User\Teammate;
//use core\managers\User\TeammateManager;
use Yii;

/**
 * This is the model class for table "teammates".
 *
 * @property int $id
 * @property int $user_id
 * @property string $teammate_address
 * @property string $teammate_key
 * @property string $password
 */
class TeammateForm extends \yii\base\Model
{
    /**
     * @inheritdoc
     */
    public $name_ua;
    public $title_au;
    public $bio_ua;
    public $name_en;
    public $title_en;
    public $bio_en;
    public $photo;

    public function __construct(Teammate $teammate=null)
    {
        if($teammate)
        {
            $this->name_ua=$teammate->name_ua;
            $this->title_ua=$teammate->title_ua;
            $this->bio_ua=$teammate->bio_ua;
            $this->bio_en=$teammate->bio_en;
            $this->name_en=$teammate->name_en;
            $this->title_en=$teammate->title_en;
            $this->photo=$teammate->photo;
        }
        parent::__construct();
    }
    public function rules()
    {
        return [
            [['name_eu', 'title_ua', 'bio_ua','bio_en','title_en','name_en','photo'], 'safe','required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
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
