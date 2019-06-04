<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeneralInfoController extends Controller {

    public function werkplaats() {

        return view('general-info')->with([
            'title' => 'Werkplaats',
            'text-1'  => '#1 Welcome to werkplaats bruh! Lorem ipsum ipsum werkplaats brotha',
            'text-2'  => '#2 Welcome to werkplaats bruh! Lorem ipsum ipsum werkplaats brotha',
            'text-3'  => '#3 Welcome to werkplaats bruh! Lorem ipsum ipsum werkplaats brotha'
        ]);
    }

    public function financiering() {

        return view('general-info')->with([
            'title' => 'Financiering',
            'text-1'  => '#1 Welcome to financiering bruh! Lorem ipsum ipsum financiering brotha',
            'text-2'  => '#2 Welcome to financiering bruh! Lorem ipsum ipsum financiering brotha',
            'text-3'  => '#3 Welcome to financiering bruh! Lorem ipsum ipsum financiering brotha'
        ]);
    }

    public function zoektocht() {

        return view('general-info')->with([
            'title' => 'Zoektocht',
            'text-1'  => '#1 Welcome to zoektocht bruh! Lorem ipsum ipsum zoektocht brotha',
            'text-2'  => '#2 Welcome to zoektocht bruh! Lorem ipsum ipsum zoektocht brotha',
            'text-3'  => '#3 Welcome to zoektocht bruh! Lorem ipsum ipsum zoektocht brotha'
        ]);
    }

    public function overOns() {

        return view('general-info')->with([
            'title' => 'Over ons',
            'text-1'  => '#1 Welcome to over ons bruh! Lorem ipsum ipsum over ons brotha',
            'text-2'  => '#2 Welcome to over ons bruh! Lorem ipsum ipsum over ons brotha',
            'text-3'  => '#3 Welcome to over ons bruh! Lorem ipsum ipsum over ons brotha'
        ]);
    }

    public function contact() {

        return view('general-info')->with([
            'title' => 'Contact',
            'text-1'  => '#1 Welcome to contact bruh! Lorem ipsum ipsum contact brotha',
            'text-2'  => '#2 Welcome to contact bruh! Lorem ipsum ipsum contact brotha',
            'text-3'  => '#3 Welcome to contact bruh! Lorem ipsum ipsum contact brotha'
        ]);
    }

}