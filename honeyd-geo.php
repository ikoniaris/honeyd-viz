﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
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
            <li><a href="index.php">Homepage</a></li>
            <li><a href="honeyd-viz.php">Honeyd-Viz</a></li>
            <li class="active"><a href="honeyd-geo.php">Honeyd-Geo</a></li>
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
<h2>Geolocation information gathered from the top 10 IP addresses probing the system</h2>
<hr/>

<?php
#Author: ikoniaris
#Website: bruteforce.gr/honeyd-viz

require_once('include/rb.php');
require_once('include/libchart/classes/libchart.php');
require_once('include/qgooglevisualapi/config.inc.php');
require_once('include/geoplugin/geoplugin.class.php');
require_once('include/misc/ip2host.php');
require_once('config.php');

//We initialize the geoplugin component (used below to decode IPs)
$geoplugin = new geoPlugin();

//Let's connect to the database
R::setup('mysql:host=' . DB_HOST . ';port=' . DB_PORT . ';dbname=' . DB_NAME, DB_USER, DB_PASS);

//-----------------------------------------------------------------------------------------------------------------
//NUMBER OF CONNECTIONS PER IP
//-----------------------------------------------------------------------------------------------------------------
$exclude_filter = EXCLUDE_FILTER;
$db_query = "SELECT source_ip, COUNT(source_ip)
  FROM connections
  WHERE source_ip NOT LIKE '$exclude_filter'
  GROUP BY source_ip
  ORDER BY COUNT(source_ip) DESC
  LIMIT 10 ";

$rows = R::getAll($db_query);

if (count($rows)) {
    //We create a new vertical bar chart, a new pie chart and initialize the dataset
    $verticalChart = new VerticalBarChart(600, 300);
    $pieChart = new PieChart(600, 300);
    $dataSet = new XYDataSet();

    //We create a "intensity" pie chart as well along with a dataset
    $intensityPieChart = new PieChart(600, 300);
    $intensityDataSet = new XYDataSet();

    //We create a new Google Map and initialize its columns,
    //where the decoded geolocation data will be entered in the format
    //of Lat(number), Lon(number) and IP(string)
    $gMapTop10 = new QMapGoogleGraph;
    $gMapTop10->addColumns(
        array(
            array('number', 'Lat'),
            array('number', 'Lon'),
            array('string', 'IP')
        )
    );

    //We create a new Intensity Map and initialize its columns,
    //where the decoded geolocation data will be entered in the format
    //of Country(2 letter string), #Probes(number)
    $intensityMap = new QIntensitymapGoogleGraph;
    $intensityMap->addDrawProperties(
        array(
            "title" => 'IntensityMap',
        )
    );
    $intensityMap->addColumns(
        array(
            array('string', '', 'Country'),
            array('number', '#Probes', 'a'),
        )
    );
    //We create a temporary table in the database where we will store the IPs along with their #probes
    //and the corresponding country code, otherwise the Intensity Map won't work, because we need to
    //GROUP BY country code and SUM the #Probers per country
    $temp_table_sql = 'CREATE TEMPORARY TABLE temp_ip (ip VARCHAR(12), counter INT, country VARCHAR(2))';
    R::exec($temp_table_sql);

    //We create a dummy counter to use for the markers' tooltip inside Google Map like: IP 3/10
    //We use the same counter for the IP <table> as well
    $counter = 1;

    //We create a skeleton for the table
    echo '<p>The following table displays the top 10 IP addresses connected to the system (ordered by volume of connections).</p>';
    echo '<table><thead>';
    echo '<tr class="dark">';
    echo '<th>ID</th>';
    echo '<th>IP Address</th>';
    echo '<th>Probes</th>';
    echo '<th>City</th>';
    echo '<th>Region</th>';
    echo '<th>Country Name</th>';
    echo '<th>Code</th>';
    echo '<th>Latitude</th>';
    echo '<th>Longitude</th>';
    echo '<th>Hostname</th>';
    echo '<th>IP Lookup</th>';
    echo '</tr></thead><tbody>';

    //We need to add data on the correct Map columns. The columns are always 0 or 1 or 2 for every repetition
    //so we can hardcode it into our code, but we need a way to automatically increase the row index. So we
    //create a dummy index variable to be increased after every repetition (as many db results we have)
    $col = 0;

    //For every row returned from the database...
    foreach ($rows as $row) {
        //We call the geoplugin service to get the geolocation data for the ip
        $geoplugin->locate($row['source_ip']);

        //We prepare the label for our vertical bar chart and add the point
        $geoip = $row['source_ip'] . " - " . $geoplugin->countryCode;
        $dataSet->addPoint(new Point($geoip, $row['COUNT(source_ip)']));

        //We next prepare the marker's tooltip inside Google Map
        $geostats = "<strong>TOP $counter/10:</strong> " . $row['source_ip'] . "<br />"
            . "<strong>Probes:</strong> " . $row['COUNT(source_ip)'] . "<br />"
            . "<strong>City:</strong> " . $geoplugin->city . "<br />"
            . "<strong>Region:</strong> " . $geoplugin->region . "<br />"
            . "<strong>Country:</strong> " . $geoplugin->countryName . "<br />"
            //."<strong>Country Code:</strong> ".$geoplugin->countryCode."<br />"
            . "<strong>Latitude:</strong> " . $geoplugin->latitude . "<br />"
            . "<strong>Longitude:</strong> " . $geoplugin->longitude . "<br />";

        //And add the marker to the map
        $gMapTop10->setValues(
            array(
                array($col, 0, (float)$geoplugin->latitude),
                array($col, 1, (float)$geoplugin->longitude),
                array($col, 2, $geostats)
            )
        );

        //We prepare the data that will be inserted in our temporary table
        $ip = $row['source_ip'];
        $ip_count = $row['COUNT(source_ip)'];
        $CC = $geoplugin->countryCode;
        $country_query_sql = "INSERT INTO temp_ip VALUES('$ip', '$ip_count', '$CC')";
        R::exec($country_query_sql);

        //For every row returned from the database we create a new table row with the data as columns
        echo '<tr class="light">';
        echo '<td>' . $counter . '</td>';
        echo '<td>' . $row['source_ip'] . '</td>';
        echo '<td>' . $row['COUNT(source_ip)'] . '</td>';
        echo '<td>' . $geoplugin->city . '</td>';
        echo '<td>' . $geoplugin->region . '</td>';
        echo '<td>' . $geoplugin->countryName . '</td>';
        echo '<td>' . $geoplugin->countryCode . '</td>';
        echo '<td>' . $geoplugin->latitude . '</td>';
        echo '<td>' . $geoplugin->longitude . '</td>';
        echo '<td>' . get_host($row['source_ip']) . '</td>';
        echo '<td><a href="http://www.dshield.org/ipinfo.html?ip=' . $row['source_ip'] . '" target="_blank"><img class="icon" src="images/dshield.ico"/></a>'
        . '<a href="http://www.ipvoid.com/scan/' . $row['source_ip'] . '" target="_blank"><img class="icon" src="images/ipvoid.png"/></a>'
        . '<a href="http://www.robtex.com/ip/' . $row['source_ip'] . '.html" target="_blank"><img class=icon" src="images/robtex.ico"/></a>'
        . '<a href="http://www.mcafee.com/threat-intelligence/ip/default.aspx?ip=' . $row['source_ip'] . '" target="_blank"><img class="icon" src="images/mcafee.ico"/></a>'
        . '<a href="http://www.ip-adress.com/ip_tracer/' . $row['source_ip'] . '" target="_blank"><img class="icon" src="images/ip_tracer.png"/></a>'
        . '<a href="https://www.virustotal.com/en/ip-address/' . $row['source_ip'] . '/information/" target="_blank"><img class="icon" src="images/virustotal.ico"/></a></td>';
        echo '</td></tr>';

        //Lastly, we increase the index used by maps to indicate the next row,
        //and the dummy counter that indicates the next IP index (out of 10)
        $col++;
        $counter++;
    }

    //Close tbody and table element, it's ready.
    echo '</tbody></table>';
    echo '<hr /><br />';

    //While still inside the if($result->num_rows > 0) clause (otherwise the dataSet will be empty),
    //we set the bar chart's dataset, render the graph and display it (we're inside html code!)
    $verticalChart->setDataSet($dataSet);
    $verticalChart->setTitle("Number of connections per unique IP (Top 10) + Country Codes");
    //For this particular graph we need to set the corrent padding
    $verticalChart->getPlot()->setGraphPadding(new Padding(5, 50, 100, 50)); //top, right, bottom, left | defaults: 5, 30, 50, 50
    $verticalChart->render("generated-graphs/connections_per_ip_geo.png");
    echo '<p>The following vertical bar chart visualizes the top 10 IPs ordered by the number of connections to the system.'
        . '<br/>Notice the two-letter country code to after each IP get a quick view of the locations where the attacks are coming from.</p>';
    echo '<img src="generated-graphs/connections_per_ip_geo.png">';

    //We set the pie chart's dataset, render the graph and display it (we're inside html code!)
    $pieChart->setDataSet($dataSet);
    $pieChart->setTitle("Number of connections per unique IP (Top 10) + Country Codes");
    $pieChart->render("generated-graphs/connections_per_ip_geo_pie.png");
    echo '<p>The following pie chart visualizes the top 10 IPs ordered by the number of connections to the system.'
        . '<br/>Notice the two-letter country code to after each IP get a quick view of the locations where the attacks are coming from.</p>';
    echo '<img src="generated-graphs/connections_per_ip_geo_pie.png">';
    echo '<hr /><br />';

    //Charts are ready, so is Google Map, let's render it below
    echo '<p>The following zoomable world map marks the geographic locations of the top 10 IPs according to their latitude and longitude values. '
        . 'Click on them to get the full information available from the database.<p>';
    //echo '<div align=center>';
    echo $gMapTop10->render();
    //echo '</div>';
    echo '<br/><hr /><br />';

    //Lastly, we prepare the data for the Intesity Map
    $db_query = "SELECT country, SUM(counter)
      FROM temp_ip
      GROUP BY country
      ORDER BY SUM(counter) DESC";
    //LIMIT 10 ";

    $rows = R::getAll($db_query);

    if (count($rows)) {
        $col = 0; //Dummy row index
        //For every row returned from the database add the values to Intensity Map's table and intensityPieChart
        foreach ($rows as $row) {
            $countryProbes = $row['country'] . " - " . $row['SUM(counter)'];
            $intensityDataSet->addPoint(new Point($countryProbes, $row['SUM(counter)']));
            $intensityMap->setValues(
                array(
                    array($col, 0, (string)$row['country']),
                    array($col, 1, (int)$row['SUM(counter)']),
                )
            );
            $col++;
        }
    }
    //Intensity Map is ready, render it
    echo '<p>The following Intensity Map shows the volume of attacks per country by summarising probes originating from the same nation, using the same IP or not.</p>';
    echo $intensityMap->render();
    echo '<br/>';

    //We set the "intensity" pie chart's dataset, render the graph and display it (we're inside html code!)
    $intensityPieChart->setDataSet($intensityDataSet);
    $intensityPieChart->setTitle("Number of connections per country");
    $intensityPieChart->render("generated-graphs/connections_per_country_pie.png");
    echo '<p>The following pie chart visualizes the volume of attacks per country by summarising probes originating from the same nation, using the same IP or not.</p>';
    echo '<img src="generated-graphs/connections_per_country_pie.png">';
    echo '<hr /><small><a href="http://www.geoplugin.com/" target="_new" title="geoPlugin for IP geolocation">Geolocation by geoPlugin</a><small><br />';

} //END IF

//-----------------------------------------------------------------------------------------------------------------
//END
//-----------------------------------------------------------------------------------------------------------------

//Close the connection, temporary table is deleted automatically
R::close();

?>
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