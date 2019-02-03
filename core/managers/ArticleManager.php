<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 21.09.2017
 * Time: 14:07
 */

namespace core\managers;

use core\repositories\ArticleRepository;
use core\repositories\ObjectRepository;
use core\repositories\MessageRepository;
class ArticleManager extends ObjectManager
{
    private $repository;

    public function __construct(
        ArticleRepository $repository
    )
    {
        $this->repository = $repository;
        return parent::__construct($repository);
    }
}