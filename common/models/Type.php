<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ms_type".
 *
 * @property integer $Type_Id
 * @property string $Type_Name
 * @property string $Status
 */
class Type extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ms_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Type_Name'], 'required'],
            [['Status'], 'string'],
            [['Type_Name'], 'string', 'max' => 55]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Type_Id' => 'Type  ID',
            'Type_Name' => 'Type  Name',
            'Status' => 'Status',
        ];
    }
}
