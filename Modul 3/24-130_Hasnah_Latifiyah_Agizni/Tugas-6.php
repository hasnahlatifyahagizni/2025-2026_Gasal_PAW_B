<?php
// nomor 1
echo "<h3>1. Fungsi array_push()</h3>";
$fruits = ["apple", "banana", "cherry"];
array_push($fruits, "orange", "mango"); 

foreach ($fruits as $f) {
    echo $f . "<br>";
}

// nomor 2
echo "<h3>2. Fungsi array_merge()</h3>";
$num1 = [1, 2, 3];
$num2 = [4, 5, 6];
$merged = array_merge($num1, $num2);

foreach ($merged as $m) {
    echo $m . " ";
}
echo "<br>";

// nomor 3
echo "<h3>3. fungsi array_values()</h3>";

$person = ["nama" => "Agiz", "umur" => 20, "kota" => "pamekasan"];
$values = array_values($person); 

foreach ($values as $v) {
    echo $v . "<br>";
}

// nomor 4
echo "<h3>4. Fungsi array_search()</h3>";

$colors = ["red", "green", "blue", "yellow"];

foreach ($colors as $index => $color) {
    echo "Index $index : $color<br>";
}

$colors = ["red", "green", "blue"];
$search = array_search("blue", $colors);
echo"<br>";
echo "'blue' ditemukan pada indeks ke-$search.";

// nomor 5
echo "<h3>5. Fungsi array_filter()</h3>";

$num = [10, 25, 30, 45, 50];
$filter = array_filter($num, function($num) {
    return $num > 30; 
});

echo "Angka yang lebih besar dari 30:<br>";
foreach ($filter as $f) {
    echo $f . "<br>";
}

// nomor 6
echo "<h3>6. fungsi berbagai sorting</h3>";

$num = [40, 10, 30, 20, 50];

echo "Data awal:<br>";
foreach ($num as $n) echo $n . " ";
echo "<br><br>";

$sort = $num;
sort($sort);
echo "<b>sort()</b>:<br>";
foreach ($sort as $n) echo $n . " ";
echo "<br><br>";

$rsort = $num;
rsort($rsort);
echo "<b>rsort()</b><br>";
foreach ($rsort as $n) echo $n . " ";
echo "<br><br>";

$asort = ["a" => 25, "b" => 40, "c" => 30];
asort($asort);
echo "<b>asort()</b>:<br>";
foreach ($asort as $k => $v) echo "$k : $v<br>";
echo "<br>";

$ksort = ["c" => 90, "a" => 80, "b" => 85];
ksort($ksort);
echo "<b>ksort()</b><br>";
foreach ($ksort as $k => $v) echo "$k : $v<br>";
echo "<br>";

krsort($ksort);
echo "<b>krsort()</b><br>";
foreach ($ksort as $k => $v) echo "$k : $v<br>";
?>
