<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="EN" lang="EN" dir="ltr">
<head profile="http://gmpg.org/xfn/11">
    <title>Honeyd-Viz | Visualization Tool for your Honeyd Honeypot Instance</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta http-equiv="imagetoolbar" content="no"/>
    <link rel="stylesheet" href="styles/layout.css" type="text/css"/>
    <script type="text/javascript" src="scripts/jquery-1.4.1.min.js"></script>
</head>
<body id="top">
<div class="wrapper">
    <div id="header">
        <h1><a href="index.php">Honeyd-Viz</a></h1>
        <br/>

        <p>Visualization Tool for your Honeyd Honeypot Instance</p>
    </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper">
    <div id="topbar">
        <div class="fl_left">Version: 0.3 | Website: <a
                href="http://bruteforce.gr/honeyd-viz">bruteforce.gr/honeyd-viz</a></div>
        <br class="clear"/>
    </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper">
    <div id="topnav">
        <ul class="nav">
            <li class="active"><a href="index.php">Homepage</a></li>
            <li><a href="honeyd-viz.php">Honeyd-Viz</a></li>
            <li><a href="honeyd-geo.php">Honeyd-Geo</a></li>
            <li class="last"><a href="gallery.php">Graph Gallery</a></li>
        </ul>
        <div class="clear"></div>
    </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper">
    <div class="container">
        <div class="whitebox">
            <!-- ####################################################################################################### -->
            <h3>Thank you for using Honeyd-Viz!</h3>

            <h3>Statistics are not updated in real time. To start, you will have to manually <a
                    href="honeyd-viz-generator.php">GENERATE_THE_HONEYD_GRAPHS();</a></h3>

            <p>
            <hr>
            </p>
            <p align=center><img src="images/honeyd-viz-img.png" height=215 width=320></p>

            <p align=center>
                <?php
                #Package: Honeyd-Viz
                #Version: 0.2
                #Author: ikoniaris
                #Website: bruteforce.gr/honeyd-viz
                include_once('config.php');
                include_once('include/misc/versionCheck.php');
                echo "Version: " . VERSION;
                if (UPDATE_CHECK == 'YES') {
                    if (isUpToDate()) {
                        echo " - You are using the <strong>latest</strong> version!\n";
                    } else {
                        echo " - There is a <strong>new</strong> version available for <a href='http://bruteforce.gr/honeyd-viz' target='_blank'>download</a>!\n";
                    }
                }
                ?></p>

            <p>&nbsp;</p>

            <p><strong>CHANGES:</strong></p>

            <p>Version 0.3:<br/>+ Switched all SQL operations to RedBeanPHP library.<br/>+ Cleaned and tidied up code.
                <br/>+ Added 3 more IP lookup tools.
                <br/>+ Fixed Google Map rendering issue (Honeyd-Geo).</p>

            <p>Version 0.2:<br/>+ Cleaned honeyd-viz-generator.php.<br/>+ Added most connections per day chart.
                <br/>+ Added connections per day chart.<br/>+ Added connections per week chart.</p>

            <p>Version 0.1:<br/>+ Initial version.</p>

            <p>&nbsp;</p>

            <p class="fl_right">
                <small><a href="http://www.freedigitalphotos.net/images/view_photog.php?photogid=2280">Image: digitalart
                        / FreeDigitalPhotos.net</a></small>
            </p>
            <!-- ####################################################################################################### -->
            <div class="clear"></div>
        </div>
    </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper">
    <div id="copyright">
        <p class="fl_left">Copyright &copy; 2012 - 2014 - All Rights Reserved - <a
                href="http://bruteforce.gr/honeyd-viz">Honeyd-Viz</a>
        </p>

        <p class="fl_right">Thanks to <a href="http://www.os-templates.com/" title="Free Website Templates">OS
                Templates</a></p>
        <br class="clear"/>
    </div>
</div>
<script type="text/javascript" src="scripts/superfish.js"></script>
<script type="text/javascript">
    jQuery(function () {
        jQuery('ul.nav').superfish();
    });
</script>
</body>
</html>