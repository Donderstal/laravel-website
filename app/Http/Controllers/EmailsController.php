<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailsController extends Controller {

    public function callMeForm() {
        $res[] = $_GET['name'];
        $res[] = $_GET['telephone'];
        $res[] = $_GET['product'];
        try {
            Mail::send('emails.call-me-mail', $res, function ($m) use ($res) {
                $m->to('daan@abiggercircle.com', 'Developer')->subject('Yoyoyo!');
                $m->from('no-reply@gam.nl', 'GAM');
            });
        }
        catch (\Exception $e) {
            var_dump($e);
            return $e;
        }

        var_dump('sucka!');

        return $res;
    }

    public function newsLetterForm() {

        var_dump('sucka!');
        die();
    }


    public function contactForm() {

        var_dump('sucka!');
        die();
    }


}