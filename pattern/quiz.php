<!DOCTYPE html>
<html>
 <head>
 <meta charset="utf-8">
 <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
  <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="">
  <title>Multistep Registration Form- Demo Preview</title>
<meta content="noindex, nofollow" name="robots">
<!-- Including CSS File Here -->
<style>
@import "http://fonts.googleapis.com/css?family=Droid+Serif";  /* This Line is to import Google font style */
.content{
width:100%;
margin:0px 0px 0px 0% ;
}
.main{
float:center;
width:650px;
margin-top:0px;
}
#progressbar{
margin:0px 0px 0px 17%;
padding:0;
font-size:18px
}
#active1{
color:red
}
fieldset{
display:none;
width:350px;
padding:20px;
margin-top:0px;
margin-left:30px;
border-radius:5px;
box-shadow:3px 3px 25px 1px gray
}

input[type=submit],input[type=button]{
width:120px;
margin:15px 25px;
padding:5px;
height:40px;
background-color:#d64f4f;
border:none;
border-radius:4px;
color:#fff;
font-family:'Droid Serif',serif
}
h2,p{
text-align:center;
font-family:'Droid Serif',serif
}
li{
margin-right:52px;
display:inline;
color:#c1c5cc;
font-family:'Droid Serif',serif
}

</style>
 </head>
 <body>
  <div class="content">
  <!-- Multistep Form -->
  <div class="main">
   <form action="result.php" class="regform" method="post" >
   <!-- Fieldsets -->
   <?php 
   include("db.php");
   $query=$db->query("SELECT * from question order by id asc");
   if($query->num_rows>0)
   {
	   $count=1;
	 while($row=$query->fetch_assoc())
	 {		
   ?>
  <script type="text/javascript">
// Function that executes on click of first next button.
function next_step<?php echo $count; ?>() {
document.getElementById("showhide<?php echo $count; ?>").style.display = "none";
document.getElementById("showhide<?php echo ($count+1); ?>").style.display = "block";
document.getElementById("active<?php echo ($count+1); ?>").style.color = "red";
}
// Function that executes on click of first previous button.
function prev_step<?php echo $count; ?>() {
document.getElementById("showhide<?php echo $count; ?>").style.display = "block";
document.getElementById("showhide<?php echo ($count+1); ?>").style.display = "none";
document.getElementById("active<?php echo $count; ?>").style.color = "red";
document.getElementById("active<?php echo ($count+1); ?>").style.color = "gray";
}
</script> 
   <fieldset id="showhide<?php echo $count; ?>"  <?php if($count==1) { ?>style="display:block" <?php } ?>>
    <h2 class="title">GK Quiz</h2>
    <p class="subtitle"><?php echo $row['question']; ?></p>
<h5><?php echo $row['option1']; ?></h5>	
	<input type="radio" value="<?php echo $row['option1']; ?>" name="answer<?php echo $count; ?>" />

<h5><?php echo $row['option2']; ?></h5>	
	<input type="radio" value="<?php echo $row['option2']; ?>" name="answer<?php echo $count; ?>" />
<h5><?php echo $row['option3']; ?></h5>	
	<input type="radio" value="<?php echo $row['option3']; ?>" name="answer<?php echo $count; ?>" />
<h5><?php echo $row['option4']; ?></h5>	
	<input type="radio" value="<?php echo $row['option4']; ?>" name="answer<?php echo $count; ?>" />
	<br><br>
 <?php if($count!=1) { ?>
 <input id="pre_btn1" onclick="prev_step<?php echo $count-1; ?>()" type="button" value="Previous">
 <?php } if($count!=10) { ?>
    <input id="next_btn1" name="next" onclick="next_step<?php echo $count; ?>()" type="button" value="Next">
  <?php } if($count==10) { ?>
	<input class="submit_btn" onclick="validation(event)" name="submit" type="submit" value="Submit">
	 <?php } ?>
   </fieldset>
   <?php
   $count++;
   }
   }
   ?>
  </form>
 </div>
</div>

 </body>
 </html>