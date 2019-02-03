<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel core\forms\BigMessageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Big Messages';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="big-message-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Big Message', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'full_name',
            'email:email',
            'phone',
            // 'additional_information:ntext',
            'country',
            ['attribute'=>'datetime',
            'value'=>function($model)
            {
                $date= new Datetime();
                $date->setTimestamp($model->datetime);
                return $date->format('Y-m-d H:i:s');
            }],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
