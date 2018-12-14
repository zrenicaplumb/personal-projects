
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
                <div class="createEventWrap">
                 
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
                method:'userSignup',
            }
            console.log(data);
            $.post('api.php/userSignup', data, function(result){
                console.log(result);
            })

        })
    </script>
</html>