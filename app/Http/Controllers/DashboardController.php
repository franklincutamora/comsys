<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Person;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $personTotal = $this->totalMembers();

        $data = array(
            "personTotal" => $personTotal
        );

        return view('dashboard.index')->with($data);
    }

    public function totalMembers() {
        return Person::count();
    }
}