<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;   // THIS LINE WAS MISSING

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }


	public function sendContact(Request $request)
	{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'message' => 'required'
    ]);

    Contact::create($request->all());

    return back()->with('success','Message sent successfully!');
	}
}
