<?php



defined('_JEXEC')or die ('Restricted Access');
jimport('joomla.application.component.controller');
class EventsController extends JController
{

function lists()
{
		$this->view = & $this->getView('Events');

		// Set the layout
		$this->view->setLayout('lists');
		$modelEvents =$this->getModel('Events');
		$data=$modelEvents->lists();
		$this->view->assign("data",$data);
		$this->view->display();

}

function myEvents()
{
		$this->view = & $this->getView('Events');

		// Set the layout
		$this->view->setLayout('myevents');
		$modelEvents =$this->getModel('Events');
		$user = $modelEvents->register();
		$data=$modelEvents->myEvents($user);
		$this->view->assign("user",$user);
		$this->view->assign("data",$data);
		$this->view->display();

}



function hope()
{
	$this->view = & $this->getView('Events');
	$this->view->setLayout('register');
	$this->view->assign("hope","oho");
	$this->view->display();

}

function register()
{
$this->view =& $this->getView('Events');
$this->view->setLayout('register');
$modelEvents =$this->getModel('Events');
$username = $modelEvents->register();
$this->view->assign("user",$username);
$request =& JRequest::get();
$event_name =$request['event'];
$this->view->assign("event_name", $event_name);
$this->view->display();
}

function registration()
{
$this->view =& $this->getView('Events');
$this->view->setLayout('registration');
$modelEvents=$this->getModel('Events');
$request =& JRequest::get();
$event_name = $request['event_name'];
$team_leader = $request['team_leader'];
$team_name = $request['team_name'];
$members = $request['members'];

$users[0] = $modelEvents->register();
$this->view->assign('user',$users[0]);
$i=1;
while($i<=$request['members'])
{
$member ='Member'.$i;
$users[$i]=$request[$member];
$i++;
}


$check = $modelEvents->getInfo($users);
$team_check = $modelEvents->checkTeam($team_name, $event_name);
$registered_check = $modelEvents->checkRegistered($users[0], $event_name);

if(!$team_check)
$this->view->assign("error", "Team Name Already Registered. Please choose any different Team Name. For any query please contact regsistration@sakshama.org");
if(!$check)
$this->view->assign("error", "One or more team user name doesn't exist. Please register them first.For any query please contact registration@sakshama.org");
if(!$registered_check)
$this->view->assign("error", "You are already registered for the event. For any query please contact registration@sakshama.org");

if($team_check && $check && $registered_check) 
{
$j=0;
while($j<$i-1)
{
$test2[$j] = $modelEvents->saveInfo($users[$j],$event_name, $team_leader, $team_name, 'email', $members);
$j++;
}
$this->view->assign("message", "Successfuly Registered For the event. An email has been sent to you with team details.");
}

$this->view->display();



}


function submitAbstract(){
$this->view =& $this->getView('Events');
$this->view->setLayout('submit');
$modelEvents = $this->getModel('Events');
$user = $modelEvents->register();
$events = $modelEvents->myEvents($user);
$abstractEvents =  $modelEvents->abstractEvents($events);
$this->view->assign('events', $abstractEvents);
$this->view->assign('user', $user);
$this->view->display();
}

function abstractUpload()
{

$this->view =& $this->getView('Events');
$this->view->setLayout('abstract');
$modelEvents = $this->getModel('Events');
$request =& JRequest::get();
$file_name =$request['file_name'];
$event_name = $request['event_name'];
$upload = $modelEvents->upload($file_name, $event_name);
$this->view->display();
}


}
?>
	


