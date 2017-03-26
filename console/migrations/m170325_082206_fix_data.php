<?php

use yii\db\Migration;

class m170325_082206_fix_data extends Migration
{
    public function up()
    {
        $this->execute("

        DELETE FROM `auth_rule` WHERE `auth_rule`.`name` = 'admin';
        DELETE FROM `auth_rule` WHERE `auth_rule`.`name` = 'customer';
        DELETE FROM `auth_rule` WHERE `auth_rule`.`name` = 'seller';
        DELETE FROM `auth_rule` WHERE `auth_rule`.`name` = 'user';

        UPDATE `auth_item` SET `rule_name`=NULL;

        INSERT INTO `company`(`name`) VALUES
        ('VW');

        INSERT INTO `transmission`(`name`) VALUES
        ('Automatik'),
        ('Halbautomatik'),
        ('Manuell');

        INSERT INTO `vehicle_age`(`name`) VALUES
        ('Neuwagen'),
        ('Jahreswagen');

        INSERT INTO `fuel_type`(`name`) VALUES
        ('Benzin'),
        ('Diesel'),
        ('Elektro'),
        ('Elektro/Benzin'),
        ('Elektro/Diesel'),
        ('Erdgas'),
        ('Autogas LPG');

        INSERT INTO `leasing_type`(`name`) VALUES
        ('Kilometerleasing'),
        ('Restwertleasing');

        INSERT INTO `pollutant_class`(`name`) VALUES
        ('A'),
        ('B'),
        ('C'),
        ('D'),
        ('E'),
        ('F'),
        ('G'),
        ('kA');

        INSERT INTO `runtime_config`(`value`) VALUES
        ('12'),
        ('24'),
        ('36'),
        ('48'),
        ('60');

        INSERT INTO `kilometer_config`(`value`) VALUES
        ('10.000'),
        ('15.000'),
        ('20.000'),
        ('25.000'),
        ('30.000');

        ");
    }

    public function down()
    {
        echo "m170325_082206_fix_data cannot be reverted.\n";

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
