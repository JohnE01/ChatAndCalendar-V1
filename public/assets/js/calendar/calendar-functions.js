// calendar-functions.js<script>
    $(document).ready(function () {
        var SITEURL = "{{ url('/') }}";

        $('#calendar').fullCalendar({
            editable: true,
            events: SITEURL + "/fullcalendar", // Update with your events endpoint
            displayEventTime: true,
            eventRender: function (event, element, view) {
                var title = event.title ? event.title : '';
            },
            dayRender: function (date, cell) {
                var events = $('#calendar').fullCalendar('clientEvents');
                var eventTitles = events
                    .filter(event => moment(date).isSame(event.start, 'day'))
                    .map(event => event.title);

                if (eventTitles.length > 0) {
                    var html = '<div class="fc-content">';
                    eventTitles.forEach(title => {
                        html += '<span class="fc-title">' + title + '</span><br>';
                    });
                    html += '</div>';
                    cell.append(html);
                }

                // Add click event to the cell to redirect to the 'events.create' route
                cell.on('click', function () {
                    window.location.href = SITEURL + '/events/create?date=' + moment(date).format("YYYY-MM-DD");
                });
            }
        });

        function displayMessage(message) {
            toastr.success(message, 'Event');
        }
    });