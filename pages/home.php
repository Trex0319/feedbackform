<?php

    require 'parts/header.php';

?>
<div class="container my-5 mx-auto" style="max-width: 700px;">
    <!-- <h1 class="h1 mb-4 text-center">Customer Service Feedback Form</h1> -->

    <div class="text-center">
        <div class="gap-3 text-center mb-4">
            <?php if ( isset( $_SESSION["user"] ) ) { ?>
                </div>
            </div>
            
            <div class="container my-5 mx-auto" style="max-width: 700px;">
                <h1 class="h1 mb-4 text-center">Customer Service Feedback Form</h1>
                
                <div class="card p-4">
                    <?php require dirname(__DIR__) .  '/parts/message_error.php'; ?>
                    <?php require dirname(__DIR__) .  '/parts/message_success.php'; ?>
                    <?php require dirname(__DIR__) .  '/parts/questions.php'; ?>
                </div>
                
                <div class="text-center mt-4">
                    <a href="/results" class="btn btn-inverse">View Results</a>    
                    <a href="/logout" class="btn btn-inverse">Logout</a>
                    <?php } else { ?>
                        <p class="mt-4">Please login with your existing account or sign up a new account to continue</p>    
                        <a href="login" class="btn btn-primary">Login</a>
                        <a href="signup" class="btn btn-primary">Sign Up</a>
                    <?php } ?>
</div>

<?php

    require 'parts/footer.php';
