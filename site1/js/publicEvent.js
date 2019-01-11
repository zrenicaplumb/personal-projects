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
        if(this.invite_list){
            this.invite_list = this.invite_list.split(',');
        }
        else{
            this.invite_list = null;
        }
        
        
        var element = $('<div class="publicEvent">'+
                            '<h4>Event Name:  <em>'+this.name+'</em></h4>'+
                            '<h4>Event type:  <em>'+this.event_type+'</em></h4>'+
                            (this.invite_list ? '<h4>Invite List:  '+
                                this.invite_list.map(function(person){
                                    return '<span class="templateTag">'+person+'</span>'
                                }) : ' ') +
                            '</em></h4>'+
                            '<h4>Location:  <em>'+this.location+'</em></h4>'+
                            '<h4>Date:  <em>'+this.date+'</em></h4>'+
                            '<h4>Time:  <em>'+this.time+'</em></h4>'+
                            '<h4>Description:  <em>'+this.description+'</em></h4>'+
                            (this.tags ? '<h4 class="tagWrap">Tags:  <em>'+
                                this.tags.map(function(tag){
                                    return '<span class="templateTag"> '+tag+'</span>'
                                }) : ' ')+  
                            '</em></h4>'+
                            (this.user_email ? '<button class="deleteEventBtn">Delete</button>' : '<button class="deleteEventBtn" style="display:none;">Delete</button>')+
                            
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
                self.delete();
        })
    },
    delete:function(){
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
                        self.element.remove();
                    }
                }
        })
    }

  }