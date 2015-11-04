<?php

use yii\db\Schema;
use yii\db\Migration;

class m151104_031829_tb_student extends Migration
{
    public function up()
    {
            $tableOptions = null;
            if($this->db->driverName === 'mysql'){
                $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
            }
            
             $this->createTable('{{%tb_Student}}', [
            'Student_Index' => $this->primaryKey(),
            'Student_Id' => $this->string(11)->notNull()->unique(),
            'Student_Name' => $this->string(32)->notNull(),
            'Student_LastName' => $this->string(32)->notNull(),
            'Image_Path' => $this->text()->notNull(),
            'Address1' => $this->text()->notNull(),
            'Address2' => $this->text()->notNull(),
            'Phone1' => $this->string(10)->notNull(),
            'Phone2' => $this->string(10)->notNull(),
            'Name_Father' => $this->string(75)->notNull(),
            'Name_Mother' => $this->string(75)->notNull(),
            'Name_Parent' => $this->string(75)->notNull(),
            'Phone_Parent' => $this->string(10)->notNull(),
            'Work_Address_Parent' => $this->text()->notNull(),
            'Advisors_Id' => $this->integer()->notNull(),
            'Buddy_Phone' => $this->string(10)->notNull(),
            'Hobby' => $this->string(120)->notNull(),
            'Ambition' => $this->text()->notNull(),//ENUM('1','2')
            'Favorite_Sport' => $this->string(120)->notNull(),
            'Genius' => $this->text()->notNull(),
            'ROTCS' => 'ENUM("0","1") NOT NULL', //Schema::TYPE_DOUBLE.' NOT NULL',
            'Clement_Military' => $this->date(),
            'Award' => $this->text()->notNull(),
                 
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%tb_Student}}');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
