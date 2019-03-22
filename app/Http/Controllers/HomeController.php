<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Service;
use App\Technique;
use App\Qualification;
use App\ServiceTechnique;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // return view('home');
        $users = User::all();
        $services = Service::all();
        $techniques = Technique::all();
        $qualifications = Qualification::all();

        return view('home', ['users' => $users,
            'services' => $services,
            'techniques' => $techniques,
            'qualifications' => $qualifications]);
    }
}
