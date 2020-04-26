<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index() {
        $title = 'Welcome to Community System Application';
        return view('pages.index')->with('title', $title);
    }

    public function about() {
        $data = array( 
            'title' => 'About Laravel', 
            'services' => ['Web Design', 'Programming', 'SEO']
        );
        
        return view('pages.about')->with($data);
    }
}