<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_transcript".
 *
 * @property integer $Transcript_Index
 * @property integer $Student_Index
 * @property string $Grade
 * @property string $GPA
 * @property string $Academic_Year
 */
class Transcript extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tb_transcript';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Student_Index'], 'integer'],
            [['Grade', 'GPA', 'Academic_Year'], 'string', 'max' => 80]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Transcript_Index' => 'Transcript  Index',
            'Student_Index' => 'Student  Index',
            'Grade' => 'เกรด',
            'GPA2' => 'เกรดเฉลี่ย',
            'Academic_Year' => 'ปีการศึกษา',
        ];
    }
    public static function term()
    {
        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("SELECT count(*) as term FROM tb_transcript where Student_Index =:id",[':id'=> Yii::$app->student->getId()]);
        $result = $command->queryAll();
        return $result[0]['term'];
    }
    
    public function getGPA2(){
        return number_format($this->Grade/Transcript::term(), 2, '.', '');
    }
    
}

