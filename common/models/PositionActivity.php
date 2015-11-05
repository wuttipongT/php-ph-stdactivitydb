<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ms_positionactivity".
 *
 * @property integer $PositionActivity_Id
 * @property string $PositionActivity_Name
 * @property string $Status
 */
class PositionActivity extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ms_positionactivity';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['PositionActivity_Name'], 'required'],
            [['Status'], 'string'],
            [['PositionActivity_Name'], 'string', 'max' => 55]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'PositionActivity_Id' => 'Position Activity  ID',
            'PositionActivity_Name' => 'Position Activity  Name',
            'Status' => 'Status',
        ];
    }
}
