<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ms_positionclass".
 *
 * @property integer $PositionClass_Id
 * @property string $PositionClass_Name
 * @property string $Status
 */
class PositionClass extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ms_positionclass';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['PositionClass_Name'], 'required'],
            [['Status'], 'string'],
            [['PositionClass_Name'], 'string', 'max' => 55]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'PositionClass_Id' => 'Position Class  ID',
            'PositionClass_Name' => 'Position Class  Name',
            'Status' => 'Status',
        ];
    }
}
