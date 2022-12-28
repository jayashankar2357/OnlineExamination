
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
 $user_id=$_POST['user'];
   $query="select * from users";
 $result=mysql_query($query,$db);
    while($record=mysql_fetch_row($result))
    {
         


     if($user_id==$record[2])
     {
       
          $q1="delete from users where user_id='{$user_id}'";
     }
    }
   
  $result=mysql_query($q1,$db);

  if($result=="true")
  {
   echo "<h2>User deleted from database...</h2>";
   ?><br/><a href="DELETE.php"><font face="Monotype Corsiva" size="5">Click here to return back.</font></a> <?php
  }
 else
  {
    echo "<h2>User deletion failed...</h2>";
?><br/><a href="DELETE.php"><font face="Monotype Corsiva" size="5">Click here to return back.</font></a> <?php
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
<table>
   <tr>

       <td  bgcolor="aqua" align="center"><?php 
                           if(isset($_SESSION['login_admin']))
                           {
                               ?>
    
                               <a href="?page=view">VIEW USERS</a>
                               <?php
                           }?></td>
   
   </tr>
    </table>
    <table>
    <tr>
    <td>
    <?php
    if(isset($_SESSION['login_admin']))
    {
    ?>

        <?php
        }
        ?>
    </td>

    </tr>
    </table>
   <table  bordercolor="skyblue" cellspacing="5" width="100%" height="100%">
                <tr>

                    <td valign="top">
                        <br/><?php

                        if(isset($_GET['page']))
                        {
                            $p=$_GET['page'];
                            switch($p)
                            {
                             case 'view':include 'VIEW.php';break;
                             
                             default:header("Location:DELETE.php");break;
                         }}?>
                       <br/> <font face="Microsoft Sans Sefia" size="5"><u>Delete user from database:</u></font>
     <br/><br/><br/><br/><br/>
   <table bgcolor=#DEFFCA cellpadding=10 cellspacing=6 align="center" bordercolor=f5aa68>
  
<tr>
<td><label><font face="Verdana" size=4>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp;USER ID:</font></label></td>
<td><input required type="text" size="20" name="user" ></td>
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