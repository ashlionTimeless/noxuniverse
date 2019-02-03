<?php

namespace core\forms;

use core\forms\PhotosForm;
use Yii;
use core\entities\Article;
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
 */
class ArticleForm extends CompositeForm
{

    public $title_ua;
    public $title_en;
    public $short_desc_ua;
    public $short_desc_en;
    public $description_ua;
    public $description_en;

    public function __construct(Article $article=null)
    {
        if($article)
        {
            $this->setAttributes($article->getAttributes());
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
            [['title_ua', 'title_en', 'description_ua', 'description_en'], 'required'],
            [['short_desc_ua', 'short_desc_en', 'description_ua', 'description_en'], 'string'],
            [['title_ua', 'title_en'], 'string', 'max' => 255],
        ];
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

}
