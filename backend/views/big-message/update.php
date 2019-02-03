<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model core\entities\BigMessage */

$this->title = 'Update Big Message: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Big Messages', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="big-message-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
