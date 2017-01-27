<?php

use yii\db\Migration;

class m170125_182637_crerate_email extends Migration
{
    public function up()
    {
        $this->createTable('email', [
        'id' => $this->primaryKey(),
        'owner' => $this->integer(10),
        'attachment' => $this->string(),
        'body' => $this->text(),
        'created_at' => $this->integer(11),
    ]);

    }

    public function down()
    {
        echo "m170125_182637_crerate_email cannot be reverted.\n";

        return false;
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
