<?php jimport('joomla.html.html');?>

<?php JHTML::_('behavior.formvalidation');?>
<script language="javascript">
function myValidate(f) {
	if(document.formvalidator.isValid(f)){
	f.check.value='<?php echo JUtility::getToken(); ?>';
	return true;
	}
	else{
	alert("This field can't be blank");
	}
	return false;
}

function team() {
document.getElementById("teammates").innerHTML = "";
var i=1;while(i < document.getElementById("members").value){
var teammember = document.createElement("div");
teammember.innerHTML ='<label>Member '+i+' : </label><input type="text" name=Member'+i+' class="required"/>';
document.getElementById("teammates").appendChild(teammember);
i++;
}
}
</script>


<h2>Event Registration Panel</h2>

<?php 
if($this->user)
{?>

<form id="register" method="post" action="index.php?option=?com_events&view=events&layout=registration" class="form-validate" onSubmit="return myValidate(this);">
<table id="registrationTable" class="contentpane">
<tr class="sectiontableentry2"><td><b><?php echo $this->event_name;?> Registration</b></td><td>Form</td></tr>
<tr class="sectiontableentry1"> 
<td>Team Leader:</td>
<td><?php echo $this->user; ?></td>
</tr>

<tr class="sectiontableentry1">
<td><label>Team Name</label></td><td><input type="text" name="team_name" class="required"/></td>
<tr class="sectiontableentry1"><td><label>Team Size</label></td><td><select name="members" id="members" onchange="team();"><option value="1">1</option value="2"><option>2</option><option value="3">3</option><option value="4">4</option>
</select></td></tr>
<tr class="sectiontableentry1">
<td><div id="teammates"></div>
</td></tr>
<tr><td>
<input type="submit" value="register"/></td>
</tr>
<tr><td><input type="hidden" value="<?php echo $this->event_name;?>" name="event_name" /> </td><td><input type="hidden" value="<?php echo $this->user;?>" name="team_leader"></td></tr>
</table>
</form>
<div>All fields are mandatory. Only Team leader should register for the team event. All team members should be individually registered on sakshama website.</div>
<?php }
else
echo "Please login to register for events";

?>
