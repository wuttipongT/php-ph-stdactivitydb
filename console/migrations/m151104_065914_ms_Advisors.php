<?php

use yii\db\Schema;
use yii\db\Migration;

class m151104_065914_ms_Advisors extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if($this->db->driverName === 'mysql'){
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        
        $this->createTable('{{%ms_Advisors}}', [
            'Advisors_Id' => $this->primaryKey(),
            'Advisors_Name' => $this->string(45)->notNull(),
            'Status' => 'ENUM("0","1") NOT NULL DEFAULT "0"',
                             
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%ms_Advisors}}');
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
