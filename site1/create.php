<?php
require_once('config.php');
?>
<html lang="en">
    <head>
        <?php require_once('includes/inc.head.php') ?>
        <title>Create Event</title>
    </head>
    <body>
        <header>
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
                    <a class="loginDropdownToggle">Login</a>
                    <div class="loginDropdown">
                        
                    </div>
                    <a>Register</a>
                </form>
            </div>
            
        </header>
        <main>
            <div class="container">
                <div class="createEventWrap">
                    <form class="createEventForm" action="post" method="/api/">
                        <button class="createEventBtn btn">
                            <i class="fa fa-mail" data-help="createEvent"></i>
                                Create Event
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

                        <div class="dateTimeInputWrap">
                            <label>Date/Time</label>
                            <input type="date"/>
                            <input type="time"/>
                        </div>   

                        <div class="descriptionInputWrap">
                            <label>Description</label>
                            <textarea placeholder="Tell more about the event"></textarea>
                            
                        </div>  
                        <button class="btn">Create Event</button>
                    </form>
                </div>
            </div>
            
        </main>
    </body>
</html>