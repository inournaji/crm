<?php

use yii\db\Migration;

class m170125_190431_create_car_model extends Migration
{
    public function up()
    {
        $this->createTable('car', [
            'id' => $this->primaryKey(),
            'brand' => $this->integer(10),
            'model' => $this->string(50)->notNull(),
            'owner' => $this->integer(10),
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
            'created_at' => $this->integer(10),
            'updated_at' => $this->integer(10),
        ]);

    }

    public function down()
    {
        $this->dropTable('car');
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
