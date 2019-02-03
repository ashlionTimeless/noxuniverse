<?php

namespace core\forms;

use core\entities\Partner;
use Yii;

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
class PartnerForm extends CompositeForm
{
    public $name_ua;
    public $url;
    public $description_ua;
    public $name_en;
    public $description_en;


    public function __construct(Partner $entity=null)
    {
        if($entity)
        {
            $this->setAttributes($entity->getAttributes());
        }
        $this->photos= new PhotosForm();
        parent::__construct();
    }
    public function internalForms()
    {
        return ['photos'];
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['url'], 'required'],
            [['description_ua', 'description_en'], 'string'],
            [['name_ua', 'url', 'name_en'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
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
}
