<?php
session_start();
?>
<html>
<head>
    <link rel="stylesheet" type="text/css", href="styles.css">
</head>

<body>
<header>
    <?php
    if(!isset($_SESSION['name']))
    {
        echo '    <nav>
        <div class="main-wrapper">
            <ul>
                <li><a href="index.php">Pagrindinis</a></li>
            </ul>
            <div class="nav-login">
                <form method="post" action="papildoma\login.php">
                    <input type="text" name="user" id="user" placeholder="Slapyvardis">
                    <input type="password" name="pass" id="pass" placeholder="Slaptažodis">
                    <button type="submit" name="submit">Prisijungti</button>
                </form>
                <a href="register.php">Registracija</a>
            </div>
        </div>
    </nav>';
    } else if($_SESSION['priv']==0)
    {
        echo '<nav>
        <div class="main-wrapper">
            <ul>
                <li><a href="index.php">Pagrindinis</a></li>

            </ul>
            <div class="nav-login">
                <form method="post" action="papildoma\login.php">
                    <button type="submit" name="logout">Atsijungti</button>
                </form>
            </div>
        </div>
    </nav>';
    }else if($_SESSION['priv']==1)
    {
        echo '<nav>
        <div class="main-wrapper">
            <ul>
                <li><a href="index.php">Pagrindinis</a></li>
            </ul>
            <div class="nav-login">
                <form method="post" action="papildoma\login.php">
                    <button type="submit" name="logout">Atsijungti</button>
                </form>
            </div>
        </div>
    </nav>';
    }
    else if($_SESSION['priv']==2)
    {
        echo '<nav>
        <div class="main-wrapper">
            <ul>
                <li><a href="index.php">Pagrindinis</a></li>
                
            </ul>
            <div class="nav-login">
                <form method="post" action="papildoma\login.php">
                    <button type="submit" name="logout">Atsijungti</button>
                </form>
            </div>
        </div>
    </nav>';
    }
    ?>

    <?php
    if(isset($_SESSION['name']))
    {
        echo "
        <h4>
            Prisijungęs: ".$_SESSION['name']."
        </h4>
        ";
    }
    
    ?>
</header>