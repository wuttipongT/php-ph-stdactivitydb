<?php

use yii\db\Schema;
use yii\db\Migration;

class m151104_063043_tb_Activity extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if($this->db->driverName === 'mysql'){
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        
        $this->createTable('{{%tb_Activity}}', [
            'Activity_Id' => $this->primaryKey(),
            'Student_Index' => $this->integer()->notNull(),
            'TypeActivity_Id' => $this->integer()->notNull(),
            'PositionActivity_Id' => $this->integer()->notNull(),
            'Activity_Name' => $this->string(45)->notNull(),
            'Activity_Time' => $this->string(20)->notNull(),
            'Activity_Year' => $this->date()->notNull(),
                             
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%tb_Activity}}');
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
