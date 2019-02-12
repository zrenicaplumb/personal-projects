
<?php
    require_once('config.php');
    
?>
<style>

</style>
<html lang="en">
    <head>
        <?php 
            require_once('includes/inc.head.php') ;
        ?>
        <title>Create Event</title>
    </head>
    <body>
        <header>
            <?php require_once('includes/inc.header.php') ?>

            
            
        </header>
        <main>
            <div class="container">
                <div class="createEventWrap">
                    <?php require_once('createEventForm.php'); ?>

                </div>
            </div>
            
        </main>
        <footer>

        </footer>
    </body>

    <script>
        
        // var Page = {
        //     init:function(){
        //         this.initializeEventForm();
        //     },
        //     initializeEventForm:function(){
        //         var eventform = EventForm.init();
        //     },
            
        // }
        // Page.init();
        
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
                // account: Math.random(00000,99999),
                method:'userSignup',
            }
            console.log(data);
            $.post('api.php/userSignup', data, function(result){
                console.log(result);
            })

        })
    </script>
</html>