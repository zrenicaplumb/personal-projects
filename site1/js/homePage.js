
        var Page = {
            loggedIn:null,
            publicUserEvents:[],
            init:function(){
                this.getPublicUserEvents();
                // this.getPrivateUserEvents();
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
                                page.publicUserEvents.push(PublicUserEvent.init(publicUserEvent, Page.loggedIn));
                            })
                            
                        }
                    }
                })
            },
        }

        Page.init();