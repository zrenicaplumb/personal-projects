
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
    <?php
        require_once('modules/createEventModule.php');
        
    ?>
    
    <script src="js/nav.js"></script>
    <script src="js/publicUserEvent.js"></script>
    <script src="js/homePage.js"></script>
    <?php if(isset($_SESSION['email'])){
        //  echo '<script src="js/privateUserEvent.js"></script>';
    }
    ?>
   

</html>