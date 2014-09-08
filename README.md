Honeyd-Viz
==========

Honeyd-Viz is a full featured script to visualize statistics from a Honeyd honeypot.

It uses the Libchart PHP chart drawing library by Jean-Marc Trémeaux,
QGoogleVisualizationAPI PHP Wrapper for Google's Visualization API by Thomas Schäfer,
RedBeanPHP library by Gabor de Mooij and geoPlugin's geolocation technology (geoplugin.com).

REQUIREMENTS:
-------------
1. PHP version 5.3.4 or higher.
2. The following packages: _libapache2-mod-php5_, _php5-mysql_, _php5-gd_.

On Ubuntu/Debian:
> apt-get update && apt-get install -y libapache2-mod-php5 php5-mysql php5-gd
>
> /etc/init.d/apache2 restart

QUICK INSTALLATION:
-------------------
> wget http://bruteforce.gr/wp-content/uploads/honeyd-viz-VERSION.tar.gz
>
> mv honeyd-viz-VERSION.tar.gz /var/www
>
> cd /var/www
>
> tar zxvf honeyd-viz-VERSION.tar.gz
>
> mv honeyd-viz-VERSION honeyd-viz
>
> cd honeyd-viz
>
> chmod 777 generated-graphs
>
> cp config.php.dist config.php
>
> nano config.php #enter the appropriate values

Browse to http://your-server/honeyd-viz to generate the statistics.

Note 1: If you are on a VPS/server and don't want to use the default Apache document root,
		you will still need to add a new Apache vhost and enable the site.

Note 2: To fully use the geolocation features (Intensity Map) you will need to give CREATE
		TEMPORARY TABLES rights to your honeyd database user (most likely it has already been done).

Note 3: Honeyd-Geo component might display a warning pop-up after rendering the Google Map.
		You can either ignore it because it doesn't really affect the functionality or remove it by
		generating a Google Maps API key (version 2) per the link instructions and putting it in
		honeyd-viz/include/qgooglevisualapi/QApikeyGoogleGraph.class.php, in the form of:
		const KEY = “http://maps.google.com/maps?file=api&v=2&key=XXXXXXXXXXXXXXXXXXXXXXXX”;
		(make sure to remove the '{' and '}' from the key)