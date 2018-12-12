<script>
var EventForm = {
    container: $('.createEventWrap'),
    init:function(){
        var eventForm = Object.create(this);
        this.render();
    },
    render:function(){
        var eventForm = this;
        var element = $('<form class="createEventForm" action="post" method="/api/">'+
                            '<button class="createEventBtn btn">'+
                                '<i class="fa fa-mail" data-help="createEvent"></i>'+
                                    'Event Type'+
                                '<i class="fa fa-dropdown-arrow"></i>'+
                            '</button>'+
                            
                            '<div class="eventNameInputWrap">'+
                                '<label>Event Name</label>'+
                                '<input type="text"/>'+
                            '</div>' +

                            '<div class="locationInputWrap">'+
                                '<label>Location</label>'+
                                '<input type="text"/>'+
                            '</div>'+   

                            '<div class="dateInputWrap">'+
                                '<label>Date</label>'+
                                '<input type="date"/>'+
                            '</div>' +

                            '<div class="timeInputWrap">'+
                                '<label>Time</label>'+
                                '<input type="time"/>'+
                            '</div>' +

                            '<div class="descriptionInputWrap">'+
                                '<label>Description</label>'+
                                '<textarea placeholder="Tell more about the event"></textarea>'+
                                
                            '</div>'+  
                            '<button class="btn">Create Event</button>'+
                        '</form>');

        
        element.appendTo(this.container);
    }
    
}
</script>

