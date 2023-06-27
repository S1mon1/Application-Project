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
            <?php foreach($offers as $offer): ?>
            <div id="offer-1">
                <img src="public/uploads/<?= $offer->getImage(); ?>"/>
                <div>
                    <h2><?= $offer->getTitle(); ?></h2>
                    <p><?= $offer->getDescription(); ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </section>

    </div>
</body>