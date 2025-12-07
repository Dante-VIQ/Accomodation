<x-mail::message>
# Thank You for Contacting {{ $hotelName }}

Dear {{ $message->name }},

We have received your message and will get back to you within 24 hours.

**Here's a summary of your inquiry:**

**Subject:** {{ $message->subject }}
**Message:**
{{ Str::limit($message->message, 200) }}

**Our Contact Information:**
📍 Free Area Lanet, Nakuru City
📞 {{ $hotelPhone }}
✉️ {{ $hotelEmail }}

If you have any urgent inquiries, please call us directly at {{ $hotelPhone }}.

We look forward to assisting you with your request.

Best regards,
The Team at {{ $hotelName }}

<x-mail::subcopy>
This is an automated confirmation. Your message was received on {{ $message->created_at->format('F j, Y \a\t g:i A') }}.
</x-mail::subcopy>
</x-mail::message>
