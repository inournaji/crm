<?php

use yii\db\Migration;

class m170324_171748_add_status_to_car extends Migration
{
    public function up()
    {
        $this->addColumn('car', 'status', $this->integer());
    }

    public function down()
    {
        echo "m170324_171748_add_status_to_car cannot be reverted.\n";

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
