# CMU Slider

Repo for Software engineering class

Cmu slider application for cs dept

////////// Documentation //////////


This is custom slideshow software running on an Ubuntu server

The slideshow is a custom ajax page that gets slides from a mysql db

Ajax is used for almost all form submission

This software uses jquery

If any jquery errors show up in the future then the cdn may be outdated

Db is mysql and can be accessed through phpmyadmin

The mysql root user's password is the same as the admin password in Ubuntu

permissions for content admins:
	
	superuser - manage content and manage user

	admin - manage content but not users

	moderator - not configured to do anything yet

This software was developed and tested in Chrome. Please use Google Chrome if possible there are known issues in IE.

The live version of the slideshow is run by using a bash script that runs on startup. The script is in this repo
as slideshow. It launches Chrome in kiosk mode with web security disabled. Web security needs to be disabled for the
error reporting to happend correctly.

There is a possibility that with the nature of Chrome's auto updating that the bash script may fail
someday. In this event edit the slideshow script to reflect the more current way of launching Chrome
with security disabled in kiosk mode.

In the event that the server dies here is what is needed to make a new one.
	apache2
	mysql
	php5
	Google Chrome
	import db schema from cmu_slider.sql file


////////// Things that could be better //////////

It is a known issue that if the user wants to use the same picture more than once they will
have to rename it or it won't let them upload it again. Alternately they can also just edit
the image field to the correct link.

This doesn't auto backup the db. Every so often it may be useful to export the db to a sql file.
There is currently a sql file containing a snapshot of the current db.

Registering users will need to be done by a superuser which may become too cumbersome

Slideshow is kind of lame. It just uses a fade in/fade out animation. This matches channel 2 but is
still kind of lame.

The error logs do not clean up after themselves. They should be checked maybe once a year and cleaned
up. Otherwise they could start eating up memory after years of logs.

////////// Files //////////

customSlide.php - The current slideshow page that is live on the tv

home.php - The create slide page that has the forms necessary for creating slides

index.php - copy of home.

functions.php -  some commonly used php functions that are included on many pages

