<?
  $str = $argv[1];
  $mas = explode(" ", $str);
  $result = array();
  for($i=0;$i<count($mas); $i++){
    if(preg_match('/^-?[0-9]+$/', $mas[$i])){
      if($mas[$i]=="-0"){
        $mas[$i]="0";
     
    } array_push($result, $mas[$i]);
  }
  }
  $result=(array_unique($result)); asort($result);
  var_dump($result);
  
?>