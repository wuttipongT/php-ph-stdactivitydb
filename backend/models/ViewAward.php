<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "views_award".
 *
 * @property string $Award_Name
 * @property integer $Student_Index
 * @property string $Award_Year
 * @property integer $Award_Id
 */
class ViewAward extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'views_award';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Student_Index'], 'required'],
            [['Student_Index', 'Award_Id'], 'integer'],
            [['Award_Name'], 'string', 'max' => 55],
            [['Award_Year'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Award_Name' => 'รางวัลที่เคยได้รับ',
            'Student_Index' => 'Student  Index',
            'Award_Year' => 'ปีการศึกษาที่เคยได้รับ',
            'Award_Id' => 'Award  ID',
        ];
    }
}
