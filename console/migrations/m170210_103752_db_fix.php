<?php

use yii\db\Migration;

class m170210_103752_db_fix extends Migration
{
    public function up()
    {
        $this->renameTable("viechle_brand", "vehicle_brand");

        $this->renameColumn("deal", "brand", "vehicle_brand_id");
        $this->renameColumn("deal", "attachment", "attachment_id");

        $this->addColumn("customer", "accept_calling", $this->boolean());

        $this->createTable('source', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255),
        ]);

        $this->addColumn("deal", "status", $this->integer(11));
        $this->addColumn("deal", "is_active", $this->boolean());
        $this->addColumn("deal", "source_id", $this->integer(11));
        $this->addColumn("deal", "customer_id", $this->integer(11));
        $this->addColumn("deal", "user_id", $this->integer(11));
        $this->addColumn("deal", "created_date", $this->dateTime());

        $this->addForeignKey('fk-deal-customer_id', 'deal', 'customer_id', 'customer', 'id');
        $this->addForeignKey('fk-deal-user_id', 'deal', 'user_id', 'user', 'id');
        $this->addForeignKey('fk-deal-source_id', 'deal', 'source_id', 'source', 'id');
    }

    public function down()
    {
        echo "m170210_103752_db_fix cannot be reverted.\n";

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
