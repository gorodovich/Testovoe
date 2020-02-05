<?
include 'simple_html_dom.php';
$dom = file_get_html('https://terrikon.com/football/italy/championship/2018-19/table');
$seasons = [];
$season = [];
foreach ($dom->find('.news dd') as $k => $tabl) {
  if (strpos($tabl->plaintext, " Чемпионат Италии ") !== false) {
    $seasons[$k] = substr(str_replace(" ", "", $tabl->plaintext), 0, 7);
    $season[$k] = $seasons[$k] . "/";
  }
}
$season[0] = "";


if (isset($_POST['submit'])) {
  $name = "";
  if (isset($_POST['name'])) $name = $_POST['name'];



  for ($j = 0; $j < count($season); $j++) {
    $html[$j] = file_get_html('https://terrikon.com/football/italy/championship/' . $season[$j] . 'table');

    foreach ($html[$j]->find('.big') as $tbl) {
      for ($i = 0; $i < 21; $i++) {
        $str[$j][$i] = $tbl->children($i)->plaintext;
      }
    }
  }
  $teams = [];
  for ($j = 0; $j < count($season); $j++) {
    $bufStr = $str[$j];


    array_shift($bufStr);
    // var_dump($bufStr);
    for ($i = 0; $i < count($bufStr); $i++) {
      $teams[$j][$i] = substr($bufStr[$i], 0, strpos($bufStr[$i], "#"));
      $teams[$j][$i] = trim($teams[$j][$i]);
      $teams[$j][$i] = substr($teams[$j][$i], strpos($teams[$j][$i], " "), strlen((string) $teams[$j][$i]));
      $teams[$j][$i] = trim($teams[$j][$i]);
    }
    //var_dump($teams[$j]);
  }
  //var_dump($teams);
  echo $name;
  echo "<table>";
  echo "<tr>";
  echo "<td>";
  echo "Сезон";
  echo "</td>";
  echo "<td>";
  echo "Место";
  echo "</td>";
  echo "</tr>";
  for ($j = 0; $j < count($seasons); $j++) {

    echo "<tr>";
    echo "<td>";
    echo $seasons[$j];
    echo "</td>";
    foreach ($teams[$j] as $key => $value) {
      if ($value == $name) {
        $place[$j] = $key + 1;
      }
    }
    echo "<td>";
    echo $place[$j];
    echo "</td>";
    echo "</tr>";
  }
  echo "</table>";
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>

<body>
  <form action="" method="POST">
    Название футбольного клуба: <input type='text' name="name"> <br />
    <input type="submit" name="submit" value="Поиск" onclick=>
  </form>
</body>

</html>