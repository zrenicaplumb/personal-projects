
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
                <h2><?=$_SESSION['username']."'s"?> Events</h2>
                    
                </div>
            </div>
            
        </main>
        
        <footer>
            <?php if(isset($_SESSION['email'])){
                
                  echo '<form method="post" class="deleteProfileForm">
                              <button class="deleteProfileBtn" href="logout.php">Delete Profile</button>
                        </form>';
                  
                
                  
            } ?>
        </footer>
    </body>
   
    <script src="js/nav.js"></script>
    <script src="js/publicEvent.js"></script>

   <script>
      var Page = {
            publicEvents:[],
            init:function(){
                  
                  this.getUserEvents();
            },
            getUserEvents:function(){
                  var page = this;
                  $.ajax({
                        url:'api.php',
                        data:{
                              method:'getUserEvents',
                        },
                        dataType:'json',
                        success:function(result){
                              if(result.status=='success'){
                                    result.data.forEach(function(publicEvent){ 
                                          console.log(publicEvent);
                                          page.publicEvents.push(PublicEvent.init(publicEvent));
                                    })
                              }
                        }
                  })
            },
            render: function(){

            },
            listeners:function(){

            }
      }
      Page.init();
      $('.deleteProfileForm').on('submit', function(e){
            e.preventDefault();
            $.ajax({
                  url:'api.php',
                  data:{
                        method:'deleteUser'
                  },
                  dataType:'json',
                  success:function(result){
                        if(result.status = 'success'){
                              console.log('user deleted');
                              window.location.href='logout.php';
                        }
                  }
            })
      });
   </script>
  

</html>