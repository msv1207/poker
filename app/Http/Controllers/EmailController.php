<?php

namespace App\Http\Controllers;

use App\Mail\HelloEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

class EmailController extends Controller
{
    public function sendEmail(Request $request)
    {
        /**
         * Store a receiver email address to a variable.
         */
//        dd($request->all());
        $reveiverEmailAddress = $request->email;

        $mailData='http://localhost:8002' .$request->currentUrl;
        /**
         * Import the Mail class at the top of this page,
         * and call the to() method for passing the
         * receiver email address.
         *
         * Also, call the send() method to incloude the
         * HelloEmail class that contains the email template.
         */
        Mail::to($reveiverEmailAddress)->send(new HelloEmail($mailData));

        /**
         * Check if the email has been sent successfully, or not.
         * Return the appropriate message.
         */
//        if (Mail::failures() != 0) {
//            return "Email has been sent successfully.";
//        }
//        return "Oops! There was some error sending the email.";
    }
}
