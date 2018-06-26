<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\base\Widget;


/* @var $this yii\web\View */
/* @var $model app\models\LogsAcces */

$this->title = 'Create Logs Acces';
$this->params['breadcrumbs'][] = ['label' => 'Logs Acces', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="logs-acces-create">

    <h1><?= "Write path to the file access.log" ?></h1>

    <?= Html::beginForm(); ?>

<?= Html::input('text', 'path',"",["class"=>"form-control"])?>

    
<br>
    <div class="form-group">
    <?= Html::submitButton("Save",["class"=>"btn btn-lg btn-success"]) ?>
    </div>

<?= Html::endForm() ?>

</div>
