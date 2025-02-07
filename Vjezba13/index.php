<?php
session_start(); // Start the session at the very beginning

$menu = 'news'; // Example menu variable (replace if needed)

if (!isset($_GET['action'])) {
    print '
    <h1>NEWS</h1>
    <div class="news">
        <a href="index.php?menu=' . $menu . '&action=1"><img src="news/_98509359_uscarproduction_getty.jpg" alt="US growth faster than expected"></a>
        <h2><a href="index.php?menu=' . $menu . '&action=1">US growth faster than expected</a></h2>
        <p>The growth extended the robust activity...</p>
        <time datetime="2017-10-25">25 October 2017</time>
        <hr>

        <a href="index.php?menu=' . $menu . '&action=2"><img src="news/_98453687_w0dskswv.jpg" alt="Wall Street surge"></a>
        <h2><a href="index.php?menu=' . $menu . '&action=2">Wall Street: Tech firm surge pushes US markets higher</a></h2>
        <p>Investors piled into tech giants...</p>
        <time datetime="2017-10-26">26 October 2017</time>
        <hr>

        <a href="index.php?menu=' . $menu . '&action=3"><img src="news/_98501093_booking-template_4panel_976x549.jpg" alt="Hotel booking sites"></a>
        <h2><a href="index.php?menu=' . $menu . '&action=3">Hotel booking sites probed by consumer watchdog</a></h2>
        <p>Hotel booking sites are being probed...</p>
        <time datetime="2017-10-27">27 October 2017</time>
        <hr>
    </div>';
} else {
    // Set the session based on action
    if ($_GET['action'] == 1) {
        $_SESSION['selected_news'] = [
            'title' => 'US growth faster than expected',
            'image' => 'news/_98509359_uscarproduction_getty.jpg',
            'content' => 'The US economy grew much faster than expected...',
            'date' => '25 October 2017'
        ];
    } elseif ($_GET['action'] == 2) {
        $_SESSION['selected_news'] = [
            'title' => 'Wall Street: Tech firm surge pushes US markets higher',
            'image' => 'news/_98453687_w0dskswv.jpg',
            'content' => 'Investors piled into technology giants...',
            'date' => '26 October 2017'
        ];
    } elseif ($_GET['action'] == 3) {
        $_SESSION['selected_news'] = [
            'title' => 'Hotel booking sites probed by consumer watchdog',
            'image' => 'news/_98501093_booking-template_4panel_976x549.jpg',
            'content' => 'Hotel booking sites are being probed...',
            'date' => '27 October 2017'
        ];
    }

    // Redirect to news.php after setting session
    header('Location: news.php');
    exit(); // Always call exit after header redirect
}
?>
