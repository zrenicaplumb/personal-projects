<?php 
    require_once('config.php');
    
?>
<html lang="en">
    <head>
        <?php 
            require_once('includes/inc.head.php') ;
        ?>
        <title>Register</title>
    </head>
    <body>
        <header>
           <?php require_once('includes/inc.header.php') ?>
            
            
        </header>
        <main>
            <div class="container">
			<div class="registerDropdown">
				<form method="post" action="api.php">
				<input placeholder="firstname" type="text" name="firstname"/>

				<input placeholder="Username" type="text" name="username"/>

                <input placeholder="Email" type="text" name="email"/>

                <input placeholder="Password" type="password" name="password"/>
                <input type="file" name="profile_image"/>

				<button class="btn signupBtn">Signup</button>
				</form>
				<button class="registerCloseBtn">close</button>
			</div>
            </div>
            
        </main>
        <footer>

        </footer>
    </body>
    
    
<script>
     $('.registerCloseBtn').on('click', function(){
            $('.registerDropdown').hide();
        })
        $('.registerDropdown form').on('submit', function(e){
            e.preventDefault();
            $('.registerDropdown').hide();
            var data = {
                username: $(this).find('input[name="username"]').val(),
                firstname: $(this).find('input[name="firstname"]').val(),
                email: $(this).find('input[name="email"]').val(),
                password: $(this).find('input[name="password"]').val(), 
                method:'userSignup',
                // image: $(this).find('input[name="profile_image"]').val(),
            }
            $.ajax({
                  url:'api.php',
                  data:data,
                  dataType:'json',
                  success:function(result){
                      if(result.status="success"){
                            window.location.href="home.php";
                      }
                      else{
                          console.log('user doesnt exist');
                      }
                    
                  }
            })
        })
</script>


</html>
