<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="EN" lang="EN" dir="ltr">
<head profile="http://gmpg.org/xfn/11">
    <title>Honeyd-Viz | Visualization Tool for your Honeyd Honeypot Instance</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta http-equiv="imagetoolbar" content="no"/>
    <link rel="stylesheet" href="styles/layout.css" type="text/css"/>
    <script type="text/javascript" src="scripts/jquery-1.4.1.min.js"></script>
    <!-- FancyBox -->
    <script type="text/javascript" src="scripts/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
    <script type="text/javascript" src="scripts/fancybox/jquery.fancybox-1.3.2.js"></script>
    <script type="text/javascript" src="scripts/fancybox/jquery.fancybox-1.3.2.setup.js"></script>
    <link rel="stylesheet" href="scripts/fancybox/jquery.fancybox-1.3.2.css" type="text/css"/>
    <!-- End FancyBox -->
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
        <div class="fl_left">Version: 0.2 | Website: <a
                href="http://bruteforce.gr/honeyd-viz">bruteforce.gr/honeyd-viz</a></div>
        <br class="clear"/>
    </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper">
    <div id="topnav">
        <ul class="nav">
            <li><a href="index.php">Homepage</a></li>
            <li><a href="honeyd-viz.php">Honeyd-Viz</a></li>
            <li><a href="honeyd-geo.php">Honeyd-Geo</a></li>
            <li class="active last"><a href="gallery.php">Graph Gallery</a></li>
        </ul>
        <div class="clear"></div>
    </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper">
    <div class="container">
        <!-- ############################# -->
        <div id="gallery" class="whitebox">
            <h2>Provided you have visited all the other pages/components (for the graphs to be generated) you can see
                all the images in this single page with the help of fancybox</h2>
            <hr/>
            <br/>
            <ul>
                <li><a rel="gallery_group" href="generated-graphs/connections_by_proto.png"
                       title="Connections by protocol"><img src="generated-graphs/connections_by_proto.png" alt=""/></a>
                </li>
                <li><a rel="gallery_group" href="generated-graphs/connections_by_proto_pie.png"
                       title="Connections by protocol"><img src="generated-graphs/connections_by_proto_pie.png" alt=""/></a>
                </li>
                <li class="last"><a rel="gallery_group" href="generated-graphs/connections_by_dest_ip.png"
                                    title="Connections by destination IP"><img
                            src="generated-graphs/connections_by_dest_ip.png" alt=""/></a></li>

                <li><a rel="gallery_group" href="generated-graphs/connections_by_dest_ip_pie.png"
                       title="Connections by destination IP"><img src="generated-graphs/connections_by_dest_ip_pie.png"
                                                                  alt=""/></a></li>
                <li><a rel="gallery_group" href="generated-graphs/most_connections_per_day.png"
                       title="Most connections per day (Top 20)"><img
                            src="generated-graphs/most_connections_per_day.png" alt=""/></a></li>
                <li class="last"><a rel="gallery_group" href="generated-graphs/connections_per_day.png"
                                    title="Connections per day"><img src="generated-graphs/connections_per_day.png"
                                                                     alt=""/></a></li>

                <li><a rel="gallery_group" href="generated-graphs/connections_per_week.png"
                       title="Connections per week"><img src="generated-graphs/connections_per_week.png" alt=""/></a>
                </li>
                <li><a rel="gallery_group" href="generated-graphs/connections_per_ip.png"
                       title="Connections per IP"><img src="generated-graphs/connections_per_ip.png" alt=""/></a></li>
                <li class="last"><a rel="gallery_group" href="generated-graphs/connections_per_ip_pie.png"
                                    title="Connections per IP"><img src="generated-graphs/connections_per_ip_pie.png"
                                                                    alt=""/></a></li>

                <li><a rel="gallery_group" href="generated-graphs/tcp_connections_per_ip.png"
                       title="TCP connections per IP"><img src="generated-graphs/tcp_connections_per_ip.png"
                                                           alt=""/></a></li>
                <li><a rel="gallery_group" href="generated-graphs/tcp_connections_per_ip_pie.png"
                       title="TCP connections per IP"><img src="generated-graphs/tcp_connections_per_ip_pie.png"
                                                           alt=""/></a></li>
                <li class="last"><a rel="gallery_group" href="generated-graphs/udp_connections_per_ip.png"
                                    title="UDP connections per IP"><img
                            src="generated-graphs/udp_connections_per_ip.png" alt=""/></a></li>

                <li><a rel="gallery_group" href="generated-graphs/udp_connections_per_ip_pie.png"
                       title="UDP connections per IP"><img src="generated-graphs/udp_connections_per_ip_pie.png"
                                                           alt=""/></a></li>
                <li><a rel="gallery_group" href="generated-graphs/icmp_connections_per_ip.png"
                       title="ICMP connections per IP"><img src="generated-graphs/icmp_connections_per_ip.png" alt=""/></a>
                </li>
                <li class="last"><a rel="gallery_group" href="generated-graphs/icmp_connections_per_ip_pie.png"
                                    title="ICMP connections per IP"><img
                            src="generated-graphs/icmp_connections_per_ip_pie.png" alt=""/></a></li>

                <li><a rel="gallery_group" href="generated-graphs/connections_by_dest_port.png"
                       title="Connections by destination port"><img src="generated-graphs/connections_by_dest_port.png"
                                                                    alt=""/></a></li>
                <li><a rel="gallery_group" href="generated-graphs/connections_by_dest_port_pie.png"
                       title="Connections by destination port"><img
                            src="generated-graphs/connections_by_dest_port_pie.png" alt=""/></a></li>
                <li class="last"><a rel="gallery_group" href="generated-graphs/connections_per_ip_geo.png"
                                    title="Number of connections per unique IP (Top 10) + Country Codes"><img
                            src="generated-graphs/connections_per_ip_geo.png" alt=""/></a></li>

                <li><a rel="gallery_group" href="generated-graphs/connections_per_ip_geo_pie.png"
                       title="Number of connections per unique IP (Top 10) + Country Codes"><img
                            src="generated-graphs/connections_per_ip_geo_pie.png" alt=""/></a></li>
                <li class="last"><a rel="gallery_group" href="generated-graphs/connections_per_country_pie.png"
                                    title="Number of connections per country"><img
                            src="generated-graphs/connections_per_country_pie.png" alt=""/></a></li>
            </ul>
            <br class="clear"/>
        </div>
        <!-- ############################# -->
        <div class="clear"></div>
    </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper">
    <div id="copyright">
        <p class="fl_left">Copyright &copy; 2012 - All Rights Reserved - <a href="http://bruteforce.gr/honeyd-viz">Honeyd-Viz</a>
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