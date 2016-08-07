<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Info;
use frontend\models\InfoSearch;
use common\models\Advisors;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Query;
use common\models\Favorite;
use common\models\Genius;
use app\models\Scholarship;
use app\models\Transcript;
use app\models\Activity;
use app\models\Position;
use app\models\Award;
use yii\web\Response;
use yii\filters\AccessControl;
use yii\web\UploadedFile;
/**
 * InfoController implements the CRUD actions for Info model.
 */
class InfoController extends Controller {

    /** @var bool */
    public $validate = true;
    private $user_index = null;
    private $student_index = null;

    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index'],
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
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
    public function init() {
        //parent::init();
        $this->user_index = Yii::$app->user->getId();
        $this->student_index = Yii::$app->student->getId();
    }

    public function actionIndex() {
        /*   $searchModel = new InfoSearch();
          $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

          return $this->render('index', [
          'searchModel' => $searchModel,
          'dataProvider' => $dataProvider,
          ]);

         */
        if (empty($this->student_index)) {
            return $this->render('create');
        } else {

            return $this->render('update');
        }
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
    
        if (Yii::$app->request->isAjax) {
            $this->layout = '_blank';
            $isAjax = Yii::$app->request->post('isAjax');
            switch ($isAjax){
                case '1':
                    $model = new Info();
                    return $this->render('_formBasic', [
                                'model' => $model,
                                'user_index' => $this->user_index,
                    ]);
                    
                case '2':
                    
                    $data = Yii::$app->request->post('Info');
                    $connection = \Yii::$app->db;
                    $transaction = $connection->beginTransaction();
                   
                   try {
                        
                        $student_model = $connection->createCommand()
                                ->insert('tb_student', [
                                    'User_Index' => $this->user_index,
                                    'Student_Id' => $data['Student_Id'],
                                    'Prename' => $data['Prename'],
                                    'Student_Name' => $data['Student_Name'],
                                    'Student_LastName' => $data['Student_LastName'],
                                    'Nickname' => $data['Nickname'],
                                    'Image_Path' => $data['file'],
                                    'Address1' => $data['Address1'],
                                    'Address2' => $data['Address2'],
                                    'Phone1' => $data['Phone1'],
                                    'Phone2' => $data['Phone2'],
                                    'Email' => $data['Email'],
                                    'Facebook' => $data['Facebook'],
                                    'Name_Father' => $data['Name_Father'],
                                    'Name_Mother' => $data['Name_Mother'],
                                    'Life_Father' => $data['Life_Father'],
                                    'Life_Mother' => $data['Life_Mother'],
                                    'LifeStatus' => $data['LifeStatus'],
                                    'Name_Parent' => $data['Name_Parent'],
                                    'Phone_Parent' => $data['Phone_Parent'],
                                    'Work_Address_Parent' => $data['Work_Address_Parent'],
                                    'Advisors_Id' => $data['Advisors_Id'],
                                    'Congenital_Disease' => $data['Congenital_Disease'],
                                    'Be_Allergic' => $data['Be_Allergic'],
                                    'Food_Allergy' => $data['Food_Allergy'],
                                    'Buddy' => $data['Buddy'],
                                    'Buddy_Phone' => $data['Buddy_Phone'],
                                    'Hobby' => $data['Hobby'],
                                    'Ambition' => $data['Ambition'],
                                    'Sport' => empty($data['Sport']) ? '' : implode(',', $data['Sport']),
                                    'Genius' => empty($data['Genius']) ? '' : implode(',', $data['Genius']),
                                    'ROTCS' => $data['ROTCS'],
                                    'Clement_Military' => $data['Clement_Military'] == 0 ? $data['Clement_Military'] : $data['txtClement_Military'],
                                    'str' => $data['Str'],
                                ])
                                ->execute();
                        $transaction->commit();
                    } catch (\CDbException $e) {
                        $transaction->rollBack();
                        Yii::$app->response->format = Response::FORMAT_JSON;
                        return [
                            ['log' => 'Caught exception: ', $e->getMessage(), "\n"]
                        ];
                    } finally {
                        /*Yii::$app->getSession()->setFlash('alert', [
                            'body' => 'บันทึกข้อมูลเสร็จเรียบร้อย! ',
                            'options' => ['class' => 'alert-success']
                        ]);
                        */
                        Yii::$app->response->format = Response::FORMAT_JSON;
                        return [
                            ['log' => 'success'],
                        ];
                    }
                    break;
                case '3':
                    
                    $seq = Yii::$app->request->post('seq');
                    
                    if ($seq == 1) {
                        
                        $tb_scholarship = new Scholarship();
                        
                        return $this->renderPartial('scholarship', [
                            'tb_scholarship' => $tb_scholarship
                        ]);
                    }else if($seq == 2){
                        $tb_award = new Award();
                        return $this->renderPartial('award_create', [
                            'tb_award' => $tb_award
                        ]);
                    }else if($seq == 3){
                        
                        $tb_activity = new Activity();
                        return $this->renderPartial('activity_create', [
                            'tb_activity' => $tb_activity
                        ]);
                        
                    }else if($seq == 4){
                        $tb_position = new Position();
                         return $this->renderPartial('position_create', [
                            'tb_position' => $tb_position
                        ]);
                    }
                    
                    /*$tb_scholarship = new Scholarship();
                    $tb_activity = new Activity();
                    $tb_position = new Position();
                    $tb_award = new Award();
                    $isUpdate = new Activity();
                    //\yii\helpers\VarDumper::dump($tb_award);
                    return $this->render('_formActivity', [
                                'tb_scholarship' => $tb_scholarship,
                                'tb_award' => $tb_award,
                                'tb_activity' => $tb_activity,
                                'tb_position' => $tb_position,
                                'isUpdate'=>$isUpdate
                    ]);*/
				break;
                case '4':
                    
                    //echo Activity::findOne(['Student_Index'=>$this->getId()])->Student_Index;
                    $seq = Yii::$app->request->post('seq');
                    $connection = \Yii::$app->db;
                    $transaction = $connection->beginTransaction();
                    
                    if($seq == 1){
                        
                        $scholarship = Yii::$app->request->post('Scholarship');
                        
                        $scholarship_desc = $scholarship['Scholarship_DESC'];
                        $scholarship_year = $scholarship['Scholarship_Year'];
                        foreach ($scholarship_desc as $index => $scholarship) {
                                $connection->createCommand()
                                        ->insert('tb_scholarship', [
                                            'Student_Index' => $this->student_index,
                                            'Scholarship_DESC' => $scholarship_desc[$index],
                                            'Scholarship_Year' => $scholarship_year[$index],
                                        ])
                                        ->execute();
                        }
                        
                    }else if($seq == 2){
                        $award = Yii::$app->request->post('Award');
                        
                        $award_id = $award['Award_Id'];
                        $award_year = $award['Award_Year'];
                        foreach ($award_id as $index => $awards) {
                               $connection->createCommand()
                                        ->insert('tb_award', [
                                            'Award_Id' => $award_id[$index],
                                            'Student_Index' => $this->student_index,
                                            'Award_Year' => $award_year[$index],
                                        ])
                                        ->execute();
                          
                        }
                        
                    }else if($seq == 3){
                        $activity = Yii::$app->request->post('Activity');
                        
                        $Type_Id = $activity['Type_Id'];
                        $Activity_Name = $activity['Activity_Name'];
                        $Activity_Time = $activity['Activity_Time'];
                        $Activity_Year = $activity['Activity_Year'];
                        $str1 = $activity['str1'];
                        $str2 = $activity['str2'];
                        $str3 = $activity['str3'];
                        $str4 = $activity['str4'];
                        $str5 = $activity['str5'];

                        foreach ($Type_Id as $index => $activity) {
                        $connection->createCommand()
                                   ->insert('tb_Activity', [
                                       'Student_Index' => $this->student_index,
                                       'Type_Id' => $Type_Id[$index],
                                       //'Position_Id' => NULL,//$activity['Position_Id'],
                                       'Activity_Name' => $Activity_Name[$index],
                                       'Activity_Time' => $Activity_Time[$index],
                                       'Activity_Year' => $Activity_Year[$index],
                                       'str1'=> $str1[$index],
                                       'str2'=> $str2[$index],
                                       'str3'=> $str3[$index],
                                       'str4'=> $str4[$index],
                                       'str5'=> $str5[$index],
                                   ])
                                   ->execute();
                        }
                        
                    }else if($seq == 4){
                        $position = Yii::$app->request->post('Position');
                        
                        $Club_Id = $position['Club_Id'];
                        $Description = $position['Description'];
                        $Position_Year = $position['Position_Year'];
                        $str6 = $position['str1'];
                        //\yii\helpers\VarDumper::dump($str6);
                        foreach ($Club_Id as $index => $position) {
                           $connection->createCommand()
                                   ->insert('tb_Position', [
                                       'Student_Index' => $this->student_index,
                                       'Club_Id' => $Club_Id[$index],
                                       'Description' => $Description[$index],
                                       'Position_Year' => $Position_Year[$index],
                                       'str1' => $str6[$index],

                                   ])
                                   ->execute();
                        }
                        
                        
                    }
                    
                    $transaction->commit();
                    
                    Yii::$app->response->format = Response::FORMAT_JSON;
                        return [
                            ['log' => 'success'],
                        ];
                    /*
                    $connection = \Yii::$app->db;
                    $transaction = $connection->beginTransaction();
                    $scholarship = Yii::$app->request->post('Scholarship');
                    $award = Yii::$app->request->post('Award');
                    $activity = Yii::$app->request->post('Activity');
                    $position = Yii::$app->request->post('Position');
                    
                    
                    try {
                        $scholarship_desc = $scholarship['Scholarship_DESC'];
                        $scholarship_year = $scholarship['Scholarship_Year'];
                        foreach ($scholarship_desc as $index => $scholarship) {
                                $connection->createCommand()
                                        ->insert('tb_scholarship', [
                                            'Student_Index' => $this->student_index,
                                            'Scholarship_DESC' => $scholarship_desc[$index],
                                            'Scholarship_Year' => $scholarship_year[$index],
                                        ])
                                        ->execute();
                        }

                        $award_id = $award['Award_Id'];
                        $award_year = $award['Award_Year'];
                        foreach ($award_id as $index => $awards) {
                               $connection->createCommand()
                                        ->insert('tb_award', [
                                            'Award_Id' => $award_id[$index],
                                            'Student_Index' => $this->student_index,
                                            'Award_Year' => $award_year[$index],
                                        ])
                                        ->execute();
                          
                        }
                    
                     $Type_Id = $activity['Type_Id'];
                     $Activity_Name = $activity['Activity_Name'];
                     $Activity_Time = $activity['Activity_Time'];
                     $Activity_Year = $activity['Activity_Year'];
                     $str1 = $activity['str1'];
                     $str2 = $activity['str2'];
                     $str3 = $activity['str3'];
                     $str4 = $activity['str4'];
                     $str5 = $activity['str5'];
                     
                     foreach ($Type_Id as $index => $activity) {
                     $connection->createCommand()
                                ->insert('tb_Activity', [
                                    'Student_Index' => $this->student_index,
                                    'Type_Id' => $Type_Id[$index],
                                    //'Position_Id' => NULL,//$activity['Position_Id'],
                                    'Activity_Name' => $Activity_Name[$index],
                                    'Activity_Time' => $Activity_Time[$index],
                                    'Activity_Year' => $Activity_Year[$index],
                                    'str1'=> $str1[$index],
                                    'str2'=> $str2[$index],
                                    'str3'=> $str3[$index],
                                    'str4'=> $str4[$index],
                                    'str5'=> $str5[$index],
                                ])
                                ->execute();
                     }
                     
                     $Club_Id = $position['Club_Id'];
                     $Description = $position['Description'];
                     $Position_Year = $position['Position_Year'];
                     $str6 = $position['str1'];
                     \yii\helpers\VarDumper::dump($str6);
                     foreach ($Club_Id as $index => $position) {
                        $connection->createCommand()
                                ->insert('tb_Position', [
                                    'Student_Index' => $this->student_index,
                                    'Club_Id' => $Club_Id[$index],
                                    'Description' => $Description[$index],
                                    'Position_Year' => $Position_Year[$index],
                                    'str1' => $str6[$index],
                                   
                                ])
                                ->execute();
                     }
                     $transaction->commit();
                    } catch (\CDbException $e) {
                        $transaction->rollBack();

                        Yii::$app->response->format = Response::FORMAT_JSON;
                        return [
                            ['log' => 'Caught exception: ', $e->getMessage(), "\n"],
                        ];
                    } finally {
                        Yii::$app->response->format = Response::FORMAT_JSON;
                        return [
                            ['log' => 'success'],
                        ];
                    }
                     
                     */
                    break;
                case '5' :
                    $model = new Transcript;
                    $searchModel = new \app\models\TranscriptSearch();
                    $DataProvider = $searchModel->search($this->student_index);
                    //\yii\helpers\VarDumper::dump($tb_award);
                    return $this->render('_formTranscript', [
                                'model' => $model,
                                'DataProvider' => $DataProvider
                    ]);
                    
                case '6' :
                    $connection = \Yii::$app->db;
                    $transaction = $connection->beginTransaction();
                    $transcript = Yii::$app->request->post('Transcript');
                 
                    $connection->createCommand()
                                ->insert('tb_transcript', [
                                    'Student_Index' => $this->student_index,
                                    'GPA' => $transcript['GPA'],
                                    'Academic_Year' => $transcript['Academic_Year'],
                                    
                                ])
                                ->execute();
                     
                    $transaction->commit();
                     
                    // Yii::$app->response->format = Response::FORMAT_JSON;
                     Yii::$app->response->format = Response::FORMAT_JSON;
                        return [
                            ['log' => 'success'],
                        ];
                        
                    
            }
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionFrm1() {
        //$this->layout = '_blank';
        $model = new Info();

        return $this->renderAjax('_formBasic', [
                    'model' => $model,
                    'user_index' => $thi->user_index,
        ]);
    }

    public function actionFrm2() {
        //$this->layout = '_blank';

        $tb_Scholarship = new Scholarship();
        $tb_activity = new Activity();
        $tb_position = new Position();
        $tb_award = new Award();

        return $this->renderPartial('_formActivity', [
                    'tb_Scholarship' => $tb_Scholarship,
                    'tb_award' => $tb_award,
                    'tb_activity' => $tb_activity,
                    'tb_position' => $tb_position,
        ]);
    }

    public function actionSave() {
        \Yii::$app->response->format = Response::FORMAT_JSON;
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
    public function actionUpdate($id = '') {

        /*
          if ($model->load(Yii::$app->request->post()) && $model->save()) {
          return $this->redirect(['view', 'id' => $model->Student_Index]);
          } else {
          return $this->render('update', [
          'model' => $model,
          ]);
          } */
        if (Yii::$app->request->isAjax) {
            //$this->layout = '_blank';
            $isAjax = Yii::$app->request->post('isAjax');
            $model = $this->findModel($this->student_index,'info');
            switch ($isAjax){
                case '1':
                    $model->sportAsArray();
                    $model->geniusAsArray();
                    
                    return $this->renderAjax('_formBasic', [
                                'model' => $model,
                                'user_index' => $this->user_index,
                    ]);
                    
                case '2' :
                    
                    $data = Yii::$app->request->post('Info');
                    $connection = \Yii::$app->db;
                    $transaction = $connection->beginTransaction();
                   
                    try {
                        
                        $filename = $data['file'];
                        $path = Yii::$app->basePath . "/web/uploads/";
                        if(!empty($filename)){
                            unlink($path.$model->Image_Path);
                             
                        }
                        
                        $student_model = $connection->createCommand()
                             ->update('tb_student', [
                                 // 'User_Index' => $data['User_Index'],
                                 'Student_Id' => $data['Student_Id'],
                                 'Prename' => $data['Prename'],
                                 'Student_Name' => $data['Student_Name'],
                                 'Student_LastName' => $data['Student_LastName'],
                                 'Nickname' => $data['Nickname'],
                                 'Image_Path' => !empty($filename) ? $filename : $model->Image_Path,
                                 'Address1' => $data['Address1'],
                                 'Address2' => $data['Address2'],
                                 'Phone1' => $data['Phone1'],
                                 'Phone2' => $data['Phone2'],
                                 'Email' => $data['Email'],
                                 'Facebook' => $data['Facebook'],
                                 'Name_Father' => $data['Name_Father'],
                                 'Name_Mother' => $data['Name_Mother'],
                                 'Life_Father' => $data['Life_Father'],
                                 'Life_Mother' => $data['Life_Mother'],
                                 'LifeStatus' => $data['LifeStatus'],
                                 'Name_Parent' => $data['Name_Parent'],
                                 'Phone_Parent' => $data['Phone_Parent'],
                                 'Work_Address_Parent' => $data['Work_Address_Parent'],
                                 'Advisors_Id' => $data['Advisors_Id'],
                                 'Congenital_Disease' => $data['Congenital_Disease'],
                                 'Be_Allergic' => $data['Be_Allergic'],
                                 'Food_Allergy' => $data['Food_Allergy'],
                                 'Buddy' => $data['Buddy'],
                                 'Buddy_Phone' => $data['Buddy_Phone'],
                                 'Hobby' => $data['Hobby'],
                                 'Ambition' => $data['Ambition'],
                                 'Sport' => empty($data['Sport']) ? '' : implode(',', $data['Sport']),
                                 'Genius' => empty($data['Genius']) ? '' : implode(',', $data['Genius']),
                                 'ROTCS' => $data['ROTCS'],
                                 'Clement_Military' => $data['Clement_Military'] == 0 ? $data['Clement_Military'] : $data['txtClement_Military'],
                                 'str' => isset($data['Str']) ? $data['Str'] : '',
                                     ], ['Student_Index' => $this->student_index])
                             ->execute();  
                        $transaction->commit();
                        
                    } catch (\CDbException $e) {
                        $transaction->rollBack();
                        Yii::$app->response->format = Response::FORMAT_JSON;
                        return [
                            ['log' => 'Caught exception: ', $e->getMessage(), "\n"]
                        ];
                    } finally {
                        Yii::$app->response->format = Response::FORMAT_JSON;
                        
                        return [
                            ['log' => 'success'],
                        ];
                    }
                break;
                
                case '3' :
                    $seq = Yii::$app->request->post('seq');
                    if($seq == 1){
                        
                        $tb_scholarship = $this->findModel($this->student_index, 'scholarship');
                        return $this->renderPartial('scholarship_update', [
                            'tb_scholarship' => $tb_scholarship,
                        ]);
                    }else if($seq == 2){
                         $tb_award = $this->findModel($this->student_index, 'award');
                        return $this->renderPartial('award_update', [
                            'tb_award' => $tb_award,
                        ]);
                    }else if($seq == 3){
                        $tb_activity = $this->findModel($this->student_index, 'activity');
                        return $this->renderPartial('activity_update', [
                            'tb_activity' => $tb_activity,
                        ]);
                    }else if($seq == 4){
                        $tb_position = $this->findModel($this->student_index, 'position');
                        return $this->renderPartial('position_update', [
                            'tb_position' => $tb_position,
                        ]);
                    }
                        
                    /*$tb_scholarship = $this->findModel($this->student_index, 'scholarship');
                    $tb_award = $this->findModel($this->student_index, 'award');
                    $tb_activity = $this->findModel($this->student_index, 'activity');
                    $tb_position = $this->findModel($this->student_index, 'position');
                    $isUpdate = $this->findModel($this->student_index, 'isUpdate');
                
				   //var_dump($tb_scholarship);
                   return $this->renderPartial('_formActivity', [
                                'tb_scholarship' => $tb_scholarship,
                                'tb_award' => $tb_award,
                                'tb_activity' => $tb_activity,
                                'tb_position' => $tb_position,
                                'isUpdate' => $isUpdate
                    ]);*/
                    break;
					
					
                case '4' :
                    
                    $seq = Yii::$app->request->post('seq');
                    $connection = \Yii::$app->db;
                    $transaction = $connection->beginTransaction();
                    if($seq == 1){
                        
                        $scholarship = Yii::$app->request->post('Scholarship');
                        
                        $scholarship_Id = $scholarship['Scholarship_Id'];
                        $scholarship_desc = $scholarship['Scholarship_DESC'];
                        $scholarship_year = $scholarship['Scholarship_Year'];
								
                        foreach ($scholarship_Id as $index => $id) {
                                $connection->createCommand()
                                        ->update('tb_scholarship', [
                                            'Student_Index' => $this->student_index,
                                            'Scholarship_DESC' => $scholarship_desc[$index],
                                            'Scholarship_Year' => $scholarship_year[$index],
                                        ], ['Scholarship_Id' => $id])
                                        ->execute();
                        }
                        
                    }else if($seq == 2){
                        $award = Yii::$app->request->post('Award');
                        
                        $award_index = $award['Award_Index'];
                        $award_id = $award['Award_Id'];
                        $award_year = $award['Award_Year'];
                        foreach ($award_index as $index => $key) {
                               $connection->createCommand()
                                        ->update('tb_award', [
                                            'Award_Id' => $award_id[$index],
                                            'Student_Index' => $this->student_index,
                                            'Award_Year' => $award_year[$index],
                                        ], ['Award_Index' => $key])
                                        ->execute();
                          
                        }
                        
                    }else if($seq == 3){
                        $activity = Yii::$app->request->post('Activity');
                        
                        $activity_Id = $activity['Activity_Id'];
                        $Type_Id = $activity['Type_Id'];
                        $Activity_Name = $activity['Activity_Name'];
                        $Activity_Time = $activity['Activity_Time'];
                        $Activity_Year = $activity['Activity_Year'];
                        $str1 = $activity['str1'];
                        $str2 = $activity['str2'];
                        $str3 = $activity['str3'];
                        $str4 = $activity['str4'];
                        $str5 = $activity['str5'];

                        foreach ($activity_Id as $index => $activity) {
                        $connection->createCommand()
                                   ->update('tb_Activity', [
                                       'Student_Index' => $this->student_index,
                                       'Type_Id' => $Type_Id[$index],
                                       //'Position_Id' => NULL,//$activity['Position_Id'],
                                       'Activity_Name' => $Activity_Name[$index],
                                       'Activity_Time' => $Activity_Time[$index],
                                       'Activity_Year' => $Activity_Year[$index],
                                       'str1'=> $str1[$index],
                                       'str2'=> $str2[$index],
                                       'str3'=> $str3[$index],
                                       'str4'=> $str4[$index],
                                       'str5'=> $str5[$index],
                                   ], ['Activity_Id' => $activity])
                                   ->execute();
                        }
                    }else if($seq == 4){
                        $position = Yii::$app->request->post('Position');
                        
                        $Position_Id = $position['Position_Id'];
                        $Club_Id = $position['Club_Id'];
                        $Description = $position['Description'];
                        $Position_Year = $position['Position_Year'];
                        $str6 = $position['str1'];
                       // \yii\helpers\VarDumper::dump($str6);
                        foreach ($Position_Id as $index => $position) {
                           $connection->createCommand()
                                   ->update('tb_Position', [
                                       'Student_Index' => $this->student_index,
                                       'Club_Id' => $Club_Id[$index],
                                       'Description' => $Description[$index],
                                       'Position_Year' => $Position_Year[$index],
                                       'str1' => $str6[$index],

                                   ], ['Position_Id' => $position])
                                   ->execute();
                     }
                    }
                    
                    $transaction->commit();
                    Yii::$app->response->format = Response::FORMAT_JSON;
                    return [
                        ['log' => 'success'],
                    ];
 /*                                       $activity = Yii::$app->request->post('Activity');

                    \yii\helpers\VarDumper::dump($activity);
                    //print_r(Yii::$app->request->post());
                    $connection = \Yii::$app->db;
                    $transaction = $connection->beginTransaction();
					
                    $scholarship = Yii::$app->request->post('Scholarship');
                    $award = Yii::$app->request->post('Award');
                    $activity = Yii::$app->request->post('Activity');
                    $position = Yii::$app->request->post('Position');
                    
                    
                    try {
			$scholarship_Id = $scholarship['Scholarship_Id'];
                        $scholarship_desc = $scholarship['Scholarship_DESC'];
                        $scholarship_year = $scholarship['Scholarship_Year'];
								
                        foreach ($scholarship_Id as $index => $id) {
                                $connection->createCommand()
                                        ->update('tb_scholarship', [
                                            'Student_Index' => $this->student_index,
                                            'Scholarship_DESC' => $scholarship_desc[$index],
                                            'Scholarship_Year' => $scholarship_year[$index],
                                        ], ['Scholarship_Id' => $id])
                                        ->execute();
                        }
				
                        $award_index = $award['Award_Index'];
                        $award_id = $award['Award_Id'];
                        $award_year = $award['Award_Year'];
                        foreach ($award_index as $index => $key) {
                               $connection->createCommand()
                                        ->update('tb_award', [
                                            'Award_Id' => $award_id[$index],
                                            'Student_Index' => $this->student_index,
                                            'Award_Year' => $award_year[$index],
                                        ], ['Award_Index' => $key])
                                        ->execute();
                          
                        }
                      
                         $Type_Id = $activity['Type_Id'];
                     $Activity_Name = $activity['Activity_Name'];
                     $Activity_Time = $activity['Activity_Time'];
                     $Activity_Year = $activity['Activity_Year'];
                     $str1 = $activity['str1'];
                     $str2 = $activity['str2'];
                     $str3 = $activity['str3'];
                     $str4 = $activity['str4'];
                     $str5 = $activity['str5'];
                     
                     foreach ($Type_Id as $index => $activity) {
                     $connection->createCommand()
                                ->update('tb_Activity', [
                                    'Student_Index' => $this->student_index,
                                    'Type_Id' => $Type_Id[$index],
                                    //'Position_Id' => NULL,//$activity['Position_Id'],
                                    'Activity_Name' => $Activity_Name[$index],
                                    'Activity_Time' => $Activity_Time[$index],
                                    'Activity_Year' => $Activity_Year[$index],
                                    'str1'=> $str1[$index],
                                    'str2'=> $str2[$index],
                                    'str3'=> $str3[$index],
                                    'str4'=> $str4[$index],
                                    'str5'=> $str5[$index],
                                ], ['Student_Index' => $this->student_index])
                                ->execute();
                     }
                     
                     $Club_Id = $position['Club_Id'];
                     $Description = $position['Description'];
                     $Position_Year = $position['Position_Year'];
                     $str6 = $position['str1'];
                     \yii\helpers\VarDumper::dump($str6);
                     foreach ($Club_Id as $index => $position) {
                        $connection->createCommand()
                                ->update('tb_Position', [
                                    'Student_Index' => $this->student_index,
                                    'Club_Id' => $Club_Id[$index],
                                    'Description' => $Description[$index],
                                    'Position_Year' => $Position_Year[$index],
                                    'str1' => $str6[$index],
                                   
                                ], ['Student_Index' => $this->student_index])
                                ->execute();
                     }*/
                     /*  
                     $connection->createCommand()
                                ->update('tb_Activity', [
                                    'Student_Index' => $this->student_index,
                                    'Type_Id' => $activity['Type_Id'],
                                    'Position_Id' => $activity['Position_Id'],
                                    'Activity_Name' => $activity['Activity_Name'],
                                    'Activity_Time' => $activity['Activity_Time'],
                                    'Activity_Year' => $activity['Activity_Year'],
                                ], ['Student_Index' => $this->student_index])
                                ->execute();

                        $connection->createCommand()
                                ->update('tb_Position', [
                                    'Student_Index' => $this->student_index,
                                    'Club_Id' => $position['Club_Id'],
                                    'Description' => $position['Description'],
                                    'Position_Year' => $position['Position_Year'],
                                ], ['Student_Index' => $this->student_index])
                                ->execute();
*/
     /*                    $transaction->commit();
                   } catch (\CDbException $e) {
                        $transaction->rollBack();

                        Yii::$app->response->format = Response::FORMAT_JSON;
                        return [
                            ['log' => 'Caught exception: ', $e->getMessage(), "\n"],
                        ];
                    } finally {
                        Yii::$app->response->format = Response::FORMAT_JSON;
                        return [
                            ['log' => 'success'],
                        ];
                    }
                    */
                case '5' :
                    $id = Yii::$app->request->post('id');
                    $model= $this->findModel($id, 'transcriptUpdate');
                    $searchModel = new \app\models\TranscriptSearch();
                    $DataProvider = $searchModel->search($this->student_index);
                
				   //var_dump($tb_scholarship);
                   return $this->renderPartial('_formTranscript_update', [
                                'model'=>$model,
                                //'DataProvider' => $DataProvider
                    ]);
                   
                case '6' :
                    
                    $connection = \Yii::$app->db;
                    $transaction = $connection->beginTransaction();
                    $transcript = Yii::$app->request->post('Transcript');
                    $connection->createCommand()
                                ->update('tb_transcript', [
                                    'Grade' => $transcript['GPA'],
                                    'Academic_Year' => $transcript['Academic_Year'],
                                  
                                ], ['Transcript_Index' => $transcript['Transcript_Index']])
                                ->execute();
                    
                    $transaction->commit();
                     
                     Yii::$app->response->format = Response::FORMAT_JSON;
                        return [
                            ['log' => 'success'],
                        ];  
            }
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
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
    protected function findModel($id, $case) {
        switch ($case){
            case 'info':
                if (($model = Info::findOne($id)) !== null) {
                    return $model;
                } else {
                   throw new NotFoundHttpException('The requested page does not exist.');
                }
                break;
            case 'scholarship':
                if (($model = Scholarship::findAll(['Student_Index'=>$id])) !== null) {
                    return $model;
                } else {
                   throw new NotFoundHttpException('The requested page does not exist.');
                }
                break;
            case 'activity':
                if (($model = Activity::findAll(['Student_Index'=>$id])) !== null) {
                    return $model;
                } else {
                   throw new NotFoundHttpException('The requested page does not exist.');
                }
                break;
            case 'position':
                if (($model = Position::findAll(['Student_Index'=>$id])) !== null) {
                    return $model;
                } else {
                   throw new NotFoundHttpException('The requested page does not exist.');
                }
                break;
            case 'award':
                if (($model = Award::findAll(['Student_Index'=>$id])) !== null) {
                    return $model;
                } else {
                   throw new NotFoundHttpException('The requested page does not exist.');
                }
                break;
            case 'isUpdate':
                if (($model = Activity::findOne(['Student_Index'=>$id])) !== null) {
                    return $model;
                } else {
                   throw new NotFoundHttpException('The requested page does not exist.');
                }
                break;
                
            case 'transcript':
                if (($model = Transcript::findOne(['Student_Index'=>$id])) !== null) {
                    return $model;
                } else {
                   throw new NotFoundHttpException('The requested page does not exist.');
                }
                break;
                
            case 'transcriptUpdate' :
                
                if (($model = Transcript::findOne(['Transcript_Index'=>$id])) !== null) {
                    return $model;
                } else {
                   throw new NotFoundHttpException('The requested page does not exist.');
                }
                break;
        }
    }

    public function actionUrl() {
        if (Yii::$app->request->isAjax) {
           Yii::$app->response->format = Response::FORMAT_JSON;
           
           $key = Yii::$app->request->post('key');
           $create = Yii::$app->urlManager->createUrl(['/info/create']);
           $update = Yii::$app->urlManager->createUrl(['/info/update']);
           if($key == 1){
               $url = Yii::$app->student->getId() == NULL ? $create : $update;
               return [['url' => $url]]; 
           }else if($key == 3){
               $url = Yii::$app->student->isActivity() ? $create : $update;
               return [['url' => $url]]; 
           }
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public  function actionDatetime(){
        if (Yii::$app->request->isAjax) {
            return $this->renderAjax('_datepicker',['value'=>Yii::$app->request->post('value')]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionImage(){
        $name = $_FILES['tax_file']['name'];
        $size = $_FILES['tax_file']['size'];
        $tmp = $_FILES['tax_file']['tmp_name'];
        $path = Yii::$app->basePath . "/web/uploads/";
        
        $filename = rand(10,100).'-'.$name;
        move_uploaded_file($tmp, $path.$filename);
        
         Yii::$app->response->format = Response::FORMAT_JSON;
        return $filename;
        //Yii::getAlias('@web')
       // echo Yii::$app->basePath . '/uploads/';
    }
    
    public function actionScholarship(){
        if(Yii::$app->request->isAjax){
            return $this->renderPartial('_scholarship', ['length'=>Yii::$app->request->post('length')]);
        }else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
        
    }
    
    public function actionAward(){
        if(Yii::$app->request->isAjax){
           return $this->renderPartial('_award', ['length'=>Yii::$app->request->post('length')]);
        }else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
        
    }
    
    public function actionPosition(){
        if(Yii::$app->request->isAjax){
           return $this->renderPartial('_position', ['length'=>Yii::$app->request->post('length')]);
        }else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
        
    }
    
    public function actionActiv(){
        if(Yii::$app->request->isAjax){
           return $this->renderPartial('_activity', ['length'=>Yii::$app->request->post('length')]);
        }else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
        
    }
    
    Public function actionActivity(){
        $scholarshipSearchModel = new \app\models\ScholarshipSearch();
        $scholarshipDataProvider = $scholarshipSearchModel->search($this->student_index);
        //print_r( Yii::$app->request->queryParams); 
        
        $awardSearchModel = new \app\models\AwardSearch();
        $awardDataProvider = $awardSearchModel->search($this->student_index);
        
        $activitySearchModel = new \app\models\ActivitySearch();
        $activityDataProvider = $activitySearchModel->search($this->student_index);
        
        $positionSearchModel = new \app\models\PositionSearch();
        $positionDataProvider = $positionSearchModel->search($this->student_index);
        
        return $this->renderPartial('_formActivity',[
                        'scholarshipDataProvider'=>$scholarshipDataProvider,
                        'awardDataProvider' => $awardDataProvider,
                        'activityDataProvider' => $activityDataProvider,
                        'positionDataProvider' => $positionDataProvider
                ]);
        //Student_Index
    }
    public function actionTest(){
      $tb_scholarship = $this->findModel($this->student_index, 'scholarship');
                        return $this->renderPartial('scholarship', [
                            'tb_scholarship' => $tb_scholarship,
                        ]);
    }
}
