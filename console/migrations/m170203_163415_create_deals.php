<?php

use yii\db\Migration;

class m170203_163415_create_deals extends Migration
{
    public function up()
    {
        $this->createTable('deal', [
            'id' => $this->primaryKey(),
            'car' => $this->integer(10),
            'description' => $this->text(),
            'km' => $this->integer()->unsigned()->unsigned(),
            'operation_date' => $this->integer()->unsigned(),
            'deposit' => $this->float()->unsigned(),
            'price' => $this->decimal()->unsigned(),
            'validity' => $this->integer()->unsigned(),
            'type' => $this->integer()->unsigned(),
            'link' => $this->string(),
            'features' => $this->text(),
            'attachment' => $this->integer(),
            'created_at' => $this->integer(10),
            'updated_at' => $this->integer(10),
        ]);

        $this->addForeignKey('fk_deal_car','deal','car','car','id',null,null);
        $this->addForeignKey('fk_deal_attachment','deal','attachment','attachment','id',null,null);



    }

    public function down()
    {
        $this->dropTable('deal');

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
