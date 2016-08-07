<?php

namespace app\models;

use Yii;
use common\models\MSScholarship;
/**
 * This is the model class for table "tb_scholarship".
 *
 * @property integer $Scholarship_Id
 * @property integer $Student_Index
 * @property integer $Scholarship_DESC
 * @property string $Scholarship_Year
 */
class Scholarship extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tb_scholarship';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Student_Index', 'Scholarship_DESC', 'Scholarship_Year'], 'required'],
            [['Student_Index', 'Scholarship_DESC'], 'integer'],
            [['Scholarship_Year'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Scholarship_Id' => 'Scholarship  ID',
            'Student_Index' => 'Student  Index',
            'Scholarship_Name' => 'ทุนการศึกษาที่เคยได้รับ',
            'Scholarship_Year' => 'ปีการศึกษาที่ได้รับ (หากเคยได้รับทุน)',
        ];
    }
    
    public static function getScholarshipItem(){
        return \common\models\ScholarshipItem::find()->where(['Status'=>'0'])->all();
    }
    
    public function getScholarship_Name(){
        
        return implode('', MSScholarship::find()->select('Scholarship_Name')->where(['Scholarship_Id'=>$this->Scholarship_DESC])->column()) ;
    }
}
