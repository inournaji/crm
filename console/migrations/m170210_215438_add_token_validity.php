<?php

use yii\db\Migration;

class m170210_215438_add_token_validity extends Migration
{
    public function up()
    {
        $this->addColumn('deal', 'attachment_token', $this->string(255));
    }

    public function down()
    {
        echo "m170210_215438_add_token_validity cannot be reverted.\n";

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
