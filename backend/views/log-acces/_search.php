<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model console\models\LogsAccesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="logs-acces-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'IP') ?>

    <?= $form->field($model, 'datetime') ?>

    <?= $form->field($model, 'type_request') ?>

    <?= $form->field($model, 'log') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'countbyte') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
