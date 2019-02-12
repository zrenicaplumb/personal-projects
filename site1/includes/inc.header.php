<div class="container">
        <nav>
            <h1 class="logo">LOGO</h1>
            <ul>
                <li>
                
                    <a href="home.php">Home</a>
                </li>
                
                <?php if (isset($_SESSION['email'])){
                    echo '<li>';
                    echo       '<a href="create.php" class="createEventToggle">Create Event</a>';
                    echo   '</li>';
                } ?>

            </ul>
        </nav>
        <?php require_once('includes/inc.userForm.php'); ?>
    </div>