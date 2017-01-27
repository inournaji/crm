<?php

use yii\db\Migration;

class m170124_203254_create_customer_type extends Migration
{
    public function up()
    {
        $this->createTable('customer_type', [
            'id' => $this->primaryKey(),
            'type' => $this->string()->notNull()->unique(),
        ]);

    }

    public function down()
    {
        $this->dropTable('customer_type');
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
