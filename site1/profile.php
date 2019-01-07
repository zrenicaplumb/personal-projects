
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
    
   <script>
      var Page = {
            init:function(){
                  
                  this.getUserEvents();
            },
            getUserEvents:function(){
                  var page = this;
                  $.ajax({
                        url:'api.php',
                        data:{
                              method:'getUserEvents',
                              // email:email,
                        },
                        dataType:'json',
                        success:function(result){
                              if(result.status=='success'){
                                    // var userField = UserField.init(result.data);
                                    // page.userFields.push(userField);
                              }
                        }
                  })
            },
            render: function(){

            }
      }
      Page.init();
   </script>
   

</html>