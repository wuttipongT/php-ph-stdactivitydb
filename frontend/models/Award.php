<?php

namespace app\models;

use Yii;
use backend\models\MsAward;
/**
 * This is the model class for table "tb_award".
 *
 * @property integer $Award_Index
 * @property integer $Award_Id
 * @property integer $Student_Index
 * @property integer $Award_Name
 * @property string $Award_Year
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
            [['Award_Index', 'Award_Id', 'Student_Index', 'Award_Year'], 'required'],
            [['Award_Index', 'Award_Id', 'Student_Index'], 'integer'],
            [['Award_Year'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Award_Index' => 'Award  Index',
            'Award_Name' => 'รางวัลที่เคยได้รับ',
            'Student_Index' => 'Student  Index',
            'Award_Year' => 'ปีการศึกษาที่ได้รับ (หากเคยได้รับรางวัล)',
        ];
    }
    
    public static function getAwardItem(){
        return \common\models\AwardItem::find()->where(['Status'=>'0'])->all();
    }
    
     public function getAward_Name(){
        
        return implode('', MsAward::find()->select('Award_Name')->where(['Award_Id'=>$this->Award_Id])->column()) ;
    }
}
