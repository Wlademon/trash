<?php

namespace backend\controllers;

use Yii;
use app\models\LogsAcces;
use app\models\LogsAccesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AccesController implements the CRUD actions for LogsAcces model.
 */
class AccesController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all LogsAcces models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new LogsAccesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single LogsAcces model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView()
    {
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
    }

    /**
     * Creates a new LogsAcces model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new LogsAcces();
        
        
        //return json_encode(Yii::$app->request->post());
        if (Yii::$app->request->post()) {
            $file = "text.txt";
            //если файла нету... тогда
            if (!file_exists($file)) {
                $fp = fopen($file, "w"); // ("r" - считывать "w" - создавать "a" - добовлять к тексту),мы создаем файл
                fwrite($fp, Yii::$app->request->post()['path']);
                fclose($fp);
            }else{
                $file = "text.txt";
                unlink($file);
                $fp = fopen($file, "w"); // ("r" - считывать "w" - создавать "a" - добовлять к тексту),мы создаем файл
                fwrite($fp, Yii::$app->request->post()['path']);
                fclose($fp);
                
            }
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing LogsAcces model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing LogsAcces model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the LogsAcces model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return LogsAcces the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModelLog($line)
    {
        if (($model = LogsAcces::find()->where(['datetime'=>$line[1]])->count('*'))) {
            return false;
        }
        return TRUE;
    }
    protected function findModel($id)
    {
        if (($model = LogsAcces::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
