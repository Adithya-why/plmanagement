<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Registration;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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


    //to show students registered for a given company with id
    public function showRegistered(string $id){
        

        //selects the registrations for company with id first
        //joins those rows using student id to get details of students registered
        $registeredStudents = DB::table('registrations')
                              -> where('registrations.companyid', '=', $id)
                              -> join('students', 'registrations.studentid', '=', 'students.id')
                              -> get();


        

        

        return view('admin.showRegistered', [
            'registeredStudents' => $registeredStudents,
        ]);
    }
}
