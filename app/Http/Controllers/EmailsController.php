<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\CallMeEmail;
use App\Mail\NewsLetterEmail;
use App\Mail\ContactFormEmail;


class EmailsController extends Controller {

    public function callMeForm() {
        $res['name'] = $_POST['name'];
        $res['telephone'] = $_POST['telephone'];
        $res['product'] = $_POST['product'];

        Mail::to('daan@abiggercircle.com')->send(new CallMeEmail($res));

        return $res;
    }

    public function newsLetterForm() {
        $res = $_POST['email'];

        return $res;
    }


    public function contactForm() {
        $res['first-name'] = $_POST['first-name'];
        $res['last-name'] = $_POST['last-name'];
        $res['telephone'] = $_POST['telephone'];
        $res['email'] = $_POST['email'];
        $res['subject'] = $_POST['subject'];
        $res['text-block'] = $_POST['text-block'];

        return $res;
    }


}