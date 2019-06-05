<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeneralInfoController extends Controller {

    public function werkplaats() {

        return view('general-info')->with([
            'title' => 'Werkplaats',
            'text1'  => '#1 Welcome to werkplaats bruh! Sed conubia sit parturient praesent condimentum ornare adipiscing ad a id tempor quisque blandit lacus est vulputate adipiscing facilisis metus est malesuada a parturient ullamcorper himenaeos. Justo sed integer suscipit sodales mauris accumsan vitae vestibulum a a penatibus eget vestibulum facilisis id. Parturient vestibulum malesuada condimentum suspendisse ut laoreet neque a hendrerit duis a sem a aptent aliquet potenti hac a parturient placerat diam nec a. Ad a amet.',
            'text2'  => '#2 Welcome to werkplaats bruh! Sed conubia sit parturient praesent condimentum ornare adipiscing ad a id tempor quisque blandit lacus est vulputate adipiscing facilisis metus est malesuada a parturient ullamcorper himenaeos. Justo sed integer suscipit sodales mauris accumsan vitae vestibulum a a penatibus eget vestibulum facilisis id. Parturient vestibulum malesuada condimentum suspendisse ut laoreet neque a hendrerit duis a sem a aptent aliquet potenti hac a parturient placerat diam nec a. Ad a amet.',
            'text3'  => '#3 Welcome to werkplaats bruh! Sed conubia sit parturient praesent condimentum ornare adipiscing ad a id tempor quisque blandit lacus est vulputate adipiscing facilisis metus est malesuada a parturient ullamcorper himenaeos. Justo sed integer suscipit sodales mauris accumsan vitae vestibulum a a penatibus eget vestibulum facilisis id. Parturient vestibulum malesuada condimentum suspendisse ut laoreet neque a hendrerit duis a sem a aptent aliquet potenti hac a parturient placerat diam nec a. Ad a amet.'
        ]);
    }

    public function financiering() {

        return view('general-info')->with([
            'title' => 'Financiering',
            'text1'  => '#1 Welcome to financiering bruh! Sed conubia sit parturient praesent condimentum ornare adipiscing ad a id tempor quisque blandit lacus est vulputate adipiscing facilisis metus est malesuada a parturient ullamcorper himenaeos. Justo sed integer suscipit sodales mauris accumsan vitae vestibulum a a penatibus eget vestibulum facilisis id. Parturient vestibulum malesuada condimentum suspendisse ut laoreet neque a hendrerit duis a sem a aptent aliquet potenti hac a parturient placerat diam nec a. Ad a amet.',
            'text2'  => '#2 Welcome to financiering bruh! Sed conubia sit parturient praesent condimentum ornare adipiscing ad a id tempor quisque blandit lacus est vulputate adipiscing facilisis metus est malesuada a parturient ullamcorper himenaeos. Justo sed integer suscipit sodales mauris accumsan vitae vestibulum a a penatibus eget vestibulum facilisis id. Parturient vestibulum malesuada condimentum suspendisse ut laoreet neque a hendrerit duis a sem a aptent aliquet potenti hac a parturient placerat diam nec a. Ad a amet.',
            'text3'  => '#3 Welcome to financiering bruh! Sed conubia sit parturient praesent condimentum ornare adipiscing ad a id tempor quisque blandit lacus est vulputate adipiscing facilisis metus est malesuada a parturient ullamcorper himenaeos. Justo sed integer suscipit sodales mauris accumsan vitae vestibulum a a penatibus eget vestibulum facilisis id. Parturient vestibulum malesuada condimentum suspendisse ut laoreet neque a hendrerit duis a sem a aptent aliquet potenti hac a parturient placerat diam nec a. Ad a amet.'
        ]);
    }

    public function zoektocht() {

        return view('general-info')->with([
            'title' => 'Zoektocht',
            'text1'  => '#1 Welcome to zoektocht bruh! Sed conubia sit parturient praesent condimentum ornare adipiscing ad a id tempor quisque blandit lacus est vulputate adipiscing facilisis metus est malesuada a parturient ullamcorper himenaeos. Justo sed integer suscipit sodales mauris accumsan vitae vestibulum a a penatibus eget vestibulum facilisis id. Parturient vestibulum malesuada condimentum suspendisse ut laoreet neque a hendrerit duis a sem a aptent aliquet potenti hac a parturient placerat diam nec a. Ad a amet.',
            'text2'  => '#2 Welcome to zoektocht bruh! Sed conubia sit parturient praesent condimentum ornare adipiscing ad a id tempor quisque blandit lacus est vulputate adipiscing facilisis metus est malesuada a parturient ullamcorper himenaeos. Justo sed integer suscipit sodales mauris accumsan vitae vestibulum a a penatibus eget vestibulum facilisis id. Parturient vestibulum malesuada condimentum suspendisse ut laoreet neque a hendrerit duis a sem a aptent aliquet potenti hac a parturient placerat diam nec a. Ad a amet.',
            'text3'  => '#3 Welcome to zoektocht bruh! Sed conubia sit parturient praesent condimentum ornare adipiscing ad a id tempor quisque blandit lacus est vulputate adipiscing facilisis metus est malesuada a parturient ullamcorper himenaeos. Justo sed integer suscipit sodales mauris accumsan vitae vestibulum a a penatibus eget vestibulum facilisis id. Parturient vestibulum malesuada condimentum suspendisse ut laoreet neque a hendrerit duis a sem a aptent aliquet potenti hac a parturient placerat diam nec a. Ad a amet.'
        ]);
    }

    public function overOns() {

        return view('general-info')->with([
            'title' => 'Over ons',
            'text1'  => '#1 Welcome to over ons bruh! Sed conubia sit parturient praesent condimentum ornare adipiscing ad a id tempor quisque blandit lacus est vulputate adipiscing facilisis metus est malesuada a parturient ullamcorper himenaeos. Justo sed integer suscipit sodales mauris accumsan vitae vestibulum a a penatibus eget vestibulum facilisis id. Parturient vestibulum malesuada condimentum suspendisse ut laoreet neque a hendrerit duis a sem a aptent aliquet potenti hac a parturient placerat diam nec a. Ad a amet.',
            'text2'  => '#2 Welcome to over ons bruh! Sed conubia sit parturient praesent condimentum ornare adipiscing ad a id tempor quisque blandit lacus est vulputate adipiscing facilisis metus est malesuada a parturient ullamcorper himenaeos. Justo sed integer suscipit sodales mauris accumsan vitae vestibulum a a penatibus eget vestibulum facilisis id. Parturient vestibulum malesuada condimentum suspendisse ut laoreet neque a hendrerit duis a sem a aptent aliquet potenti hac a parturient placerat diam nec a. Ad a amet.',
            'text3'  => '#3 Welcome to over ons bruh! Sed conubia sit parturient praesent condimentum ornare adipiscing ad a id tempor quisque blandit lacus est vulputate adipiscing facilisis metus est malesuada a parturient ullamcorper himenaeos. Justo sed integer suscipit sodales mauris accumsan vitae vestibulum a a penatibus eget vestibulum facilisis id. Parturient vestibulum malesuada condimentum suspendisse ut laoreet neque a hendrerit duis a sem a aptent aliquet potenti hac a parturient placerat diam nec a. Ad a amet.'
        ]);
    }

    public function contact() {

        return view('general-info')->with([
            'title' => 'Contact',
            'text1'  => '#1 Welcome to contact bruh! Sed conubia sit parturient praesent condimentum ornare adipiscing ad a id tempor quisque blandit lacus est vulputate adipiscing facilisis metus est malesuada a parturient ullamcorper himenaeos. Justo sed integer suscipit sodales mauris accumsan vitae vestibulum a a penatibus eget vestibulum facilisis id. Parturient vestibulum malesuada condimentum suspendisse ut laoreet neque a hendrerit duis a sem a aptent aliquet potenti hac a parturient placerat diam nec a. Ad a amet.',
            'text2'  => '#2 Welcome to contact bruh! Sed conubia sit parturient praesent condimentum ornare adipiscing ad a id tempor quisque blandit lacus est vulputate adipiscing facilisis metus est malesuada a parturient ullamcorper himenaeos. Justo sed integer suscipit sodales mauris accumsan vitae vestibulum a a penatibus eget vestibulum facilisis id. Parturient vestibulum malesuada condimentum suspendisse ut laoreet neque a hendrerit duis a sem a aptent aliquet potenti hac a parturient placerat diam nec a. Ad a amet.',
            'text3'  => '#3 Welcome to contact bruh! Sed conubia sit parturient praesent condimentum ornare adipiscing ad a id tempor quisque blandit lacus est vulputate adipiscing facilisis metus est malesuada a parturient ullamcorper himenaeos. Justo sed integer suscipit sodales mauris accumsan vitae vestibulum a a penatibus eget vestibulum facilisis id. Parturient vestibulum malesuada condimentum suspendisse ut laoreet neque a hendrerit duis a sem a aptent aliquet potenti hac a parturient placerat diam nec a. Ad a amet.'
        ]);
    }

}