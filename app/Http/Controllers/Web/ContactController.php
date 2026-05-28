<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\StoreSubscriberRequest;
use App\Models\Contact;
use App\Models\Subscriber;
use App\Services\Notification\NotificationService;

class ContactController extends Controller
{
    public function __construct(
        private NotificationService $notificationService
    ) {}

    public function index()
    {
        return view('contacts.index');
    }

    public function store(StoreContactRequest $request)
    {
        $contact = Contact::create($request->validated());

        $this->notificationService->sendContactNotification($contact);

        return back()->with('success', 'Thank you for your message. We will get back to you soon!');
    }

    public function subscribe(StoreSubscriberRequest $request)
    {
        Subscriber::create([
            'email' => $request->email,
            'name' => $request->name,
            'subscribed_at' => now(),
            'subscribed_ip' => $request->ip(),
        ]);

        return back()->with('success', 'Welcome to the MIBI community! Check your email for your first relationship tip.');
    }

    public function unsubscribe(string $email)
    {
        $subscriber = Subscriber::where('email', $email)->firstOrFail();
        $subscriber->unsubscribe();

        return view('contacts.unsubscribed');
    }
}
