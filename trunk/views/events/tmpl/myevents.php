<?php


defined('JPATH_BASE')or die('Restricted Access');
if($this->user){
$data = $this->data;
$i=0;
?>
<h2>Event Registration Panel</h2>
<div>List of Registered Events</div>
<table id="registrationTable" class="contentpane">
<tr class="sectiontableentry1">
<td>Event</td>
<td>Team Name</td>
<td>Team Leader</td>
<td>Un Register</td>
</tr>
<?php
while($data[$i])
{?>
<tr class="sectiontableentry2">
<td style="width:150px; height:10px"><?php echo $data[$i]['event_name'];?></td>
<td style="width:150px; height:10px"><?php echo $data[$i]['team_name'];?></td>
<td style="width:150px; height:10px"><?php echo $data[$i]['team_leader'];?></td>
<td style="width:150px; height:10px"><a href="index.php?option=com_events&view=events&layout=unregister&event=<?php echo $data[$i]['event_name'];?>">Un-register</a>
</td>
</tr>
<?php
$i++;
}
}
else{
echo ("Please Login first");
}
?>

</table>
