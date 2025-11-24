<div id="calendar"></div>

<link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/main.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/main.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const calendar = new FullCalendar.Calendar(document.getElementById('calendar'), {
        initialView: 'dayGridMonth',
        height: 'auto',

        events: @json(
            \App\Models\Booking::with('room')->get()->map(function($b) {
                return [
                    'title' => $b->room->name . ' - ' . $b->full_name,
                    'start' => $b->check_in,
                    'end' => $b->check_out,
                ];
            })
        )
    });

    calendar.render();
});
</script>
