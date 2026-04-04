<?php session_start(); ?>
<html>
<!doctype html>

<head>
    <meta charset="ISO-8859-1">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rydr</title>
    <link rel="stylesheet" href="<?php echo $bases_url . 'Assets/Styles/CSS/Base.css'; ?>">
    <link rel="icon" type="image/png" href=<?php echo $bases_url . 'Assets/Images/favicon.ico'; ?> sizes="32x32">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap"
        rel="stylesheet">
</head>

<body>
    <div class="topbar">
        <div class="logo">
             <form method="GET" action="<?= $bases_url ?>../Index.php">
                <input type="hidden" name="page" value="Homepage">
                <button type="submit">Rydr</button>
            </form>
        </div>
        <form class="search-form" action="">
            <input type="search" placeholder="Welke auto wilt u huren?">
            <img src="<?php echo $bases_url . 'Assets/Images/Icons/Search.svg'; ?>" alt="Search Icon">
        </form>

        <nav>
            <ul>
                <form method="GET" action="<?= $bases_url ?>../Index.php">
                    <input type="hidden" name="page" value="Homepage">
                    <button type="submit">Home</button>
                </form>
                <form method="GET" action="<?= $bases_url ?>../Index.php">
                    <input type="hidden" name="page" value="Offer">
                    <button type="submit">Aanbod</button>
                </form>
                <form method="GET" action="<?= $bases_url ?>../Index.php">
                    <input type="hidden" name="page" value="Contact">
                    <button type="submit">Contact</button>
                </form>
                <form method="GET" action="<?= $bases_url ?>../Index.php">
                    <input type="hidden" name="page" value="Login">
                    <button type="submit" class="button-primary start-huren">Start met huren</button>
                </form>
            </ul>
        </nav>
    </div>
    <div class="content">