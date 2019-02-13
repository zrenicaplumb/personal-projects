
<?php
    require_once('config.php');
    
?>
<style>

</style>
<html lang="en">
    <head>
        <?php 
            require_once('includes/inc.head.php') ;
        ?>
        <title>Create Event</title>
    </head>
    <body>
        <header>
            <?php require_once('includes/inc.header.php') ?>

            
            
        </header>
        <main>
            <div class="container">
                <h2>Create an event</h2>
                <div class="createEventWrap">
                    <?php require_once('createEventForm.php'); ?>

                </div>
            </div>
            
        </main>
        <footer>

        </footer>
    </body>

    <script>
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
            var name = $(this).find('.name').val();
            var location = $(this).find('.location').val();
            var date = $(this).find('.date').val();
            var time = $(this).find('.time').val();
            var description = $(this).find('.description').val();
            var image = $(this).find('.eventImage').val();
            
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
            console.log(data.invite_list);
            $(this).hide();
            $.ajax({
                url:'api.php',
                data:data,
                dataType:'json',
                success:function(result){
                    if(result.status == 'success'){
                        console.log(result);
                        Page.homepageEvents.push(HomepageEvent.init(result.data));
                    }
                }
            })
       })
        
    </script>
</html>