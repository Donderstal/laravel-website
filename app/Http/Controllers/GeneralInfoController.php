<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeneralInfoController extends Controller {

    public function werkplaats() {

        return view('general-info')->with([
            'title' => 'Werkplaats',
            'text1'  => 'De GAM is een erkend BOVAG-garagebedrijf. Onze werkplaats is geheel ingesteld op onderhoud en service aan alle merken en modellen. Ervaren, goedopgeleide medewerkers voeren de service-, onderhouds- en garantiewerkzaamheden en reparaties zeer professioneel uit. We laten precies weten wat we voor je doen, zo kom je dus nooit voor verrassingen te staan.',
            'title2' => 'Afspraak maken',
            'text2'  => 'Plan tijdig een afspraak voor onderhoud of service. Dan zorgen we dat je auto zo snel mogelijk weer klaarstaat en wordt er eventueel een leenauto of fiets geregeld. Bel 035-6944646 of stuur een e-mail naar info@gambv.nl. Mocht je met pech komen te staan, dan kun je dit nummer tijdens kantooruren bellen om je auto door ons te laten ophalen. Zo is hij snel in onze werkplaats voor reparatie.',
            'title3' => 'Onderhoud',
            'text3'  => 'Bij ons ben je altijd verzekerd van onderhoud zoals de autofabrikant dit voorschrijft. Volledig afgestemd op het type auto, het bouwjaar en de kilometerstand. Ieder jaar is een APK nodig. Plan dit tegelijkertijd met de jaarlijkse grote onderhoudsbeurt en je bespaart tijd en kosten. Toe aan nieuwe banden? Ook deze kunnen wij voor je vervangen. Daarnaast ben je voor schadeherstel bij ons aan het juiste adres. We zorgen voor vakkundig herstel van kleine schades. '
        ]);
    }

    public function financiering() {

        return view('general-info')->with([
            'title' => 'Financiering',
            'text1'  => 'Bij de Gooische Auto Mediair staan kwaliteit en financieel maatwerk voorop. Eerlijke en persoonlijke financiële oplossingen voor particuliere én zakelijke klanten. Wij zijn onafhankelijk en werken samen met de grotere financiële dienstverleners in de automotive sector. Om je perfecte rijervaring mogelijk te maken, regelt de GAM ook de autolening die het best bij jouw situatie past. Een financiële oplossing waarmee je weet waar je aan toe bent. Er is een vast maandbedrag en een looptijd die in lijn is met de levensduur van de auto.',
            'title2' => 'Leasen',
            'text2'  => 'Leasen kan ook. Hierdoor krijg je het gebruiksrecht van je auto tegen betaling van een vast bedrag per maand over een vooraf afgesproken periode. Er zijn meerdere mogelijkheden: <br />
            <ul> 
                <li> Private lease - zorgeloos gebruik van je auto voor een vast maandbedrag. </li>
                <li> Full operational lease - idem met recht op eerste koop na afloop leasecontract. </li>
                <li> Financial lease - de aankoopsom wordt gefinancierd, maar je bent wél direct economische eigenaar van de auto. </li>
            </ul>',
            'title2' => 'Samenwerking en zekerheid',
            'text2'  => 'Wij werken samen met Nationale Autolease welke beschikt over meer dan 20 jaar ervaring in financial lease. Met een groot volume zijn aantrekkelijke voorwaardes mogelijk. Onze rentetarieven behoren hiermee tot de voordeligste van Nederland. Wil je hier meer informatie over? Neem dan contact met ons op via onderstaand formulier.',
            'title3' => 'Leasen',
            'text3'  => 'Leasen kan ook. Hierdoor krijg je het gebruiksrecht van je auto tegen betaling van een vast bedrag per maand over een vooraf afgesproken periode. Er zijn meerdere mogelijkheden: <br />
            <ul> 
                <li> Private lease - zorgeloos gebruik van je auto voor een vast maandbedrag. </li>
                <li> Full operational lease - idem met recht op eerste koop na afloop leasecontract. </li>
                <li> Financial lease - de aankoopsom wordt gefinancierd, maar je bent wél direct economische eigenaar van de auto. </li>
            </ul>'
        ]);
    }

    public function zoektocht() {

        return view('general-info')->with([
            'title' => 'Zoektocht',
            'text1'  => 'Vul hieronder je gegevens in en de details van de auto die je zoekt. Wij gaan voor je aan de slag en informeren je over de beste deals.',
            'title2' => 'Service',
            'text2'  => 'Vanaf het moment dat je bij ons binnenstapt, stellen we alles in het werk om je de beste rijervaring te bezorgen. Dit begint met het grote assortiment in onze showroom: auto’s van merken zoals Audi, BMW, Mercedes, Volkswagen, Volvo en Porsche. Voor aflevering worden al deze auto’s uitvoerig gekeurd en conform de fabrieksvoorschriften rijklaar gemaakt.',
            'title3' => 'Inruil en consignatie',
            'text3'  => 'Als extra service bieden we onze klanten de mogelijkheid om hun auto in te ruilen. Dit met extra voordeel boven de inruilwaarde van de eigen auto. Ook biedt de GAM de mogelijkheid om je auto snel en gemakkelijk in consignatie te verkopen. Advies nodig of vragen? Wij helpen je graag.'
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
