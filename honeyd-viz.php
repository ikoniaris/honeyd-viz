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
            <li class="active"><a href="honeyd-viz.php">Honeyd-Viz</a></li>
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
            <!-- ############################# -->
            <h2>Simple and useful graphical statistics generated from your Honeyd honeypot<br/>For more, visit the other
                pages/components of this package</h2>

            <div class="portfolio">
                <div class="fl_left">
                    <h2>Connections by protocol</h2>

                    <p>This vertical bar chart diplays the distribution of incoming connections by protocol.</p>
                </div>
                <div class="fl_right"><img src="generated-graphs/connections_by_proto.png" alt=""/></div>
                <div class="fl_left">
                    <p>This pie chart diplays the distribution of incoming connections by protocol.</p>
                </div>
                <div class="fl_right"><img src="generated-graphs/connections_by_proto_pie.png" alt=""/></div>
                <div class="clear"></div>
            </div>
            <!-- ############################# -->
            <div class="portfolio">
                <div class="fl_left">
                    <h2>Connections by destination IP</h2>

                    <p>This vertical bar chart diplays the distribution of incoming connections by destination IP.</p>
                </div>
                <div class="fl_right"><img src="generated-graphs/connections_by_dest_ip.png" alt=""/></div>
                <div class="fl_left">
                    <p>This pie chart diplays the distribution of incoming connections by destination IP.</p>
                </div>
                <div class="fl_right"><img src="generated-graphs/connections_by_dest_ip_pie.png" alt=""/></div>
                <div class="clear"></div>
            </div>
            <!-- ############################# -->
            <div class="portfolio">
                <div class="fl_left">
                    <h2>Connections per day/week</h2>

                    <p>This horizontal bar chart diplays the most conncetions per day (Top 20) against the honeypot
                        system.</p>
                </div>
                <div class="fl_right"><img src="generated-graphs/most_connections_per_day.png" alt=""/></div>
                <div class="fl_left">
                    <p>This line chart diplays the daily activity on the honeypot system. Spikes indicate connection
                        events.<br/><br/><strong>Warning:</strong> Dates with zero connections are not displayed.</p>
                </div>
                <div class="fl_right"><img src="generated-graphs/connections_per_day.png" alt=""/></div>
                <div class="fl_left">
                    <p>This line chart diplays the weekly activity on the honeypot system. Curves indicate connection
                        attempts over a weekly period.</p>
                </div>
                <div class="fl_right"><img src="generated-graphs/connections_per_week.png" alt=""/></div>
                <div class="clear"></div>
            </div>
            <!-- ############################# -->
            <div class="portfolio">
                <div class="fl_left">
                    <h2>Connections per IP</h2>

                    <p>This vertical bar chart diplays the top 10 unique IPs ordered by the number of overall
                        connections to the system.</p>
                </div>
                <div class="fl_right"><img src="generated-graphs/connections_per_ip.png" alt=""/></div>
                <div class="fl_left">
                    <p>This pie chart diplays the top 10 unique IPs ordered by the number of overall connections to the
                        system.</p>
                </div>
                <div class="fl_right"><img src="generated-graphs/connections_per_ip_pie.png" alt=""/></div>
                <div class="clear"></div>
            </div>
            <!-- ############################# -->
            <div class="portfolio">
                <div class="fl_left">
                    <h2>TCP connections per IP</h2>

                    <p>This vertical bar chart diplays the top 10 unique IPs ordered by the number of TCP connections to
                        the system.</p>
                </div>
                <div class="fl_right"><img src="generated-graphs/tcp_connections_per_ip.png" alt=""/></div>
                <div class="fl_left">
                    <p>This pie chart diplays the top 10 unique IPs ordered by the number of TCP connections to the
                        system.</p>
                </div>
                <div class="fl_right"><img src="generated-graphs/tcp_connections_per_ip_pie.png" alt=""/></div>
                <div class="clear"></div>
            </div>
            <!-- ############################# -->
            <div class="portfolio">
                <div class="fl_left">
                    <h2>UDP connections per IP</h2>

                    <p>This vertical bar chart diplays the top 10 unique IPs ordered by the number of UDP connections to
                        the system.</p>
                </div>
                <div class="fl_right"><img src="generated-graphs/udp_connections_per_ip.png" alt=""/></div>
                <div class="fl_left">
                    <p>This pie chart diplays the top 10 unique IPs ordered by the number of UDP connections to the
                        system.</p>
                </div>
                <div class="fl_right"><img src="generated-graphs/udp_connections_per_ip_pie.png" alt=""/></div>
                <div class="clear"></div>
            </div>
            <!-- ############################# -->
            <div class="portfolio">
                <div class="fl_left">
                    <h2>ICMP connections per IP</h2>

                    <p>This vertical bar chart diplays the top 10 unique IPs ordered by the number of ICMP connections
                        to the system.</p>
                </div>
                <div class="fl_right"><img src="generated-graphs/icmp_connections_per_ip.png" alt=""/></div>
                <div class="fl_left">
                    <p>This pie chart diplays the top 10 unique IPs ordered by the number of ICMP connections to the
                        system.</p>
                </div>
                <div class="fl_right"><img src="generated-graphs/icmp_connections_per_ip_pie.png" alt=""/></div>
                <div class="clear"></div>
            </div>
            <!-- ############################# -->
            <div class="portfolio">
                <div class="fl_left">
                    <h2>Connections by destination port</h2>

                    <p>This vertical bar chart diplays the most accessed resources (ports) of the honeypot system.</p>
                </div>
                <div class="fl_right"><img src="generated-graphs/connections_by_dest_port.png" alt=""/></div>
                <div class="fl_left">
                    <p>This pie chart diplays the most accessed resources (ports) of the honeypot system.</p>
                </div>
                <div class="fl_right"><img src="generated-graphs/connections_by_dest_port_pie.png" alt=""/></div>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
        </div>
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