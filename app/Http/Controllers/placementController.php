<?php

namespace App\Http\Controllers;

use App\Models\Company;

use Illuminate\Http\Request;


//controller for the admin user
//to add companies, view registered students and stuff

class placementController extends Controller
{
    public function show(){

        $companies = Company::all();

        return view('admin.dashboard', [
            'companies' => $companies
        ]);

        

    }
}
