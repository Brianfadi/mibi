<x-mail::message>
# New Contact Message

You have received a new message from the MIBI website.

**Name:** {{ $name }}
**Email:** {{ $email }}
@if($phone)**Phone:** {{ $phone }}@endif
**Subject:** {{ $subject ?? 'N/A' }}

**Message:**
{{ $message }}

<x-mail::button :url="route('admin.contacts.index')">
View in Dashboard
</x-mail::button>
</x-mail::message>
