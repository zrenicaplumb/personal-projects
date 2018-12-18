
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
            <div class="container">
                <nav>
                    <h1 class="logo">LOGO</h1>
                    <ul>
                        <li>
                            <a href="home.php">Home</a>
                        </li>
                        <li>
                            <a href="#" class="createEventToggle">Create Event</a>
                            <form class="createEventForm" action="post" method="/api/createEvent">
                                <button class="createEventBtn btn">
                                    <i class="fa fa-mail" data-help="createEvent"></i>
                                        Event Type
                                    <i class="fa fa-dropdown-arrow"></i>
                                </button>
                                <!-- <div class="eventTypeInputWrap">
                                    <label>Event Type</label>
                                    <select name="event_type">
                                        <option>Private</option>
                                        <option>Public</option>
                                    </select>
                                </div> -->
                                
                                <div class="eventNameInputWrap">
                                    <label>Event Name</label>
                                    <input type="text" name="name" class="name"/>
                                </div>

                                <div class="locationInputWrap">
                                    <label>Location</label>
                                    <input type="text" name="location" class="location"/>
                                </div> 

                                <div class="dateInputWrap">
                                    <label>Date</label>
                                    <input type="date" name="date" class="date"/>
                                </div>

                                <div class="timeInputWrap">
                                    <label>Time</label>
                                    <input type="time" name="time" class="time"/>
                                </div>

                                <div class="descriptionInputWrap">
                                    <label>Description</label>
                                    <textarea placeholder="Tell more about the event" name="description"  class="description"></textarea>
                                    
                                </div>
                                <button class="btn createEventBtn">Create Event</button>
                                <a class="btn closeEventPopup">Close</a>

                            </form>
                        </li>

                    </ul>
                </nav>
                <div class="loginRegisterSearch">
                    <form>
                        <input type="search" placeholder="Search..."/>
                    </form>
                        <a class="loginDropdownToggle" href="#">Login</a>
                        <a href="#" class="register">Register</a>
                        <div class="registerDropdown">
                            <form method="post" action="api.php" enctype="multipart/form-data">
                                <input placeholder="Email" type="text" name="email"/>
                                <input placeholder="Password" type="password" name="password"/>
                                <button class="btn signupBtn">Signup</button>
                            </form>
                            <button class="registerCloseBtn">close</button>
                        </div>
                    
                    <div class="loginDropdown">
                        <form>
                            <input placeholder="Email" type="text" name="email"/>
                            <input placeholder="Password" type="password"/>
                            <input type="checkbox" />
                            <label>Remember me</label>
                            <button class="btn"></button>
                            <a href="#">Forgot Password?</a>
                        </form>
                        
                    </div>
                        
                    
                </div>
            </div>
            
            
        </header>
        <main>
            <div class="container">
                <div class="eventBoardWrap">
                    
                </div>
            </div>
            
        </main>
        <footer>

        </footer>
    </body>
    <?php
        require_once('modules/createEventModule.php');
    ?>
    <script>
        
        var Page = {
            userEvents:[],
            init:function(){
               
                this.getEvents();
                this.renderUserEvents();
            },
            
            getEvents:function(){
                var page = this;
                var data = {
                    method:'getUserEvents',
                }
                // debugger;
                $.ajax({
                    url:'api.php',
                    data:{method:'getUserEvents'},
                    dataType:'json',
                    success:function(result){
                        if(result.status == 'success'){
                            result.data.forEach(function(event){
                                page.userEvents.push(UserEvent.init(result.data));
                            })
                            
                        }
                    }
                })
                
                
            },
            renderUserEvents:function(){
                // this.userEvents = this.userEvents.map(function(userEvent){
                //     console.log(userEvent);
                // })
            }
            
        }

        var UserEvent = {
            container: $('.eventBoardWrap'),
            init:function(userEvent){
                var userEvent = Object.assign(Object.create(this), userEvent);
                this.render();
            },
            render:function(){
                var element = $('<div class="userEvent">'+
                                    '<h1>User Event</h1>'+
                                    '<input placeholder="event"/>'+
                                '</div>');
                element.appendTo(this.container);
            },
        }
        Page.init();
        
        $('.createEventToggle').on('click', function(){
            $('.createEventForm').show();
        })
        $('.closeEventPopup').on('click', function(){
            $('.createEventForm').hide();
        });
        $('.createEventForm').on('submit', function(e){
            e.preventDefault();
        //    var event_type = $(this).find('[input name="event_type"]').val();
    
            var name = $(this).find('.name').val();
            var location = $(this).find('.location').val();
            var date = $(this).find('.date').val();
            var time = $(this).find('.time').val();
            var description = $(this).find('.description').val();
            var data = {
                    method:'createEvent',
                    name:name,
                    location:location,
                    date:date,
                    time:time,
                    description: description,
                
            };
            $(this).hide();
            console.log(data);
            debugger;
            $.post('api.php', data, function(result){
                if(result.status == 'success'){
                    var userEvent = UserEvent.init(result.data);
                    Page.UserEvents.push(userEvent);
                }
            })
       })
    </script>
</html>