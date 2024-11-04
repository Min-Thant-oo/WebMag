<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactMessageIndexRequest;
use App\Models\ContactMessage;

class ContactMessageController extends Controller
{
    public function index(ContactMessageIndexRequest $request)
    {
        $contact_messages = ContactMessage::select(['id', 'email', 'subject', 'message', 'created_at'])
            ->filter($request->validated())
            ->orderBy('created_at', 'desc')
            ->paginate($request->get('per_page') ?? 10);

        return view('admin.contact-message.index', [
            'contact_messages'  => $contact_messages,
        ]);
    }

    public function show(ContactMessage $contactmessage)
    {
        return view('admin.contact-message.show', [
            'title'         => $contactmessage->subject,
            'item'          => $contactmessage,
            'id'            => $contactmessage->id,
        ]);
    }
}
