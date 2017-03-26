<?php

use yii\db\Migration;

class m170323_092855_car_info extends Migration
{
    public function up()
    {
        $this->dropTable("car");

        $this->createTable('company', [
            'id' => $this->primaryKey(),
            'name' => $this->string(45),
            'logo' => $this->string(500)
        ]);

        $this->addColumn('user', 'contact_content', $this->text());
        $this->addColumn('user', 'leasingbank_text', $this->text());

        $this->dropColumn('user', 'company');
        $this->dropColumn('user', 'logo');

        $this->addColumn('user', 'company_id', $this->integer());
        $this->addForeignKey('fk-user-company_id', 'user', 'company_id', 'company', 'id');

        $this->createTable('transmission', [
            'id' => $this->primaryKey(),
            'name' => $this->string(45),
        ]);

        $this->createTable('vehicle_age', [
            'id' => $this->primaryKey(),
            'name' => $this->string(45),
        ]);

        $this->createTable('fuel_type', [
            'id' => $this->primaryKey(),
            'name' => $this->string(45),
        ]);

        $this->createTable('leasing_type', [
            'id' => $this->primaryKey(),
            'name' => $this->string(45),
        ]);

        $this->createTable('pollutant_class', [
            'id' => $this->primaryKey(),
            'name' => $this->string(10),
        ]);

        $this->createTable('runtime_config', [
            'id' => $this->primaryKey(),
            'value' => $this->integer(),
        ]);

        $this->createTable('kilometer_config', [
            'id' => $this->primaryKey(),
            'value' => $this->integer(),
        ]);

        $this->createTable('car', [
            'id' => $this->primaryKey(),
            'company_id' => $this->integer(),
            'seller_id' => $this->integer(),
            'model' => $this->string(45),
            'vehicle_age_id' => $this->integer(),
            'kw' => $this->string(45),
            'ps' => $this->string(45),
            'transmission_id' => $this->integer(),
            'fuel_type_id' => $this->integer(),
            'highlight1' => $this->string(255),
            'highlight2' => $this->string(255),
            'highlight3' => $this->string(255),
            'highlight4' => $this->string(255),
            'motorization' => $this->string(150),
            'equipment_line' => $this->string(50),

            'description' => $this->text(),
            'available_color1' => $this->string(20),
            'available_color2' => $this->string(20),
            'available_color3' => $this->string(20),
            'other_colors_available' => $this->boolean(),
            'color_interior' => $this->string(20),

            'picture1' => $this->string(255),
            'picture2' => $this->string(255),
            'picture3' => $this->string(255),
            'picture4' => $this->string(255),

            'consumption_in_town' => $this->double(),
            'consumption_outside' => $this->double(),
            'consumption' => $this->double(),
            'co2_emmission_komb' => $this->double(),
            'pollutant_class_id' => $this->integer(),

            'jw_year' => $this->string(25),
            'jw_kilometers' => $this->double(),

            'offer_for_business_customers' => $this->boolean(),
            'offer_for_private_customers' => $this->boolean(),
            'is_vehicle_in_stock' => $this->boolean(),
            'change_to_config_possible' => $this->boolean(),
            'pickup_ex_works_possible' => $this->boolean(),
            'leasing_type_id' => $this->integer(),
            'price_per_kilometer' => $this->double(),
            'short_term' => $this->double(),
            'features' => $this->text(),
            'list_price_net' => $this->double(),
            'available_amount' => $this->integer(),

            'transfer_cost_of_car_house' => $this->integer(),
            'provision_ex_factory' => $this->integer(),
            'maintenance_and_wear' => $this->integer(),
            'insurance' => $this->double(),
            'nationwide_delivery' => $this->integer(),
            'admission_costs' => $this->integer(),

            'interest_rate' => $this->double(),
            'effective_interest_rate' => $this->double(),
            'net_loan_amount' => $this->double(),
            'total_amount' => $this->double(),

            'same_prices_for_business_private' => $this->boolean(),

            'runtime_id1' => $this->integer(),
            'down_payment1' => $this->integer(),
            'kilometer_id1' => $this->integer(),
            'lease_rate1' => $this->integer(),
            'runtime_id2' => $this->integer(),
            'down_payment2' => $this->integer(),
            'kilometer_id2' => $this->integer(),
            'lease_rate2' => $this->integer(),
            'runtime_id3' => $this->integer(),
            'down_payment3' => $this->integer(),
            'kilometer_id3' => $this->integer(),
            'lease_rate3' => $this->integer(),
            'runtime_id4' => $this->integer(),
            'down_payment4' => $this->integer(),
            'kilometer_id4' => $this->integer(),
            'lease_rate4' => $this->integer(),

            'private_runtime_id1' => $this->integer(),
            'private_deposit1' => $this->integer(),
            'private_kilometer_id1' => $this->integer(),
            'private_lease_rate1' => $this->integer(),
            'private_runtime_id2' => $this->integer(),
            'private_deposit2' => $this->integer(),
            'private_kilometer_id2' => $this->integer(),
            'private_lease_rate2' => $this->integer(),
            'private_runtime_id3' => $this->integer(),
            'private_advance_payment3' => $this->integer(),
            'private_kilometer_id3' => $this->integer(),
            'private_lease_rate3' => $this->integer(),
            'private_runtime_id4' => $this->integer(),
            'private_advance_payment4' => $this->integer(),
            'private_kilometer_id4' => $this->integer(),
            'private_lease_rate4' => $this->integer(),

            'special_text' => $this->text(),
            'private_special_text' => $this->text(),
            'business_special_text' => $this->text(),

            'created_at' => $this->integer(10),
            'updated_at' => $this->integer(10),
        ]);

        $this->addForeignKey('fk-car-company_id', 'car', 'company_id', 'company', 'id');
        $this->addForeignKey('fk-car-seller_id', 'car', 'seller_id', 'user', 'id');
        $this->addForeignKey('fk-car-vehicle_age_id', 'car', 'vehicle_age_id', 'vehicle_age', 'id');
        $this->addForeignKey('fk-car-transmission_id', 'car', 'transmission_id', 'transmission', 'id');
        $this->addForeignKey('fk-car-fuel_type_id', 'car', 'fuel_type_id', 'fuel_type', 'id');
        $this->addForeignKey('fk-car-leasing_type_id', 'car', 'leasing_type_id', 'leasing_type', 'id');
        $this->addForeignKey('fk-car-pollutant_class_id', 'car', 'pollutant_class_id', 'pollutant_class', 'id');

        $this->addForeignKey('fk-car-runtime_id1', 'car', 'runtime_id1', 'runtime_config', 'id');
        $this->addForeignKey('fk-car-runtime_id2', 'car', 'runtime_id2', 'runtime_config', 'id');
        $this->addForeignKey('fk-car-runtime_id3', 'car', 'runtime_id3', 'runtime_config', 'id');
        $this->addForeignKey('fk-car-runtime_id4', 'car', 'runtime_id4', 'runtime_config', 'id');

        $this->addForeignKey('fk-car-private_runtime_id1', 'car', 'private_runtime_id1', 'runtime_config', 'id');
        $this->addForeignKey('fk-car-private_runtime_id2', 'car', 'private_runtime_id2', 'runtime_config', 'id');
        $this->addForeignKey('fk-car-private_runtime_id3', 'car', 'private_runtime_id3', 'runtime_config', 'id');
        $this->addForeignKey('fk-car-private_runtime_id4', 'car', 'private_runtime_id4', 'runtime_config', 'id');

        $this->addForeignKey('fk-car-kilometer_id1', 'car', 'kilometer_id1', 'kilometer_config', 'id');
        $this->addForeignKey('fk-car-kilometer_id2', 'car', 'kilometer_id2', 'kilometer_config', 'id');
        $this->addForeignKey('fk-car-kilometer_id3', 'car', 'kilometer_id3', 'kilometer_config', 'id');
        $this->addForeignKey('fk-car-kilometer_id4', 'car', 'kilometer_id4', 'kilometer_config', 'id');

        $this->addForeignKey('fk-car-private_kilometer_id1', 'car', 'private_kilometer_id1', 'kilometer_config', 'id');
        $this->addForeignKey('fk-car-private_kilometer_id2', 'car', 'private_kilometer_id2', 'kilometer_config', 'id');
        $this->addForeignKey('fk-car-private_kilometer_id3', 'car', 'private_kilometer_id3', 'kilometer_config', 'id');
        $this->addForeignKey('fk-car-private_kilometer_id4', 'car', 'private_kilometer_id4', 'kilometer_config', 'id');
    }

    public function down()
    {
        echo "m170323_092855_car_info cannot be reverted.\n";

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
