<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubsecriberController extends Controller
{
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'email' => 'required|email|unique:subscribers,email'
        ]);

        return back()->with('status','The subscription process succeeded');
    }
}
