
```php
<?php
require_once('_config.php');
header("Content-Type: application/json");
echo json_encode(["version" => "0.9"]);
?>
