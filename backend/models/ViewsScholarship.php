<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "views_scholarship".
 *
 * @property string $Scholarship_Name
 * @property string $Scholarship_Year
 * @property integer $Scholarship_DESC
 * @property integer $Student_Index
 * @property integer $Scholarship_Id
 */
class ViewsScholarship extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'views_scholarship';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Scholarship_Name', 'Student_Index'], 'required'],
            [['Scholarship_DESC', 'Student_Index', 'Scholarship_Id'], 'integer'],
            [['Scholarship_Name', 'Scholarship_Year'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Scholarship_Name' => 'ทุนการศึกษาที่เคยได้รับ',
            'Scholarship_Year' => 'ปีการศึกษาที่ได้รับ (หากเคยได้รับทุน)',
            'Scholarship_DESC' => 'Scholarship  Desc',
            'Student_Index' => 'Student  Index',
            'Scholarship_Id' => 'Scholarship  ID',
        ];
    }
}
