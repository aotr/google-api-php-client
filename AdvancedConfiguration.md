**Development on the Google PHP client library moved to `GitHub` with the release of the 1.0.0-alpha, and now the 1.0 branch has reached beta status there will be no further releases of the 0.6 branch of the library.**

Please take a look at the latest version on https://github.com/google/google-api-php-client

For information on migrating, please take a look at this guide: https://developers.google.com/api-client-library/php/guide/migration

# Introduction #

The library has been pre-configured to 'just work' when you download it, however in larger production environments it can be important to use different http transport, cache or authentication methods- and the library was build with this in mind.

You can swap out what classes the library uses for it's cache, http fetcher and authentication by editing the configuration file, and changing the class name to use. These classes should inherit the abstract base class.

You can find these in the `config.php` file:
```
    'authClass'    => 'apiOAuth'
    'ioClass'      => 'apiCurlIO'
    'cacheClass'   => 'apiFileCache'
```

The interface for the Authentication class looks like:
```
abstract class apiAuth {
  abstract public function authenticate(apiCache $cache, apiIO $io, $service);
  abstract public function setAccessToken($accessToken);
  abstract public function setDeveloperKey($developerKey);
  abstract public function sign(apiHttpRequest $request);
}
```

The IO class is:
```
interface apiIO {
  public function __construct(apiCache $storage, apiAuth $auth);
  public function authenticatedRequest(apiHttpRequest $request);
  public function makeRequest(apiHttpRequest $request);

}
```

And finally the abstract cache class:
```
abstract class apiCache {
  abstract function get($key, $expiration = false);
  abstract function set($key, $value);
  abstract function delete($key);
}
```

You can see an example how to implement a different methodigy for one of these classes is the [memcache cache class](http://code.google.com/p/google-api-php-client/source/browse/trunk/src/cache/apiMemcacheCache.php) implementation and the [APC cache class](http://code.google.com/p/google-api-php-client/source/browse/trunk/src/cache/apiApcCache.php) implementation.

To make the library use one of these alternative implementation is as simple as changing the configuration value in your `config.php` file:

```
    'cacheClass'   => 'apiMemcacheCache'
```