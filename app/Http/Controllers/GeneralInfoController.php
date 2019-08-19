<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeneralInfoController extends Controller {

    public function werkplaats() {

        return view('general-info')->with([
            'title' => 'Werkplaats',
            'text1'  => '#1 Welcome to werkplaats! Sed conubia sit parturient praesent condimentum ornare adipiscing ad a id tempor quisque blandit lacus est vulputate adipiscing facilisis metus est malesuada a parturient ullamcorper himenaeos. Justo sed integer suscipit sodales mauris accumsan vitae vestibulum a a penatibus eget vestibulum facilisis id. Parturient vestibulum malesuada condimentum suspendisse ut laoreet neque a hendrerit duis a sem a aptent aliquet potenti hac a parturient placerat diam nec a. Ad a amet.',
            'text2'  => '#2 Welcome to werkplaats! Sed conubia sit parturient praesent condimentum ornare adipiscing ad a id tempor quisque blandit lacus est vulputate adipiscing facilisis metus est malesuada a parturient ullamcorper himenaeos. Justo sed integer suscipit sodales mauris accumsan vitae vestibulum a a penatibus eget vestibulum facilisis id. Parturient vestibulum malesuada condimentum suspendisse ut laoreet neque a hendrerit duis a sem a aptent aliquet potenti hac a parturient placerat diam nec a. Ad a amet.',
            'text3'  => '#3 Welcome to werkplaats! Sed conubia sit parturient praesent condimentum ornare adipiscing ad a id tempor quisque blandit lacus est vulputate adipiscing facilisis metus est malesuada a parturient ullamcorper himenaeos. Justo sed integer suscipit sodales mauris accumsan vitae vestibulum a a penatibus eget vestibulum facilisis id. Parturient vestibulum malesuada condimentum suspendisse ut laoreet neque a hendrerit duis a sem a aptent aliquet potenti hac a parturient placerat diam nec a. Ad a amet.'
        ]);
    }

    public function financiering() {

        return view('general-info')->with([
            'title' => 'Financiering',
            'text1'  => '#1 Welcome to financiering! Sed conubia sit parturient praesent condimentum ornare adipiscing ad a id tempor quisque blandit lacus est vulputate adipiscing facilisis metus est malesuada a parturient ullamcorper himenaeos. Justo sed integer suscipit sodales mauris accumsan vitae vestibulum a a penatibus eget vestibulum facilisis id. Parturient vestibulum malesuada condimentum suspendisse ut laoreet neque a hendrerit duis a sem a aptent aliquet potenti hac a parturient placerat diam nec a. Ad a amet.',
            'text2'  => '#2 Welcome to financiering! Sed conubia sit parturient praesent condimentum ornare adipiscing ad a id tempor quisque blandit lacus est vulputate adipiscing facilisis metus est malesuada a parturient ullamcorper himenaeos. Justo sed integer suscipit sodales mauris accumsan vitae vestibulum a a penatibus eget vestibulum facilisis id. Parturient vestibulum malesuada condimentum suspendisse ut laoreet neque a hendrerit duis a sem a aptent aliquet potenti hac a parturient placerat diam nec a. Ad a amet.',
            'text3'  => '#3 Welcome to financiering! Sed conubia sit parturient praesent condimentum ornare adipiscing ad a id tempor quisque blandit lacus est vulputate adipiscing facilisis metus est malesuada a parturient ullamcorper himenaeos. Justo sed integer suscipit sodales mauris accumsan vitae vestibulum a a penatibus eget vestibulum facilisis id. Parturient vestibulum malesuada condimentum suspendisse ut laoreet neque a hendrerit duis a sem a aptent aliquet potenti hac a parturient placerat diam nec a. Ad a amet.'
        ]);
    }

    public function zoektocht() {

        return view('general-info')->with([
            'title' => 'Zoektocht',
            'text1'  => '#1 Welcome to zoektocht! Sed conubia sit parturient praesent condimentum ornare adipiscing ad a id tempor quisque blandit lacus est vulputate adipiscing facilisis metus est malesuada a parturient ullamcorper himenaeos. Justo sed integer suscipit sodales mauris accumsan vitae vestibulum a a penatibus eget vestibulum facilisis id. Parturient vestibulum malesuada condimentum suspendisse ut laoreet neque a hendrerit duis a sem a aptent aliquet potenti hac a parturient placerat diam nec a. Ad a amet.',
            'text2'  => '#2 Welcome to zoektocht! Sed conubia sit parturient praesent condimentum ornare adipiscing ad a id tempor quisque blandit lacus est vulputate adipiscing facilisis metus est malesuada a parturient ullamcorper himenaeos. Justo sed integer suscipit sodales mauris accumsan vitae vestibulum a a penatibus eget vestibulum facilisis id. Parturient vestibulum malesuada condimentum suspendisse ut laoreet neque a hendrerit duis a sem a aptent aliquet potenti hac a parturient placerat diam nec a. Ad a amet.',
            'text3'  => '#3 Welcome to zoektocht! Sed conubia sit parturient praesent condimentum ornare adipiscing ad a id tempor quisque blandit lacus est vulputate adipiscing facilisis metus est malesuada a parturient ullamcorper himenaeos. Justo sed integer suscipit sodales mauris accumsan vitae vestibulum a a penatibus eget vestibulum facilisis id. Parturient vestibulum malesuada condimentum suspendisse ut laoreet neque a hendrerit duis a sem a aptent aliquet potenti hac a parturient placerat diam nec a. Ad a amet.'
        ]);
    }

    public function overOns() {

        return view('over-ons')->with([
            'title' => 'Over ons',
            'reviews' => [
                'review1' => [
                    'title' => 'Voornaam achternaam',
                    'car' => 'Maseratti',
                    'text' => 'Lorem ipsum wat een mooie auto. Lorem ipsum dolor amet auto. Auto ipsum wat een prachtig ding. Ipsum ipsum patreis deo et amorem Amoriumateram. Dolor sic amet GAM!'
                ],
                'review2' => [
                    'title' => 'Voornaam achternaam2',
                    'car' => 'Maseratti',
                    'text' => 'Lorem ipsum wat een mooie auto. Lorem ipsum dolor amet auto. Auto ipsum wat een prachtig ding. Ipsum ipsum patreis deo et amorem Amoriumateram. Dolor sic amet GAM!'
                ],
                'review3' => [
                    'title' => 'Voornaam achternaam3',
                    'car' => 'Maseratti',
                    'text' => 'Lorem ipsum wat een mooie auto. Lorem ipsum dolor amet auto. Auto ipsum wat een prachtig ding. Ipsum ipsum patreis deo et amorem Amoriumateram. Dolor sic amet GAM!'
                ]
            ],
            'employees' => [
                'employee1' => [
                    'name' => 'Voornaam achternaam',
                    'img' => 'img/generic-office-lady.jpg',
                    'job-title' => 'Salesmanager'
                ],
                'employee2' => [
                    'name' => 'Voornaam achternaam2',
                    'img' => 'img/generic-office-lady.jpg',
                    'job-title' => 'Salesmanager'
                ],
                'employee3' => [
                    'name' => 'Voornaam achternaam3',
                    'img' => 'img/generic-office-lady.jpg',
                    'job-title' => 'Salesmanager'
                ],
                'employee4' => [
                    'name' => 'Voornaam achternaam4',
                    'img' => 'img/generic-office-lady.jpg',
                    'job-title' => 'Salesmanager'
                ]
            ]
        ]);
    }
}
