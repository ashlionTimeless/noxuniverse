<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model core\forms\search\TeammateSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="teammate-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name_en') ?>

    <?= $form->field($model, 'title_en') ?>

    <?= $form->field($model, 'bio_en') ?>

    <?= $form->field($model, 'name_ua') ?>

    <?php // echo $form->field($model, 'title_ua') ?>

    <?php // echo $form->field($model, 'bio_ua') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
