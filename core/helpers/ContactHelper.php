<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 22.04.2018
 * Time: 2:33
 */

namespace core\helpers;

use core\forms\ContactForm;

class ContactHelper
{

    public static function composeJoinUs(ContactForm $form)
    {
        $date=date('Y-m-d H:i');
        return "
        {$form->subject}\n $date \n
        Name: {$form->name} \n
        Email: {$form->name} \n
        Phone: {$form->name} \n
        Location: {$form->name} \n
        Social Media: {$form->name} \n       
        ";
    }
}