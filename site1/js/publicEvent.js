var PublicEvent = {
            
    container: $('.eventBoardWrap'),
    init:function(publicEvent, loggedIn=false){

        if(loggedIn){
            this.loggedIn = true;
        }
        var publicEvent = Object.assign(Object.create(this), publicEvent);
        publicEvent.render();
        return publicEvent;
        
    },
    render:function(){
        if(this.tags){
            this.tags = this.tags.split(' ');
        }
        else{
            this.tags = null;
        }
        var element = $('<div class="publicEvent">'+
                            '<h4>User Event</h4>'+
                            '<h4>'+this.event_type+'</h4>'+
                            '<h4>'+this.user_email+'</h4>'+

                            '<h4>'+this.name+'</h4>'+
                            '<h4>'+this.location+'</h4>'+
                            '<h4>'+this.date+'</h4>'+
                            '<h4>'+this.time+'</h4>'+
                            '<h4>'+this.description+'</h4>'+
                            (this.tags != null ? '<h4 class="tagWrap">'+
                                this.tags.map(function(tag){
                                    return '<span class="templateTag"> '+tag+'</span>'
                                }) : ' ')+
                            '</h4>'+
                            '<img src="'+this.image+'"/>'+
                            '<button class="deleteEventBtn">Delete</button>'+
                        '</div>');
        if(this.element){
            this.element.replaceWith(element);
        }
        
        this.element = element;                      
        element.appendTo(this.container);
        this.listeners();
    },
    listeners:function(){
        var self = this;
        // console.log(this.element);
        this.element.find('.deleteEventBtn').on('click', function(e){
                self.remove();
        })
    },
    remove:function(){
        var self = this;
        $.ajax({
                url:'api.php',
                data:{
                    event_id: self.event_id,
                    method: 'deleteUserEvent'
                },
                dataType:'json',
                success:function(result){
                    if(status == 'success'){
                    }
                }
        })
    }

  }