<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 17.01.2018
 * Time: 23:58
 */

namespace core\helpers;

use core\games\deck\CardDeck;
use core\entities\infrastructure\Table;
use core\entities\User\User;
use common\models\Card;
class CardOwnerHelper
{

    public static function getOwnerClass($owner_type)
    {
        return static::ownerClassMap()[$owner_type];
    }

    private static function ownerClassMap()
    {
        return
            [
                Card::OWNER_TYPE_DECK=>CardDeck::class,
                Card::OWNER_TYPE_PLAYER=>User::class,
                Card::OWNER_TYPE_TABLE=>Table::class
            ];
    }
}