<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class ContactFormController extends Controller
{
    public function __invoke(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        if ($validator->fails()) {
            if ($request->ajax()) {
                session()->flashInput($request->except('_token'));

                return view('components/contact', [])
                    ->withErrors($validator)
                    ->fragment('fields');
            }

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
