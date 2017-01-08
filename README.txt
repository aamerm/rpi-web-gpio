Home Automation using Raspberry Pi

Install wiringPi to control GPIO

$ git clone git://git.drogon.net/wiringPi
$ cd wiringPi
$ ./build

You can use following commands to test wiringPi

$ gpio readall
$ gpio mode 0 out
$ gpio write 0 1
$ gpio write 0 0

Install apache and php

$ sudo apt-get update
$ sudo apt-get install apache2 php5 libapache2-mod-php5

check apache is working by opening the browser and giving ip address of RPi
Following text should appear on webpage

"It works!
This is the default web page for this server.
The web server software is running but no content has been added, yet."

Copy the project files to www directory

$ sudo cp -a ~/rpi-web-gpio/* /var/www/
$ cd /var/www/
$ sudo rm index.html
$ chmod +x *

check if app is working by opening the browser and giving ip address of RPi

Reference
http://wiringpi.com/download-and-install/
https://projects.drogon.net/raspberry-pi/wiringpi/the-gpio-utility/


