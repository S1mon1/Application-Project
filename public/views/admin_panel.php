<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/offers.css">   
    
    <script type="text/javascript" src="./public/js/search.js" defer></script>
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
                    
            <form action="showOffer" method="GET">
                    <?php
                        if (isset($_COOKIE['email']) && !empty($_COOKIE['email'])){
                            echo '<button class="button_my_offers" a href="#">My Offers</button>';
                        }
                    ?>
            </form>

            <form action="addOffer" method="GET">
                    <?php
                        if (isset($_COOKIE['email']) && !empty($_COOKIE['email'])){
                            echo '<button class="button_add_offer" a href="#">Add Offer</button>';
                        }
                    ?>
            </form>

            <form action="offers" method="GET">
                <button class="button_all_offers" a href="#">All Offers</button>
            </form>

            
>
            <form action="home" method="GET">
                <button class="button_home" a href="#">Home</button>
            </form>
            <h1 class="main-name">YourDreamCar</h1>

        </div>

        <div class="search-bar">
            <input placeholder="search offer">
        </div>
        <section class="offers">
            <?php foreach($users as $user): ?>
                <div>
                    <h3><?= $user->getName(); ?></h2>
                    <h3><?= $user->getSurname(); ?></h2>
                    <h3><?= $user->getEmail(); ?></h2>
                    <button class="delete_user">DELETE</button>                    
                </div>
            <?php endforeach; ?>
        </section>

    </div>
</body>

<template id="offer-template">
    <div id="">       
        <img src="">
        <div>
            <h2>brand</h2>
            <p>description</p>
        </div>
    </div>
</template>