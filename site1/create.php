<?php
require_once('config.php');
?>
<style>
header {
    background: rgb(46,48,53);
}
main{
    background: rgb(41,42,47);
}
header nav ul{
    margin: 0;
}
button{
   background:lightgray; border:none; border-radius:3px;
}
</style>
<html lang="en">
    <head>
        <?php require_once('includes/inc.head.php') ?>
        <title>Create Event</title>
    </head>
    <body>
        <header>
            <nav>
                <?php require_once('includes/inc.nav.php') ?>
            </nav>
        </header>
        <main>
            <div class="createEventWrap">
                <form class="createEventForm" action="post" method="/api/">
                    <button class="createEventBtn btn">
                        <i class="fa fa-mail" data-help="createEvent"></i>
                            Create Event
                        <i class="fa fa-dropdown-arrow"></i>
                    </button>
                    
                    <div class="eventNameInputWrap">
                        <label>Event Name</label>
                        <input type="text"/>
                    </div>   

                    <div class="locationInputWrap">
                        <label>Location</label>
                        <input type="text"/>
                    </div>   

                    <div class="dateTimeInputWrap">
                        <label>Date/Time</label>
                        <input type="date"/>
                        <input type="time"/>
                    </div>   

                    <div class="descriptionInputWrap">
                        <label>Description</label>
                        <textarea placeholder="Tell more about the event"></textarea>
                        
                    </div>  
                    <button class="btn">Create Event</button>
                </form>
            </div>
        </main>
    </body>
</html>