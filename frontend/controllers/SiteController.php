<?php
namespace frontend\controllers;

use core\forms\ContactForm;
use core\repositories\ArticleRepository;
use core\repositories\EventRepository;
use core\repositories\PartnerRepository;
use core\repositories\TeammateRepository;
use core\services\ContactService;
use Yii;
use yii\web\Controller;
use core\repositories\ObjectRepository;
use yii\filters\AccessControl;


/**
 * Site controller
 */
class SiteController extends Controller
{

    private $teammates;
    private $partners;
    private $events;
    private $news;
    private $service;
    public function __construct($id, $module,TeammateRepository $teammates,PartnerRepository $partners, ArticleRepository $news, EventRepository $events, ContactService $service,$config=[])
    {
        $this->service=$service;
        $this->teammates=$teammates;
        $this->partners=$partners;
        $this->events=$events;
        $this->news=$news;
        return parent::__construct($id,$module);
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
//            'access' => [
//                'class' => AccessControl::className(),
//                'rules' => [
//                    [
//                        'actions' => ['login', 'error'],
//                        'allow' => true,
//                    ],
//                    [
//                        'actions' => ['logout', 'index'],
//                        'allow' => true,
//                        'roles' => ['@'],
//                    ],
//                ],
//            ],
        ];
    }
    public function actionIndex()
    {
        $teammates=$this->teammates->getAll();
        shuffle($teammates);
        $partners=$this->partners->getAll();
        shuffle($partners);
        $events=$this->events->getAll();
        $news=$this->news->getAll();
//        $news=[];
//        $events=[];
        $form = new ContactForm();

        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            try
            {
                $this->service->send($form);
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
                return $this->goHome();
            }
            catch(\Exception $e)
            {
                Yii::$app->errorHandler->logException($e);
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }
            return $this->refresh();
        }

        return $this->render('index',
            ['team'=>$teammates,
             'partners'=>$partners,
                'events'=>$events,
                'news'=>$news,
                'model'=>$form
            ]);
    }

    public function actionBlog()
    {
        return $this->render('blog');
    }

    public function actionPost()
    {
        return $this->render('post');
    }

    public function actionEvents()
    {
        return $this->render('blog');
    }

    public function actionEvent($id)
    {
        $event=$this->events->get($id);
        return $this->render('event',['event'=>$event]);
    }

    public function actionChangeLang($lang)
    {

        setcookie('language',$lang);
        $this->goBack();
    }

}
