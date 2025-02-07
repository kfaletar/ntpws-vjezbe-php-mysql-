<?php
define('__APP__', TRUE);

if(isset($_GET['menu'])) { $menu = (int)$_GET['menu']; }
if(isset($_GET['action'])) { $action = (int)$_GET['action']; }

if (!isset($menu)) { $menu = 1; }

print '
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="description" content="News site">
    <meta name="author" content="alen@tvz.hr">
    <link rel="icon" href="favicon.ico" type="image/x-icon"/>
    <title>News Website</title>
</head>
<body>
<header>
    <nav>';
    include("menu.php");
    print '</nav>
</header>
<main>';

if (!isset($menu) || $menu == 1) { 
    include("home.php"); 
} elseif ($menu == 2) { 
    include("news.php"); 
} elseif ($menu == 3) { 
    include("contact.php"); 
} elseif ($menu == 4) { 
    include("about-us.php"); 
}

print '</main>';

if (!empty($_COOKIE['news_title_1']) || !empty($_COOKIE['news_title_2']) || !empty($_COOKIE['news_title_3'])) {
    print '<aside><h2 style="text-align:center">Last Viewed News</h2>';
    if (!empty($_COOKIE['news_title_1'])) {
        print '<p>' . $_COOKIE['news_title_1'] . '</p>';
    }
    if (!empty($_COOKIE['news_title_2'])) {
        print '<p>' . $_COOKIE['news_title_2'] . '</p>';
    }
    if (!empty($_COOKIE['news_title_3'])) {
        print '<p>' . $_COOKIE['news_title_3'] . '</p>';
    }
    print '</aside>';
}

print '
<footer>
    <p>Copyright &copy; ' . date("Y") . ' Alen Šimec</p>
</footer>
</body>
</html>';
?>
