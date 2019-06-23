$(document).ready(
    function () {
        var calendar = $('#calendar').fullCalendar(
            {
                editable:true,
                header:{
                    left:'prev,next today',
                    center:'title',
                    right:'month,agendaWeek,agendaDay'
                },
                events: 'FacilityAction.php',
                selectable:true,
                selectHelper:true,
                select: function (start, end, allDay) {
                     /*
                    var title = prompt("Enter Event Title");
                    if(title)
                    {
                    var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
                    var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
                    $.ajax({
                    url:"EventInsert.php",
                    type:"POST",
                    data:{title:title, start:start, end:end},
                    success:function()
                    {
                    calendar.fullCalendar('refetchEvents');
                    alert("Added Successfully");
                    }
                    })
                    }*/
                },
                editable:true,
                eventResize:function (event) {
                     /*
                    var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                    var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                    var title = event.title;
                    var id = event.id;
                    $.ajax({
                    url:"EventUpdate.php",
                    type:"POST",
                    data:{title:title, start:start, end:end, id:id},
                    success:function(){
                    calendar.fullCalendar('refetchEvents');
                    alert('Event Updated');
                    }
                    })*/
                },
 
                eventDrop:function (event) {
                     /*
                    var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                    var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                    var title = event.title;
                    var id = event.id;
                    $.ajax({
                    url:"EventUpdate.php",
                    type:"POST",
                    data:{title:title, start:start, end:end, id:id},
                    success:function()
                    {
                    calendar.fullCalendar('refetchEvents');
                    alert("Event Updated");
                    }
                    });*/
                },
 
                eventClick:function (event) {
                    var id = event.id;
                    $.ajax(
                        {
                            url:"FacilityAction.php",
                            type:"POST",
                            data:{id:id,act:'select'},
                            success:function (data) {  
                                $('#service_detail').html(data);  
                                $('#dataModal').modal("show");  
                            }  
                        }
                    )
                },
 
            }
        );
    }
);
    
