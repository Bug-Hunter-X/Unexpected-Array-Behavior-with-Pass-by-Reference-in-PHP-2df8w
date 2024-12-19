```php
function increment_array_value(array &$arr, int $key): void {
  if (!array_key_exists($key, $arr)) {
    $arr[$key] = 0; // Initialize if key doesn't exist
  }
  $arr[$key]++;
}

//In this example, we just demonstrate the function works well
$myArray = [];
increment_array_value($myArray, 0);
increment_array_value($myArray, 1);
increment_array_value($myArray, 0);
print_r($myArray); // Output: Array ( [0] => 2 [1] => 1 )

//However, if you wish to modify the key and have the change reflected outside the function, you must return the modified array and reassign it:
function modify_array(array $arr, int $key, int $newValue): array {
  $arr[$key] = $newValue;
  return $arr; // return modified array
}

$myArray = [0=>1,1=>2];
$myArray = modify_array($myArray, 0, 10);
print_r($myArray); // Output: Array ( [0] => 10 [1] => 2 )
```