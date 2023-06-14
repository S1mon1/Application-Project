<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/offers.css">    
    <title>Offers</title>
</head>
<body>
    <div class="base-container">
        <div class="top-nav">           
            <a>Zarejestruj się</a>
            <a>Zaloguj się</a>
            <a>Oferta</a>
            <a>Strona główna</a>
            <h1 class="main-name">YourDreamCar</h1>
        </div>

        <section class="offers">
            <div id="offer-1">
                <img src="../../../photo.png"/>
                <div>
                    <h2>Car Brand</h2>
                    <p>description</p>
                </div>
            </div>


            <div id="offer-1">
                <img src="public/uploads/<?= $offers->getImage() ?>"/>
                <div>
                    <h2><?= $offers->getTitle() ?></h2>
                    <p><?= $offers->getDescription() ?></p>
                </div>
            </div>


            <div id="offer-1">
                <img src="../../../photo.png"/>
                <div>
                    <h2>Car Brand</h2>
                    <p>description</p>
                </div>
            </div>
            <div id="offer-1">
                <img src="../../../photo.png"/>
                <div>
                    <h2>Car Brand</h2>
                    <p>description</p>
                </div>
            </div>
            <div id="offer-1">
                <img src="../../../photo.png"/>
                <div>
                    <h2>Car Brand</h2>
                    <p>description</p>
                </div>
            </div>
        </section>

    </div>
</body>