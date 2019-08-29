<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeneralInfoController extends Controller {

    public function werkplaats() {

        return view('general-info')->with([
            'title' => 'Werkplaats',
            'text1'  => 'De GAM is een erkend BOVAG-garagebedrijf. Onze werkplaats is geheel ingesteld op onderhoud en service aan alle merken en modellen. Ervaren, goedopgeleide medewerkers voeren de service-, onderhouds- en garantiewerkzaamheden en reparaties zeer professioneel uit. En natuurlijk laten we je precies weten wat we voor je doen. Je komt nooit voor verrassingen te staan.
            <br /> <br />
            Plan tijdig een afspraak voor onderhoud of service. Dan zorgen we dat je auto zo snel mogelijk weer klaarstaat. En dat er eventueel een leenauto of -fiets klaarstaat. Bel 035-6944646 of stuur een e-mail naar info@gambv.nl. En mocht je met pech komen te staan, dan kun je dit nummer tijdens kantooruren bellen om je auto door ons te laten ophalen. Zo is hij snel in onze werkplaats voor reparatie.',
            'title2' => 'Werkplaats',
            'text2'  => '#2 Welcome to werkplaats! Sed conubia sit parturient praesent condimentum ornare adipiscing ad a id tempor quisque blandit lacus est vulputate adipiscing facilisis metus est malesuada a parturient ullamcorper himenaeos. Justo sed integer suscipit sodales mauris accumsan vitae vestibulum a a penatibus eget vestibulum facilisis id. Parturient vestibulum malesuada condimentum suspendisse ut laoreet neque a hendrerit duis a sem a aptent aliquet potenti hac a parturient placerat diam nec a. Ad a amet.',
            'text3'  => '#3 Welcome to werkplaats! Sed conubia sit parturient praesent condimentum ornare adipiscing ad a id tempor quisque blandit lacus est vulputate adipiscing facilisis metus est malesuada a parturient ullamcorper himenaeos. Justo sed integer suscipit sodales mauris accumsan vitae vestibulum a a penatibus eget vestibulum facilisis id. Parturient vestibulum malesuada condimentum suspendisse ut laoreet neque a hendrerit duis a sem a aptent aliquet potenti hac a parturient placerat diam nec a. Ad a amet.'
        ]);
    }

    public function financiering() {

        return view('general-info')->with([
            'title' => 'Financiering',
            'text1'  => 'Om je perfecte rijervaring mogelijk te maken, regelt de GAM ook de autolening die het best bij jouw situatie past. Een financiële oplossing waarmee je weet waar je aan toe bent. Een vast maandbedrag en een looptijd die in lijn is met de levensduur van de auto. We zijn onafhankelijk en werken samen met de grotere financiële dienstverleners in de automotive sector. Zo kun je met een gerust gevoel rijden en lenen!',
            'title2' => 'Leasen',
            'text2'  => 'Leasen kan ook. Hierdoor krijg je het gebruiksrecht van je auto tegen betaling van een vast bedrag per maand over een vooraf afgesproken periode. Er zijn meerdere mogelijkheden: <br />
            <ul> 
                <li> Private lease - zorgeloos gebruik van je auto voor een vast maandbedrag. </li>
                <li> Full operational lease - idem met recht op eerste koop na afloop leasecontract. </li>
                <li> Financial lease - de aankoopsom wordt gefinancierd, maar je bent wél direct economische eigenaar van de auto. </li>
            </ul>',
            'text3'  => '#3 Welcome to financiering! Sed conubia sit parturient praesent condimentum ornare adipiscing ad a id tempor quisque blandit lacus est vulputate adipiscing facilisis metus est malesuada a parturient ullamcorper himenaeos. Justo sed integer suscipit sodales mauris accumsan vitae vestibulum a a penatibus eget vestibulum facilisis id. Parturient vestibulum malesuada condimentum suspendisse ut laoreet neque a hendrerit duis a sem a aptent aliquet potenti hac a parturient placerat diam nec a. Ad a amet.'
        ]);
    }

    public function zoektocht() {

        return view('general-info')->with([
            'title' => 'Zoektocht',
            'text1'  => 'Vul hiernaast je gegevens in en de details van de auto die je zoekt. Geheel vrijblijvend. Wij gaan voor je aan de slag en informeren je over de beste deals.',
            'title2' => 'Zoektocht',
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
                    'text' => 'Sed conubia sit parturient praesent condimentum ornare adipiscing ad a id tempor quisque blandit lacus est vulputate adipiscing facilisis metus est malesuada a parturient ullamcorper himenaeos.'
                ],
                'review2' => [
                    'title' => 'Voornaam achternaam2',
                    'car' => 'Maseratti',
                    'text' => 'Sed conubia sit parturient praesent condimentum ornare adipiscing ad a id tempor quisque blandit lacus est vulputate adipiscing facilisis metus est malesuada a parturient ullamcorper himenaeos.'
                ],
                'review3' => [
                    'title' => 'Voornaam achternaam3',
                    'car' => 'Maseratti',
                    'text' => 'Sed conubia sit parturient praesent condimentum ornare adipiscing ad a id tempor quisque blandit lacus est vulputate adipiscing facilisis metus est malesuada a parturient ullamcorper himenaeos.'
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
