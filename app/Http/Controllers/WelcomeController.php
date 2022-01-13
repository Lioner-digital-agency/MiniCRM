<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $companies = Company::paginate(15);

        return view('welcome', [
            'companies' => $companies
        ]);
    }
}
