<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        if ($request->isMethod('GET')) {
            return view('pages.contact-us');
        }

        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'subject' => 'required|max:255',
            'message' => 'required',
        ]);

        Mail::send(new ContactMail($data));

        $this->banner('Thanks For Mailing Us.');

        return back();
    }
}
