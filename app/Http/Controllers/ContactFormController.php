<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactFormController extends Controller
{
    public function __invoke(Request $request): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput()
                ->withFragment('#contact');
        }

        Mail::to(env('MAIL_FROM_ADDRESS'))->send(new Contact(
            $request->input('email'),
            $request->input('name'),
            $request->input('message'),
        ));

        return redirect()->back()->with('success', true);
    }
}
