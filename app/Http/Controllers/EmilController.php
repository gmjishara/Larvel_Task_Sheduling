<?php

namespace App\Http\Controllers;

use App\Mail\WeeklyReport;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class EmilController extends Controller
{
    public function index(){
        // $content = [
        //     'subject' => 'This is the mail subject',
        //     'body' => 'This is the email body of how to send email from laravel 10 with mailtrap.'
        // ];

        Mail::to('janithishara971231@gmail.com')->send(new WeeklyReport("wELCOME!"));

        return "Email has been sent.";
    }
}
