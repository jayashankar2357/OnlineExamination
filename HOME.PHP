<head>
    <style>
        .class1{
            background-image: url("25.jpg");
            background-position: 100% 100%;
               }
    </style>
</head>
<body class="class1" background-width="100" background-height="100">
<?php
session_start();
if(isset($_GET['action'])&&$_GET['action']=="logout")
{
session_destroy();
header("Location:LOGIN.php");
}

$db=mysql_connect("localhost","root","");

    mysql_select_db("online_exam",$db);
if(isset($_POST['GO']))
{

    $question=$_POST['question'];
    $ans1=$_POST['a1'];
    $ans2=$_POST['a2'];
    $ans3=$_POST['a3'];
    $ans4=$_POST['a4'];
    $subject=$_POST['sub'];

$query="insert into questions values('null','{$question}','{$ans1}','{$ans2}','{$ans3}','{$ans4}','{$subject}')";

  $result=mysql_query($query,$db);

  if($result==true)
  {
   echo "<h2>Question added to the database...</h2>";
   ?><a href="HOME.php"><font face="Monotype Corsiva" size="5">Click here to return back.</font></a> <?php
  }
  else
  {
    echo "Question is not added to the database...";
?><a href="HOME.php"><font face="Monotype Corsiva" size="5">Click here to return back.</font></a> <?php
  }
}
else
{
?>




<form action="<?$_SERVER['PHP_SELF']?>" method="post">
   <center>
   <font face="monotype corsiva" size="10" color=#F9265B>EXAMINATION</font></td>
   </center>
   <table align="right"> <tr><td><a href="?action=logout">LOGOUT</a></td></tr></table>
     <table>
     <tr>
         
     <td>
     <font face="Microsoft Sans Sefia" size="4"><a href="SUBJECT.php">Add subject to database</a></font>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <a href="SUBJECT.php"></a>
     </td>
     <td>
     <font face="Microsoft Sans Sefia" size="4"><a href="DELETESUB.php">Delete subject to database</a></font>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    </a>
     </td>
     <td><font face="Microsoft Sans Sefia" size="4"><a href="DELETE.php">Delete users</font></a></td><td></td><td></td><td></td><td></td><td></td><td></td>
     <td><font face="Microsoft Sans Sefia" size="4"><a href="VIEW.php">View users</font></td></tr></table>
    
     <br/>
       <font face="Microsoft Sans Sefia" size="4">Select subject in which you want to add questions:</font>
       <br/><table><tr>
       <td><label><font face="Verdana" size="4">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</font></label></td>
       <br/>
<td>
<?php
       $db=mysql_connect("localhost","root","");

    mysql_select_db("online_exam",$db);
$result=mysql_query("select * from subjects",$db);
    while($row=mysql_fetch_row($result))
    {    
    ?>
    
&nbsp;&nbsp;&nbsp;&nbsp;<input required name="sub" type="radio" value="<?=$row[0]?>"><font face="Monotype Corsiva" color="maroon" size="4"><?=$row[1]?> </font>
    
 <?php
    }
    ?>
</td></tr>
</table>
<br/>
     <font face="Microsoft Sans Sefia" size="4">Add questions into table:</font>
   <table background="24.jpg" cellpadding=10 cellspacing=6 align="center" bordercolor=f5aa68>
  <br/>
<tr>
<td><label><font face="Verdana" size=4>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp;Question:</font></label></td>
<td><input required type="text" size="100" name="question"></td>
</tr>
<tr>
<td><label><font face="Verdana" size=4>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp;Answer1:</font></label></td>
<td><input required type="text" size="25" name="a1"></td>
</tr>
<tr>
<td><label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<font face="Verdana" size=4>Answer2:</label></font></td>
<td><input required type="text" size="25" name="a2"/>
   </td>
</tr>
<td><label>&nbsp&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<font face="Verdana" size=4>Answer3:</label></font></td>
<td><input required type="text" size="25" name="a3"/>
   </td>
</tr>
<td><label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<font face="Verdana" size=4>Answer4:</label></font></td>
<td><input required type="text" size="25" name="a4"/>
   </td>
</tr>
<tr><td colspan="2" align="center">
<input type="submit" value="SUBMIT"></td>
</tr>
</table>
<input type="hidden" name="GO" value="OK">
</form>
<?php
}
?>
  
</body>