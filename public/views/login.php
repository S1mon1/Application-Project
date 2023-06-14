<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <title>Login Page</title>
</head>
<body>
    <div class="container">
        <div class="login-container">
            <form class="login" action="login" method="POST">
                <div class="messages">
                    <?php if(isset($messages)){
                        foreach($messages as $message)
                        {
                            echo $message;
                        }
                    }
                    ?>
                </div>
                <p class="welcome" >Welcome!</p>
                <input name="email" type="text" placeholder="email">
                <input name="password" type="password" placeholder="password">
                <button type='submit'>LOGIN</button>
                <p class="create-account">Create Account</p>
            </form>
        </div>
    </div>
</body>