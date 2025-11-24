<h2>New Booking Received</h2>

<p><strong>Name:</strong> {{ $booking->full_name }}</p>
<p><strong>Phone:</strong> {{ $booking->phone }}</p>
<p><strong>Room:</strong> {{ $booking->room->name }}</p>
<p><strong>Check-In:</strong> {{ $booking->check_in }}</p>
<p><strong>Check-Out:</strong> {{ $booking->check_out }}</p>
<p><strong>Adults:</strong> {{ $booking->adults }}</p>
<p><strong>Children:</strong> {{ $booking->children }}</p>
<p><strong>Time:</strong> {{ $booking->time }}</p>
