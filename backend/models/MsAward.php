<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "ms_award".
 *
 * @property integer $Award_Id
 * @property string $Award_Name
 * @property string $Status
 */
class MsAward extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ms_award';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Award_Id', 'Award_Name'], 'required'],
            [['Award_Id'], 'integer'],
            [['Status'], 'string'],
            [['Award_Name'], 'string', 'max' => 55]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Award_Id' => 'Award  ID',
            'Award_Name' => 'รางวัลที่เคยได้รับ',
            'StatusName' => 'สถานะ',
        ];
    }
    public function getStatusName(){
        return $this->Status == 0 ? 'ใช้งาน' : 'ไม่ใช้งาน';
    }
}
