<head>
    <style>
        .class2{
            background-image: url("39.jpg");
            background-position: 80% 100%;
            
            
        }
        
        .class3{
            background-image: url("blue.jpg");
            background-position: 100% 100%;
           
            
            
        }
        
    </style>
    
</head>
    
    
<?php
session_start();



if(isset($_GET['action'])&&$_GET['action']=="logout")
{
session_destroy();
header("Location:LOGIN.php");
}
?>
<head>
<title>HOMEPAGE</title>
<style>
    <!--
A:link {text-decoration: none}
A:visited {text-decoration: none}
A:active {text-decoration: none}
A:hover {text-decoration: underline}
-->
  #sty  td:hover{
        margin-bottom: 3px;       
        text-decoration:  blink;
        font-style:  italic;   
        font-color:  white;
        font-size: 16;
        font-weight: bolder;       
    }
    #menu  td:hover{
        
        
        margin-bottom: 3px;
        border-bottom-color: black;  
        border-left-color: black;
        border-right-color: black;
        border-top-color: black;
        text-decoration:  blink;
    border-bottom-width: 15;
    border-left-width: 15;
    border-left-width: 15;
    border-right-width: 15;
    
    font-size: 20; 
      font-style:  oblique;
        font-weight: bolder;       
    }
 

</style>
</head>


<body class="class2">   
    <table background="blue.jpeg" align="center" cellpadding="10"  cellspacing="10" width="80%" >
<center>
    <img src="14.png">
    </center>
 </table>
     <table align="center" cellpadding="10"  cellspacing="10" width="80%" >
   <tr id="menu">

       <td height="40" align="center"><?php 
                           if(isset($_SESSION['login_user']))
                           {
                               ?>
    
                               <a href="?page=reg"><img src="3.png" onmouseover="this.src='4.png';" onmouseout="this.src='3.png';" /></a>
                               <?php
                           }?></td>
   <td  align="center"><?php
                           if(isset($_SESSION['login_user']))
                           {
                               ?>
                               <a href="?page=pre"><img src="1.png" onmouseover="this.src='2.png';" onmouseout="this.src='1.png';" /></font></a>
                               <?php
                           }?></td>
    <td align="center"><?php
                           if(isset($_SESSION['login_user']))
                           {
                               ?>
                               <a href="?page=profile"><img src="5.png" onmouseover="this.src='6.png';" onmouseout="this.src='5.png';" /></font></a>
                               <?php
                           }?></td>
    <td align="center"><?php
                           if(isset($_SESSION['login_user']))
                           {
                               ?>
                               <a href="?page=edit"><img src="9.png" onmouseover="this.src='10.png';" onmouseout="this.src='9.png';" /></font></a>
                               <?php
                           }?></td>

   </tr>
   
     </table>
     <br/>
     <table>
     <tr>
        <td align="center"><label style="font-weight:bold"><font face="Times New Roman" size="4" color="blue"> Welcome:  </font><a href="?page=profile"><?=$_SESSION['login_user']?></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label></td>
        <td align="center"><font face="Times New Roman" size="4" color="blue">Login Time: </font>&nbsp;<span style="font-family:'tahoma';font-weight:bold;color:#343434;"><?=  time("h:i:s A",$_SESSION['login_time'])?>
<td width="550"></td><td align="center"><a href="?action=logout"><font face="Times New Roman" size="4" color="blue">LOGOUT</font></a></td></span>
    </div></td>
    </tr>
     </table>
     <br/>
  
    <table>
    <tr>
    <td>
    <?php
    if(isset($_SESSION['login_user']))
    {
    ?>

        <?php
        }
        ?>
    </td>

    </tr>
    </table>
    <table background="37.jpg" cellspacing="5" align="center" width="80%" height="100%">
                <tr>

                    <td valign="top" style="border:2px solid #000000">
                        <br/><?php
        
                        if(isset($_GET['page']))
                        {
                            
                            $p=$_GET['page'];
                            switch($p)
                            {
                               
                             case 'profile':include 'PROFILE.php';break;
                             case 'reg':include("HOME1.php");break;
                             case 'pre':include("PREVIOUS.php");break;
                             case 'edit':include("EDIT.php");break;
                             case 'exam':include("EXAM.php");break;


                             default:header("Location:HOME1.php");break;
                            }
                        }
 
                        else{
                            ?>
                        <center><h2 style="color:red; font-size:25pt;" ></br></br>Click On Home Button...</h2></center>
                        <?
 
                        }
                        ?>


                    </td>
                  
                </tr>
 
            </table>

</body>
