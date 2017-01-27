<?php

use yii\db\Migration;

class m170124_203914_create_customer extends Migration
{
    public function up()
    {
        $this->createTable('customer', [
            'id' => $this->primaryKey(),
            'fname' => $this->string(50)->notNull(),
            'lname' => $this->string(50)->notNull(),
            'email' => $this->string()->notNull()->unique(),
            'salutation' => $this->string()->notNull(),
            'houseno' => $this->string(),
            'postal' => $this->string(25),
            'city' => $this->string(50),
            'company' => $this->string(50),
            'tel' => $this->string(50),
            'mobile' => $this->string(50),
            'fax' => $this->string(50),
            'free_text' => $this->string(1000),
            'bank' => $this->string(50),
            'iban' => $this->string(50),
            'bic' => $this->string(50),
            'account_owner' => $this->string(50),
            'facebook' => $this->string(),
            'attachment' => $this->integer(10),
            'type' => $this->integer(10),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey('fk_customer_attachment','customer','attachment','attachment','id',null,null);
        $this->addForeignKey('fk_customer_type','customer','type','customer_type','id',null,null);

    }

    public function down()
    {

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
