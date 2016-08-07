<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "ms_scholarship".
 *
 * @property integer $Scholarship_Id
 * @property string $Scholarship_Name
 * @property string $Status
 */
class MsScholarship extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ms_scholarship';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Scholarship_Name'], 'required'],
            [['Status'], 'string'],
            [['Scholarship_Name'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Scholarship_Id' => 'รหัส',
            'Scholarship_Name' => 'ทุนการศึกษา',
            'Status' => 'สถานะ',
            'StatusName' => 'สถานะ'
        ];
    }
    
    public function getStatusName(){
        return $this->Status == 0 ? 'ใช้งาน' : 'ไม่ใช้งาน';
    }
}
