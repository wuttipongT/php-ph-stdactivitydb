<?php

namespace app\models;

use Yii;
use common\models\Club;
/**
 * This is the model class for table "tb_position".
 *
 * @property integer $Position_Id
 * @property integer $Student_Index
 * @property integer $PositionClub_Id
 * @property integer $PositionClass_Id
 * @property string $Position_Year
 */
class Position extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tb_position';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Student_Index', 'Club_Id', 'Description', 'Position_Year'], 'required'],
            [['Student_Index', 'Club_Id'], 'integer'],
            [['Position_Year'], 'safe'],
            [['str1','str2','str3','str4','str5'], 'string', 'max' => 120],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Position_Id' => 'Position  ID',
            'Student_Index' => 'Student  Index',
            'Club_Name' => 'ตำแหน่ง',
            'Description' => 'ระบุรายละเอียด ถ้ามี',
            'Position_Year' => 'ปีการศึกษา',
            'str1' => 'ระดับของกิจกรรมนิสิต',
            'str2' => '',
            'str3' => '',
            'str4' => '',
            'str5' => ''
        ];
    }
    
    public Static function getClup(){
        //$ms_scholarship::find()->where(['Status' => '0'])->all()
        return \common\models\Club::find()->where(['Status'=>'0'])->all();
    }
    
     public function getClub_Name(){
        
        return implode('', Club::find()->select('Club_Name')->where(['Club_Id'=>$this->Club_Id])->column()) ;
    }
}
