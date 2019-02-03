<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model core\entities\Teammate */

$this->title = 'Update Teammate: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Teammates', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="teammate-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $form,
    ]) ?>

</div>
