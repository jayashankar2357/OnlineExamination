<head>
<script>
function check_mobile(e)
{
value=e.keyCode;
if(value==8||value==46||value==9||value==37||value==6||value==38||value==39||value==40)
return true;
if(value>=48&&value<=57)
return true;
return false;
}
function checkmail()
{
var x=document.forms["myform"]["email"].value;
var atpos=x.indexOf("@");
var dotpos=x.lastIndexOf(".");
if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
  {
  alert("Not a valid e-mail address");
  return false;
}
}
</script>
</head>
<?php

$login_user_id=$_SESSION['login_user'];

 $db=mysql_connect("localhost","root","");
    mysql_select_db("online_exam",$db);

    
    if(isset($_POST['UPDATE_SUBMIT']))
    {
        $query="update users set fname='{$_POST['fname']}',lname='{$_POST['lname']}',password='{$_POST['password']}',email='{$_POST['email']}',mobile='{$_POST['mobile']}',address='{$_POST['address']}' where user_id='{$login_user_id}'";
        $result=mysql_query($query,$db);
        
        if($result==true)
  {
   $msg=true;
  }
  else
  {
   $msg=false;
  }
    }
    
    
  $query="select * from users where user_id='{$login_user_id}'";

    $result=mysql_query($query,$db);

    $info=mysql_fetch_array($result);
    
    
?>
<body background="2.jpg">
<br/><br/>
 
    <table align="center"><tr>
    <td>
    <font face="regular" size="5" color=#003366>
   <u> Profile details</u>:-
    </font>
    </td>
    </tr>
</table>
<br/><br/>
<table >
    <tr>

    </tr>
</table>
</body>
<div>
<form name="myform" action="<?=$_SERVER['REQUEST_URI']?>" method="post" onsubmit="return checkmail()">
<table cellpadding="3" cellspacing="3" align="center">
    <tr>
        <td><label><font size="5">First Name : </font></label></td>
        <td><input type="text" value="<?=$info['fname']?>" name="fname"/></td>
    </tr>
    
    <tr>
        <td><label><font size="5">Last Name : </font></label></td>
        <td><input type="text" value="<?=$info['lname']?>"  name="lname"/></td>
    </tr>
     <tr>
        <td><label><font size="5">&nbsp;&nbsp;Password :</label></td>
        <td><input type="password" value="<?=$info['password']?>"  name="password"/></td>
    </tr>
     <tr>
        <td><label><font size="5">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mobile :</font></label></td>
        <td><input maxlength="10" type="text" value="<?=$info['mobile']?>" name="mobile" onkeydown="return check_mobile(event)"/></td>
    </tr>
     <tr>
        <td><label><font size="5">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Email : </font></label></td>
        <td><input type="text" value="<?=$info['email']?>"  name="email"/></td>
    </tr>
     <tr>
        <td><label><font size="5">&nbsp;&nbsp;&nbsp;&nbsp;Address : </font></label></td>
        <td><input type="text" value="<?=$info['address']?>"  name="address"/></td>
    </tr>
    <br/>
     <?php
 if(isset($msg))
 {

    if($msg==true)
    {
   ?>
    <tr><td colspan="2" align="center" style="color:green">Updation Completed</td>
    </tr>
    <?php
    }
    else
    {
    ?>
    <tr><td colspan="2" align="center" style="color:red">Updation Failed</td>
    </tr>

    <?php
    }
 }
 ?></div>
    <center>
 <tr>
    <td><input type="submit" value="Update Profile"/></td>



</tr>
    </center>
 

</table>
    
    <input type="hidden" name="UPDATE_SUBMIT"/>
</form>

