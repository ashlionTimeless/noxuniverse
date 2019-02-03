<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 20.09.2017
 * Time: 18:44
 */

namespace frontend\controllers\auth;

use core\helpers\GoogleAthenticatorHelper;
use core\repositories\User\UserRepository;
use Yii;
use yii\web\Controller;
use core\services\auth\SignupService;
use core\forms\auth\SignupForm;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use Dolondro\GoogleAuthenticator\SecretFactory;
use Dolondro\GoogleAuthenticator\GoogleAuthenticator;
use Dolondro\GoogleAuthenticator\QrImageGenerator\GoogleQrImageGenerator;
class SignupController extends Controller
{

    private $service;
    private $repository;
    public function behaviors()
    {
        return [
/*            'access' => [
                'class' => AccessControl::className(),
                'only' => ['signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ]
                ],
            ],*/
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function __construct($id,$module,SignupService $service, UserRepository $repository,$config=[])
    {
        parent::__construct($id,$module,$config);
        $this->service=$service;
        $this->repository=$repository;
    }



    public function actionRequest()
    {
        $form = new SignupForm();
        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            try {
                $this->service->signup($form);
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
                return $this->goHome();
            } catch (\DomainException $e) {
                Yii::$app->errorHandler->logException($e);
                Yii::$app->session->setFlash('error', $e->getMessage());
            }
        }

        return $this->render('signup', [
            'model' => $form,
        ]);
    }

    /**
     * @param $token
     * @return mixed
     */
    public function actionConfirm($token)
    {
        try {
            $user=$this->repository->getByEmailConfirmToken($token);
            if($user->isWait())
            {
                $this->service->confirm($token);
                Yii::$app->session->setFlash('success', 'Your email is confirmed.');
            }

            if(!$user->isActive())
            {
                $url=$this->service->provideQRCode($user->id);
                return $this->render('set-auth-gen',['url'=>$url,'user'=>$user]);
            }

            return $this->redirect(['auth/auth/login']);
        } catch (\DomainException $e) {
            Yii::$app->errorHandler->logException($e);
            Yii::$app->session->setFlash('error', $e->getMessage());
        }
        return $this->goHome();
    }

    public function actionFinish($id)
    {
        $user=$this->repository->get($id);
        $this->service->finishSignup($user->id);
        Yii::$app->session->setFlash('success', 'You may now log into your account.');
        return $this->redirect(['auth/auth/login']);
    }
}