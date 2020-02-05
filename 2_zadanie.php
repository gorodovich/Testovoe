<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
  <title>Document</title>
</head>

<body>
  <?
  $colors = [
    'green', 'red', 'yellow', 'gray', 'black', 'purple', 'pink', 'orange', 'green', 'red', 'yellow', 'gray', 'black', 'purple', 'pink', 'orange', 'yellow', 'gray', 'black', 'purple', 'pink', 'orange', 'green', 'red', 'yellow'

  ];
  echo "<p id ='strup'>";
  for ($i = 0; $i < count($colors); $i++) {
    echo "<i>";
    echo "<b>";
    echo $colors[$i];
    echo "</b>";
    echo "</i>";
    echo " ";
    if (($i + 1) % 5 == 0) {
      echo "</br>";
    }
  }
  echo "</p>"
  ?>
  <script>
    function randomInteger(min, max) {
      // случайное число от min до (max+1)
      let rand = min + Math.random() * (max + 1 - min);
      return Math.floor(rand);
    }
    let colors = [
      'green', 'red', 'yellow', 'gray', 'black', 'purple', 'pink', 'orange', 'green', 'red', 'yellow', 'gray', 'black', 'purple', 'pink', 'orange', 'yellow', 'gray', 'black', 'purple', 'pink', 'orange', 'green', 'red', 'yellow'

    ];




    $(document).ready(function() {
      for (let j = 0; j < colors.length; j++) {
        let elem = $("i:eq(" + j + ")");
        elem.css('color', function() {
          let index;
          do {
            index = randomInteger(0, (colors.length - 1));
          } while (colors[index] === colors[j]); //alert(j); alert(index);
          return colors[index];


        });
      }
    });
  </script>
</body>

</html>