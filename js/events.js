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
                events: 'EventAction.php',
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
                    var title = "";
                    var start = $.fullCalendar.formatDate(start, "MM/DD/Y hh:mm:ss A");
                    var end = $.fullCalendar.formatDate(end, "MM/DD/Y hh:mm:ss A");
                    document.getElementById("startevent").value = start;
                    document.getElementById("endevent").value = start;
      
                    $.ajax(
                        {
                            url:"EventAction.php",
                            type:"POST",
                            data:{title:title, start:start, end:end,act:'select'},
                            success:function (data) {  
                                       //$('#service_detail').html(data);  
                                       $('#add_model').modal("show");  
                            }  
                        }
                    )
                },
                editable:true,
                eventResize:function (event) {
                    var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                    var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                    var title = event.title;
                    var id = event.id;
                    $.ajax(
                        {
                            url:"EventAction.php",
                            type:"POST",
                            data:{title:title, start:start, end:end, id:id,act:'update'},
                            success:function () {
                                   calendar.fullCalendar('refetchEvents');
                                   alert('Event Updated');
                            }
                        }
                    )
                },
 
                eventDrop:function (event) {
                    var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                    var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                    var title = event.title;
                    var id = event.id;
                    $.ajax(
                        {
                            url:"EventAction.php",
                            type:"POST",
                            data:{title:title, start:start, end:end, id:id,act:'update'},
                            success:function () {
                                   calendar.fullCalendar('refetchEvents');
                                   alert("Event Updated");
                            }
                        }
                    );
                },
 
                eventClick:function (event) {
    
                    /*if(confirm("Are you sure you want to remove it?"))
                    {
                    var id = event.id;
                    $.ajax({
                    url:"EventDelete.php",
                    type:"POST",
                    data:{id:id},
                    success:function()
                    {
                    calendar.fullCalendar('refetchEvents');
                    alert("Event Removed");
                    }
                    })
                    }*/
                    var id = event.id;
                    $.ajax(
                        {
                            url:"EventAction.php",
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
    
