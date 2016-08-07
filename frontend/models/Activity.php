<?php

namespace app\models;

use Yii;
use common\models\Type;
/**
 * This is the model class for table "tb_activity".
 *
 * @property integer $Activity_Id
 * @property integer $Student_Index
 * @property integer $TypeActivity_Id
 * @property integer $PositionActivity_Id
 * @property string $Activity_Name
 * @property string $Activity_Time
 * @property string $Activity_Year
 */
class Activity extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tb_activity';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Student_Index', 'Type_Id', 'Position_Id', 'Activity_Name', 'Activity_Time', 'Activity_Year'], 'required'],
            [['Student_Index', 'Type_Id', 'Position_Id'], 'integer'],
            [['Activity_Year'], 'safe'],
            [['Activity_Name'], 'string', 'max' => 45],
            [['Activity_Time'], 'string', 'max' => 20],
            [['str1','str2','str3','str4','str5'], 'string', 'max' => 120],
            
            
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Activity_Id' => 'Activity  ID',
            'Student_Index' => 'Student  Index',
            'Type_Name' => 'ประเภทของกิจกรรม',
            'Position_Id' => 'Position Activity  ID',
            'Activity_Name' => 'กิจกรรม',
            'Activity_Time' => 'จำนวน ชม.',
            'Activity_Year' => 'ปีการศึกษา',
            'str1' => 'ตำแหน่งที่เข้าร่วม',
            'str2' => 'ชื่อตำแหน่ง (กรณีเป็นผู้จัดงาน)',
            'str3' => 'บทบาท',
            'str4' => 'องค์กรที่จัด',
            'str5' => 'ระดับงาน',
        ];
    }
    
    public static function getPositionItem(){
        return \common\models\PositionItem::find()->where(['Status'=>'0'])->all();
    }
    
    public static function getType(){
        return \common\models\Type::find()->where(['Status'=>'0'])->all();
    }
    
    public function getType_Name(){
        
        return implode('', Type::find()->select('Type_Name')->where(['Type_Id'=>$this->Type_Id])->column()) ;
    }
}
