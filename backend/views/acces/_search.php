<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use Yii;
use app\models\LogsAcces;
use app\models\LogsAccesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
/* @var $this yii\web\View */
/* @var $model app\models\LogsAccesSearch */
/* @var $form yii\widgets\ActiveForm */

$value="";
$handle = fopen("text.txt", "r");
while (!feof($handle)) {
    $buffer = fgets($handle, 4096);
    $value = $buffer;
}



$handle = fopen($value, "r");
while (!feof($handle)) {
    $buffer = fgets($handle, 4096);
    $search = ' - - [';
    $replace = ' ';
    $buffer = str_replace($search, $replace, $buffer);
    $search = '] "';
    $replace = ' ';
    $buffer = str_replace($search, $replace, $buffer);
    $search = '" ';
    $replace = ' ';
    $buffer = str_replace($search, $replace, $buffer);
    $search = '/ ';
    $replace = '/';
    $buffer = str_replace($search, $replace, $buffer);
    
    $line = explode(" ", $buffer);
    
    if(isset($line[1])){
        //return json_encode($this->findModelLog($line)."ggg".isset($line[1]));
        if($this->findModelLog($line)){
            
            $model = new LogsAcces();
            $model->IP = $line[0];
            $model->datetime = !isset($line[1])?'0':$line[1];
            $model->type_request = !isset($line[3])?'0':$line[3];
            $model->log = !isset($line[4])?'0':$line[4];
            $model->status = !isset($line[5])?0:intval($line[5]);
            $model->countbyte = !isset($line[6])?0:intval($line[6]);
            $model->save();
        };
    }
    
}
fclose($handle);
return  $value;
function findModelLog($line)
{
    if (($model = LogsAcces::find()->where(['datetime'=>$line[1]])->count('*'))) {
        return false;
    }
    return TRUE;
}

?>

