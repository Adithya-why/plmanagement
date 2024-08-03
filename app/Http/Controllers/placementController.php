<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Registration;
use Illuminate\Http\Request;


//controller for the admin user
//to add companies, view registered students and stuff

class placementController extends Controller
{

    //to show admin dashboard
    //list of all companies available
   public function showDashBoard(){

        $companies = Company::all();

        return view('admin.dashboard', [
            'companies' => $companies
        ]);



    }

    //show form to register a new company
    public function showNewForm(){

        return view('admin.newcompany');
    }


    public function storeNewCompany(Request $req){
        

        //validate the form data
        $req->validate([
            'name' => ['required'],
            'position' => ['required']
        ]);

        Company::create([
            'name' => $req->name,
            'position' => $req->position
        ]);

        //flash message
        return redirect()->route('admin.dashboard')->with('message', 'New Company added');

    }

    public function showRegistered(string $id){

        $registered = Registration::where('companyid', $id)->get();

        // dd($registered);

        return view('admin.showRegistered', [
            'registered' => $registered,
        ]);
    }
}
