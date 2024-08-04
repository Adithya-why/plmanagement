<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Registration;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class studentController extends Controller
{
    //deals with student side of the application

    //showsstudent dashboard will all companies and registered ones
    public function showCompanies(){


        $companies = Company::all();


        //gets current userid
        //gets student object from it
        $id = Auth::user()->id;
        $student = Student::where('userid', $id)->first();
        
        //finds all the companies this student registered for
        //join with companies table to get company information
        $registered = DB::table('registrations')
                      -> where('studentid', $student->id)
                      -> join('companies', 'registrations.companyid', '=', 'companies.id')
                      -> get();
        
        
        //the student deatils are sent over incase registrationbutton is pressed and post request with details need to be sent
        return view('student.DashBoard', [
            'companies' => $companies,
            'registered' => $registered,
            'student' => $student
        ]);
    }




    public function studentRegister(Request $req){

        $req->validate([
            'studentid' => ['required'],
            'companyid' => ['required']
        ]);


        Registration::create([
            'companyid' => $req->companyid,
            'studentid' => $req->studentid
        ]);


        return redirect() -> route('student.dashbaord')->with('message', "Registration Succesfull");

    }

}
