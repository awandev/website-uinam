$(document).ready(function() {
     
     
     /* ===== FullCalendar ==== */
     /* Ref: http://fullcalendar.io/ */
     
     $('#calendar').fullCalendar({
		header: {
			left: 'prev,next today',
			center: 'title',
			right: 'month,basicWeek,basicDay'
		},
		defaultDate: '2017-05-12',
		editable: true,
		eventLimit: true, // allow "more" link when too many events
		events: [
    		{
				title: 'Long Event',
				start: '2017-05-02',
				end: '2017-05-05',
				description: '<div class="meta"><ul class="list-inline meta-list"><li><i class="fa fa-clock-o" aria-hidden="true"></i>9am - 4pm</li><li><i class="fa fa-map-marker" aria-hidden="true"></i>Main Building</li></ul></div><p>Event description goes here lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis fringilla quam metus, a maximus diam rhoncus non. Mauris in consectetur est. Praesent ut nibh non justo pellentesque volutpat.</p><p><img class="img-responsive" src="assets/images/event-image-example.jpg" alt=""></p>'
			},
			{
				title: 'All Day Event',
				start: '2017-05-15',
				description: 'Event description goes here lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis fringilla quam metus, a maximus diam rhoncus non. Mauris in consectetur est. Praesent ut nibh non justo pellentesque volutpat. '
			},
			
			{
				title: 'Sports Day',
				start: '2017-05-11',
				description: '<div class="meta"><ul class="list-inline meta-list"><li><i class="fa fa-clock-o" aria-hidden="true"></i>9am - 4pm</li><li><i class="fa fa-map-marker" aria-hidden="true"></i>Main Building</li></ul></div><p>Event description goes here lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis fringilla quam metus, a maximus diam rhoncus non. Mauris in consectetur est. Praesent ut nibh non justo pellentesque volutpat.</p> '
			},
			{
				title: 'English Workshop',
				start: '2017-05-12T10:30:00',
				end: '2017-05-12T12:30:00',
				description: 'Event description goes here lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis fringilla quam metus, a maximus diam rhoncus non. Mauris in consectetur est. Praesent ut nibh non justo pellentesque volutpat. '
			},
			{
				title: 'Maths Workshop',
				start: '2017-05-12T13:30:00',
				end: '2017-05-12T14:30:00',
				description: 'Event description goes here lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis fringilla quam metus, a maximus diam rhoncus non. Mauris in consectetur est. Praesent ut nibh non justo pellentesque volutpat. '
			},
			{
				title: 'Science Workshop',
				start: '2017-05-12T14:30:00',
				end: '2017-05-12T15:30:00',
				description: 'Event description goes here lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis fringilla quam metus, a maximus diam rhoncus non. Mauris in consectetur est. Praesent ut nibh non justo pellentesque volutpat. '
			},
			{
				title: 'Drama Workshop',
				start: '2017-05-12T15:30:00',
				end: '2017-05-12T16:30:00',
				description: 'Event description goes here lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis fringilla quam metus, a maximus diam rhoncus non. Mauris in consectetur est. Praesent ut nibh non justo pellentesque volutpat. '
			},
			{
				title: 'Music Workshop',
				start: '2017-05-12T15:30:00',
				end: '2017-05-12T16:30:00',
				description: 'Event description goes here lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis fringilla quam metus, a maximus diam rhoncus non. Mauris in consectetur est. Praesent ut nibh non justo pellentesque volutpat. '
			},
			{
				title: 'PTA Meeting',
				start: '2017-05-24T14:30:00',
				description: 'Event description goes here lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis fringilla quam metus, a maximus diam rhoncus non. Mauris in consectetur est. Praesent ut nibh non justo pellentesque volutpat. '
			},
			{
				title: 'Open Evening',
				start: '2017-05-12T20:00:00',
				description: 'Event description goes here lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis fringilla quam metus, a maximus diam rhoncus non. Mauris in consectetur est. Praesent ut nibh non justo pellentesque volutpat. '
			},
			{
				title: 'School Concert',
				start: '2017-02-13T07:00:00',
				description: 'Event description goes here lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis fringilla quam metus, a maximus diam rhoncus non. Mauris in consectetur est. Praesent ut nibh non justo pellentesque volutpat. '
			}

		],
        eventClick:  function(event, jsEvent, view) {
            
            $('#modalTitle').html(event.title);
            $('#modalBody').html(event.description);
            $('#fullCalModal').modal();
            if (event.url) {
                return false; //Prevent url opening
            }
        }
		
	});

});
