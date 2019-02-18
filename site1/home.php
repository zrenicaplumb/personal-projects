<?php 
    require_once('config.php');
    
?>
<style>
.homepageEvent{
    background: rgb(46,48,53);
    margin: 20px;
    padding: 20px;
    border-radius: 3px;
    color:gray;
    width: 50%;
    
}

.homepageEvent h4{
    font-size:14px;
}
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
                    
    <script src="js/homepageEvent.js"></script>
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
   
</html>
