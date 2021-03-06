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
                    <form class="createEventForm" action="post" enctype="multipart/form-data">
                        <div class="eventUserEmailWrap">
                                <input type="hidden" name="user_email" class="userEmail" value="<?php echo $_SESSION['email'];?>" />
                        </div>
                        <div class="eventTypeInputWrap">
                                <label>Event Type</label>
                                <select name="event_type">
                                    <option>Private</option>
                                    <option>Public</option>
                                </select>
                        </div>
                        <div class="eventNameInputWrap">
                                <label>Event Name</label>
                                <input type="text" name="name" class="name"/>
                        </div>
                        <div class="locationInputWrap">
                                <label>Location</label>
                                <input type="text" name="location" class="location"/>
                        </div> 
                        <div class="dateInputWrap">
                                <label>Date</label>
                                <input type="date" name="date" class="date"/>
                        </div>
                        <div class="timeInputWrap">
                                <label>Time</label>
                                <input type="time" name="time" class="time"/>
                        </div>
                        <div class="descriptionInputWrap">
                                <label>Description</label>
                                <textarea placeholder="Tell more about the event" name="description"  class="description"></textarea>
                        </div>
                        <div class="eventTagsWrap">
                                <label>Tags</label>
                                <input type="text" name="tags" class="tags"/>
                        </div>
                        <div class="inviteListWrap">
                                <label>Invite List</label>
                                <input type="text" name="inviteList" class="inviteList"/>
                        </div>
                        <div class="imageInputWrap">
                                <label>Images</label>
                                <input type="file" placeholder="Tell more about the event" name="image"  class="eventImage"/>
                                
                        </div>
                        <button class="btn createEventBtn">Create Event</button>
                        <a class="btn closeEventPopup">Close</a>

                    </form>

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
            $(this).hide();
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
            $.ajax({
                url:'api.php',
                data:data,
                dataType:'json',
                success:function(result){
                    if(result.status == 'success'){
                        console.log(result);
                        
                    }
                }
            })
       })
        
    </script>
</html>