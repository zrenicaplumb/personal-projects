
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
                        
                        <?php if (isset($_SESSION['email'])){
                            echo '<li>';
                            echo       '<a href="#" class="createEventToggle">Create Event</a>';
                            echo   '</li>';
                        } ?>
                        <form class="createEventForm" action="post" method="/api/createEvent" enctype="multipart/form-data">
                                <button class="createEventBtn btn">
                                    <i class="fa fa-mail" data-help="createEvent"></i>
                                        Event Type
                                    <i class="fa fa-dropdown-arrow"></i>
                                </button>
                                <div class="eventTypeInputWrap">
                                    <label>Event Type</label>
                                    <select class="event_type">
                                        <option>public</option>
                                        <option>private</option>
                                    </select>
                                </div>
                                
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
                                <div class="descriptionInputWrap">
                                    <label>Tags</label>
                                    <textarea placeholder="Enter hashtags to identify event" name="tags"  class="hashtags" type="text"></textarea>
                                    
                                </div>
                                <div class="imageInputWrap">
                                    <label>Images</label>
                                    <input type="file" placeholder="Tell more about the event" name="image"  class="eventImage"/>
                                    
                                </div>
                                <button class="btn createEventBtn">Create Event</button>
                                <a class="btn closeEventPopup">Close</a>

                            </form>
                    </ul>
                </nav>
                <div class="loginRegisterSearch">
                    <form>
                        <input type="search" placeholder="Search..."/>
                    </form>
                    <?php if(isset($_SESSION['email'])){
                            echo '<a class="welcomeLink" href="#">'.$_SESSION['email'].'</a>';
                            echo '<a class="logoutBtn" href="logout.php">Logout</a>';
                            echo '<a class="accountLink" href="account.php">Account</a>';
                            
                        } ?>
                    <?php if(!isset($_SESSION['email'])){
                            echo '<a class="loginDropdownToggle" href="#">Login</a>';
                            echo '<a href="#" class="register">Register</a>';
                        } ?>

                   


                        
                        <div class="registerDropdown">
                            <form method="post" action="api.php">
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
                            <button class="btn">Submit</button>
                            <a href="#">Forgot Password?</a>
                            <button class="loginCloseBtn">Close</button>

                        </form>
                        
                    </div>
                        
                    
                </div>
            </div>
            
            
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