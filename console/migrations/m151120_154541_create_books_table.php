<?php

use yii\db\Schema;
use yii\db\Migration;

class m151120_154541_create_books_table extends Migration
{

// id,
// name,
// date_create, / дата создания записи
// date_update, / дата обновления записи
// preview, / путь к картинке превью книги
// date, / дата выхода книги
// author_id / ид автора в таблице авторы


    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%books}}', [            
            'id' => $this->primaryKey(),
            'name' => Schema::TYPE_STRING . '(255) NOT NULL',
            'date_create' => Schema::TYPE_TIMESTAMP . " NOT NULL DEFAULT CURRENT_TIMESTAMP",
            'date_update' => Schema::TYPE_TIMESTAMP . " NULL",
            'preview' => Schema::TYPE_STRING . '(100) DEFAULT NULL',
            'date' => $this->date(),
            'author_id' => Schema::TYPE_INTEGER . '(11) NOT NULL',
        ], $tableOptions);

        $this->addForeignKey('fk_books_authors', '{{%books}}', 'author_id', '{{%authors}}', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->dropTable('{{%books}}');
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
