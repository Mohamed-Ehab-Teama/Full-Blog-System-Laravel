<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(StoreContactRequest $request)
    {
        // Fetch and Validate Data
        $data = $request->validated();

        // Create New Record
        Contact::create($data);

        // Return To the Previous Page
        return back()->with('status-message', 'Message Sent Successfully');
    }
}
