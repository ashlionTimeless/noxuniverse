<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model core\entities\Partner */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="partner-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name_ua')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description_ua')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'name_en')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description_en')->textarea(['rows' => 6]) ?>
    <div class="box box-default">
        <div class="box-header with-border">Photo</div>
        <div class="box-body">
            <?php echo $form->field($model->photos, 'files[]')->widget(\kartik\file\FileInput::class, [
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
