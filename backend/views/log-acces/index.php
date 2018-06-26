<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel console\models\LogsAccesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Logs Acces';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="logs-acces-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Logs Acces', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'IP',
            'datetime',
            'type_request',
            'log',
            //'status',
            //'countbyte',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
