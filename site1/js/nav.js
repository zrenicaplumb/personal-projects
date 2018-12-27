       $('.register').on('click', function(){
            $('.registerDropdown').show();
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
            var event_type = $(this).find('.event_type').val();
            var name = $(this).find('.name').val();
            var location = $(this).find('.location').val();
            var date = $(this).find('.date').val();
            var time = $(this).find('.time').val();
            var description = $(this).find('.description').val();
            var image = $(this).find('.image').val();
            var data = {
                  
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
                        Page.userEvents.push(UserEvent.init(result));
                    }
                }
            })
       })