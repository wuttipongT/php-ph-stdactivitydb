<?php

namespace frontend\models;

use Yii;
use yii\db\ActiveRecord;
use common\models\Advisors;
use yii\helpers\ArrayHelper;
use app\models\Activity;
use app\models\Transcript;
/**
 * This is the model class for table "tb_student".
 *
 * @property integer $Student_Index
 * @property string $Student_Id
 * @property string $Student_Name
 * @property string $Student_LastName
 * @property string $Image_Path
 * @property string $Address1
 * @property string $Address2
 * @property string $Phone1
 * @property string $Phone2
 * @property string $Name_Father
 * @property string $Name_Mother
 * @property string $Name_Parent
 * @property string $Phone_Parent
 * @property string $Work_Address_Parent
 * @property integer $Advisors_Id
 * @property string $Buddy_Phone
 * @property string $Hobby
 * @property string $Ambition
 * @property string $Favorite_Sport
 * @property string $Genius
 * @property string $ROTCS
 * @property string $Clement_Military
 * @property string $Award
 */
class Info extends \yii\db\ActiveRecord
{
    public $txtClement_Military;
    public $file; // Define
    /**
     * @inheritdoc
     
    public function behaviors() {
        return [
            [
                'class' => \yii\behaviors\AttributeBehavior::className(),
                'attributes' => [
                                ActiveRecord::EVENT_BEFORE_INSERT => 'Sport',
                                ActiveRecord::EVENT_BEFORE_UPDATE => 'Sport',
                                
                ],
                'value' => function($event){
                        return implode(',', $this->Sport);//สร้าง string จากข้อมูลใน array
                },
            ],
            [
                'class' => \yii\behaviors\AttributeBehavior::className(),
                'attributes' => [
                                ActiveRecord::EVENT_BEFORE_INSERT => 'Genius',
                                ActiveRecord::EVENT_BEFORE_UPDATE => 'Genius',
                                
                ],
                'value' => function($event){
                        return implode(',', $this->Genius);//สร้าง string จากข้อมูลใน array
                },
            ],
        ];
    }
     * 
     * @return string
     */
    public static function tableName()
    {
        return 'tb_student';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Student_Id', 'Student_Name', 'Student_LastName', 'Image_Path', 'Address1', 'Address2', 'Phone1', 'Phone2', 'Name_Father', 'Name_Mother', 'Name_Parent', 'Phone_Parent', 'Work_Address_Parent', 'Advisors_Id', 'Congenital_Disease','Be_Allergic','Food_Allergy','Buddy','Buddy_Phone', 'Hobby', 'Ambition', 'ROTCS'], 'required'],
            [['Image_Path', 'Address1', 'Address2', 'Work_Address_Parent', 'Ambition', 'Sport', 'Genius', 'ROTCS','str'], 'string'],
            [['Advisors_Id','User_Index','Life_Father','Life_Mother','LifeStatus'], 'integer'],
            [['Clement_Military','txtClement_Military','file'], 'safe'],
            [['Student_Id'], 'string', 'max' => 11],
            [['Student_Name', 'Student_LastName','Prename','Nickname'], 'string', 'max' => 32],
            [['Phone1', 'Phone2', 'Phone_Parent', 'Buddy_Phone'], 'string', 'max' => 10],
            [['Name_Father', 'Name_Mother', 'Name_Parent'], 'string', 'max' => 75],
            [['Hobby'], 'string', 'max' => 120],
            [['Sport','Genius'], 'string', 'max' => 500],
            [['Email','Facebook'], 'string', 'max' => 100],
            [['Student_Id'], 'unique'],
            [['file'],'file', 'extensions'=>'jpg, gif, png']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Student_Index' => 'Student Index',
            'Student_Id' => 'Student ID',
            'Prename' => 'Pre Name',
            'Student_Name' => 'Student Name',
            'Student_LastName' => 'Student LastName',
            'Nickname' => 'Nickname',
            'Image_Path' => 'Image Path',
            'Address1' => 'Address1',
            'Address2' => 'Address2',
            'Phone1' => 'Phone1',
            'Phone2' => 'Phone2',
            'Name_Father' => 'Name Father',
            'Name_Mother' => 'Name Mother',
            'Life_Father' => 'Life 1',
            'Life_Mother' => 'Life 2',
            'LifeStatus' =>'Life Status',
            'Name_Parent' => 'Name Parent',
            'Phone_Parent' => 'Phone Parent',
            'Work_Address_Parent' => 'Work Address Parent',
            'Advisors_Id' => 'Advisors ID',
            'Buddy_Phone' => 'Buddy Phone',
            'Hobby' => 'Hobby',
            'Ambition' => 'Ambition',
            'ROTCS' => 'Rotcs',
            'Clement_Military' => 'Clement Military',
            'Award' => 'Award',
        ];
    }
    public static function find(){
        return new \app\models\InfoQuery(get_called_class());
    }
    public static function itemsAdvisors(){
        return ArrayHelper::map(Advisors::find()->where(['Status'=>'0'])->all(), 'Advisors_Id', 'Advisors_Name');
    }
    
    public static function itemsAlias($key){
        $items = [
            'sport'=>[
                'ฟุตบอล'     =>'ฟุตบอล',
                'บาสเก็ตบอล' =>'บาสเก็ตบอล',
                'วอลเล่ย์บอล' =>'วอลเล่ย์บอล',
                'แบดมินตัน'   =>'แบดมินตัน',
                'อื่นๆ'       =>'อื่นๆ',
            ],
            'genius'=>[
                'ดนตรี'      =>'ดนตรี',
                'กีฬา'       =>'กีฬา',
                'ภาษา'      =>'ภาษา',
                'คอมพิวเตอร์' =>'คอมพิวเตอร์',
            ],
            'ROTCS'=>[
                0 =>'เรียน',
                1 =>'ยังไม่เรียน',
            ],
            'military'=>[
                0 => 'ยังไม่ผ่อนผัน',
                1 => 'ผ่อนผันแล้ว',
                
            ],
            'prename' => [
                'นาย'       => 'นาย',
                'นางสาว'    => 'นางสาว',
                'นาง'       => 'นาง',
                'ว่าที่ร้อยตรี'  => 'ว่าที่ร้อยตรี'
            ],
            'life' => [
                0 => 'มีชีวิต',
                1 => 'ถึงแก่กรรม'
            ],
            'status' => [
                0 => 'อยู่ด้วยกัน',
                1 => 'แยกกันอยู่',
                2 => 'หย่าร้าง'
            ]
        ];
        return ArrayHelper::getValue($items, $key,[]);
    }
    
    public function getItemSport(){
        return self::itemsAlias('sport');
    }
    
    public function getItemGenius(){
        return self::itemsAlias('genius');
    }
    
    public function getSportName(){
        $sports = $this->getItemSport();
        $sportSelected = explode(',', $this->Sport);
        $sportSelectedName = [];
        foreach ($sports as $key => $sportName){
            foreach($sportSelected as $sportKey){
                if($key === $sportKey){
                    $sportSelectedName[] = $sportName;
                }
            }
        }
        return implode(',', $sportSelectedName);
    }
    
    public function sportAsArray(){
        return $this->Sport = explode(',', $this->Sport);
    }
    
    public function geniusAsArray(){
        return $this->Genius = explode(',', $this->Genius);
    }
    
    public function getId(){
        $info = $this->findOne(['User_Index' => Yii::$app->user->getId()]);
        if($info !== Null){
            return $info->Student_Index;
        }
       
    }
	
    public function isActivity(){
            $activity = Activity::findOne(['Student_Index'=>$this->getId()]);
            return $activity === Null ? True : False;
    }
    
    public function isTranscript(){
            $activity = Transcript::findOne(['Student_Index'=>$this->getId()]);
            return $activity === Null ? True : False;
    }
}