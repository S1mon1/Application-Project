<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/offers.css">   
    
    <script type="text/javascript" src="./public/js/search.js" defer></script>
    <title>User Offers</title>
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
            
            <form action="addOffer" method="GET">
                <button class="button_add_offer" a href="#">Add Offer</button>
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
        <section>
            <form class="showOffer" action="showOffer" method="POST" enctype="multipart/form-data">
                <div>
                    <img class="img-offer" src="public/uploads/<?= $offer->getImage(); ?>">
                </div>
                
                <div class="offerModel">
                    <span class="offerText" name="model"><?= $offer->getModel(); ?></span>
                </div>
                <div class="offerDescription">
                    <span class="offerText" name="description"><?= $offer->getDescription(); ?></span>
                </div>
            </form>
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