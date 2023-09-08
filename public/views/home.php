<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <title>Home</title>
</head>
<body>
    <div class="base-container">
        <form action="offers" method="GET">
            <button class="button_start" a href="#">START</button>
        </form>
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
            <h1 class="main-name">YourDreamCar</h1>
        </div>
        <div class="bottom-nav">
            <a>Adres
                <p>ul. .........</p>
                <p>...... Kraków</p>
            </a>
            <a>Kontakt
                <p>nr tel</p>
                <p>YourDreamCar@gmail.com</p>
            </a>
            <a>Lokalizacje
                <p>Kraków Wrocław Gdańsk</p>
                <p>Warszawa Katowice Szczecin</p>
            </a>
            <h1 class="name">
                <p>YourDreamCar</p>
                <p>Wypożyczalnia samochodów</p>
            </h1>
        </div>
    </div>
</body>