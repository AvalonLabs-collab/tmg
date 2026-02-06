<?php

namespace App\Http\Controllers;

use App\Models\Company;

class CompanyController extends Controller
{
    public function about()
    {
        $company = Company::find(1);
        return view('about', [
            'company' => $company,
        ]);
    }

    public function contact()
    {
        $company = Company::find(1);
        return view('contact', [
            'company' => $company,
        ]);
    }
}
