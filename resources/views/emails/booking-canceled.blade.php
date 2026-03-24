<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Cancellation - Villaveh Gameview</title>
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
            <h1>Booking Cancelled</h1>
            <p>We're sorry to see you go</p>
        </div>
        <div class="content">
            <h2>Dear {{ $booking->user->name }},</h2>
            <p>Your booking at Villaveh Gameview has been cancelled as requested.</p>

            <div class="details">
                <p><strong>Booking Reference:</strong> #{{ $booking->id }}</p>
                <p><strong>Room:</strong> {{ $booking->room->name }}</p>
                <p><strong>Check-in:</strong> {{ $booking->check_in->format('M d, Y') }}</p>
                <p><strong>Check-out:</strong> {{ $booking->check_out->format('M d, Y') }}</p>
            </div>

            <p>If this cancellation was made in error, please contact us immediately to reinstate your booking.</p>
            <p>We hope to welcome you in the future!</p>

            <p style="text-align:center;"><a href="{{ route('my-bookings') }}" class="button">View My Bookings</a></p>
            <p>Thank you for considering Villaveh Gameview.</p>
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} Villaveh Gameview<br>Gameview Ridge, Nakuru City, Kenya</p>
        </div>
    </div>
</body>
</html>