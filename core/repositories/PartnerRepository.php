<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 14.09.2017
 * Time: 18:50
 */

namespace core\repositories;

use core\repositories\ObjectRepository;
use core\entities\Partner;
use yii\db\Exception;
class PartnerRepository extends ObjectRepository
{

    public function __construct()
    {
        parent::__construct(Partner::class);
    }
}
