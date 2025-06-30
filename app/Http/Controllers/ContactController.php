<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(StoreContactRequest $request)
    {
        $validatedData = $request->validated();
        Contact::create($validatedData);
        return back()->with('succes','Messsage Sending Succefull');
    }
}
