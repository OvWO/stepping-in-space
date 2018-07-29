<?php

namespace App\Http\Controllers;

use Response;
use App\Mail\ContactLuis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\EmailLuisValidator;
use Illuminate\Support\Facades\Validator;

// use Illuminate\Support\Facades\Redirect;
// use Illuminate\Support\Facades\URL;

class HomeController extends Controller
{
    /**
     * Download my Curriculum Vitae
     * @return pdf-file
     */
    public function downloadCV()
    {
        // Get the file
        $file= public_path(). "/downloads/test.pdf";

        // Set the headers into a var for readiness
        $headers = array(
              'Content-Type: application/pdf',
            );

        // Return the file
        return response()->file($file, $headers);
    }

    /**
     * Send Luis an Email
     * @param  App\Http\Requests\EmailLuisValidator  $request
     * @return
     */
    public function emailLuis(EmailLuisValidator $request)
    {
        //session not working
        session()->flash('message', 'blah blah blah');

        Mail::to('luisclopez6@gmail.com')
            ->send(new ContactLuis($request->validated()));
        // Not redirecting properly
        // return Redirect::to(URL::previous() . "#contact");
        return redirect('home#contact')->with('message', 'Mail sent successfully');
    }
}
