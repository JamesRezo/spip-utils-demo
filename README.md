# Spip\Utils

```php
<?php

require 'vendor/autoload.php';

use function Spip\Utils\{parse_url, glue_url};

$url = 'http://host/path?query=yes#fragment';

var_dump(glue_url(parse_url($url)) === $url);
```
