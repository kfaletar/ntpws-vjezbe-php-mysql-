<?php
session_start(); // Start the session at the very beginning

// Define the $menu variable
$menu = 'news'; // Or whatever value you need for the menu

// Check if selected news exists in the session
if (isset($_SESSION['selected_news'])) {
    $news = $_SESSION['selected_news']; // Get news from session
    print '
    <h1>' . $news['title'] . '</h1>
    <figure class="img_news">
        <a href="' . $news['image'] . '" target="_blank"><img src="' . $news['image'] . '" alt="' . $news['title'] . '" title="' . $news['title'] . '"></a>
    </figure>
    <p>' . $news['content'] . '</p>
    <time datetime="2017-10-25">' . $news['date'] . '</time>
    <hr>
    <a href="index.php?menu=' . $menu . '">Back</a>';
} else {
    print "No news selected.";
}
?>
