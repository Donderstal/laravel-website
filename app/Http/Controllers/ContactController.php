<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest as Request;
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
        $res['first-name'] = $request->firstname;
        $res['last-name'] = $request->lastname;
        $res['telephone'] = $request->telephone;
        $res['email'] = $request->email;
        $res['subject'] = $request->subject;
        $res['text-block'] = $request->textblock;

        $request->session()->flash('message', [
            'text' => 'Bedankt!',
            'type' => 'success'
        ]);

        //Mail::to($res['email'])->send(new ContactFormEmail($res));

        return redirect()->route('contact.create', $request->toArray());
    }
}
