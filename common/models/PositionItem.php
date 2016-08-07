<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ms_position".
 *
 * @property integer $Position_Id
 * @property string $Position_Name
 * @property string $Status
 */
class PositionItem extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ms_position';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Position_Name'], 'required'],
            [['Status'], 'string'],
            [['Position_Name'], 'string', 'max' => 55]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Position_Id' => 'Position  ID',
            'Position_Name' => 'Position  Name',
            'Status' => 'Status',
        ];
    }
}
