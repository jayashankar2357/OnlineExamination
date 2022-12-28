<head>
    <style>
        .class1{
            background-image: url("LOGO 7.jpg");
            background-position: 40% 40%;
            
            
        }
        .class6{
            background-image: url("LOGO 7.jpg");
            background-position: 50% 85%;
            
            
        }
    </style>
       
  
</head>
<?php

if(isset($_POST['SUBMITTED']))
{
    $user_id=$_POST['loginid'];
    $password=$_POST['password'];
    $valid=false;
   if(isset($_POST['user_type']))
            {
                if($user_id=="admin"&&$password=="password")
                {
             session_start();
                $_SESSION['login_admin']=$user_id;
                $_SESSION['login_time']=time();
                header("Location:HOME.php");
                }
         else
         {
             $error=true;
         }
            }
            else
            {
    $db=mysql_connect("localhost","root","");
    
    mysql_select_db("online_exam",$db);

    $query="select * from users";
    $result=mysql_query($query,$db);
    while($record=mysql_fetch_row($result))
    {

     if($record[2]==$user_id&&$record[3]==$password)
     {
       $valid=true;
     }

    }
  
            }
    
     if($valid==true)
    {
     session_start();
        $_SESSION['login_user']=$user_id;
      
        $_SESSION['login_time']=time();
    header("Location:HOMEPAGE.php");
    }
    else
    {
        ?> <script> alert("Login Error");</script>
        <h2><a href="LOGIN.php"><font color="blue">Click here to return to Login Page</font></a></h2>
        <?php
    }
}
else
{
?>
<head>
<title>
LOGIN PAGE
</title>
    
<script type="text/javascript">
function check()
{
var a=document.forms["form"]["loginid"].value;
var b=document.forms["form"]["password"].value;
if(a=="" && b=="")
{
alert("Enter LOGIN ID and PASSWORD");
return false;
}
else if(a=="")
{
alert("Enter LOGIN ID");
return false;
}
if(b=="")
{
alert("Enter PASSWORD");
return false;
}
}
</script>
</head>

<body class="class1"  background-width="40" background-height="40">
<br/><br/>
<center><font face="CF Revolution" color=#08dbf0 size="8"><u>Examination</u></font></center><marque="right">
<form name="form" action="<?$_SERVER['PHP_SELF']?>" method="post" onsubmit="return check()">
<br/><br/><br/><br/><br/><br/>
<table cellpadding=5 cellspacing=1 border="5" align="center" bordercolor="black">
<tr>
<td><label>
<font size=5 face="14">LOGIN ID</font></label></td>
<td><input type="text" name="loginid"></td><td width="50" rowspan="3">
<p align="center">
<img border="0" src="HAND.JPG" width="90" height="90"></td>
</tr><br/>
<tr>
<td><label><font size=5 face="14">PASSWORD</font></label></td>
<td><input type="password" name="password"></td>
</tr>
<td>
    <input type="checkbox" name="user_type" value="admin"/><font face="Times New Roman" size="2" color="white">Administrator</fount>
</td></tr>
</table>
<input type="hidden" name="SUBMITTED" value="OK">
<br/>
<center><input type="submit" value="LOGIN"></center>
</form> <br/>
<center>
<table cellpadding=3 cellspacing=10 class="class6">
<tr>
<td>
<font face="Gill Sans MT">
If you have not registered please click on the link given below:<br/><br/>
</center>
</font>
<font face="Verdana">
<center>
<table bgcolor="white">
<tr><td>
<a href="REGISTRATION.php" color="c8effo">REGISTER</a>
</td></tr>
</table>
</table>
</center>
</font>
<center><a href="index.html"> HOME </a></center>
<img src="2.gif" align="right">
</body>
<?php
}
?>