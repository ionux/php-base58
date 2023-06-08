# php-base58
PHP class for encoding &amp; decoding Base-58 values

## Usage:

Include the Base58 class in your project, instantiate an object of this class, call the needed function:

```php
include('Base58.php');

$b58 = new Base58;

$decoded_value = $b58->decode($some_base58_encoded_value);
$encoded_value = $b58->encode($some_hex_encoded_value);
```

That's it! :)

## Found a bug?

Let me know! Send a pull request or a patch. Questions? Ask! I will respond to all filed issues.

**Support:**

* [GitHub Issues](https://github.com/ionux/php-base58/issues)
  * Open an issue if you are having issues with this library

## Contribute

Would you like to help with this project?  Great!  You don't have to be a developer, either.  If you've found a bug or have an idea for an improvement, please open an [issue](https://github.com/ionux/php-base58/issues) and tell me about it.

If you *are* a developer wanting contribute an enhancement, bugfix or other patch to this project, please fork this repository and submit a pull request detailing your changes. I review all PRs!

This open source project is released under the [MIT license](http://opensource.org/licenses/MIT) which means if you would like to use this project's code in your own project you are free to do so.  Speaking of, if you have used this class in a cool new project I would like to hear about it!

## License

```
  Copyright (c) 2015-2023 Rich Morgan, rich@richmorgan.me

  The MIT License (MIT)

  Permission is hereby granted, free of charge, to any person obtaining a copy of
  this software and associated documentation files (the "Software"), to deal in
  the Software without restriction, including without limitation the rights to
  use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of
  the Software, and to permit persons to whom the Software is furnished to do so,
  subject to the following conditions:

  The above copyright notice and this permission notice shall be included in all
  copies or substantial portions of the Software.

  THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
  IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS
  FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR
  COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER
  IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN
  CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
```
