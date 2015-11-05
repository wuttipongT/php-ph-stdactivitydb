<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ms_typeactivity".
 *
 * @property integer $TypeActivity_Id
 * @property string $TypeActivity_Name
 * @property string $Status
 */
class TypeActivity extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ms_typeactivity';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TypeActivity_Name'], 'required'],
            [['Status'], 'string'],
            [['TypeActivity_Name'], 'string', 'max' => 55]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'TypeActivity_Id' => 'Type Activity  ID',
            'TypeActivity_Name' => 'Type Activity  Name',
            'Status' => 'Status',
        ];
    }
}
