<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest as Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormEmail;

class ContactController extends Controller
{
    public function create()
    {
        return view('contact.create', [
            'title' => 'Contact'
        ]);
    }

    public function store(Request $request)
    {
        $res = [];
        $res['first_name'] = $request->firstname;
        $res['last_name'] = $request->lastname;
        $res['telephone'] = $request->telephone;
        $res['email'] = $request->email;
        $res['subject'] = $request->subject;
        $res['text_block'] = $request->textblock;

        $request->session()->flash('message', [
            'text' => 'Bedankt!',
            'type' => 'success'
        ]);

        Mail::to('patrick@abiggercircle.com')->send(new ContactFormEmail($res));

        return redirect()->route('contact.create');
    }
}
