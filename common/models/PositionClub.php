<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ms_positionclub".
 *
 * @property integer $PositionClub_Id
 * @property string $PositionClub_Name
 * @property string $Status
 */
class PositionClub extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ms_positionclub';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['PositionClub_Name'], 'required'],
            [['Status'], 'string'],
            [['PositionClub_Name'], 'string', 'max' => 55]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'PositionClub_Id' => 'Position Club  ID',
            'PositionClub_Name' => 'Position Club  Name',
            'Status' => 'Status',
        ];
    }
}
