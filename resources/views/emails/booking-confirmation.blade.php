<x-mail::message>
# Booking Received

Hi {{ $userName }},

Thank you for booking a session with MIBI! We have received your request and will confirm shortly.

**Service:** {{ $serviceName }}
**Date & Time:** {{ $scheduledAt }}
**Session Type:** {{ ucfirst($sessionType) }}
**Booking ID:** #{{ $bookingId }}

While you wait, feel free to explore our blog for relationship tips and insights.

<x-mail::button :url="route('blog.index')">
Read Our Blog
</x-mail::button>

With love,<br>
The MIBI Team<br>
*Where Love Faces Reality ❤️*
</x-mail::message>
