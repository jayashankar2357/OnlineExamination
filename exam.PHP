

<?php
$db=mysql_connect("localhost","root","");
mysql_select_db("online_exam",$db);



if(isset($_POST['EXAM_SUBMIT']))
{
    
   unset($_SESSION['exam_status']);
   unset($_SESSION['start_time']);
      
   $q=array_keys($_POST);
   $i=0;
   $questions=array();
   $submitted_answers=array();
   while(is_int($q[$i]))
   {
       array_push($questions,$q[$i]);
       array_push($submitted_answers,$_POST[$q[$i]]);
       $i++;
   }
   
// print_r($questions);
// echo "<hr/>";
// print_r($submitted_answers);
   $marks=0;
for($i=0;$i<count($questions);$i++)
{
$query="select * from questions where qid={$questions[$i]} and ans1='{$submitted_answers[$i]}'";
$result=mysql_query($query,$db);
if(mysql_num_rows($result)==1)
{
    $marks++;
}

//mysql_free_result($result);
}
//$query1="update exam set marks={$marks} where exam_id={$_SESSION['exam_id']}";
//$result=mysql_query($query1,$db);
//if($result==true)
//{
    ?>
<h3><center><font face="monotype corsiva" size="10" color="blue">Marks:<?=$marks?> </font></center></h3>;   
<?php
$query1="insert into mm values('{$_SESSION['login_user']}','{$marks}',now(),'{$_SESSION['subject']}')";
$result=mysql_query($query1,$db);
if($result==true)
{
}
else
{
 echo "<h3>Error in Evaluating Exam...<h3>";   
}




}                                    
else
{
 
if(isset($_SESSION['subject']))
{
    $sub=$_SESSION['subject'];
}
else
{
    unset($_SESSION['subject']);
    header("Location:HOMEPAGE.php?page=reg");
}
    
if(isset($_SESSION['exam_status']))
{
  $now=time();
  $start=$_SESSION['start_time'];
  
  if($now-$start<=600)
  {
           unset($_SESSION['exam_status']);
           unset($_SESSION['start_time']);
           
      echo "<script>alert('Exam Interruped...')</script>";
      ?>
<meta http-equiv="refresh" content="0;URL=HOMEPAGE.php?page=reg"/>
<?php
  

  }
  
}
else
{
$_SESSION['exam_status']=true;
$_SESSION['start_time']=time();
}




$query="select qid,question,ans1,ans2,ans3,ans4 from questions where subject=$sub order by rand() limit 15";
$result=  mysql_query($query,$db);
while($q=mysql_fetch_row($result))
{
    
    $q_and_a=array();
    
    array_push($q_and_a,$q[0],$q[2]);
    $answers=array();
    array_push($answers,$q_and_a);   
}
?>

<head>
<script>
function check(e)
{
    k=e.keyCode;
//    alert(k);
 if(k==116||k==18||k==68)
     return false;
 return true;
}
</script>
</head>
<body onkeydown="return check(event)">
  <center>  <label style="color:red;font-size: 16pt;text-decoration: blink"></label></center>
  <hr/>
<form action="<?=$_SERVER['REQUEST_URI']?>" method="post"> 
<?php
$num=1;
mysql_data_seek($result,0);
while($r=mysql_fetch_row($result))
{
 
    $row=array($r[2],$r[3],$r[4],$r[5]);
    $r1=$row;
    $random=array();
    while(count($r1)!=0)
    {
    $random_t=array_rand($r1);
    array_push($random,$r1[$random_t]);
    array_splice($r1,$random_t,1);
    }
   // print_r($random);
    ?>
<table>
    <tr><td colspan="4"><font size="4"><?=($num++).".&nbsp;".$r[1]?></font></td></tr>

    <tr>
        
<td><input type="radio" name="<?=$r[0]?>" value="<?=$random[0]?>"/>A) <?=$random[0]?></td>
<td><input type="radio"  name="<?=$r[0]?>" value="<?=$random[1]?>"/>B) <?=$random[1]?></td>
<td><input type="radio" name="<?=$r[0]?>" value="<?=$random[2]?>"/>C) <?=$random[2]?></td>
<td><input type="radio"  name="<?=$r[0]?>" value="<?=$random[3]?>"/>D) <?=$random[3]?></td></tr>
</table>
<br/>
<?php
unset($random);
}
?>
<hr/>
<input type="hidden" name="EXAM_SUBMIT"/>
<center><input type="submit" value="Submit"/></center>
</form>
</body>
<?php
}
?>