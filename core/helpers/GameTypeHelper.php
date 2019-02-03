<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 27.12.2017
 * Time: 13:00
 */

namespace core\helpers;

use core\games\game\fool\FoolGame;
use core\games\game\seka\SekaGame;
use core\games\game\poker\PokerGame;

class GameTypeHelper
{

    const GAME_FOOL='fool';
    const GAME_POKER='poker';
    const GAME_SEKA='seka';

    public static function gamesList()
    {
        return [null,static::GAME_FOOL,static::GAME_POKER,static::GAME_SEKA];
    }

    public static function getGameTypeByIndex($integer)
    {
        return static::gamesList()[$integer];
    }

    public static function getGameTypeIndex($game_type)
    {
        return array_search($game_type,static::gamesList());
    }

    public static function checkGameType($game_index)
    {
        if(!isset(static::gamesList()[$game_index]))
        {
            throw new \RuntimeException('Unknown game type.');
        }
        return true;
    }

    public static function wrapGameAction(string $actionName, array $params=[])
    {
        return ['action'=>$actionName,'params'=>$params];
    }

    public static function getGameClassByIndex(int $index)
    {
        return static::getGameClassByKeyword(static::getGameTypeByIndex($index));
    }

    public static function getGameClassByKeyword(string $keyword)
    {
        switch($keyword)
        {
            case static::GAME_FOOL:
                return FoolGame::class;
            case static::GAME_POKER:
                return PokerGame::class;
            case static::GAME_SEKA:
                return SekaGame::class;
        }
        return false;
    }
}