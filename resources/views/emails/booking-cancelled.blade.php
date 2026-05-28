<x-mail::message>
# Booking Cancelled

Hi {{ $userName }},

Your booking for **{{ $serviceName }}** on **{{ $scheduledAt }}** has been cancelled as requested.

If you'd like to reschedule, you can book a new session anytime.

<x-mail::button :url="route('bookings.create')">
Book Again
</x-mail::button>

We're here whenever you're ready.

With love,<br>
The MIBI Team<br>
*Where Love Faces Reality ❤️*
</x-mail::message>
