Package: Honeyd-Viz
Version: 0.3
Author: ikoniaris
Website: bruteforce.gr/honeyd-viz

Honeyd-Viz is a full featured script to visualize statistics from a honeyd honeypot.

It uses the Libchart PHP chart drawing library by Jean-Marc Trémeaux, QGoogleVisualizationAPI PHP Wrapper
for Google’s Visualization API by Thomas Schäfer, RedBeanPHP library by Gabor de Mooij
and geoPlugin’s geolocation technology (geoplugin.com).

REQUIREMENTS:
1. A MySQL database must have been setup and populated using the Honeyd2MySQL script.
2. PHP version 5.3.4 or higher.
3. The following packages: "libapache2-mod-php5", "php5-mysql", "php5-gd".

On Ubuntu/Debian:
apt-get update && apt-get install -y libapache2-mod-php5 php5-mysql php5-gd php5-curl
/etc/init.d/apache2 restart

QUICK INSTALLATION:
wget http://bruteforce.gr/wp-content/uploads/honeyd-viz-VERSION.tar
mv honeyd-viz-VERSION.tar /var/www
cd /var/www
tar xvf honeyd-viz-VERSION.tar --no-same-permissions
cd honeyd-viz
chmod 777 generated-graphs
cp config.php.dist config.php
nano config.php #enter the appropriate values

Browse to http://your-server/honeyd-viz to generate the statistics.

Note 1: If you are on a VPS/server and don't want to use the default Apache document root, 
		you will still need to add a new Apache vhost and enable the site.
Note 2: To fully use the geolocation features (Intensity Map) you will need to give CREATE 
		TEMPORARY TABLES rights to your honeyd database user (most likely it has already been done).
