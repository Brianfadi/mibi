<x-mail::message>
# Session Reminder

Hi {{ $userName }},

This is a friendly reminder that your MIBI session is coming up!

**Service:** {{ $serviceName }}
**Date & Time:** {{ $scheduledAt }}

@if($meetingLink)
**Meeting Link:** <a href="{{ $meetingLink }}">{{ $meetingLink }}</a>
@endif

**Tips for your session:**
- Find a quiet, private space
- Have a notebook ready
- Be open and honest
- Come with questions

<x-mail::button :url="$meetingLink ?? route('home')">
Join Session
</x-mail::button>

See you soon!<br>
The MIBI Team<br>
*Where Love Faces Reality ❤️*
</x-mail::message>
