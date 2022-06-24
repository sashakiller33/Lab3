<!DOCTYPE html>
<html>
<body>212

<?php
$adress=file("access.log");
$re1 = '/(?:\d{1,3})[.](?:\d{1,3})[.](?:\d{1,3})[.](?:\d{1,3})/s';
$erar = array('/(\s400\s)|(\s409\s)\S/','/option\S/','/Python\S/','/[.]txt\S/','/(\s500\s)|(\s504\s)\S/');//если в строке есть ответ 400 или 409 запрос options запрос питона есть отсылка на тхт файл и
$numberArray=array();
$prv="";
foreach($adress as $line) {
    $er=0;
    $found=0;
    preg_match($re1,$line,$l);
    foreach($numberArray as $string => $value){
        if ($string==$l[0]) {
            $numberArray[$string]=$value+1;
            $found=1;
        }
    }
    if ($found==0)
    { 
     
        $numberArray[$l[0]]=1;

    }

    foreach( $erar as $dang){
        if (preg_match($dang,$line))
        {
        $er++;
    }
    }
    
    if ($er>0)
    {
    echo("Danger: ". $line);
    }
}
arsort($numberArray);
    $i=0;
    foreach($numberArray as $string => $value)
    {
        if ($i<10)
        echo("ip = ". $string . "Vallue=" . $value ."\r\n");
        $i++;
        
    }
?>

</body>
</html>