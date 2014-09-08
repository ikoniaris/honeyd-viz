<?php
#Package: Honeyd-Viz
#Version: 0.2
#Author: ikoniaris
#Website: bruteforce.gr/honeyd-viz

require_once('include/libchart/classes/libchart.php');
require_once('config.php');
require_once('include/rb.php');


//Let's connect to the database
R::setup('mysql:host=' . DB_HOST . ';port=' . DB_PORT . ';dbname=' . DB_NAME, DB_USER, DB_PASS);

//-----------------------------------------------------------------------------------------------------------------
//CONNECTIONS BY PROTOCOL
//-----------------------------------------------------------------------------------------------------------------
$db_query = "SELECT proto, COUNT(proto)
  FROM connections
  GROUP BY proto
  ORDER BY COUNT(proto) DESC ";

$rows = R::getAll($db_query);

if (count($rows)) {
    //We create a new vertical bar chart and initialize the dataset
    $chart = new VerticalBarChart(600, 300);
    $pie_chart = new PieChart(600, 300);
    $dataSet = new XYDataSet();

    //For every row returned from the database we add a new point to the dataset
    foreach ($rows as $row)
        $dataSet->addPoint(new Point($row['proto'], $row['COUNT(proto)']));

    //We set the bar chart's dataset and render the graph
    $chart->setDataSet($dataSet);
    $chart->setTitle("Connections by protocol");
    $chart->render("generated-graphs/connections_by_proto.png");

    //We set the pie chart's dataset and render the graph
    $pie_chart->setDataSet($dataSet);
    $pie_chart->setTitle("Connections by protocol");
    $pie_chart->render("generated-graphs/connections_by_proto_pie.png");
}

//-----------------------------------------------------------------------------------------------------------------
//CONNECTIONS BY DESTINATION IP
//-----------------------------------------------------------------------------------------------------------------
$db_query = "SELECT dest_ip, COUNT(dest_ip)
  FROM connections
  GROUP BY dest_ip
  ORDER BY COUNT(dest_ip) DESC";

$rows = R::getAll($db_query);

if (count($rows)) {
    //We create a new vertical bar chart and initialize the dataset
    $chart = new VerticalBarChart(600, 300);
    $pie_chart = new PieChart(600, 300);
    $dataSet = new XYDataSet();

    //For every row returned from the database we add a new point to the dataset
    foreach ($rows as $row)
        $dataSet->addPoint(new Point($row['dest_ip'], $row['COUNT(dest_ip)']));

    //We set the bar chart's dataset and render the graph
    $chart->setDataSet($dataSet);
    $chart->setTitle("Connections by destination IP");
    //For this particular graph we need to set the corrent padding
    $chart->getPlot()->setGraphPadding(new Padding(5, 40, 75, 50)); //top, right, bottom, left | defaults: 5, 30, 50, 50
    $chart->render("generated-graphs/connections_by_dest_ip.png");

    //We set the pie chart's dataset and render the graph
    $pie_chart->setDataSet($dataSet);
    $pie_chart->setTitle("Connections by destination IP");
    $pie_chart->render("generated-graphs/connections_by_dest_ip_pie.png");
}

//-----------------------------------------------------------------------------------------------------------------
//NUMBER OF CONNECTIONS PER IP
//-----------------------------------------------------------------------------------------------------------------
$db_query = 'SELECT source_ip, COUNT(source_ip) '
    . "FROM connections "
    . "GROUP BY source_ip "
    . "ORDER BY COUNT(source_ip) DESC "
    . "LIMIT 10 ";

$rows = R::getAll($db_query);

if (count($rows)) {
    //We create a new vertical bar chart,a new pie chart and initialize the dataset
    $chart = new VerticalBarChart(600, 300);
    $pie_chart = new PieChart(600, 300);
    $dataSet = new XYDataSet();

    //For every row returned from the database we add a new point to the dataset
    foreach ($rows as $row)
        $dataSet->addPoint(new Point($row['source_ip'], $row['COUNT(source_ip)']));

    //We set the bar chart's dataset and render the graph
    $chart->setDataSet($dataSet);
    $chart->setTitle("Number of connections per unique IP (Top 10)");
    //For this particular graph we need to set the corrent padding
    $chart->getPlot()->setGraphPadding(new Padding(5, 40, 75, 50)); //top, right, bottom, left | defaults: 5, 30, 50, 50
    $chart->render("generated-graphs/connections_per_ip.png");

    //We set the pie chart's dataset and render the graph
    $pie_chart->setDataSet($dataSet);
    $pie_chart->setTitle("Number of connections per unique IP (Top 10)");
    $pie_chart->render("generated-graphs/connections_per_ip_pie.png");
}

//-----------------------------------------------------------------------------------------------------------------
//TCP CONNECTIONS PER IP
//-----------------------------------------------------------------------------------------------------------------
$db_query = 'SELECT source_ip, COUNT(source_ip) '
    . "FROM connections "
    . "WHERE proto = 'tcp' "
    . "GROUP BY source_ip "
    . "ORDER BY COUNT(source_ip) DESC "
    . "LIMIT 10 ";

$rows = R::getAll($db_query);

if (count($rows)) {
    //We create a new vertical bar chart,a new pie chart and initialize the dataset
    $chart = new VerticalBarChart(600, 300);
    $pie_chart = new PieChart(600, 300);
    $dataSet = new XYDataSet();

    //For every row returned from the database we add a new point to the dataset
    foreach ($rows as $row)
        $dataSet->addPoint(new Point($row['source_ip'], $row['COUNT(source_ip)']));

    //We set the bar chart's dataset and render the graph
    $chart->setDataSet($dataSet);
    $chart->setTitle("Number of TCP connections per unique IP (Top 10)");
    //For this particular graph we need to set the corrent padding
    $chart->getPlot()->setGraphPadding(new Padding(5, 40, 75, 50)); //top, right, bottom, left | defaults: 5, 30, 50, 50
    $chart->render("generated-graphs/tcp_connections_per_ip.png");

    //We set the pie chart's dataset and render the graph
    $pie_chart->setDataSet($dataSet);
    $pie_chart->setTitle("Number of TCP connections per unique IP (Top 10)");
    $pie_chart->render("generated-graphs/tcp_connections_per_ip_pie.png");
}

//-----------------------------------------------------------------------------------------------------------------
//UDP CONNECTIONS PER IP
//-----------------------------------------------------------------------------------------------------------------
$db_query = 'SELECT source_ip, COUNT(source_ip) '
    . "FROM connections "
    . "WHERE proto = 'udp' "
    . "GROUP BY source_ip "
    . "ORDER BY COUNT(source_ip) DESC "
    . "LIMIT 10 ";

$rows = R::getAll($db_query);

if (count($rows)) {
    //We create a new vertical bar chart,a new pie chart and initialize the dataset
    $chart = new VerticalBarChart(600, 300);
    $pie_chart = new PieChart(600, 300);
    $dataSet = new XYDataSet();

    //For every row returned from the database we add a new point to the dataset
    foreach ($rows as $row)
        $dataSet->addPoint(new Point($row['source_ip'], $row['COUNT(source_ip)']));

    //We set the bar chart's dataset and render the graph
    $chart->setDataSet($dataSet);
    $chart->setTitle("Number of UDP connections per unique IP (Top 10)");
    //For this particular graph we need to set the corrent padding
    $chart->getPlot()->setGraphPadding(new Padding(5, 40, 75, 50)); //top, right, bottom, left | defaults: 5, 30, 50, 50
    $chart->render("generated-graphs/udp_connections_per_ip.png");

    //We set the pie chart's dataset and render the graph
    $pie_chart->setDataSet($dataSet);
    $pie_chart->setTitle("Number of UDP connections per unique IP (Top 10)");
    $pie_chart->render("generated-graphs/udp_connections_per_ip_pie.png");
}

//-----------------------------------------------------------------------------------------------------------------
//ICMP CONNECTIONS PER IP
//-----------------------------------------------------------------------------------------------------------------
$db_query = 'SELECT source_ip, COUNT(source_ip) '
    . "FROM connections "
    . "WHERE proto = 'icmp' "
    . "GROUP BY source_ip "
    . "ORDER BY COUNT(source_ip) DESC "
    . "LIMIT 10 ";

$rows = R::getAll($db_query);

if (count($rows)) {
    //We create a new vertical bar chart,a new pie chart and initialize the dataset
    $chart = new VerticalBarChart(600, 300);
    $pie_chart = new PieChart(600, 300);
    $dataSet = new XYDataSet();

    //For every row returned from the database we add a new point to the dataset
    foreach ($rows as $row)
        $dataSet->addPoint(new Point($row['source_ip'], $row['COUNT(source_ip)']));

    //We set the bar chart's dataset and render the graph
    $chart->setDataSet($dataSet);
    $chart->setTitle("Number of ICMP connections per unique IP (Top 10)");
    //For this particular graph we need to set the corrent padding
    $chart->getPlot()->setGraphPadding(new Padding(5, 40, 75, 50)); //top, right, bottom, left | defaults: 5, 30, 50, 50
    $chart->render("generated-graphs/icmp_connections_per_ip.png");

    //We set the pie chart's dataset and render the graph
    $pie_chart->setDataSet($dataSet);
    $pie_chart->setTitle("Number of ICMP connections per unique IP (Top 10)");
    $pie_chart->render("generated-graphs/icmp_connections_per_ip_pie.png");
}

//-----------------------------------------------------------------------------------------------------------------
//CONNECTIONS BY DESTINATION PORTS
//-----------------------------------------------------------------------------------------------------------------
$db_query = 'SELECT dest_port, COUNT(dest_port), proto '
    . "FROM connections "
    . "GROUP BY dest_port "
    . "ORDER BY COUNT(dest_port) DESC ";

$rows = R::getAll($db_query);

if (count($rows)) {
    //We create a new vertical bar chart,a new pie chart and initialize the dataset
    $chart = new VerticalBarChart(600, 300);
    $pie_chart = new PieChart(600, 300);
    $dataSet = new XYDataSet();

    //For every row returned from the database we add a new point to the dataset
    foreach ($rows as $row)
        $dataSet->addPoint(new Point($row['dest_port'] . " / " . $row['proto'], $row['COUNT(dest_port)']));

    //We set the bar chart's dataset and render the graph
    $chart->setDataSet($dataSet);
    $chart->setTitle("Number of connections by destination port");
    $chart->render("generated-graphs/connections_by_dest_port.png");

    //We set the pie chart's dataset and render the graph
    $pie_chart->setDataSet($dataSet);
    $pie_chart->setTitle("Number of connections by destination port");
    $pie_chart->render("generated-graphs/connections_by_dest_port_pie.png");
}

//-----------------------------------------------------------------------------------------------------------------
//MOST CONNECTIONS PER DAY
//-----------------------------------------------------------------------------------------------------------------
$db_query = 'SELECT COUNT(*), date_time '
    . "FROM connections "
    . "GROUP BY DAYOFYEAR(date_time) "
    . "ORDER BY COUNT(*) DESC "
    . "LIMIT 20 ";

$rows = R::getAll($db_query);

if (count($rows)) {
    //We create a new horizontal bar chart and initialize the dataset
    $chart = new HorizontalBarChart(600, 300);
    $dataSet = new XYDataSet();

    //For every row returned from the database we add a new point to the dataset
    foreach ($rows as $row)
        $dataSet->addPoint(new Point(date('d-m-Y', strtotime($row['date_time'])), $row['COUNT(*)']));
    //$dataSet->addPoint(new Point(date('l, d-m-Y', strtotime($row['date_time'])), $row['COUNT(*)']));

    //We set the horizontal chart's dataset and render the graph
    $chart->setDataSet($dataSet);
    $chart->setTitle("Most connections per day (Top 20)");
    $chart->getPlot()->setGraphPadding(new Padding(5, 30, 50, 75 /*140*/)); //top, right, bottom, left | defaults: 5, 30, 50, 50
    $chart->render("generated-graphs/most_connections_per_day.png");
}

//-----------------------------------------------------------------------------------------------------------------
//CONNECTIONS PER DAY
//-----------------------------------------------------------------------------------------------------------------
$db_query = 'SELECT COUNT(*), date_time '
    . "FROM connections "
    . "GROUP BY DAYOFYEAR(date_time) "
    . "ORDER BY date_time ASC ";

$rows = R::getAll($db_query);

if (count($rows)) {
    //We create a new line chart and initialize the dataset
    $chart = new LineChart(600, 300);
    $dataSet = new XYDataSet();

    //This graph gets messed up for large DBs, so here is a simple way to limit some of the input
    $counter = 1;
    //Display date legend only every $mod rows, 25 distinct values being the optimal for a graph
    $mod = round(count($rows) / 25);
    if ($mod == 0) $mod = 1; //otherwise a division by zero might happen below
    //For every row returned from the database we add a new point to the dataset
    foreach ($rows as $row) {
        if ($counter % $mod == 0) {
            $dataSet->addPoint(new Point(date('d-m-Y', strtotime($row['date_time'])), $row['COUNT(*)']));
        } else {
            $dataSet->addPoint(new Point('', $row['COUNT(*)']));
        }
        $counter++;
    }

    //We set the line chart's dataset and render the graph
    $chart->setDataSet($dataSet);
    $chart->setTitle("Connections per day");
    $chart->render("generated-graphs/connections_per_day.png");
}

//-----------------------------------------------------------------------------------------------------------------
//CONNECTIONS PER WEEK
//-----------------------------------------------------------------------------------------------------------------
$db_query = 'SELECT COUNT(*), MAKEDATE( '
    . "CASE "
    . "WHEN WEEKOFYEAR(date_time) = 52 "
    . "THEN YEAR(date_time)-1 "
    . "ELSE YEAR(date_time) "
    . "END, (WEEKOFYEAR(date_time) * 7)-4) AS DateOfWeek_Value "
    . "FROM connections "
    . "GROUP BY WEEKOFYEAR(date_time) "
    . "ORDER BY date_time ASC";


$rows = R::getAll($db_query);

if (count($rows)) {
    //We create a new line chart and initialize the dataset
    $chart = new LineChart(600, 300);
    $dataSet = new XYDataSet();

    //This graph gets messed up for large DBs, so here is a simple way to limit some of the input
    $counter = 1;
    //Display date legend only every $mod rows, 25 distinct values being the optimal for a graph
    $mod = round(count($rows) / 25);
    if ($mod == 0) $mod = 1; //otherwise a division by zero might happen below
    //For every row returned from the database we add a new point to the dataset
    foreach ($rows as $row) {
        if ($counter % $mod == 0) {
            $dataSet->addPoint(new Point(date('d-m-Y', strtotime($row['DateOfWeek_Value'])), $row['COUNT(*)']));
        } else {
            $dataSet->addPoint(new Point('', $row['COUNT(*)']));
        }
        $counter++;

        //We add 6 "empty" points to make a horizontal line representing a week
        for ($i = 0; $i < 6; $i++) {
            $dataSet->addPoint(new Point('', $row['COUNT(*)']));
        }
    }

    //We set the line chart's dataset and render the graph
    $chart->setDataSet($dataSet);
    $chart->setTitle("Connections per week");
    $chart->render("generated-graphs/connections_per_week.png");
}

//-----------------------------------------------------------------------------------------------------------------
//END
//-----------------------------------------------------------------------------------------------------------------

//We close the connection
R::close();

//And redirect to the graph presentation page
header('location:honeyd-viz.php');
?>