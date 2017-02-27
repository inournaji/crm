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
}