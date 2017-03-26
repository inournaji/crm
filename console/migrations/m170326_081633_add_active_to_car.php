<?php

use yii\db\Migration;

class m170326_081633_add_active_to_car extends Migration
{
    public function up()
    {
        $this->addColumn('car', 'active', $this->boolean());
    }

    public function down()
    {
        echo "m170326_081633_add_active_to_car cannot be reverted.\n";

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
