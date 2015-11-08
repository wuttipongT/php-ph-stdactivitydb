<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Info;
use frontend\models\InfoSearch;
use common\models\Advisors;
use common\models\MSScholarship;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * InfoController implements the CRUD actions for Info model.
 */
class InfoController extends Controller {

    public function behaviors() {
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
     * Lists all Info models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new InfoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Info model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Info model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Info();
        $advisors = new \common\models\Advisors();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->Student_Index]);
        } else {
            return $this->render('create', [
                        'model' => $model,
                        'advisors' => $advisors,
            ]);
        }
    }

    public function actionFrm1() {
        $this->layout = '_blank';
        $model = new Info();
        $advisors = new Advisors();

        return $this->render('_formBasic', [
                    'model' => $model,
                    'advisors' => $advisors,
        ]);
    }

    public function actionFrm2() {
        $this->layout = '_blank';
        $scholarship = new MSScholarship();
        $tb_Scholarship = new \common\models\TBScholarship();
        $award = new \common\models\Award();
        return $this->render('_formActivity', [
                    'scholarship' => $scholarship,
                    'tb_Scholarship' => $tb_Scholarship,
                    'award' => $award,
        ]);
    }
    
    public function actionSave(){
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return [
            'ProductID' => '001',
            'ProductSKU' => 'SKU-001',
        ];
    }
    /**
     * Updates an existing Info model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
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
     * Deletes an existing Info model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Info model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Info the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Info::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
