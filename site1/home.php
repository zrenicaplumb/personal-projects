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
                    
    

       
        
  
    <?php if(isset($_SESSION['email'])){
         echo '<script> Page.init();</script>';
    }
    ?>
   
</html>
