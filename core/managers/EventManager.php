<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 21.09.2017
 * Time: 14:07
 */

namespace core\managers;

use core\entities\Event;
use core\forms\User\UserForm;
use core\repositories\EventRepository;
use core\repositories\ObjectRepository;
use core\repositories\User\UserRepository;
class EventManager extends ObjectManager
{
    private $subjects;

    public function __construct(
        EventRepository $repository
    )
    {
        $this->subjects = $repository;
        parent::__construct($this->subjects);
    }
}