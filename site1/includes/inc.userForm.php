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
                  echo '<a class="loginDropdownToggle" href="#">Login</a>';
                  echo '<a href="#" class="register">Register</a>';
            } ?>

      


            
            <div class="registerDropdown">
                  <form method="post" action="api.php">
                  <input placeholder="firstname" type="text" name="firstname"/>

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