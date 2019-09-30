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
                'review4' => [
                    'title' => 'Brigitte Klapmeijer',
                    'text' => '“Na diverse persoonlijke gesprekken met een van de medewerkers van GAM BV heb ik besloten mijn auto bij hen te kopen.

                    Door hun kennis, meedenken en betrokkenheid konden ze mij bijzonder goed adviseren. Uiteindelijk heb ik een hele andere auto gekocht dan de auto die ik voor ogen had maar tot op de dag van vandaag, super blij mee.
                    
                    De medewerkers bij GAM BV heb ik als zeer kundig en plezierig ervaren, de service staat hoog in het vaandel, ik kan ze iedereen van harte aanbevelen!”'
                ],
                'review5' => [
                    'title' => 'Stephan Reesink',
                    'text' => '“Zelf als groot autoliefhebber – en kenner, ben ik des te kritischer op de juiste match tussen ‘value for money’. Al 10 jaar komen we samen tot de beste deal en dat is dan ook gelijk de kracht van de GAM. De wens van de klant staat bij het gehele team echt centraal en daarbij wordt aanvullend op de klantwens de juiste actuele kennis en advies aangeboden, wat ook gelijk de meest duurzame oplossing voor de klant biedt. Gelet op de velen wijzigingen in autoland is dat hetgeen wat wel extra aandacht behoeft. Bij GAM als één van de grootste onafhankelijke autodealers, ben je dan ook gelijk op het juiste adres”'
                ],
                'review1' => [
                    'title' => 'Rene Valkhoff',
                    'text' => '“Altijd een eerlijk en kloppend verhaal. Zeer goede after sales service, mooie verzorgde auto’s, ze leveren wat ze beloven”'
                ],
                'review2' => [
                    'title' => 'Hans Snel',
                    'text' => '“Jarenlang auto’s besteld bij dealers maar een veel betere service bij GAM! Korte levertijd op de auto die je zoekt. Makkelijk te bereiken en vrijwel geen wachttijd bij service!"'
                ],
                'review3' => [
                    'title' => 'Geertjan van Oosten',
                    'text' => '“Ik doe al jaren zaken met de GAM, altijd naar volle tevredenheid en steeds met alle plezier. Uiterst betrouwbaar, kundig en klantvriendelijk personeel. En het importeren via GAM scheelt duizenden soms tuinduizenden euro.”'
                ],
            ],
            'employees' => [
                'employee1' => [
                    'name' => 'Erik Keizer',
                    'img' => 'img/staff/Erik.jpg',
                    'job-title' => 'Eigenaar',
                    'mail'  =>  'Erik@gambv.nl',
                    'tel'   =>  '0629339747'
                ],
                'employee2' => [
                    'name' => 'Pilter Groeneveld',
                    'img' => 'img/staff/Pilter.jpg',
                    'job-title' => 'Eigenaar',
                    'mail'  =>  'Pilter@gambv.nl',
                    'tel'   =>  '0629339746'
                ],
                'employee3' => [
                    'name' => 'Govert Mos',
                    'img' => 'img/staff/Govert.jpg',
                    'job-title' => 'Verkoop',
                    'mail'  =>  'govert@gambv.nl',
                    'tel'   =>  '0629339745'
                ],
                'employee4' => [
                    'name' => 'Declan Luiks',
                    'img' => 'img/staff/Declan.jpg',
                    'job-title' => 'Verkoop',
                    'mail'  =>  'Declan@gambv.nl',
                    'tel'   =>  '0639461005'
                ],
                'employee5' => [
                    'name' => 'Petra Hendriks',
                    'img' => 'img/staff/P-Hendriks.jpg',
                    'job-title' => 'Administratie',
                    'mail'  =>  'Administratie@gambv.nl',
                    'tel'   =>  '0356944646'
                ],
                'employee6' => [
                    'name' => 'Enno van der Haagen',
                    'img' => 'img/staff/Enno.jpg',
                    'job-title' => 'Werkplaatschef',
                    'mail'  =>  'werkplaats@gambv.nl',
                    'tel'   =>  '0629339748'
                ],
                'employee7' => [
                    'name' => 'Charron Kalkhoven',
                    'img' => 'img/staff/Charron.jpg',
                    'job-title' => 'Monteur',
                    'mail'  =>  'werkplaats@gambv.nl',
                    'tel'   =>  '0356944646'
                ],
                'employee8' => [
                    'name' => 'Paul Kwantes',
                    'img' => 'img/staff/Paul.jpg',
                    'job-title' => 'Monteur',
                    'mail'  =>  'werkplaats@gambv.nl',
                    'tel'   =>  '0356944646'
                ]
            ]
        ]);
    }
}
 