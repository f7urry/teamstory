@extends("layouts.app")
@section("title","Dashboard")
@section("content")
<hr/>
<div class="row">
    <div class="col-md-8">
        <div id='calendar'></div>
    </div>
</div>
@endsection
@push("styles")
    <link rel="stylesheet" href="{{url('/assets/plugins/fullcalendar/main.min.css')}}" />
    <link rel="stylesheet" href="{{url('/assets/plugins/fullcalendar-daygrid/main.min.css')}}" />
    <link rel="stylesheet" href="{{url('/assets/plugins/fullcalendar-timegrid/main.min.css')}}" />
    <link rel="stylesheet" href="{{url('/assets/plugins/fullcalendar-bootstrap/main.min.css')}}" />
@endpush
@push("scripts")
    <script src="{{url('/assets/plugins/fullcalendar/main.min.js')}}"></script>
    <script src="{{url('/assets/plugins/fullcalendar-daygrid/main.min.js')}}"></script>
    <script src="{{url('/assets/plugins/fullcalendar-timegrid/main.min.js')}}"></script>
    <script src="{{url('/assets/plugins/fullcalendar-interaction/main.min.js')}}"></script>
    <script src="{{url('/assets/plugins/fullcalendar-bootstrap/main.min.js')}}"></script>
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            $.get(`${base_url()}/api/vehiclebookings/list`,function(resp){
                $events=$.map(resp.data,function(v,i){
                    return {
                        title: v.code+"/"+v.vehicle.code,
                        start: v.date_from,
                        end: v.date_to,
                        url: base_url()+"/vehiclebookings/"+v.id
                    }
                });
                renderCalendar($events);
            });
        });
        function renderCalendar($events){
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                plugins: [ 'interaction', 'dayGrid', 'timeGrid' ],
                themeSystem: 'bootstrap4',
                defaultView: 'dayGridMonth',
                defaultDate: moment().format("Y-MM-DD"),
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                events: $events,
                /* [
                    {
                        title: 'All Day Event',
                        start: '2021-03-01'
                    },
                    {
                        title: 'Long Event',
                        start: '2021-03-07',
                        end: '2021-03-10'
                    },
                    {
                        groupId: '999',
                        title: 'Repeating Event',
                        start: '2021-03-09T16:00:00'
                    },
                    {
                        groupId: '999',
                        title: 'Repeating Event',
                        start: '2021-03-16T16:00:00'
                    },
                    {
                        title: 'Conference',
                        start: '2021-03-11',
                        end: '2021-03-13'
                    },
                    {
                        title: 'Meeting',
                        start: '2021-03-12T10:30:00',
                        end: '2021-03-12T12:30:00'
                    },
                    {
                        title: 'Lunch',
                        start: '2021-03-12T12:00:00'
                    },
                    {
                        title: 'Meeting',
                        start: '2021-03-12T14:30:00'
                    },
                    {
                        title: 'Birthday Party',
                        start: '2021-03-13T07:00:00'
                    },
                    {
                        title: 'Click for Google',
                        url: 'http://google.com/',
                        start: '2021-03-28'
                    }
                ] */
            });
            calendar.render();
        }
    </script>
@endpush