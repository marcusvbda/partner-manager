<?php

namespace App\Http\Controllers;

use Auth;

class HomeController extends Controller
{
	public function index()
	{
		return view('admin.home');
	}

	public function dashboard()
	{
		return view('admin.dashboard');
	}
}
