Sections:


## SSL certificate problem, verify that the CA cert is OK ##

**Problem**: I keep getting the error
```
SSL certificate problem, verify that the CA cert is OK.
Details: SSL routines:SSL3_GET_SERVER_CERTIFICATE:certificate verify failed
```

**Solution**:
That means your server is unable to perform peer SSL certificate verification.

Since the Windows version of PHP and it doesn't come bundled with a Certificate Authority bundle, you need to add it yourself.

You need to add the following line to google-api-php-client/src/io/apiCurlIO.php right before "$data = @curl\_exec($ch);"
```
curl_setopt($ch, CURLOPT_CAINFO, 'c:/path/to/ca-bundle.crt');
```

You'll need to replace 'c:/path/to/ca-bundle.crt' to where ever you have the ca-bundle.crt file.

See this thread for more information:
https://groups.google.com/d/msg/google-api-php-client/S1GBH6-2KOg/92zG1mlSFIIJ