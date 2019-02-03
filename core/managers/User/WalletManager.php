<?php

namespace core\managers\User;

use core\entities\User\Wallet;
use core\helpers\DataConverter;
use core\helpers\EncodingHelper;
use core\managers\ObjectManager;
use core\repositories\User\UserRepository;
use core\repositories\User\TeammateRepository;
use core\services\CryptoService;
class WalletManager extends ObjectManager
{
    private $users;
    private $repository;
    public function __construct(
        TeammateRepository $repository,
        UserRepository $users
    )
    {
        $this->repository = $repository;
        $this->users=$repository;
        return parent::__construct($this->repository);
    }


    public static function preparePassword($wallet,$password)
    {
//        $string=\core\helpers\ShuffleHelper::shuffleStrings([$password,$wallet->wallet_address,$wallet->user_id]);
        $string=$wallet->wallet_address.$password.$wallet->user_id;
        return DataConverter::hex2str(CryptoService::hash($string));
//        return EncodingHelper::toUtf8(DataConverter::hex2str(CryptoService::hash($string)));
    }

}