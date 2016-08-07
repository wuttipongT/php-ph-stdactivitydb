<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tb_student".
 *
 * @property integer $Student_Index
 * @property integer $User_Index
 * @property string $Student_Id
 * @property string $Student_Name
 * @property string $Student_LastName
 * @property string $Image_Path
 * @property string $Address1
 * @property string $Address2
 * @property string $Phone1
 * @property string $Phone2
 * @property string $Name_Father
 * @property string $Name_Mother
 * @property string $Name_Parent
 * @property string $Phone_Parent
 * @property string $Work_Address_Parent
 * @property integer $Advisors_Id
 * @property string $Congenital_Disease
 * @property string $Be_Allergic
 * @property string $Food_Allergy
 * @property string $Buddy
 * @property string $Buddy_Phone
 * @property string $Hobby
 * @property string $Ambition
 * @property string $Sport
 * @property string $Genius
 * @property string $ROTCS
 * @property string $Clement_Military
 * @property string $str
 */
class TblStudent extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tb_student';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['User_Index'], 'required'],
            [['User_Index', 'Advisors_Id'], 'integer'],
            [['Image_Path', 'Address1', 'Address2', 'Work_Address_Parent', 'Ambition', 'ROTCS'], 'string'],
            [['Student_Id'], 'string', 'max' => 11],
            [['Student_Name', 'Student_LastName'], 'string', 'max' => 32],
            [['Phone1', 'Phone2', 'Phone_Parent', 'Buddy_Phone'], 'string', 'max' => 10],
            [['Name_Father', 'Name_Mother', 'Name_Parent'], 'string', 'max' => 75],
            [['Congenital_Disease', 'Be_Allergic', 'Food_Allergy', 'Buddy', 'Hobby', 'str'], 'string', 'max' => 120],
            [['Sport', 'Genius'], 'string', 'max' => 500],
            [['Clement_Military'], 'string', 'max' => 50],
            [['Student_Id'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Student_Index' => 'Student  Index',
            'User_Index' => 'User  Index',
            'Student_Id' => 'รหัสนิสิต',
            'Student_Name' => 'ชื่อ',
            'Student_LastName' => 'นามสกุล',
            'Image_Path' => 'Image  Path',
            'Address1' => 'Address1',
            'Address2' => 'Address2',
            'Phone1' => 'Phone1',
            'Phone2' => 'Phone2',
            'Name_Father' => 'Name  Father',
            'Name_Mother' => 'Name  Mother',
            'Name_Parent' => 'Name  Parent',
            'Phone_Parent' => 'Phone  Parent',
            'Work_Address_Parent' => 'Work  Address  Parent',
            'Advisors_Id' => 'Advisors  ID',
            'Congenital_Disease' => 'Congenital  Disease',
            'Be_Allergic' => 'Be  Allergic',
            'Food_Allergy' => 'Food  Allergy',
            'Buddy' => 'Buddy',
            'Buddy_Phone' => 'Buddy  Phone',
            'Hobby' => 'Hobby',
            'Ambition' => 'Ambition',
            'Sport' => 'Sport',
            'Genius' => 'Genius',
            'ROTCS' => 'Rotcs',
            'Clement_Military' => 'Clement  Military',
            'str' => 'Str',
        ];
    }
}
