<?php if ($this->user)
{?>
<h2>Abstract submission panel </h2>
<table>
<form action="index.php?option=com_events&view=events&layout=abstractUpload" method="post" name="absract" >
<tr><td>Choose Event</td><td><select name="event_name">
<?php foreach($this->events as $event)
{
?>
<option value="<?php $event?>"><?php echo $event;?></option>
<?php } ?>
</select></td><tr>
<td>Upload File</td><td><input type="file" name="file_name"/></td><tr><td>
<input type="submit" value="submit" /></td>
</form></table>
<?php }
else{ ?><div>Please login first to submit the abstract</div><?php }?>

