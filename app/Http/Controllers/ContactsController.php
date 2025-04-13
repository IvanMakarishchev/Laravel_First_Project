<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function index() {
        $contacts = Contact::find(1);
        dump($contacts->title);
        dump($contacts->content);
        dump($contacts->image);
    }
}
