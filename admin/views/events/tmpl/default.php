<?php defined('_JEXEC') or die('Restricted access'); ?>
<form action="index.php" method="post" name="adminForm">
<div id="editcell">
	<table class="adminlist">
	<thead>
		<tr>
			<th width="5">
				<?php echo JText::_( 'ID' ); ?>
			</th>
			<th width="20">
				<input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count( $this->items ); ?>);" />
			</th>			
			<th>
				<?php echo JText::_( 'Event Name' ); ?>
			</th>
						<th>
				<?php echo JText::_( 'Category' ); ?>
			</th>
			<th>
				<?php echo JText::_( 'Abstract' ); ?>
			</th>
			<th>
				<?php echo JText::_( 'Enabled' ); ?>
			</th>

		</tr>
	</thead>
	<?php
	$i = 0;
	$model = $this->getModel('events');
    $events = $model->eventsList();
   
	while($events[$i])
{?>
<tr class="">
<td><?php echo $events[$i]['id'];?></td>
<td></td>
<td><?php echo $events[$i]['event_name'];?></td>
<td><?php echo $events[$i]['event_category'];?></td>
<td><?php echo $events[$i]['abstract'];?></td>
<td><?php echo $events[$i]['enable'];?></td>
</tr>
<?php
$i++;
}	
	
	
	?>
	</table>
</div>

<input type="hidden" name="option" value="com_events" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="boxchecked" value="0" />
<input type="hidden" name="controller" value="hello" />
</form>
