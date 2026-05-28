<x-mail::message>
# Booking Confirmed

Hi {{ $userName }},

Your session has been **confirmed**! Here are the details:

**Service:** {{ $serviceName }}
**Date & Time:** {{ $scheduledAt }}

@if($meetingLink)
**Meeting Link:** <a href="{{ $meetingLink }}">{{ $meetingLink }}</a>
@endif

<x-mail::button :url="$meetingLink ?? route('home')">
Join Session
</x-mail::button>

We look forward to supporting you on your healing journey.

With love,<br>
The MIBI Team<br>
*Where Love Faces Reality ❤️*
</x-mail::message>
