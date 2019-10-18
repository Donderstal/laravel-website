<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeneralInfoController extends Controller {

    public function page1() {

        return view('general-info')->with([
            'title' => 'page1',
            'text1'  => 'Nulla neque massa, feugiat sed, commodo in, adipiscing ut, est. In fermentum mattis ligula. Nulla ipsum. Vestibulum condimentum condimentum augue. Nunc purus risus, volutpat sagittis, lobortis at, dignissim sed, sapien.',
            'title2' => 'Lorem',
            'text2'  => 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'title3' => 'Ipsum',
            'text3'  => 'Nunc purus risus, volutpat sagittis, lobortis at, dignissim sed, sapien. Fusce porttitor iaculis ante. Curabitur eu arcu. Morbi quam purus, tempor eget, ullamcorper feugiat, commodo ullamcorper, neque.'
        ]);
    }

    public function page2() {

        return view('general-info')->with([
            'title' => 'page2',
            'text1'  => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
            'title2' => 'Lorem',
            'text2'  => 'Nulla ipsum. Vestibulum condimentum condimentum augue. Nunc purus risus, volutpat sagittis, lobortis at, dignissim sed, sapien. Fusce porttitor iaculis ante. Curabitur eu arcu. Morbi quam purus, tempor eget, ullamcorper feugiat, commodo ullamcorper, neque.',
            'title2' => 'Ipsum',
            'text2'  => 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'title3' => 'Dolor',
            'text3'  => 'Fusce quis ipsum. Nulla neque massa, feugiat sed, commodo in, adipiscing ut, est. In fermentum mattis ligula: <br />
            <ul> 
                <li> Duis aute irure dolor </li>
                <li> Fusce porttitor iaculis ante </li>
                <li> Morbi quam purus </li>
            </ul>'
        ]);
    }

    public function page3() {

        return view('general-info')->with([
            'title' => 'page3',
            'text1'  => 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
            'title2' => 'Lorem',
            'text2'  => 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'title3' => 'Ipsum',
            'text3'  => 'Nulla ipsum. Vestibulum condimentum condimentum augue. Nunc purus risus, volutpat sagittis, lobortis at, dignissim sed, sapien. Fusce porttitor iaculis ante. Curabitur eu arcu. Morbi quam purus, tempor eget, ullamcorper feugiat, commodo ullamcorper, neque.'
        ]);
    }

    public function page4() {

        return view('over-ons')->with([
            'title' => 'page4',
            'reviews' => [
                'review1' => [
                    'title' => 'Gaius Julies Caesar',
                    'text' => 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.'
                ],
                'review2' => [
                    'title' => 'Pompeius Magnus',
                    'text' => 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
                ],
                'review3' => [
                    'title' => 'Hannibal Barca',
                    'text' => 'Fusce porttitor iaculis ante. Curabitur eu arcu. Morbi quam purus, tempor eget, ullamcorper feugiat, commodo ullamcorper, neque.'
                ],
                'review4' => [
                    'title' => 'Constantinus VII Porphyrogennetos',
                    'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus libero leo, pellentesque ornare, adipiscing vitae, rhoncus commodo, nulla. Fusce quis ipsum. Nulla neque massa, feugiat sed, commodo in, adipiscing ut, est.'
                ],
            ],
            'employees' => [
                'employee1' => [
                    'name' => 'Miss Employee',
                    'img' => 'img/generic-office-lady.jpg',
                    'job-title' => 'Employee',
                    'mail'  =>  'employee@companybv.nl',
                    'tel'   =>  '0612345678'
                ],
                'employee2' => [
                    'name' => 'Miss Employee',
                    'img' => 'img/generic-office-lady.jpg',
                    'job-title' => 'Employee',
                    'mail'  =>  'employee@companybv.nl',
                    'tel'   =>  '0612345678'
                ],
                'employee3' => [
                    'name' => 'Miss Employee',
                    'img' => 'img/generic-office-lady.jpg',
                    'job-title' => 'Employee',
                    'mail'  =>  'employee@companybv.nl',
                    'tel'   =>  '0612345678'
                ],
                'employee4' => [
                    'name' => 'Miss Employee',
                    'img' => 'img/generic-office-lady.jpg',
                    'job-title' => 'Employee',
                    'mail'  =>  'employee@companybv.nl',
                    'tel'   =>  '0612345678'
                ]
            ]
        ]);
    }
}
 