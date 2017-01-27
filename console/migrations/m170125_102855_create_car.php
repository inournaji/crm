<?php

use yii\db\Migration;

class m170125_102855_create_car extends Migration
{
    public function up()
    {
        $this->createTable('viechle_brand', [
            'id' => $this->primaryKey(),
            'name' => $this->string(50)->notNull(),
            'code' => $this->string(50),
            'status' => $this->integer(3),
            ]);

        Yii::$app->db->createCommand()->batchInsert('viechle_brand', ['status','code','name'], [
            [0, 'ACURA', 'Acura'],
            [1, 'ALFA', 'Alfa Romeo'],
            [0, 'AMC', 'AMC'],
            [0, 'ASTON', 'Aston Martin'],
            [1, 'AUDI', 'Audi'],
            [0, 'AVANTI', 'Avanti'],
            [1, 'BENTL', 'Bentley'],
            [1, 'BMW', 'BMW'],
            [0, 'BUICK', 'Buick'],
            [0, 'CAD', 'Cadillac'],
            [1, 'CHEV', 'Chevrolet'],
            [1, 'CHRY', 'Chrysler'],
            [0, 'DAEW', 'Daewoo'],
            [0, 'DAIHAT', 'Daihatsu'],
            [0, 'DATSUN', 'Datsun'],
            [0, 'DELOREAN', 'DeLorean'],
            [0, 'DODGE', 'Dodge'],
            [0, 'EAGLE', 'Eagle'],
            [1, 'FER', 'Ferrari'],
            [1, 'FIAT', 'FIAT'],
            [0, 'FISK', 'Fisker'],
            [1, 'FORD', 'Ford'],
            [0, 'FREIGHT', 'Freightliner'],
            [0, 'GEO', 'Geo'],
            [1, 'GMC', 'GMC'],
            [1, 'HONDA', 'Honda'],
            [0, 'AMGEN', 'HUMMER'],
            [0, 'HYUND', 'Hyundai'],
            [0, 'INFIN', 'Infiniti'],
            [0, 'ISU', 'Isuzu'],
            [1, 'JAG', 'Jaguar'],
            [1, 'JEEP', 'Jeep'],
            [1, 'KIA', 'Kia'],
            [1, 'LAM', 'Lamborghini'],
            [0, 'LAN', 'Lancia'],
            [1, 'ROV', 'Land Rover'],
            [0, 'LEXUS', 'Lexus'],
            [1, 'LINC', 'Lincoln'],
            [1, 'LOTUS', 'Lotus'],
            [0, 'MAS', 'Maserati'],
            [1, 'MAYBACH', 'Maybach'],
            [1, 'MAZDA', 'Mazda'],
            [1, 'MCLAREN', 'McLaren'],
            [1, 'MB', 'Mercedes-Benz'],
            [0, 'MERC', 'Mercury'],
            [0, 'MERKUR', 'Merkur'],
            [0, 'MINI', 'MINI'],
            [1, 'MIT', 'Mitsubishi'],
            [1, 'NISSAN', 'Nissan'],
            [0, 'OLDS', 'Oldsmobile'],
            [1, 'PEUG', 'Peugeot'],
            [0, 'PLYM', 'Plymouth'],
            [0, 'PONT', 'Pontiac'],
            [1, 'POR', 'Porsche'],
            [0, 'RAM', 'RAM'],
            [1, 'REN', 'Renault'],
            [0, 'RR', 'Rolls-Royce'],
            [0, 'SAAB', 'Saab'],
            [0, 'SATURN', 'Saturn'],
            [0, 'SCION', 'Scion'],
            [0, 'SMART', 'smart'],
            [0, 'SRT', 'SRT'],
            [0, 'STERL', 'Sterling'],
            [0, 'SUB', 'Subaru'],
            [0, 'SUZUKI', 'Suzuki'],
            [1, 'TESLA', 'Tesla'],
            [1, 'TOYOTA', 'Toyota'],
            [0, 'TRI', 'Triumph'],
            [1, 'VOLKS', 'Volkswagen'],
            [1, 'VOLVO', 'Volvo'],
            [0, 'YUGO', 'Yugo'],
        ])->execute();

    }

    public function down()
    {
        $this->dropTable('viechle_brand');
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
