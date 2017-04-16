<?php
/**
 * Created by PhpStorm.
 * User: Amaney
 * Date: 2/10/2017
 * Time: 7:26 PM
 */

namespace common\helpers;


class Constants
{
    const STATUS_WAITING_CUSTOMER = 1;
    const STATUS_WAITING_CREDIT_CARD = 2;
    const STATUS_WAITING_BANK = 3;
    const STATUS_WAITING_CONTRACT = 4;
    const STATUS_Done = 5;

    const STATUS_WAITING_CUSTOMER_STR = "Waiting Customer";
    const STATUS_WAITING_CREDIT_CARD_STR = "Waiting Credit Card Info";
    const STATUS_WAITING_BANK_STR = "Waiting Bank";
    const STATUS_WAITING_CONTRACT_STR = "Contract";
    const STATUS_Done_STR = "Done";

    const IN_ACTIVE = 0;
    const ACTIVE = 1;
    const IN_ACTIVE_STR = "Inactive";
    const ACTIVE_STR = "Active";

    const CAR_STATUS_PENDING = "1";
    const CAR_STATUS_APPROVED = "2";
    const CAR_STATUS_DECLINED = "3";

    const CAR_STATUS_PENDING_STR = "Pending";
    const CAR_STATUS_APPROVED_STR = "Approved";
    const CAR_STATUS_DECLINED_STR = "Declined";


    const ADMIN = "admin";
    const SELLER = "seller";

    const PS_CONVERSION_RATE = 1.36;
    const IMAGES_PATH = 'http://crm.webersapps.com/';
}