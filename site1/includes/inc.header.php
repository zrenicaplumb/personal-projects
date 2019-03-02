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
    window.fbAsyncInit = function() {
        FB.init({
        appId      : '{622050768223749}',
        cookie     : true,
        xfbml      : true,
        version    : '{v3.2}'
        });
        
        FB.AppEvents.logPageView();   
        
    };


    FB.getLoginStatus(function(response) {
        statusChangeCallback(response);
    });

    (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "https://connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
    </script>
    <!-- <script>
      
       
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
    </script> -->