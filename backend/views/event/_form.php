<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datetime\DateTimePicker;
/* @var $this yii\web\View */
/* @var $model core\entities\Event */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="event-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
    echo $form->field($model,'date_start')->widget(DateTimePicker::className(),[
        'name' => 'date_start',
        'options' => ['placeholder' => Yii::t('app','Start date')],
        'convertFormat' => true,
        'pluginOptions' => [
            'format' => 'yyyy-MM-dd HH:mm:ss',
            'startDate' => strtotime('now'),
            'todayHighlight' => true
        ]
    ]);
?>

    <?php
    echo $form->field($model,'date_end')->widget(DateTimePicker::className(),[
        'name' => 'date_end',
        'options' => ['placeholder' => Yii::t('app','End date')],
        'convertFormat' => true,
        'pluginOptions' => [
            'format' => 'yyyy-MM-dd HH:mm:ss',
            'startDate' => strtotime('now'),
            'todayHighlight' => true
        ]
    ]);
    ?>

    <?= $form->field($model, 'name_en')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description_en')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'name_ua')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description_ua')->textarea(['rows' => 6]) ?>

    <div class="box box-default">
        <div class="box-header with-border">Photo</div>
        <div class="box-body">
            <?php echo $form->field($model->photos, 'files[]')->widget(\kartik\widgets\FileInput::class, [
                'options' => [
                    'accept' => 'image/*'
                ]
            ]) ?>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
