<style type="text/css">
#error{
color:white;
width:400px;
height:100px;
background-color:red;
font-size:16px;
border:solid black 1px;
margin-top:25px;
}

#message{
color:white;
width:400px;
height:100px;
background-color:green;
font-size:16px;
border:solid black 1px;
margin-top:25px;
}


</style>
<?php if($this->user){?>
<?php if($this->error){?>
<h2>Event Registration Panel</h2>
<div id="error"><span class="err">Error!</span><?php echo $this->error;?></div>
<div><a href="index.php?option=com_events&view=events&layout=lists">Go Back</a></div>
<?php }?>

<?php if($this->message){?><div id="message">Thank You!<?php echo $this->message; ?></div><div><a href="index.php?option=com_events&view=events&layout=lists">Go Back</a></div><?php }?>



<?php }
else 
echo "Please login to register";
?>


