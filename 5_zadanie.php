<?
$host = "localhost";
$user = "root";
$password = "";
$link = new PDO("mysql:host=$host; dbname=test_base;", $user, $password);
$result = $link->query("select p.id, p.fullname, 100+sum( ifnull(t_to.amount,0)-ifnull(t_from.amount,0) ) as balance from persons p left join (select from_person_id, sum(amount) amount from transactions group by from_person_id) t_from on p.id = t_from.from_person_id left join (select to_person_id, sum(amount) amount from transactions group by to_person_id) t_to on p.id = t_to.to_person_id group by p.id,p.fullname order by p.id");
$row = $result->fetchall(PDO::FETCH_UNIQUE);

if (isset($_POST['submit'])) {
  echo "<table>";
  for ($i = 1; $i <= count($row); $i++) {
    echo "<tr>";
    for ($j = 0; $j < 2; $j++) {

      echo "<td>";
      if ($j == 1) {
        echo round((float) $row[$i][$j], 2);
        continue;
      }
      echo $row[$i][$j];
      echo "</td>";
    }
    echo "</tr>";
  }
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
<form method="POST" action="">
  <input type="submit" name="submit" value="Показать счета пользователей">
</form>

<body>

</body>

</html>