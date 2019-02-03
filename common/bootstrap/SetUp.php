<?php
namespace common\bootstrap;


//use function foo\func;
use core\repositories\EventRepository;
use core\services\DbTransactionManager;
use Yii;
//use core\repositories\MessageRepository;
use core\services\ContactService;
use yii\base\BootstrapInterface;
use yii\mail\MailerInterface;
use yii\di\Instance;
use core\repositories\User\UserRepository;
use core\services\auth\PasswordResetService;
use core\services\auth\SignupService;
use core\services\auth\AuthService;
class SetUp implements BootstrapInterface
{
    public function bootstrap($app)
    {

        $container = \Yii::$container;

        $container->setSingleton(DbTransactionManager::class);

        $container->setSingleton(DbTransactionManager::class);

        $container->setSingleton(MailerInterface::class, function() use ($app) {
            return $app->mailer;
        });


        $container->setSingleton(UserRepository::class);

        $container->setSingleton(EventRepository::class);


        $container->setSingleton(SignupService::class, [],
            [
                $app->params['adminEmail']
            ]);

        $container->setSingleton(AuthService::class);

        $container->setSingleton(PasswordResetService::class);

        $container->setSingleton(ContactService::class,[],
            [
                $app->params['adminEmail'],
                Instance::of(MailerInterface::class)
            ]);
        //Alternative with anonymous callback
//        $container->setSingleton(PasswordResetService::class,function () use ($app)
//        {
//            return new PasswordResetService([$app->params['supportEmail']=>$app->name . 'robot']);
//        });
//

//        $container->setSingleton(PasswordResetService::class);



//        $container->setSingleton(ContactService::class,[],[
//            $app->params['adminEmail']
//        ]);
    }
}