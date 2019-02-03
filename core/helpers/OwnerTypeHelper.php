<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 10.02.2018
 * Time: 22:39
 */

namespace core\helpers;
use core\entities\infrastructure\Tournament;
use core\entities\infrastructure\Room;
use yii\db\Exception;

class OwnerTypeHelper
{

    const OWNER_TOURNAMENT='tournament';
    const OWNER_ROOM='room';

    public static function types_list()
    {
        return [null,static::OWNER_ROOM,static::OWNER_TOURNAMENT];
    }

    public static function get_type_index(string $owner_type)
    {
        return array_search($owner_type,static::types_list());
    }

    public static function get_type_from_class(string $className)
    {
        switch($className)
        {
            case Tournament::className():
                return static::get_type_index(static::OWNER_TOURNAMENT);
            case Room::className():
                return static::get_type_index(static::OWNER_ROOM);
            default:
                throw new Exception('Container class is neither Tournament nor Room.');
        }
    }
}