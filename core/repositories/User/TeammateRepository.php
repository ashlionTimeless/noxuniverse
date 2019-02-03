<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 14.09.2017
 * Time: 18:50
 */

namespace core\repositories\User;

use core\repositories\ObjectRepository;
use core\entities\User\Teammate;
use yii\db\Exception;
class TeammateRepository extends ObjectRepository
{

    public function __construct()
    {
        parent::__construct(Teammate::class);
    }
}
