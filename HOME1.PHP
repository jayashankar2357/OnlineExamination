<body background="39.jpg">
<?php
$db=mysql_connect("localhost","root","");
mysql_select_db("online_exam",$db);

if(isset($_POST['SEND']))
{
    $sub=$_POST['sub'];
    $s;
    $r="select sub_id from subjects where sub_name='{$sub}'";
    $t=mysql_query($r);
    while($rr=mysql_fetch_row($t))
    {
       $s=$rr[0];
        
    
    }
    $a="select s from s";
    $r=mysql_query($a);
    while($t=  mysql_fetch_row($r))
    {
        $tt=$t[0];
    }
    
    $query="insert into exam values('{$sub}','{$_SESSION['login_user']}',now(),'{$tt}')";
    $result=mysql_query($query);
    
    if($result==true )
    {
        ?>
    <script>
    alert("success");
    </script>
    <?
    }
   // $s=mysql_insert_id($db);
    $_SESSION['exam_id']=$s;    
    $_SESSION['subject']=$sub;
header("Location:HOMEPAGE.php?page=exam&subject=$sub");

}
?>
<br/><br/><br/><br/><br/>
 <form name="form1" action="<?$_SERVER['REQUEST_URI']?>" method="post">
<table background="22.jpg" align="center" cellpadding="30" cellspacing="5" height="300" width="980" bordercolor=#000000 border="8">
    <tr><td>
   <font color="black" size="5">Select the subject in which you want to write the exam:</font>
    <select name="sub" required>
    <optgroup background=""label="Subjects">
    <option required></option>
    <?php
       $db=mysql_connect("localhost","root","");

    mysql_select_db("online_exam",$db);
    $result=mysql_query("select * from subjects",$db);
    while($row=mysql_fetch_row($result))
    {
    ?>
    <option value="<?=$row[0]?>"><?=$row[1]?>
    </option>
    <?php
    }
    ?>
    </optgroup>
    </select></td>
    </tr>
    </table>
    <table align="center">
   
    <tr><td><input type="submit" name="send" value="START"></td></tr>
    
    </table>
    <input type="hidden" name="SEND" value="OK">
    </form>
</body>