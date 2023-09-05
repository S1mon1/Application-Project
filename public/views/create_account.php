<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <script type="text/javascript" src="./public/js/script.js" defer></script>
    <title>Create Acount</title>
</head>
<body>
    <div class="container">
        <div class="login-container">
            <form class="register" action="register" method="POST">
                <div class="messages">
                    <?php
                        if(isset($messages)){
                            foreach($messages as $message){
                                echo $message;
                            }
                        }
                    ?>
                </div>
                <p class="create-new-account" >Create new account</p>
                <input name="name" type="text" placeholder="name">
                <input name="surname" type="text" placeholder="surname">
                <input name="email" type="text" placeholder="email@email.com">
                <input name="password" type="password" placeholder="password">
                <input name="confirmedPassword" type="password" placeholder="confirm password">
                <button type="submit">CREATE ACCOUNT</button>
                <p class="log-in">Log in</p>
            </form>
        </div>
    </div>
</body>