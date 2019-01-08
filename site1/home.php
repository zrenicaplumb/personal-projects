
<?php
    require_once('config.php');
    
?>
<html lang="en">
    <head>
        <?php 
            require_once('includes/inc.head.php') ;
        ?>
        <title>Create Event</title>
    </head>
    <body>
        <header>
           <?php require_once('inc.header.php') ?>
            
            
        </header>
        <main>
            <div class="container">
                <div class="eventBoardWrap">
                <?php if(!isset($_SESSION['email'])){
                    
                }
                ?>
                    <!-- <div class="userEvent">

                        <h4>User Event</h4>
                        <h4>this.type</h4>
                        <h4>this.name</h4>
                        <h4>this.location</h4>
                        <h4>this.date</h4>
                        <h4>this.time</h4>
                        <h4>this.description</h4>
                    </div> -->
                </div>
            </div>
            
        </main>
        <footer>

        </footer>
    </body>
    
    
    <script src="js/nav.js"></script>
    <script src="js/publicEvent.js"></script>
    <script>
        var Page = {
            loggedIn:null,
            publicEvents:[],
            init:function(){
                this.getPublicEvents();
                // this.getPrivateUserEvents();
            },
            getPublicEvents:function(){
                var page = this;
                $.ajax({
                    url:'api.php',
                    data:{method:'getPublicEvents'},
                    dataType:'json',
                    success:function(result){
                        if(result.status == 'success'){
                            result.data.forEach(function(publicEvent){ 
                                console.log('user event',publicEvent);
                                page.publicEvents.push(PublicEvent.init(publicEvent, Page.loggedIn));
                            })
                            
                        }
                    }
                })
            },
        }

        Page.init();
    </script>
    <?php if(isset($_SESSION['email'])){
        //  echo '<script src="js/privateUserEvent.js"></script>';
    }
    ?>
   
<!-- dont show events on the home scroll unless they have an account and are logged in. -->
<!-- if they are logged in, show all the public events, -->
<!-- if they are logged in, show all the private events that they are invited to -->
<!-- on the create module be able to add/invite friends to the private event that only they can see.-->
<!-- on profile page be able to add friends. use fb api.-->

</html>
