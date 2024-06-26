

<?php

$GLOBALS["appDir"] = resolve_path("app");

function resolve_path($name)
{
    if ($name == ".")
    {
        $publicRoot = $_SERVER["DOCUMENT_ROOT"] . "/..";
        $appRoot = $_SERVER["DOCUMENT_ROOT"];
    }
    else if ($_SERVER["DOCUMENT_ROOT"] != "")
    {
        $publicRoot = $_SERVER["DOCUMENT_ROOT"] . "/../$name";
        $appRoot = $_SERVER["DOCUMENT_ROOT"] . "/$name";
    }
    else
    {
        return "../{$name}";
    }

    return file_exists($publicRoot) ? realpath($publicRoot) : realpath($appRoot);
}

spl_autoload_register(function ($fullName) {
    $parts = explode("\\", $fullName);
    $len = count($parts);
    $className = $parts[$len - 1];
    if (file_exists($GLOBALS["appDir"] . "/models/{$className}.php"))
    {
      require_once $GLOBALS["appDir"] . "/models/{$className}.php";
    }
});
```

Commit these changes and push to [GitHub](https://github.com/).

### 2. Implement Rolling a Dice

In `Dice.php`, implement a dice roller. Your `roll` method will need a
random number generator, take a look at
[rand(int $min, int $max): int](https://www.php.net/manual/en/function.rand.php).

You can run the application by running

```bash
(cd public && php -S localhost:4000)
```

And, here is an example test in `public/index.php` to use the `Dice.php`.

```php
<?php
require_once('_config.php');

use Yatzy\Dice;

$d = new Dice();

for ($i=1; $i<=5; $i++) {
  echo "ROLL {$i}: {$d->roll()}<br>";
}
