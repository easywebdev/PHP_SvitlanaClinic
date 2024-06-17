<?php

namespace App\Http\Controllers;

use Mail;
use App\Mail\SampleMail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;

class MailController extends Controller 
{
    /**
     * Try catch don't work if has SMTP errors like wrong host or port or etc.
     *
     * @param mixed $request
     * @return array
     */
    public function sendMail(Request $request)
    {
        $content = [
            'subject' => 'Web form:' . env('APP_NAME'),
            'name'    => $request->input('name'),
            'email'   => $request->input('email'),
            'body'    => $request->input('text'),
        ];

        try 
        {
            Mail::to(env('MAIL_TO'))->send(new SampleMail($content));
            return ['msg' => 'Email has been sent.'];
        }
        catch (Exception $ex)
        {
            return ['msg' => 'Email has not been sent.'];
        }
    }
}