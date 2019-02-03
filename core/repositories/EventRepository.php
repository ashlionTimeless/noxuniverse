<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 14.09.2017
 * Time: 18:50
 */

namespace core\repositories;

use core\repositories\ObjectRepository;
use core\entities\Event;
use yii\db\Exception;
class EventRepository extends ObjectRepository
{

    public function __construct()
    {
        parent::__construct(Event::class);
    }
}
