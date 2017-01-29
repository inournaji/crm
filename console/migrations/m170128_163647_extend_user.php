<?php

use yii\db\Migration;

class m170128_163647_extend_user extends Migration
{
    public function up()
    {
        $this->addColumn('user', 'first_name', $this->string(50)->notNull());
        $this->addColumn('user', 'last_name', $this->string(50)->notNull());
        $this->addColumn('user', 'tel', $this->string(50)->notNull());
        $this->addColumn('user', 'fax', $this->string(50));
        $this->addColumn('user', 'houseno', $this->string()->notNull());
        $this->addColumn('user', 'postal', $this->string(50));
        $this->addColumn('user', 'city', $this->string(50));
        $this->addColumn('user', 'company', $this->string());
        $this->addColumn('user', 'short_id', $this->string());
        $this->addColumn('user', 'logo', $this->string());

    }

    public function down()
    {
        return;
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
