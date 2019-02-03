<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 11.09.2017
 * Time: 0:01
 */

namespace core\services;

use core\forms\ContactForm;
use core\helpers\ContactHelper;
use yii\mail\MailerInterface;

class ContactService
{
    private $mailer;
    private $adminEmail;

    public function __construct($adminEmail,MailerInterface $mailer)
    {
  //      $this->supportEmail=$supportEmail;
        $this->mailer=$mailer;
        $this->adminEmail=$adminEmail;
    }

    public function send(ContactForm $form)
    {
            $sent = $this->mailer->compose()
//            ->setFrom($this->supportEmail)
            ->setTo($this->adminEmail)
            ->setSubject($form->subject)
            ->setTextBody(ContactHelper::composeJoinUs($form))
            ->send();
            if(!$sent)
            {
                die('Sending error');
                throw new \RuntimeException('Sending error.');
            }
        return $sent;

    }

}