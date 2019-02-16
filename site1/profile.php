
<?php
    require_once('config.php');
    
?>
<style>
.inviteBtn{display:block; margin:20px 0; background:#fff; padding:5px 10px; cursor:pointer;}
.profileEvent{background: rgb(46,48,53); width: 85%; margin: 25px auto; padding: 20px; border-radius: 3px; color:gray; width: 30%; padding: 28px;}
.invitePopupShadow {display: none;position: fixed;z-index: 1;left: 0;top: 0;width: 100%;height: 100%;overflow: auto;background-color: rgba(0,0,0,0.6);}
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
                  <div>
                        <h2>Add a friend</h2>
                        <form class="addFriendForm">
                              <input type="text" class="addFriend"/>
                        </form>
                  </div>
                  <h2>
                      <?=(isset($_SESSION['username']) ? $_SESSION['username'] . "'s events" : 'Log in to see profile events. ')?>
                  </h2>
            
                <div class="eventBoardWrap">
                 
                </div>
            </div>
            
        </main>
        <footer>

        </footer>
    </body>
   

  <script>
        
      var ProfileEvent = {
      
            container: $('.eventBoardWrap'),
            init:function(profileEvent, loggedIn=false){
            
                  if(loggedIn){
                        this.loggedIn = true;
                  }
                  var profileEvent = Object.assign(Object.create(this), profileEvent);
                  profileEvent.render();
                  return profileEvent;
                  
            },
            render:function(){
                  if(this.tags){
                        this.tags = this.tags.split(' ');
                  }
                  else{
                        this.tags = null;
                  }
                  if(this.invite_list){
                        this.invite_list = this.invite_list.split(',');
                  }
                  else{
                        this.invite_list = null;
                  }
                  
                  
                  var element = $('<div class="profileEvent">'+
                                    '<h4>Event Name:  <em>'+this.name+'</em></h4>'+
                                    '<h4>Event type:  <em>'+this.event_type+'</em></h4>'+
                                    (this.invite_list ? '<h4>Invite List:  '+
                                          this.invite_list.map(function(person){
                                                return '<span class="templateTag">'+person+'</span>'
                                          }) : ' ') +
                                    '</em></h4>'+
                                    '<h4>Location:  <em>'+this.location+'</em></h4>'+
                                    '<h4>Date:  <em>'+this.date+'</em></h4>'+
                                    '<h4>Time:  <em>'+this.time+'</em></h4>'+
                                    '<h4>Description:  <em>'+this.description+'</em></h4>'+
                                    (this.tags ? '<h4 class="tagWrap">Tags:  <em>'+
                                          this.tags.map(function(tag){
                                                return '<span class="templateTag"> '+tag+'</span>'
                                          }) : ' ')+  
                                    '</em></h4>'+
                                    '<button class="inviteBtn">Invite some peeps: <i class="far fa-envelope"></i></button>'+
                                    (this.user_email ? '<button class="deleteEventBtn">Delete</button>' : '<button class="deleteEventBtn" style="display:none;">Delete</button>')+
                                    
                                    '</div>');
            
                  // var invitePopup = $('<div class="invitePopupShadow">'+
                  //                     '</div>'+
                  //                     '<div class="popupBox">'+
                  //                         '<form>'+
                  //                             '<input type="text" class="inviteList"/>'+
                  //                             '<button class="inviteListBtn">Invite</button>'+
                  //                         '</form>'+
                                          
                  //                     '</div>');
            
                  
                  if(this.element){
                        this.element.replaceWith(element);
                  }
                  // if(this.invitePopup){
                  //     this.invitePopup.replaceWith(invitePopup);
                  // }
                  
                  this.element = element;       
                  // this.invitePopup = invitePopup;                      
                        
                  element.appendTo(this.container);
                  // invitePopup.appendTo(this.container);
                  this.listeners();
            },
            listeners:function(){
                  var self = this;
                  // this.invitePopup.find('.invitePopupShadow').on('click', function(){
                  //     invitePopup.hide();
                  // })
                  this.element.find('.deleteEventBtn').on('click', function(e){
                        self.delete();
                  })
                  // this.element.find('.inviteBtn').on('click', function(e){
                  //     self.invitePopup.show();
                  // })
                  // this.invitePopup.find('.inviteListBtn').on('click', function(){
                        
                  // })
            },
            delete:function(){
                  var self = this;
                  $.ajax({
                        url:'api.php',
                        data:{
                              event_id: self.event_id,
                              method: 'deleteUserEvent'
                        },
                        dataType:'json',
                        success:function(result){
                              if(status == 'success'){
                                    self.element.remove();
                              }
                        }
                  })
            }
      
      }


      var Page = {
            profileEvents:[],
            userFriends:[],
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
            // getUserFriends:function(){

            //       $.ajax({
            //             url:'api.php',
            //             data:{
            //                   method:'getUserFriends'
            //             },
            //             dataType:'json',
            //             success:function(result){
            //                   console.log(result);
            //             }
            //       })
            // },
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

      $('.addFriendForm').on('submit', function(e){
               e.preventDefault(e);
               var friend = $(this).find('.addFriend').val();
               console.log(friend);
               $.ajax({
                     url:'api.php',
                     data:{
                           friend_email:friend,
                           method:'addFriend',
                           
                     },
                     dataType:'json',
                        success:function(result){
                              if(result.status=='success'){
                                    console.log(result);
                              }
                              else{
                                    console.log('user not found');
                              }
                        }
               })
         })
   </script>
  

</html>