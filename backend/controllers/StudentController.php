<?php

namespace backend\controllers;

use Yii;
use backend\models\ViewsStudent;
use backend\models\ViewStudentSearch;
use backend\models\TblStudent;
use \backend\models\TblStudentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\ViewAwardSearch;
use backend\models\ViewScholarshipSearch;


/**
 * TblStudentController implements the CRUD actions for TblStudent model.
 */
class StudentController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all TblStudent models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ViewStudentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
        
        
    }

    /**
     * Displays a single TblStudent model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        //$this->layout = '_blank';
        return $this->renderPartial('view', [
            'model' => $this->findModel($id),
        ]);
        
     //\yii\helpers\VarDumper::dump($this->findModel($id));
    }

    /**
     * Creates a new TblStudent model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TblStudent();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->Student_Index]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing TblStudent model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->Student_Index]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing TblStudent model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
    
    public function actionScholarship(){
       $this->layout = '_blank';
         $searchModel = new ViewScholarshipSearch();
         $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->renderAjax('scholarship', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    public function actionAward(){
       $this->layout = '_blank';
         $searchModel = new ViewAwardSearch();
         $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->renderAjax('award', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Finds the TblStudent model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TblStudent the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ViewsStudent::find()->where('Student_Index=:stdid', [':stdid'=>$id])->one()) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
