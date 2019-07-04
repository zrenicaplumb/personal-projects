var HomepageEvent = {
            
    container: $('.eventBoardWrap'),
    init:function(homepageEvent, homepage){

      if(homepage){
            this.homepage = homepage;
      }
      
      var homepageEvent = Object.assign(Object.create(this), homepageEvent);
      homepageEvent.render();
      return homepageEvent;
        
    },
    render:function(){
        var self = this;
        if(this.tags){
            this.tags = this.tags.split(' ');
        }
        else{
            this.tags = null;
        }
        
        var element = $('<div class="homepageEvent">'+
                            '<div class="eventPicture">'+this.image+'</div>'+
                            '<h4>Event Name:  <em>'+this.name+'</em></h4>'+
                            '<h4>Event type:  <em>'+this.event_type+'</em></h4>'+
                            '<h4>Location:  <em>'+this.location+'</em></h4>'+
                            '<h4>Date:  <em>'+this.date+'</em></h4>'+
                            '<h4>Time:  <em>'+this.time+'</em></h4>'+
                            '<h4>Event host email:  <em>'+this.user_email+'</em></h4>'+
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
        if(self.homepage){
            self.element.find('.homepageEvent').css({
                  'background':'red'
            })
        }
        
        this.listeners();
    },
    listeners:function(){
        var self = this;
        // console.log(this.element);
        this.element.find('.deleteEventBtn').on('click', function(e){
                self.delete();
        })
        
    },
    update:function(){

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