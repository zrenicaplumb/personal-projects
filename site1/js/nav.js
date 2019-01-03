       $('.register').on('click', function(){
            $('.registerDropdown').show();
        })
        $('.loginDropdownToggle').on('click', function(){
            $('.loginDropdown').show();
        })
        $('.loginDropdown form').on('submit', function(e){
            e.preventDefault();
            var email = $(this).find('input[type="text"]').val();
            var password = $(this).find('input[type="password"]').val();
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
                              
                              
                              console.log(result);
                              
                              if(result.data.email == '' || result.data.email == null){
                                    console.log('no matching email');
                              }
                              if(result.data.password == '' || result.data.password == null){
                                    console.log('no matching pw');

                              }
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
            console.log(tags);
            var event_type = $(this).find('.event_type').val();
            var name = $(this).find('.name').val();
            var location = $(this).find('.location').val();
            var date = $(this).find('.date').val();
            var time = $(this).find('.time').val();
            var description = $(this).find('.description').val();
            var image = $(this).find('.image').val();
            var data = {
                  tags:tags,
                  method:'createUserEvent',
                  event_type:event_type,
                  name:name,
                  location:location,
                  date:date,
                  time:time,
                  description: description,
                  image:image,
            };
            console.log(event_type);
            $(this).hide();
            $.ajax({
                url:'api.php',
                data:data,
            //     files:data.files,
                dataType:'json',
                success:function(result){
                    if(result.status == 'success'){
                        console.log(result);
                        Page.publicUserEvents.push(PublicUserEvent.init(result));
                    }
                }
            })
       })