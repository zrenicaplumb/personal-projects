       $('.register').on('click', function(){
            $('.registerDropdown').show();
        })
        $('.loginDropdownToggle').on('click', function(){
            $('.loginDropdown').show();
        })
        $('.loginDropdown form').on('submit', function(e){
            e.preventDefault();
            var email = $(this).find('input[name="email"]').val();
            var password = $(this).find('input[type="password"]').val();
            // $('.createEventForm .accountEmailWrap input').val() = email;
            console.log(email);
            var data = {
                  method:'userLogin',
                  email:email,
                  password:password,
            }
            $.ajax({
                  
                  url:'api.php',
                  data:data,
                  dataType:'json',
                  success:function(result){
                        if(result.status='success'){
                              window.location.href="home.php";
                              
                             
                        }
                        
                        
                  }

            })
        })
        $('.loginCloseBtn').on('click', function(){
            $('.loginDropdown').hide();
        })
        $('.registerCloseBtn').on('click', function(){
            $('.registerDropdown').hide();

        })
        $('.registerDropdown form').on('submit', function(e){
            e.preventDefault();
            $('.registerDropdown').hide();
            var data = {
                username: $(this).find('input[name="username"]').val(),
                firstname: $(this).find('input[name="firstname"]').val(),

                email: $(this).find('input[name="email"]').val(),
                password: $(this).find('input[name="password"]').val(), 
                // account: Math.random(00000,99999),
                method:'userSignup',
            }
            $.ajax({
                  url:'api.php',
                  data:data,
                  dataType:'json',
                  success:function(result){
                        window.location.href="home.php";
                  }
            })
        })
        $('.createEventToggle').on('click', function(){
            $('.createEventForm').show();
        })
        $('.closeEventPopup').on('click', function(){
            $('.createEventForm').hide();
        });
        $('.createEventForm').on('submit', function(e){
            e.preventDefault();
            var tags = $(this).find('.hashtags').val();
            var invite_list = $(this).find('.inviteList').val();
            var event_type = $(this).find('.event_type').val();
            var user_email = $(this).find('.userEmail').val();
            console.log(user_email);
            var name = $(this).find('.name').val();
            var location = $(this).find('.location').val();
            var date = $(this).find('.date').val();
            var time = $(this).find('.time').val();
            var description = $(this).find('.description').val();
            var image = $(this).find('.image').val();
            // debugger;
          console.log(invite_list);
            var data = {
                  tags:tags,
                  user_email:user_email,
                  method:'createUserEvent',
                  event_type:event_type,
                  name:name,
                  location:location,
                  date:date,
                  time:time,
                  description: description,
                  image:image,
                  invite_list:invite_list,
            };
            $(this).hide();
            $.ajax({
                url:'api.php',
                data:data,
                
            //     files:data.files,
                dataType:'json',
                success:function(result){
                    if(result.status == 'success'){
                        console.log(result);
                        Page.homepageEvents.push(HomepageEvent.init(result.data));
                    }
                }
            })
       })
        $('.searchForm').on('submit', function(e){
            e.preventDefault();
            // console.log(Page.homepageEvents);
            // var searchableAttributes = [];
            // Page.homepageEvents.forEach(function(event){
            //     var description = event.description;
            //     var event_type = event.event_type;
            //     var location = event.location;
            //     var name = event.name;
            //     var tags = event.tags;
            //     searchableAttributes.push(description, event_type, location, name, tags);
            // })
            // console.log(searchableAttributes);
           console.log($(this).find('input').val());
           var search = $(this).find('input').val().toLowerCase();
           if(search){
               Page.homepageEvents.forEach(function(item){
                    var description = item.description.toLowerCase().indexOf(search) > -1;
                    if(description){
                        // item.element.
                    }
               })
           }
           searchableAttributes.forEach(function(item){
               
           })

        });