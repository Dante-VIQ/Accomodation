<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Booking Notification - Villaveh Gameview</title>
    <style>
        body { margin:0; padding:20px; font-family: 'Segoe UI', Arial, sans-serif; background:#FDF9F3; }
        .container { max-width:600px; margin:0 auto; background:#fff; border-radius:16px; overflow:hidden; box-shadow:0 10px 25px rgba(0,0,0,0.05); }
        .header { background:linear-gradient(135deg, #0A2463, #0F766E); padding:40px 30px; text-align:center; }
        .header h1 { margin:0; font-size:28px; color:#D4AF37; font-weight:600; }
        .header p { margin:10px 0 0; color:#e0e0e0; }
        .content { padding:40px 30px; }
        .details { background:#F8F5F0; border-radius:12px; padding:20px; margin:20px 0; }
        .button { display:inline-block; background:#D4AF37; color:#0A2463; text-decoration:none; padding:12px 30px; border-radius:50px; font-weight:600; margin:20px 0; }
        .footer { background:#F8F5F0; padding:20px 30px; text-align:center; font-size:12px; color:#6c757d; border-top:1px solid #e9ecef; }
        @media only screen and (max-width:600px){ .content{padding:30px 20px;} .details{padding:15px;} }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>New Booking Alert</h1>
            <p>Action Required</p>
        </div>
        <div class="content">
            <h2 style="margin-top:0;">Guest Details</h2>
            <div class="details">
                <p><strong>Guest:</strong> {{ $booking->user->name }} ({{ $booking->user->email }})<br>
                <strong>Phone:</strong> {{ $booking->user->phone ?? 'N/A' }}</p>
                <p><strong>Room:</strong> {{ $booking->room->name }}<br>
                <strong>Dates:</strong> {{ $booking->check_in->format('M d, Y') }} - {{ $booking->check_out->format('M d, Y') }}<br>
                <strong>Nights:</strong> {{ $booking->check_out->diffInDays($booking->check_in) }}<br>
                <strong>Guests:</strong> {{ $booking->adults }} Adults, {{ $booking->children }} Children<br>
                <strong>Total:</strong> Ksh. {{ number_format($booking->total_price, 2) }}</p>
                @if($booking->special_requests)
                    <p><strong>Special Requests:</strong> {{ $booking->special_requests }}</p>
                @endif
            </div>
            <p>Please log in to the admin panel to manage this booking.</p>
            <p style="text-align:center;"><a href="{{ url('/admin') }}" class="button">Go to Admin Panel</a></p>
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} Villaveh Gameview<br>Gameview Ridge, Nakuru City, Kenya</p>
        </div>
    </div>
</body>
</html>