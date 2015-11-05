<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tb_student".
 *
 * @property integer $Student_Index
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
 * @property string $Buddy_Phone
 * @property string $Hobby
 * @property string $Ambition
 * @property string $Favorite_Sport
 * @property string $Genius
 * @property string $ROTCS
 * @property string $Clement_Military
 * @property string $Award
 */
class Info extends \yii\db\ActiveRecord
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
            [['Student_Id', 'Student_Name', 'Student_LastName', 'Image_Path', 'Address1', 'Address2', 'Phone1', 'Phone2', 'Name_Father', 'Name_Mother', 'Name_Parent', 'Phone_Parent', 'Work_Address_Parent', 'Advisors_Id', 'Buddy_Phone', 'Hobby', 'Ambition', 'Favorite_Sport', 'Genius', 'ROTCS', 'Award'], 'required'],
            [['Image_Path', 'Address1', 'Address2', 'Work_Address_Parent', 'Ambition', 'Genius', 'ROTCS', 'Award'], 'string'],
            [['Advisors_Id'], 'integer'],
            [['Clement_Military'], 'safe'],
            [['Student_Id'], 'string', 'max' => 11],
            [['Student_Name', 'Student_LastName'], 'string', 'max' => 32],
            [['Phone1', 'Phone2', 'Phone_Parent', 'Buddy_Phone'], 'string', 'max' => 10],
            [['Name_Father', 'Name_Mother', 'Name_Parent'], 'string', 'max' => 75],
            [['Hobby', 'Favorite_Sport'], 'string', 'max' => 120],
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
            'Student_Id' => 'Student  ID',
            'Student_Name' => 'Student  Name',
            'Student_LastName' => 'Student  Last Name',
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
            'Buddy_Phone' => 'Buddy  Phone',
            'Hobby' => 'Hobby',
            'Ambition' => 'Ambition',
            'Favorite_Sport' => 'Favorite  Sport',
            'Genius' => 'Genius',
            'ROTCS' => 'Rotcs',
            'Clement_Military' => 'Clement  Military',
            'Award' => 'Award',
        ];
    }
}
