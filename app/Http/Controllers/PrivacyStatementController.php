<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrivacyStatementController extends Controller
{
    public function showPDF()
    {
        return view('layouts.privacy_statement');
    }
}
