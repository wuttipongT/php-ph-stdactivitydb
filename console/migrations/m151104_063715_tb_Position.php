<?php

use yii\db\Schema;
use yii\db\Migration;

class m151104_063715_tb_Position extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if($this->db->driverName === 'mysql'){
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        
        $this->createTable('{{%tb_Position}}', [
            'Position_Id' => $this->primaryKey(),
            'Student_Index' => $this->integer()->notNull(),
            'PositionClub_Id' => $this->integer()->notNull(),
            'PositionClass_Id' => $this->integer()->notNull(),
            'Position_Year' => $this->date()->notNull(),
           
                             
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%tb_Position}}');
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
