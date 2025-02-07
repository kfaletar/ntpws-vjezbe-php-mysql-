<?php
if (!isset($action)) {
    // Prikaz početnih vijesti
    print '
    <h1>NEWS</h1>
    <div class="news">
        <a href="index.php?menu=' . $menu . '&action=1"><img src="news/_98509359_uscarproduction_getty.jpg" alt="US growth faster than expected" title="US growth faster than expected"></a>
        <h2><a href="index.php?menu=' . $menu . '&action=1">US growth faster than expected</a></h2>
        <p>The growth extended the robust activity reported in the previous quarter...</p>
        <time datetime="2017-10-25">25 October 2017</time>
        <hr>
        <a href="index.php?menu=' . $menu . '&action=2"><img src="news/_98453687_w0dskswv.jpg" alt="US growth faster than expected" title="US growth faster than expected"></a>
        <h2><a href="index.php?menu=' . $menu . '&action=2">Wall Street: Tech firm surge pushes US markets higher</a></h2>
        <p>Investors piled into technology giants such as Amazon...</p>
        <time datetime="2017-10-26">26 October 2017</time>
        <hr>
        <a href="index.php?menu=' . $menu . '&action=3"><img src="news/_98501093_booking-template_4panel_976x549.jpg" alt="Hotel booking sites probed" title="Hotel booking sites probed"></a>
        <h2><a href="index.php?menu=' . $menu . '&action=3">Hotel booking sites probed by consumer watchdog</a></h2>
        <p>Hotel booking sites are to be probed by the UK\'s competition watchdog...</p>
        <time datetime="2017-10-27">27 October 2017</time>
    </div>';
} else {
    // Inicijalizacija kolačića prilikom pregleda vijesti
    if ($action == 1) {
        setcookie("news_title_1", "US growth faster than expected", time() + 3600); // Postavljanje kolačića
        // Prikaz vijesti 1
        print '<h2>US growth faster than expected</h2>';
        print '<p>The US economy grew much faster than expected...</p>';
        print '<a href="index.php?menu=' . $menu . '">Back</a>';
    } elseif ($action == 2) {
        setcookie("news_title_2", "Wall Street: Tech firm surge pushes US markets higher", time() + 3600);
        // Prikaz vijesti 2
        print '<h2>Wall Street: Tech firm surge pushes US markets higher</h2>';
        print '<p>Investors piled into technology giants...</p>';
        print '<a href="index.php?menu=' . $menu . '">Back</a>';
    } elseif ($action == 3) {
        setcookie("news_title_3", "Hotel booking sites probed by consumer watchdog", time() + 3600);
        // Prikaz vijesti 3
        print '<h2>Hotel booking sites probed by consumer watchdog</h2>';
        print '<p>The CMA is concerned about the clarity...</p>';
        print '<a href="index.php?menu=' . $menu . '">Back</a>';
    }
}
?>
