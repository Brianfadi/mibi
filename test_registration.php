<?php
require __DIR__ . '/vendor/autoload.php';
$app = require __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$response = $kernel->handle(
    Illuminate\Http\Request::create('/register', 'POST', [
        '_token' => csrf_token(),
        'full_name' => 'Test User',
        'age' => 25,
        'gender' => 'male',
        'country' => 'Kenya',
        'city' => 'Nairobi',
        'phone' => '+254700000000',
        'email' => 'test' . time() . '@example.com',
        'relationship_status' => 'Single',
        'challenge_type' => 'Heartbreak',
        'terms_accepted' => '1',
    ])
);
echo "Status: " . $response->getStatusCode() . "\n";
echo "Location: " . ($response->headers->get('Location') ?? 'none') . "\n";
$response->send();
