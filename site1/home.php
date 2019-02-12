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
           <?php require_once('includes/inc.header.php') ?>
            
            
        </header>
        <main>
            <div class="container">
                <div class="eventBoardWrap">
                    <?php if(!isset($_SESSION['email'])){
                        echo '<h4>Log in to see all events.</h4>';
                    }
                    ?>
                </div>
            </div>
            
        </main>
        <footer>

        </footer>
    </body>
    
    
    <script src="js/nav.js"></script>
    <script src="js/homepageEvent.js"></script>

    <!-- <script src="js/publicEvent.js"></script> -->
    <script>
        var Page = {
            homepageEvents:[],
           
            init:function(){
                this.getHomepageEvents();
                
            },
            getHomepageEvents:function(){
                var page = this;
                $.ajax({
                    url:'api.php',
                    data:{  
                        method:'getHomepageEvents',
                    
                    },
                    dataType:'json',
                    success:function(result){
                        if(result.status == 'success'){
                            result.data.forEach(function(homepageEvent){
                                page.homepageEvents.push(HomepageEvent.init(homepageEvent, 'homepage'));
                            })
                            
                        }
                    }
                })
                console.log(this.homepageEvents);
            }
        }
        
        
    </script>
    <?php if(isset($_SESSION['email'])){
         echo '<script> Page.init();</script>';
    }
    ?>
   
<!-- dont show events on the home scroll unless they have an account and are logged in. -->
<!-- if they are logged in, show all the public events, -->
<!-- if they are logged in, show all the private events that they are invited to -->
<!-- on the create module be able to add/invite friends to the private event that only they can see.-->
<!-- on profile page be able to add friends. use fb api.-->

</html>
