<?php 
class First
{
 public function getClassname(){
   echo "First";
 }
 public function getLatter($lat){
   echo $lat;
 }
}

class Second extends First {
public function getClassname(){
  echo "Second";
}
}
$first = new First();
$second = new Second();
$first ->getClassname(); echo "</br>";
$second ->getClassname(); echo "</br>";
$first ->getLatter("A"); echo "<br>";
$second ->getLatter("B");
