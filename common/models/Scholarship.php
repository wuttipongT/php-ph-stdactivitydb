<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ms_scholarship".
 *
 * @property integer $Scholarship_Id
 * @property string $Scholarship_Name
 * @property string $Status
 */
class Scholarship extends \yii\db\ActiveRecord
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
            'Scholarship_Id' => 'Scholarship  ID',
            'Scholarship_Name' => 'Scholarship  Name',
            'Status' => 'Status',
        ];
    }
}
