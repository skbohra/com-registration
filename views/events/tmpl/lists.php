<?php


defined('JPATH_BASE')or die('Restricted Access');

$data = $this->data;
$i=0;
?>
<h2>Event Registration Panel</h2>
<table id="registrationTable" class="contentpane">
<tr class="sectiontableentry1">
<td>Event</td>
<td>Category</td>
<td>Register</td>
</tr>
<?php
while($data[$i])
{?>
<tr class="sectiontableentry2">
<td style="width:150px; height:10px"><?php echo $data[$i]['event_name'];?></td>
<td style="width:150px; height:10px"><?php echo $data[$i]['event_category'];?></td>
<td style="width:150px; height:10px"><a href="index.php?option=com_events&view=events&layout=register&event=<?php echo $data[$i]['event_name'];?>">Register</a>
</td>
</tr>
<?php
$i++;
}
?>
</table>
