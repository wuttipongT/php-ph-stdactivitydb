<?php

use yii\db\Schema;
use yii\db\Migration;

class m151104_045634_tb_Scholarship extends Migration
{
    public function up()
    {
           $tableOptions = null;
           if($this->db->driverName === 'mysql'){
               $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
           }
           
           $this->createTable('{{%tb_Scholarship}}', [
            'Scholarship_Id' => $this->primaryKey(),
            'Student_Index' => $this->integer()->notNull(),
            'Scholarship_DESC' => $this->integer()->notNull(),
            'Scholarship_Year' => $this->date()->notNull(),
            
                 
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%tb_Scholarship}}');
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
