<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class FrontEndController extends Controller
{
    public function contacts() {
        $people = ["Janaki" => "9400455532",
                   "Mohan" => "94004556773",
                   "Harish" => "9400453456",
                   "Prem" => "9400455456"];
        return view('basic_pages.contacts', compact('people'));
    }
    public function about() {
        $name = "Chippy";
        $status = 1;
        $age = "33";
        $hobbies=['cricket','hockey','carroms'];
        return view('basic_pages.aboutus', compact('name','age','status','hobbies'));
    }
    public function home() : View {
        return view('basic_pages.frontpage');
    }
    public function admin() {
		return view('user.admin');
	}
}
