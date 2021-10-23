$(document).ready(function(){
    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        },
        vale:'asd',
    });

    $('#calendar').fullCalendar({
        editable:true,
        header:{
            left:'prev,next today',
            center:'title',
            right:'month,agendaWeek,agendaDay'
        },
        displayEventTime: true,
        selectable:true,
        selectHelper:true,
        editable:true,
        eventLimit: false, // allow "more" link when too many events
        navLinks: true,
        events: '/'

    });

});

