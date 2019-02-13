var ProfileEvent = {
            
    container: $('.eventBoardWrap'),
    init:function(profileEvent, loggedIn=false){

        if(loggedIn){
            this.loggedIn = true;
        }
        var profileEvent = Object.assign(Object.create(this), profileEvent);
        profileEvent.render();
        return profileEvent;
        
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
        
        
        var element = $('<div class="profileEvent">'+
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
                            '<button class="inviteBtn">Invite some peeps: <i class="far fa-envelope"></i></button>'+
                            (this.user_email ? '<button class="deleteEventBtn">Delete</button>' : '<button class="deleteEventBtn" style="display:none;">Delete</button>')+
                            
                        '</div>');

        var invitePopup = $('<div class="invitePopupShadow">'+
                            '</div>'+
                            '<div class="popupBox">'+
                                '<form>'+
                                    '<input type="text" class="inviteList"/>'+
                                    '<button class="inviteListBtn">Invite</button>'+
                                '</form>'+
                                
                            '</div>');

        
        if(this.element){
            this.element.replaceWith(element);
        }
        if(this.invitePopup){
            this.invitePopup.replaceWith(invitePopup);
        }
        
        this.element = element;       
        this.invitePopup = invitePopup;                      
               
        element.appendTo(this.container);
        invitePopup.appendTo(this.container);
        this.listeners();
    },
    listeners:function(){
        var self = this;
        this.invitePopup.find('.invitePopupShadow').on('click', function(){
            $(this).hide();
        })
        this.element.find('.deleteEventBtn').on('click', function(e){
            self.delete();
        })
        this.element.find('.inviteBtn').on('click', function(e){
            self.invitePopup.show();
        })
        this.invitePopup.find('.inviteListBtn').on('click', function(){
            
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