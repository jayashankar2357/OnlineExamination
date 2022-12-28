
<?php
session_start();
if(isset($_GET['action'])&&$_GET['action']=="logout")
{
session_destroy();
header("Location:LOGIN.php");
}

$db=mysql_connect("localhost","root","");

    mysql_select_db("online_exam",$db);
    

   
if(isset($_POST['START']))
{
 $sub_id=$_POST['sub'];
   $query="select * from subjects";
 $result=mysql_query($query,$db);
    while($record=mysql_fetch_row($result))
    {
      



     if($sub_id==$record[1])
     {
       
          $q1="delete from subjects where sub_name='{$sub_id}'";
     }
    }
  $result=mysql_query($q1,$db);

  if($result=="true")
  {
   echo "<h2>Subject deleted from database...</h2>";
   ?><br/><a href="DELETESUB.php"><font face="Monotype Corsiva" size="5">Click here to return back.</font></a> <?php
  }
 else
  {
    echo "<h2>Subject deletion failed...</h2>";
?><br/><a href="DELETESUB.php"><font face="Monotype Corsiva" size="5">Click here to return back.</font></a> <?php
  }
  
  
  
  
  
  }

else
{    
    
?>




<form action="<?$_SERVER['PHP_SELF']?>" method="post">
<table cellpadding="7" cellspacing="7" width="100%" bgcolor=#D9FFFF border="8" bordercolor=#54DAF5>
                <tr>
   <td colspan="2" align="center">
   <font face="monotype corsiva" size="10" color=#F9265B>ONLINE EXAMINATION</font></td>
              </tr>
     </table><br/><table align="right" bgcolor=#66FFCC> <tr><td><a href="?action=logout">LOGOUT</a></td></tr></table>
     

     <br/>
      
       <br/>
<br/>

                       <br/> <font face="Microsoft Sans Sefia" size="5"><u>Delete subject from database:</u></font>
     <br/><br/><br/><br/><br/>
   <table bgcolor=#DEFFCA cellpadding=10 cellspacing=6 align="center" bordercolor=f5aa68>
  
<tr>
<td><label><font face="Verdana" size=4>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp;SUBJECT NAME:</font></label></td>
<td><input required type="text" size="20" name="sub" ></td>
</tr>

<tr><td colspan="2" align="center">
<input type="submit" value="DELETE"></td>
</tr>
</table>
<input type="hidden" name="START" value="OK">
</form>
   <br/><br/><br/><br/>
   <table align="center">
    <tr>
     <tr>
    <td bgcolor=#AEFFFF><a href="HOME.php"><font size="3" ><<-BACK</font></a></td>
    </tr>
    </tr>
</table><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
 
                        
                        
                       
   </table>
   
<?php
}
?>
