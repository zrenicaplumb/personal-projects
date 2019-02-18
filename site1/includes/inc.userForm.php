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