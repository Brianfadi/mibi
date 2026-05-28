<x-mail::message>
# Booking Rescheduled

Hi {{ $userName }},

Your session has been rescheduled. Here are the updated details:

**Service:** {{ $serviceName }}
**New Date & Time:** {{ $scheduledAt }}

Please make sure to update your calendar accordingly.

<x-mail::button :url="route('bookings.index')">
View My Bookings
</x-mail::button>

With love,<br>
The MIBI Team<br>
*Where Love Faces Reality ❤️*
</x-mail::message>
