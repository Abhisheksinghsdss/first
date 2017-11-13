	   <div class="content">
  <!-- Multistep Form -->
  <div class="main">
      <h2 class="title">GK Quiz</h2>
<?php
if(isset($_POST['submit']))
{
  include("db.php");
   $query=$db->query("SELECT * from question order by id asc");
   if($query->num_rows>0)
   {
	   $count=0;
	   $i=1;
	 while($row=$query->fetch_assoc())
	 {	
     ?>
    <p class="subtitle">Q.<?php echo $i; ?> <?php echo $row['question']; ?></p>
 <p><b>Your Answer:</b> <?php echo $_POST['answer'.$i]; ?></p>	
 <p><b>Correct Answer:</b> <?php echo $row['answer']; ?></p>	
 
	 <?php
if($_POST['answer'.$i]==$row['answer'])
{
	$count++;
}
$i++;	
	 }
	 }
	 echo "You got ".$count." out of ".($i-1);
}
else
{
echo "No Answer";
}
?>
 </div>
</div>