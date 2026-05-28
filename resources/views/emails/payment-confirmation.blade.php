<x-mail::message>
# Payment Confirmed

Hi {{ $userName }},

Your payment has been processed successfully.

**Amount:** {{ $currency }} {{ $amount }}
**Reference:** {{ $reference }}
**Payment Method:** {{ ucfirst($method) }}

Thank you for investing in your healing journey.

<x-mail::button :url="route('home')">
Visit MIBI
</x-mail::button>

With love,<br>
The MIBI Team<br>
*Where Love Faces Reality ❤️*
</x-mail::message>
