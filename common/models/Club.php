<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ms_club".
 *
 * @property integer $Club_Id
 * @property string $Club_Name
 * @property string $Status
 */
class Club extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ms_club';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Club_Name'], 'required'],
            [['Status'], 'string'],
            [['Club_Name'], 'string', 'max' => 55]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Club_Id' => 'Club  ID',
            'Club_Name' => 'Club  Name',
            'Status' => 'Status',
        ];
    }
}
