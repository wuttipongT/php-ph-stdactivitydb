<?php
namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use common\models\LoginForm;
use yii\filters\VerbFilter;
use common\models\ScholarshipItem;
use common\models\AwardItem;
use common\models\PositionItem;
use common\models\Type;
use common\models\Club;
use yii\helpers\ArrayHelper;
//use backend\models\TblStudentSearch;
use backend\models\User;
use backend\models\ViewStudentSearch;
/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error','test-bed'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    
    public function actionIndex()
    {  
        $searchModel = new ViewStudentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        return $this->render('index',[
            'ScholarshipItem'=>$this->getScholarshipItem(),
            'AwardItem'=>$this->getAwardItem(),
            'category'=>$this->category(),
            'Sport'=>$this->itemsAlias('sport'),
            'Genius'=>$this->itemsAlias('genius'),
            'ROTCS'=>$this->itemsAlias('ROTCS'),
            'military'=>$this->itemsAlias('military'),
            
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
        //$this->category();
        
    }
    
    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
    private function getScholarshipItem(){
        return ArrayHelper::map(ScholarshipItem::find()->where(['Status'=>'0'])->all(), 'Scholarship_Id', 'Scholarship_Name');
    }
    private function getAwardItem(){
        return ArrayHelper::map(AwardItem::find()->where(['Status'=>'0'])->all(), 'Award_Id', 'Award_Name');
    }
    
    private function getPositionItem(){
        return ArrayHelper::map(PositionItem::find()->where(['Status'=>'0'])->all(), 'Position_Id', 'Position_Name');
    }
    private function getType(){
        return ArrayHelper::map(Type::find()->where(['Status'=>'0'])->all(),'Type_Id', 'Type_Name');
    }
    private function getClup(){
        //$ms_scholarship::find()->where(['Status' => '0'])->all()
        return  ArrayHelper::map(Club::find()->where(['Status'=>'0'])->all(),'Club_Id', 'Club_Name');
    }
    private function category(){
          $options = [];
          $options['ตำแหน่งในสโมสร'] =  ArrayHelper::map(Club::find()->where(['Status'=>'0'])->all(),'Club_Id', 'Club_Name');
          $options['ตำแหน่งในชั้นปี'] = ArrayHelper::map(PositionItem::find()->where(['Status'=>'0'])->all(), 'Position_Id', 'Position_Name');
          //$options['ตำแหน่งcccc'] = ArrayHelper::map(Type::find()->where(['Status'=>'0'])->all(),'Type_Id', 'Type_Name');;
          return $options;
//var_dump();
    }
        private function itemsAlias($key){
        $items = [
            'sport'=>[
                'ฟุตบอล'=>'ฟุตบอล',
                'บาสเก็ตบอล'=>'บาสเก็ตบอล',
                'วอลเล่ย์บอล'=>'วอลเล่ย์บอล',
                'แบดมินตัน'=>'แบดมิน ตัน',
                'อื่นๆ'=>'อื่นๆ',
            ],
            'genius'=>[
                'ดนตรี'=>'ดนตรี',
                'กีฬา'=>'กีฬา',
                'ภาษา'=>'ภาษา',
                'คอมพิวเตอร์'=>'คอมพิวเตอร์',
            ],
            'ROTCS'=>[
                0 =>'เรียน',
                1 =>'ยังไม่เรียน',
            ],
            'military'=>[
                0 => 'ยังไม่ผ่อนผัน',
                1 => 'ผ่อนผันแล้ว',
                
            ],
        ];
        return ArrayHelper::getValue($items, $key,[]);
    }
   public function actionTestBed()
    {  
       $user = new User();
       \yii\helpers\VarDumper::dump($user->isAdmin()) ;
    }
}
