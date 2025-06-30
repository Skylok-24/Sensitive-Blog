<?php

namespace App\Http\Controllers;

use App\Models\Subsecriber;
use Illuminate\Http\Request;

class SubsecriberController extends Controller
{
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'email' => 'required|email|unique:subsecribers,email'
        ]);

        Subsecriber::create($validateData);
        return back()->with('status','The subscription process succeeded');
    }
}
