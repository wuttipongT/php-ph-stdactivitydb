<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tb_award".
 *
 * @property integer $Award_Index
 * @property integer $Award_Id
 * @property integer $Student_Index
 * @property integer $Award_Name
 */
class Award extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tb_award';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Award_Index', 'Award_Id', 'Student_Index', 'Award_Name','Award_Year'], 'required'],
            [['Award_Index', 'Award_Id', 'Student_Index', 'Award_Name'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Award_Index' => 'Award  Index',
            'Award_Id' => 'Award  ID',
            'Student_Index' => 'Student  Index',
            'Award_Name' => 'Award  Name',
            'Award_Year'=>'Award Year',
        ];
    }
}
