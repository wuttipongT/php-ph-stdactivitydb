<?php

use yii\db\Schema;
use yii\db\Migration;

class m151104_065023_ms_PositionClass extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if($this->db->driverName === 'mysql'){
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        
        $this->createTable('{{%ms_PositionClass}}', [
            'PositionClass_Id' => $this->primaryKey(),
            'PositionClass_Name' => $this->string(55)->notNull(),
            'Status' => ' ENUM("0","1") NOT NULL DEFAULT "0" ',
                       
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%ms_PositionClass}}');
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
