<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Contact;

class ContactController extends Controller {

    public function create() {
          return view('contact_form');
    }

    public function store(Request $request) {
        // Validate post parameters!
        $request->validate([
            'name'           => 'required',
            'email'          => 'required|email',
            'subject'        => 'required',
            'mobile_number'  => 'required|numeric',
            'message'        => 'required',
        ]);

        // Insert.
        Contact::create([
            'name'          => $request->name,
            'email'         => $request->email,
            'subject'       => $request->subject,
            'mobile_number' => $request->mobile_number,
            'message'       => $request->message,
        ]);

        return response()->json([
            'success'=>'The message was sent successfully!'
        ]);
    }
}
