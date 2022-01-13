<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $companies = Company::paginate(15);

        return view('dashboard', [
            'companies' => $companies
        ]);
    }
}
