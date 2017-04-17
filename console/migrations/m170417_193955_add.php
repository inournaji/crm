<?php

use yii\db\Migration;

class m170417_193955_add extends Migration
{
    public function up()
    {
        $this->addColumn('car', 'wp_sent', $this->boolean());

    }

    public function down()
    {
        $this->dropColumn('car','wp_sent');
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
