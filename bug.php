```php
function increment_array_value(array &$arr, int $key): void {
  if (!array_key_exists($key, $arr)) {
    $arr[$key] = 0; // Initialize if key doesn't exist
  }
  $arr[$key]++;
}

$myArray = [];
increment_array_value($myArray, 0);
increment_array_value($myArray, 1);
increment_array_value($myArray, 0);
print_r($myArray); // Output: Array ( [0] => 2 [1] => 1 )

//The bug is that if you modify the key inside of the function, it will not reflect in the outside scope because of passing by reference, but the value can still be accessed.
increment_array_value($myArray, 0);
$myArray[0] = 10; // Modifying value directly works fine
print_r($myArray); // Output: Array ( [0] => 10 [1] => 1 )

//This will show the key 0's value increased to 3
increment_array_value($myArray, 0);
print_r($myArray); // Output: Array ( [0] => 3 [1] => 1 )

```