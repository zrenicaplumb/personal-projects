<?php
    class NavController extends ResourceController{
        
        public static function renderLoggedIn(){
            $sessionEmail = $_SESSION['email'];
            echo '<a class="logoutBtn" href="logout.php">Logout</a>';
            echo "<a class='profileLink' href='profile.php'>".$sessionEmail. "'s profile</a>";
            echo '<div class="boardWrap">';
            echo    '<a class="notificationsLink"><i class="far fa-bell"></i></a>';
            echo    '<div class="notificationBoard"></div>';
            echo '</div>';
        }
        public static function renderLoggedOut(){
            echo '<a class="loginDropdownToggle" href="login.php">Login</a>';
            echo '<a href="register.php" class="register">Register</a>';
        }
    }
        
    