<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model console\models\LogsAcces */

$this->title = 'Update Logs Acces: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Logs Acces', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="logs-acces-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
