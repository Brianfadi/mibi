<x-mail::message>
# Welcome to MIBI, {{ $name }}!

Your registration has been **approved**! We are excited to have you on board.

Here are your login credentials:

**Email:** {{ $email }}
**Password:** {{ $password }}

<x-mail::button :url="route('login')">
Log In to Your Account
</x-mail::button>

We recommend changing your password after logging in.

With love,  
**The MIBI Team**  
*Where Love Faces Reality*
</x-mail::message>
