<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmation - Villaveh Gameview</title>
    <style>
        /* Global styles */
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', 'Helvetica Neue', Arial, sans-serif;
            background-color: #FDF9F3;
            color: #2C241A;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background: #ffffff;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(0,0,0,0.05);
        }
        .header {
            background: linear-gradient(135deg, #0A2463 0%, #0F766E 100%);
            padding: 40px 30px;
            text-align: center;
        }
        .header h1 {
            margin: 0;
            font-size: 28px;
            color: #D4AF37;
            font-weight: 600;
            letter-spacing: 1px;
        }
        .header p {
            margin: 10px 0 0;
            color: #e0e0e0;
            font-size: 16px;
        }
        .content {
            padding: 40px 30px;
        }
        .content h2 {
            font-size: 24px;
            color: #0A2463;
            margin-top: 0;
            margin-bottom: 20px;
            border-left: 4px solid #D4AF37;
            padding-left: 15px;
        }
        .details {
            background: #F8F5F0;
            border-radius: 12px;
            padding: 20px;
            margin: 20px 0;
        }
        .details p {
            margin: 10px 0;
            line-height: 1.5;
        }
        .details strong {
            color: #0F766E;
        }
        .button {
            display: inline-block;
            background-color: #D4AF37;
            color: #0A2463 !important;
            text-decoration: none;
            padding: 12px 30px;
            border-radius: 50px;
            font-weight: 600;
            margin: 20px 0;
            transition: all 0.3s ease;
        }
        .button:hover {
            background-color: #c4a131;
            transform: translateY(-2px);
        }
        .footer {
            background: #F8F5F0;
            padding: 20px 30px;
            text-align: center;
            font-size: 12px;
            color: #6c757d;
            border-top: 1px solid #e9ecef;
        }
        @media only screen and (max-width: 600px) {
            .header {
                padding: 30px 20px;
            }
            .content {
                padding: 30px 20px;
            }
            .details {
                padding: 15px;
            }
            .button {
                padding: 10px 25px;
            }
        }
    </style>
</head>
<body style="margin:0; padding:20px; background-color:#FDF9F3;">
    <div class="container">
        <div class="header">
            <h1>Villaveh Gameview</h1>
            <p>Luxury Redefined in Nakuru</p>
        </div>
        <div class="content">
            <h2>Booking Confirmation</h2>
            <p>Dear <strong>{{ $booking->user->name }}</strong>,</p>
            <p>Thank you for choosing Villaveh Gameview. Your booking has been successfully confirmed. We look forward to welcoming you!</p>

            <div class="details">
                <p><strong>Booking Reference:</strong> #{{ $booking->id }}</p>
                <p><strong>Room:</strong> {{ $booking->room->name }}</p>
                <p><strong>Check-in:</strong> {{ $booking->check_in->format('l, F j, Y') }} at {{ $booking->preferred_time ?? '2:00 PM' }}</p>
                <p><strong>Check-out:</strong> {{ $booking->check_out->format('l, F j, Y') }}</p>
                <p><strong>Nights:</strong> {{ $booking->check_out->diffInDays($booking->check_in) }}</p>
                <p><strong>Guests:</strong> {{ $booking->adults }} Adult(s), {{ $booking->children }} Child(ren)</p>
                <p><strong>Total:</strong> <span style="color:#0F766E; font-weight:bold;">Ksh. {{ number_format($booking->total_price, 2) }}</span></p>
                @if($booking->special_requests)
                    <p><strong>Special Requests:</strong> {{ $booking->special_requests }}</p>
                @endif
            </div>

            <p>If you need to modify or cancel your booking, please visit your account dashboard.</p>
            <p style="text-align:center;">
                <a href="/my-bookings" class="button">View My Bookings</a>
            </p>
            <p>For any assistance, feel free to contact our concierge at <a href="tel:+254110474109">+254 110 474 109</a> or reply to this email.</p>
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} Villaveh Gameview. All rights reserved.<br>
            Gameview Ridge, Nakuru City, Kenya</p>
        </div>
    </div>
</body>
</html>