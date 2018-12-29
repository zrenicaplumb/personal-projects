
        var Page = {
            publicUserEvents:[],
            init:function(){
                this.getPublicUserEvents();
            },
            getPublicUserEvents:function(){
                var page = this;
                $.ajax({
                    url:'api.php',
                    data:{method:'getPublicUserEvents'},
                    dataType:'json',
                    success:function(result){
                        if(result.status == 'success'){
                            result.data.forEach(function(publicUserEvent){
                                  console.log('user event',publicUserEvent);
                                page.publicUserEvents.push(PublicUserEvent.init(publicUserEvent));
                            })
                            
                        }
                    }
                })
            },
        }

      //   turn the tags string gotten from db into Array
        
      //   loop over and display each tag in Array and add a hashtag to beginning if it doesnt have one
      //   display each tag
        var PublicUserEvent = {
            container: $('.eventBoardWrap'),
            init:function(userEvent){
                var userEvent = Object.assign(Object.create(this), userEvent);
                userEvent.render();
                return userEvent;
                
            },
            render:function(){
                  this.tags = this.tags.split(' ');
                  // console.log(this.tags);
                  // var newTag = this.tags.forEach(function(tag){
                  //       var newTag = $('<span>'+this.tag+'</span>');
                  //       return newTag;
                  // });
                  // console.log('newtag',newTag);
                  console.log(this.tags);

                  var element = $('<div class="userEvent">'+
                                    '<h4>User Event</h4>'+
                                    '<h4>'+this.event_type+'</h4>'+
                                    '<h4>'+this.name+'</h4>'+
                                    '<h4>'+this.location+'</h4>'+
                                    '<h4>'+this.date+'</h4>'+
                                    '<h4>'+this.time+'</h4>'+
                                    '<h4>'+this.description+'</h4>'+
                                    '<h4 class="tagWrap">'+this.tags.map(function(tag){
                                          return '<span class="templateTag"> '+tag+' </span> '
                                    })+
                                    
                                    '</h4>'+
                                    '<img src="'+this.image+'"/>'+
                                    '<button class="deleteEventBtn">Delete</button>'+
                                '</div>');
                                
                  element.appendTo(this.container);
                  this.listeners();
            },
            listeners:function(){
                  var self = this;
                  // console.log(this.element);
                  // this.element.find('.deleteEventBtn').on('click', function(e){
                  //       self.remove();
                  // })
            },
            remove:function(){
                  $.ajax({
                        url:'api.php',
                        data:{method:'deleteUserEvent'},
                        dataType:'json',
                        success:function(result){
                              if(status == 'success'){
                                    console.log('deleted');
                              }
                        }
                  })
            }

        }
        Page.init();