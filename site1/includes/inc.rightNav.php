<div class="loginRegisterSearch">
      <form class="searchForm" >
            <input type="search" placeholder="Search for an event..."/>
      </form>
      
      <?php            
            if(isset($_SESSION['email'])){
                  NavController::renderLoggedIn();
            }
            else{
                  NavController::renderLoggedOut();
            }
                  
      ?>

</div>
<script>
      
      var NotificationDot = {
            notificationDotWrap: $('.notificationsLink'),
            notificationBoard: $('.notificationBoard'),
            notificationsLink: $('notificationsLink'),
            init:function(notificationData){
                  var notificationDot = Object.assign(Object.create(this), notificationData);
                  notificationDot.render();
            },
            render:function(){
                  var count = this.notifications.friend_requests.length;
                  var notificationDot = $('<span class="notificationDot">'+count+'</span>');
                  if(this.notificationDot){
                        this.notificationDot = notificationDot.replaceWith(notificationDot);
                  }
                  else{
                        this.notificationDot = notificationDot.appendTo(this.notificationDotWrap);
                  }
                  this.renderNotificationBoard();
            },
            renderFriendRequests: function(){
                  var friendRequests = this.notifications.friend_requests;
                  var notification = $('<div class="notificationsWrap">'+friendRequests.map(function(request){
                        console.log(request);
                                          return '<span class="notification">You have a friend request from: '+request.from+'</span>';
                                    '</div>'}).join(''));
                  if(this.notification){
                        this.notification = notification.replaceWith(notification);
                  }
                  else{
                        this.notification = notification.appendTo(this.notificationBoard);
                  }
            },
            renderNotificationBoard:function(){
                  this.renderFriendRequests();
                  
            }
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
                                    NotificationDot.init(result.data); 
                              }
                        }
                  })
            },
            
      }
      Nav.init();
      $('.notificationsLink').on('click', function(){
            $('.notificationBoard').show();
      });
      $(window).scroll(function(){
            if ($(window).scrollTop() >= 15) {
                  $('header').addClass('shrinkHeader');
            }
            else{
                  $('header').removeClass('shrinkHeader');

            }
      });
</script>