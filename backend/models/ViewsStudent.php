<?php

namespace backend\models;

use Yii;
use dektrium\user\models\Profile;
/**
 * This is the model class for table "views_student".
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
 * @property string $Congenital_Disease
 * @property string $Food_Allergy
 * @property string $Be_Allergic
 * @property string $Buddy
 * @property string $Buddy_Phone
 * @property string $Hobby
 * @property string $Ambition
 * @property string $Sport
 * @property string $Genius
 * @property string $ROTCS
 * @property string $Clement_Military
 * @property string $str
 * @property integer $Position_Id
 * @property string $Position_Name
 * @property string $Description
 * @property integer $Club_Id
 * @property string $Club_Name
 * @property integer $Type_Id
 * @property string $Type_Name
 * @property string $Scholarship_Id
 * @property string $Award_Id
 */
class ViewsStudent extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $Gravatar_Id;
    public static function tableName()
    {
        return 'views_student';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Student_Index', 'User_Index' , 'Advisors_Id', 'Position_Id', 'Club_Id', 'Type_Id','Life_Father','Life_Mother','LifeStatus'], 'integer'],
            [['Image_Path', 'Address1', 'Address2', 'Work_Address_Parent', 'Ambition', 'ROTCS', 'Description','Advisors_Name'], 'string'],
            [['Position_Name', 'Club_Name', 'Type_Name'], 'required'],
            [['Student_Id'], 'string', 'max' => 11],
            [['Prename','Student_Name', 'Student_LastName','Nickname'], 'string', 'max' => 32],
            [['Phone1', 'Phone2', 'Phone_Parent', 'Buddy_Phone'], 'string', 'max' => 10],
            [['Name_Father', 'Name_Mother', 'Name_Parent'], 'string', 'max' => 75],
            [['Congenital_Disease', 'Food_Allergy', 'Be_Allergic', 'Buddy', 'Hobby', 'str'], 'string', 'max' => 120],
            [['Sport', 'Genius'], 'string', 'max' => 500],
            [['Clement_Military'], 'string', 'max' => 50],
            [['Position_Name', 'Club_Name', 'Type_Name'], 'string', 'max' => 55],
            [['Scholarship', 'Award','Email','Facebook'], 'string', 'max' => 100],
            [['Gravatar_Id'],'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Student_Index' => 'Student  Index',
            'Student_Id' => 'รหัสนิสิต',
            'Prename' => 'คำนำหน้า',
            'Student_Name' => 'ชื่อ',
            'Student_LastName' => 'นามสกุล',
            'Nickname' => 'ชื่อเล่น',
            'Image_Path' => 'Image  Path',
            'Address1' => 'ที่อยู่ (บ้าน)',
            'Address2' => 'ที่อยู่ (หอพัก)',
            'Phone1' => 'เบอร์มือถือ',
            'Phone2' => 'เบอร์บ้าน',
            'Email' => 'อีเมลล์',
            'Facebook' => 'Facebook',
            'Name_Father' => 'ชื่อ-สกุลบิดา',
            'Name_Mother' => 'ชื่อ-สกุลมารดา',
            'Life_Father' => '',
            'Life_Mother' => '',
            'Status' => 'สถานภาพ บิดา-มารดา',
            'Name_Parent' => 'ชื่อ-สกุลผู้ปกครอง',
            'Phone_Parent' => 'เบอร์มือถือ-ผู้ปกครอง',
            'Work_Address_Parent' => 'ที่อยู่ที่ทำงานผู้ปกครอง',
            'Advisors_Id' => 'ชื่ออาจารย์ที่ปรึกษา',
            'Advisors_Name' => 'ชื่ออาจารย์ที่ปรึกษา',
            'Congenital_Disease' => 'โรคประจำตัว',
            'Food_Allergy' => 'แพ้ยา',
            'Be_Allergic' => 'แพ้อาหาร',
            'Buddy' => 'เพื่อนสนิท',
            'Buddy_Phone' => 'เบอร์ติดต่อเพื่อนสนิท',
            'Hobby' => 'งานอดิเรก',
            'Ambition' => 'ความใฝ่ฝัน',
            'Sport' => 'กีฬาที่ชอบ',
            'Genius' => 'ความสามารถพิเศษ',
            'ROTCS' => 'ผ่านการเรียนรด.แล้ว (สำหรับผู้ชาย)',
            'ROTCSName' => 'รด. (สำหรับผู้ชาย)',
            'Clement_Military' => 'ผ่อนผันทหาร',
            'MilitaryName'=>'ผ่อนผันทหาร',
            'str' => '',
            'Position_Id' => 'Position  ID',
            'Position_Name' => 'ตำแหน่งสำคัญ',
            'Description' => 'ระบุรายละเอียด ถ้ามี',
            'Club_Id' => 'Club  ID',
            'Club_Name' => 'ตำแหน่งที่เข้าร่วม',
            'Type_Id' => 'Type  ID',
            'Type_Name' => 'ประเภทของกิจกรรม',
            'Scholarship' => 'ทุนการศึกษาที่เคยได้รับ',
            'Award' => 'รางวัลที่เคยได้รับ',
            'Grabatar'=>'',
        ];
    }
    public static function primaryKey()
    {
        return ['Student_Index'];
    }
    public function getLife($key){
        return $key == 0 ? 'มีชีวิต' : 'ถึงแก่กรรม';
    }
    public function getROTCSName(){
        return $this->ROTCS == 0 ? 'เรียน' : 'ยังไม่เรียน';
    }
    public function getStatus(){
        //return $this->LifeStatus == 0 ? 'เรียน' : 'ยังไม่เรียน';
        switch ($this->LifeStatus){
            case 0 : return 'อยู่ด้วยกัน';
            case 1 : return 'แยกันอยู่';
            case 2 : return 'อย่าร่าง';
        }
    }
    public function getMilitaryName(){
        return $this->Clement_Military == 0 ? 'ยังไม่ผ่อนผัน' : 'ผ่อนผันแล้ว เมื่อวันที่ '.$this->Clement_Military;
    }
    public function getGrabatar(){
        $Profile = Profile::findOne(['user_id' => $this->User_Index]);
        //var_dump($gravatar);
        if($Profile !== Null){
            return $this->Gravatar_Id = $Profile->gravatar_id;
        }
    }
    public function getPath(){
        $uri = explode('/', \Yii::getAlias('@web'));
        return $uri[1];
    }
    
    public function getStr(){
        if(!empty($this->str)){
            return ' ('.$this->str.')';
        }
    }
}