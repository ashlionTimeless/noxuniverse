<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model core\entities\BigMessage */

$this->title = 'Create Big Message';
$this->params['breadcrumbs'][] = ['label' => 'Big Messages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="big-message-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
