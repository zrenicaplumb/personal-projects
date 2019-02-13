
<?php
    require_once('config.php');
    
?>
<style>
.inviteBtn{display:block; margin:20px 0; background:#fff; padding:5px 10px; cursor:pointer;}
.profileEvent{background: rgb(46,48,53); width: 85%; margin: 25px auto; padding: 20px; border-radius: 3px; color:gray; width: 30%; padding: 28px;}
.invitePopupShadow {display: none;position: fixed;z-index: 1;left: 0;top: 0;width: 100%;height: 100%;overflow: auto;background-color: rgba(0,0,0,0.4);}
.popupBox{display:none;  background-color: #fefefe;margin: 15% auto; padding: 20px;border: 1px solid #888;width: 80%;position: relative;top: -460px;z-index:10;}

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
            <?php if(isset($_SESSION['email'])){
                
                echo '<form method="post" class="deleteProfileForm">
                            <button class="deleteProfileBtn" href="logout.php">Delete Profile</button>
                      </form>';
            } ?>
            
        </header>
        <main>
            <div class="container">
                  <h2>
                      <?=(isset($_SESSION['username']) ? $_SESSION['username'] . "'s events" : 'Log in to see profile events. ')?>
                  </h2>
                  <form>
                        <input type="text" class="friendSearch"/>
                        
                  </form>
                <div class="eventBoardWrap">
                  <?php if(!isset($_SESSION['email'])){
                        
                  }
                  ?>
                </div>
            </div>
            
        </main>
        <footer>

        </footer>
    </body>
   
    <script src="js/profileEvent.js"></script>

   <script>
         $('.friendSearch').on('change', function(e){
               e.preventDefault(e);
               var search = $(this).val();
               $.ajax({
                     url:'api.php',
                     data:{
                           email:search,
                           method:'friendSearch',
                           dataType:'json',
                           success:function(result){
                              console.log(result.data)
                           }
                     }
               })
         })
      var Page = {
            profileEvents:[],
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
                                    result.data.forEach(function(profileEvent){ 
                                          console.log(profileEvent);
                                          page.profileEvents.push(ProfileEvent.init(profileEvent));
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