<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\contact_us;

class ContactController extends Controller
{
    public function store(Request $req) {
        $name = $req->name;
        $email = $req->email;
        $msg = $req->message;

        $contact = contact_us::create([
            'name' => $name, 'email' => $email, 'message' => $msg
        ]);

        return view('pages.home')->with('msg', 'Success');
        
    }
}
