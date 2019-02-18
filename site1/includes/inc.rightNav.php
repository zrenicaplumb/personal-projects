<div class="loginRegisterSearch">
      <form class="searchForm" >
            <input type="search" placeholder="Search for an event..."/>
      </form>
      
      <?php if(isset($_SESSION['email'])){
                  echo '<a class="welcomeLink" href="#">'.$_SESSION['email'].'</a>';
                  echo '<a class="logoutBtn" href="logout.php">Logout</a>';
                  
                  echo '<a class="profileLink" href="profile.php">Profile</a>';

                  
                  
                  
            } ?>
            
      <?php if(!isset($_SESSION['email'])){
                  echo '<a class="loginDropdownToggle" href="login.php">Login</a>';
                  echo '<a href="register.php" class="register">Register</a>';
            } ?>

</div>
<script>
      var Notifications = {
            notificationsWrap:$('.profileLink'),
            init:function(notifications){
                  var notifications = Object.assign(Object.create(this), notifications);
                  console.log(notifications);
                  this.renderUserNotifications();
            },
            renderUserNotifications:function(){debugger;
                  var nav = this;
                  var element = $('<span class="notifications">'+this.notifications+'</span>');
                  if(this.element){
                        this.element = element.replaceWith(element);
                  }
                  else{
                        this.element = element.appendTo(this.notificationsWrap);
                  }
                  console.log(this.element);

            },
      }
      var Nav = {
            init:function(){
                  this.getUserNotifications();           
            },
            getUserNotifications:function(){
                  var nav = this;
                  $.ajax({
                        url:'api.php',
                        data:{
                        method:'getUserNotifications'
                        },
                        dataType:'json',
                        success:function(result){
                              console.log(result);
                              if(result.status == 'success'){
                                    Notifications.init(result.data); 
                              }
                        }
                  })
            },
            
      }
      Nav.init()
</script>