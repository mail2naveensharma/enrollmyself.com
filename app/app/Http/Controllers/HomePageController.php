<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class HomePageController extends Controller {

	//
    public function index()
    {
        return view ('pages.homepage');
    }
    
    public function plans()
    {
        return view ('pages.plans');
    }
}
