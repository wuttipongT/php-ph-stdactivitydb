<?php

use yii\db\Schema;
use yii\db\Migration;

class m151104_064747_ms_PositionClub extends Migration
{
    public function up()
    {

        $tableOptions = null;
        if($this->db->driverName === 'mysql'){
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        
        $this->createTable('{{%ms_PositionClub}}', [
            'PositionClub_Id' => $this->primaryKey(),
            'PositionClub_Name' => $this->string(55)->notNull(),
            'Status' => ' ENUM("0","1") NOT NULL DEFAULT "0" ',
                       
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%ms_PositionClub}}');
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
