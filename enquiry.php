<?php
 $db=mysql_connect("localhost","root","");
    mysql_select_db("online_exam",$db);
?>   
<head>
    <style>
        #k
        {
            font-size: 30px;
            color:darkorange;
        }
        #q
        {
           width:450px;
           border-color: black;
        }
        #r
        {
            color:darkblue;
        }
        #s
        {
         color: darkmagenta;    
        }
    </style>
    <script>
var obj;
function createObject()
{
  if(window.ActiveXObject)
      {
          obj=new ActiveXObject("Microsoft.XMLHTTP");
      }
      else
          {
              obj=new XMLHttpRequest();
          }

  }
  function checkAvalibility(ti)
  {
      createObject();
      //alert(obj);
      obj.open("GET","ajax_get_books.php?match="+ti,true);
      obj.send(null);
      obj.onreadystatechange=callback
  }
  function callback()
  {
      if(obj.readyState==4)
          {
             var books=obj.responseText;
             document.getElementById('books').innerHTML=books;
          }
  }
  

</script>
</head>
<form action="<?=$_SERVER['REQUEST_URI']?>" method="post">
<center></br>
    </br></br></br></br></br></br></br></br></br></br></br></br></br></br><label id="k">Search:</label>
<input placeholder="Type here" onkeyup="checkAvalibility(this.value)" required type="text" name="book" id="q"/> 

<input type="hidden" name="SUBMITTED" value="TRUE"/>
</form>
</center>
<div id="books">
    <div>
  