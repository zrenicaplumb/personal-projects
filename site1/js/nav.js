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
            console.log(data);
            $.post('api.php/userSignup', data, function(result){
                console.log(result);
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
            var name = $(this).find('.name').val();
            var location = $(this).find('.location').val();
            var date = $(this).find('.date').val();
            var time = $(this).find('.time').val();
            var description = $(this).find('.description').val();
            var image = $(this).find('.image').val();
            var data = {
                    method:'createUserEvent',
                    name:name,
                    location:location,
                    date:date,
                    time:time,
                    description: description,
                    image:image,
            };
            $(this).hide();
            $.ajax({
                url:'api.php',
                data:data,
                files:data.files,
                dataType:'json',
                success:function(result){
                   debugger;
                    if(result.status == 'success'){
                        console.log(result);
                        Page.userEvents.push(UserEvent.init(result));
                    }
                }
            })
       })