<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model core\entities\Teammate */

$this->title = 'Create Teammate';
$this->params['breadcrumbs'][] = ['label' => 'Teammates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="teammate-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
