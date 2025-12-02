<x-mail::message>
# New Contact Form Submission

You have received a new message through the contact form on your website.

**From:** {{ $message->name }}  
**Email:** {{ $message->email }}  
**Phone:** {{ $message->phone ?? 'Not provided' }}  
**Subject:** {{ $message->subject }}  

**Message:**  
{{ $message->message }}

**Submitted:** {{ $message->created_at->format('F j, Y \a\t g:i A') }}  
**IP Address:** {{ $message->ip_address }}

<x-mail::button :url="route('admin.contact.show', $message->id)">
View Message in Admin Panel
</x-mail::button>

Please respond within 24 hours.

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>