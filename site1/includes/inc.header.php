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
        <?php require_once('includes/inc.rightNav.php'); ?>
    </div>
    
    <script>
 

      
       
        // $('.searchForm').on('keyup', function(e){
        //     e.preventDefault();
        //     var search = $(this).find('input').val().toLowerCase();
        //     console.log(Page.homepageEvents);

        //     if(search){
        //         Page.homepageEvents.forEach(function(homepageEvent){
        //             homepageEvent.tags.map(function(tag){
        //                 if(search == tag){
                         
        //                 }
        //             })
        //         })
        //     }
        // });
    </script> 