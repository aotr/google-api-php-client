**Development on the Google PHP client library moved to `GitHub` with the release of the 1.0.0-alpha, and now the 1.0 branch has reached beta status there will be no further releases of the 0.6 branch of the library.**

Please take a look at the latest version on https://github.com/google/google-api-php-client

For information on migrating, please take a look at this guide: https://developers.google.com/api-client-library/php/guide/migration

This client library helps you work with Google Plus data from your web server.  This document will help explain where you can obtain the files for the client library, and how to use them in your own projects.



# Requirements #

  * [PHP 5.3.x or higher](http://php.net/)
  * PHP Curl extension

# Obtaining the client library #

There are two options for obtaining the files for the client library.

## Obtaining the pre-packaged release ##
Most developers will want to use the pre-packaged release, as it will be the most stable version of the library.

To download the library, go to the [Downloads tab](http://code.google.com/p/google-api-php-client/downloads/list).  The most recent release of the library will be listed.

After extracting the library from the archive, you will have a new `google-api-php-client-x.y` directory.  The library files themselves are in the `google-api-php-client/src` directory.

## Obtaining the most up-to-date version from SVN ##
The most up-to-date version of the code is available from this project's SVN repository.  Obtaining the code this way is intended for developers looking for fixes or features that have not been released in the pre-packaged version, or for developers who want to contribute patches back to the project.

Obtain the code by using the following SVN checkout command (you will need an SVN client installed on your computer):
```
  svn checkout http://google-api-php-client.googlecode.com/svn/trunk/ google-api-php-client
```

After checking out the code, you will have a new `google-api-php-client` directory.  The library files themselves are in the `google-api-php-client/src` directory.

# What to do with the files #

After obtaining the library in either of the ways described above, you will have a directory named `google-api-php-client` somewhere on your filesystem, containing the library files.  Specifically, you will need to include the file `src/Google_Client.php` and `src/contrib/Google_PlusService.php` inside of your scripts.

To be able to include these files inside of your PHP scripts, you will need to tell PHP where it can find the client library.  Listed below are some suggested ways of doing this.

## Copy the `google-api-php-client` directory into your project ##

If your project structure looks like this:
```
  myproject/
    |- myproject.php
```

Copy the `google-api-php-client` directory into the `myproject` directory.  You can add the following code to `myproject.php` to include the client library:
```
  require_once "google-api-php-client/src/Google_Client.php";
  require_once "google-api-php-client/src/contrib/Google_PlusService.php";
```

## Setting `include_path` by editing `php.ini` ##

If you don't want to make a copy of the library directory for each of your projects, you can edit the `php.ini` PHP configuration file on your server and tell PHP where to find the client library.

The line that configures `include_path` will contain some existing paths on your system:
```
  include_path=".:/usr/local/share/pear:/usr/local/PEAR"
```

Add a colon, followed by the path to your `google-api-php-client` directory:
```
  include_path=".:/usr/local/share/pear:/usr/local/PEAR:/path/to/google-api-php-client/src"
```

Once you restart your web server, you can include the library by using the following line in your PHP scripts:
```
  require_once "Google_Client.php";
  require_once "contrib/Google_PlusService.php
```

## Setting `include_path` dynamically inside of your code ##

If you are unable to edit your `php.ini` file, you can still adjust the value of `include_path` inside of your PHP scripts.  Just include the following code:
```
  set_include_path(get_include_path() . PATH_SEPARATOR . '/path/to/google-api-php-client/src');
  require_once "/Google_Client.php";
  require_once "/contrib/Google_PlusService.php";
```

Next read about [using the library](UsingTheLibrary.md)