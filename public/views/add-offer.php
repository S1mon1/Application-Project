<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/offers.css">    
    <title>Offers</title>
</head>
<body>
    <div class="base-container">
        <div class="top-nav">

            <form action="login" method="GET">
                <button class="button-logout" href="#">
                <?php
                if (isset($_COOKIE['email']) && !empty($_COOKIE['email'])){
                    echo "Log out";
                }
                else {
                    echo "Log in";
                }
                ?>
                </button>
            </form>
                      
            <a>Zarejestruj się</a>
            <a>Zaloguj się</a>
            <a>Oferta</a>
            <a>Strona główna</a>
            <h1 class="main-name">YourDreamCar</h1>
        
        </div>

        <section class="offers-form">
            <h1 class="upload">UPLOAD</h1>
            <form action="addOffer" method="POST" ENCTYPE="multipart/form-data">
                <?php if(isset($messages)){
                    foreach($messages as $message)
                    {
                        echo $message;
                    }
                }
                ?>
                <input name="title" type="text" placeholder="brand">


                <input name="title2" type="text" placeholder="model">                

                <textarea name="description" rows="5" placeholder="description"></textarea>
                <input name="file" type="file">
                <button type="submit">Send</button>
            </form>            
        </section>

    </div>
</body>