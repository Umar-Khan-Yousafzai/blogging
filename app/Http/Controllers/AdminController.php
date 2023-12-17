<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function adminDashboard() {
                return view('admin.content.dashboard');
            }
    public function contactList()
    {
        $contacts = Contact::all();
        return view('admin.content.contact.list',compact('contacts'));
    }
}
