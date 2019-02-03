<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 18.01.2018
 * Time: 16:06
 */

namespace core\helpers;

use core\games\factories\DeckFactory;
use core\games\factories\FoolDeckFactory;
use core\games\factories\OmahaPockerDeckFactory;
use core\helpers\GameTypeHelper;
class DeckFactoryHelper
{
    public static function deckFactoryList():array
    {
        //TODO:: add Seka Factory
        return [GameTypeHelper::GAME_FOOL=>FoolDeckFactory::class,GameTypeHelper::GAME_POKER=>OmahaPockerDeckFactory::class,GameTypeHelper::GAME_SEKA=>null];
    }

    public static function getDeckFactoryByIndex(int $game_name,$object=true)
    {
        $class=static::deckFactoryList()[GameTypeHelper::getGameTypeByIndex($game_name)];
        return static::getResult($class,$object);
    }

    public static function getDeckFactoryByName(string $game_name,$object=true)
    {
        $class=static::deckFactoryList()[$game_name];
        return static::getResult($class,$object);
    }

    public static function getResult($class,$object)
    {
        if($object)
        {
            return new $class();
        }
        return $class;
    }
}