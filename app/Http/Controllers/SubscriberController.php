<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function store(Request $request)
    {
        // Fetch and Validate Data
        $data = $request->validate([
            'email' => 'required|email|unique:subscribers,email',
        ]);

        // Create New Record
        Subscriber::create($data);

        // Return To the Previous Page
        return back()->with('status', 'Subscribed Successfully');
    }
}
