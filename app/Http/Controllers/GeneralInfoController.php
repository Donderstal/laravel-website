<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeneralInfoController extends Controller {

    public function werkplaats() {

        return view('general-info')->with([
            'title' => 'WERKPLAATS',
            'par1'  => 'Lorem lorem ipsum ipsum werkplaats brotha'
        ]);
    }

}