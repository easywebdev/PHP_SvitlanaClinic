<?php

namespace App\Http\Controllers;

use App\Models\Contact;

class ContactsController extends Controller 
{
    public function getContacts() 
    {
        $page = Contact::find(1)->all()[0];
        
        return view('contacts', [
            'page'  => $page,
        ]);
    }
}