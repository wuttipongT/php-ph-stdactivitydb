<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tb_scholarship".
 *
 * @property integer $Scholarship_Id
 * @property integer $Student_Index
 * @property integer $Scholarship_DESC
 * @property string $Scholarship_Year
 */
class TBScholarship extends \yii\db\ActiveRecord
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
            [['Scholarship_Year'], 'safe']
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
            'Scholarship_DESC' => 'Scholarship  Desc',
            'Scholarship_Year' => 'Scholarship  Year',
        ];
    }
}
