<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ClientMailTemplate;
use App\Models\Contact;

class ContactController extends Controller
{
    public function submitForm(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        Contact::create($request->all());

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ];

        // Send email to your admin inbox
        Mail::to('psc.developer2@gmail.com')->send(new ClientMailTemplate($data));

        return response()->json(['message' => 'Form submitted successfully!']);
    }
}
