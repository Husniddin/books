<?php

use yii\db\Schema;
use yii\db\Migration;

class m151120_153034_create_authors_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }        

        $this->createTable('{{%authors}}', [
            // 'id' => Schema::TYPE_INTEGER . '(10) UNSIGNED NOT NULL AUTO_INCREMENT',
            'id' => $this->primaryKey(),
            'firstname' => Schema::TYPE_STRING . '(255) NOT NULL',
            'lastname' => Schema::TYPE_STRING . '(255) NOT NULL',
            // $this->primaryKey('id'),
        ], $tableOptions);

        $this->insert('{{%authors}}', [
            'firstname' => 'Husniddin',
            'lastname' => 'Kamolov',
        ]);

        $this->insert('{{%authors}}', [
            'firstname' => 'Kamol',
            'lastname' => 'Husniddinov',
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%authors}}');
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
