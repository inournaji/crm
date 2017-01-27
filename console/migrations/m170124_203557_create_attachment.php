<?php

use yii\db\Migration;

class m170124_203557_create_attachment extends Migration
{
    public function up()
    {
        $this->createTable('attachment', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->unique(),
            'file' => $this->string()->notNull(),
            'type' => $this->string(50),
        ]);
    }

    public function down()
    {
       $this->dropTable('attachment');
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
