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
                                
                                <div class="eventTypeInputWrap">
                                    <label>Event Type</label>
                                    <select class="event_type">
                                        <option>public</option>
                                        <option>private</option>
                                    </select>
                                </div>
                                
                                <div class="accountEmailWrap" style="display:hidden;">
                                    <input type="hidden" value="<?=$_SESSION['email'] == '' ? '' : $_SESSION['email'];?>" class="userEmail"/>
                              </div>
                              
                                <div class="eventNameInputWrap">
                                    <label>Event Name</label>
                                    <input type="text" name="name" class="name" required/>
                                </div>

                                <div class="locationInputWrap">
                                    <label>Location</label>
                                    <input type="text" name="location" class="location" required/>
                                </div> 

                                <div class="dateInputWrap">
                                    <label>Date</label>
                                    <input type="date" name="date" class="date" />
                                </div>

                                <div class="timeInputWrap">
                                    <label>Time</label>
                                    <input type="time" name="time" class="time" required/>
                                </div>

                                <div class="descriptionInputWrap">
                                    <label>Description</label>
                                    <textarea placeholder="Tell more about the event" name="description"  class="description" required></textarea>
                                    
                                </div>
                                <div class="descriptionInputWrap">
                                    <label>Tags</label>
                                    <textarea placeholder="Enter hashtags to identify event" name="tags"  class="hashtags" type="text" required></textarea>
                                    
                                </div>

                                <div class="inviteListWrap">
                                    <label>Invite List</label>
                                    <input type="text" name="invite_list" class="inviteList" placeholder="Add people to invite" required/>
                                </div>

                                <div class="imageInputWrap">
                                    <label>Images</label>
                                    <input type="file" placeholder="Tell more about the event" name="image"  class="eventImage" />
                                    
                                </div>
                                <button class="btn createEventBtn">Create Event</button>
                                <a class="btn closeEventPopup">Close</a>

                            </form>
                    </ul>
                </nav>
                <div class="loginRegisterSearch">
                    <form class="searchForm" >
                        <input type="search" placeholder="Search..."/>
                    </form>
                    
                    <?php if(isset($_SESSION['email'])){
                            echo '<a class="welcomeLink" href="#">'.$_SESSION['email'].'</a>';
                            echo '<a class="logoutBtn" href="logout.php">Logout</a>';
                            echo '<a class="profileLink" href="profile.php">Profile</a>';
                            
                        } ?>
                        
                    <?php if(!isset($_SESSION['email'])){
                            echo '<a class="loginDropdownToggle" href="#">Login</a>';
                            echo '<a href="#" class="register">Register</a>';
                        } ?>

                   


                        
                        <div class="registerDropdown">
                            <form method="post" action="api.php">
                              <input placeholder="Username" type="text" name="username"/>

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