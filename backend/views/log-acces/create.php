<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model console\models\LogsAcces */

$this->title = 'Create Logs Acces';
$this->params['breadcrumbs'][] = ['label' => 'Logs Acces', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="logs-acces-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
