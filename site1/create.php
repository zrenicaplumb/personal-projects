
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
                            <a href="create.php">Create Event</a>
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
                            <form method="post" action="api.php" enctype="multipart/form-data" class="createEventForm">
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
                <div class="createEventWrap">
                <!-- <form class="createEventForm" action="post" method="/api/createEvent">
                            <button class="createEventBtn btn">
                                <i class="fa fa-mail" data-help="createEvent"></i>
                                    Event Type
                                <i class="fa fa-dropdown-arrow"></i>
                            </button>
                            
                            <div class="eventNameInputWrap">
                                <label>Event Name</label>
                                <input type="text"/>
                            </div>

                            <div class="locationInputWrap">
                                <label>Location</label>
                                <input type="text"/>
                            </div> 

                            <div class="dateInputWrap">
                                <label>Date</label>
                                <input type="date"/>
                            </div>

                            <div class="timeInputWrap">
                                <label>Time</label>
                                <input type="time"/>
                            </div>

                            <div class="descriptionInputWrap">
                                <label>Description</label>
                                <textarea placeholder="Tell more about the event"></textarea>
                                
                            </div>
                            <button class="btn createEventBtn">Create Event</button>
                        </form> -->
                </div>
            </div>
            
        </main>
        <footer>

        </footer>
    </body>
    <?php
        // require_once('modules/createEventModule.php');
    ?>
    <script>
        
        var Page = {
            init:function(){
                this.initializeEventForm();
            },
            initializeEventForm:function(){
                var eventform = EventForm.init();
            },
            
        }
        Page.init();
        
        $('.register').on('click', function(){
            $('.registerDropdown').show();
        })
        $('.registerCloseBtn').on('click', function(){
            $('.registerDropdown').hide();

        })
        $('.registerDropdown form').on('submit', function(e){
            e.preventDefault();
            console.log('yes')
            
            $('.registerDropdown').hide();
            var data = {
                email: $(this).find('input[name="email"]').val(),
                password: $(this).find('input[name="password"]').val(), 
                // account: Math.random(00000,99999),
                method:'userSignup',
            }
            console.log(data);
            $.post('api.php/userSignup', data, function(result){
                console.log(result);
            })

        })
    </script>
</html>