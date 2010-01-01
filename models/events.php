 <?php

    // Check to ensure this file is included in Joomla!
    defined('JPATH_BASE') or die();

    jimport('joomla.application.component.model');
    jimport('joomla.filesystem.path');

    class EventsModelEvents extends JModel
    {
        var $_events;

            function lists()
            {
            //we can perform db operations here ex

                $db =& $this->getDBO();
                $query = "SELECT * FROM ".$db->nameQuote('#__events_names');
                $db->setQuery( $query );
                $this->_events = $db->loadAssocList();
                return $this->_events;
            }

	  function myEvents($user)
            {
            //we can perform db operations here ex

                $db =& $this->getDBO();
                $query = "SELECT * FROM ".$db->nameQuote('#__events_registrations')." WHERE ".$db->nameQuote('username')." = '".$user."'" ;
                $db->setQuery( $query );
                $this->_events = $db->loadAssocList();
                return $this->_events;
            }


                function register()
                {
                 //we can perform db operations here ex
                $db =& $this->getDBO();
                $user =& JFactory::getUser();
                return $user->username;
                }

                function getInfo($username)
                { $i =0;
                        $db =& $this->getDBO();
                        $flag = 1;
                        while($username[$i])
                        {
                        $query = "SELECT * FROM ".$db->nameQuote('#__users')." WHERE ".$db->nameQuote('username')." = '".$username[$i]."'" ;
                        $db->setQuery($query);
                        if(!$db->loadResult())
                        $flag = 0;
                        $i++;
                        }
                        return $flag;
}

                function saveInfo($username,$eventname,$teamleader,$teamname, $email=NULL, $teammembers)
                {
		
		$db =& $this->getDBO();
		$query = "SELECT * FROM ".$db->nameQuote('#__users')." WHERE ".$db->nameQuote('username')." = '".$username."'" ;
		$db->setQuery($query);
		$res = $db->loadAssoc();
		$id = $res['id'];
		$name = $res['name'];
		$email = $res['email'];
		$query1 = "SELECT * FROM ".$db->nameQuote('#__comprofiler')." WHERE ".$db->nameQuote('user_id')." = '".$id."'" ;
		$db->setQuery($query1);
		$res1 = $db->loadAssoc();
		$college =$res1['cb_collegename'];
		$phone_no = $res1['cb_contactno'];
		
		$db2 =& JFactory::getDBO();
		$query2 = "INSERT INTO #__events_registrations ( username, name, email, college, team_name, team_members, team_leader, event_name, phone_number ) VALUES ( '". $username. "', '". $name . "', '". $email . "', '". $college . "', '". $teamname . "', '". $teammembers . "', '". $teamleader . "', '". $eventname . "', '". $phone_no . "' )";
		$db2->Execute($query2) or die(":(");



$mail =& JFactory::getMailer();
$subject = "Event Registration Details";
$body ="Dear ".$username.",";
$body = $body."<br />You have been successfully registered for the event: ".$eventname;
$body = $body."<br />Here are the details:<br />";
$body = $body."Event Name: ".$eventname."<br />";
$body = $body. "Team Leader: ".$teamleader."<br />";
$body = $body. "Total Members: ".$teammembers."<br />";
$body = $body."We look forward for you active participation in the event. <br/>";
$body = $body."Thanks<br/>Web Team ";


$mail->addRecipient($email);
$mail->setSender('registration@example.come','Web Team');
$mail->setSubject( $subject ) ;
$mail->setBody($body);


JUtility::sendMail('registration@example.com','Web Team',$email,$subject,$body,'1') or die(":D");



/*if ($mail->Send()) {
  echo "Mail sent successfully.";
} else {
  echo "An error occurred.  Mail was not sent.";
}*/






		return $res1;

                }

                function checkTeam($team_name, $event_name)
        {               $i =0;
                        $db =& $this->getDBO();
                        $flag = 1;
                        $query = "SELECT * FROM ".$db->nameQuote('#__events_registrations')." WHERE (".$db->nameQuote('team_name')." = '".$team_name."' AND ".$db->nameQuote('event_name')." = '".$event_name."')";
                        $db->setQuery($query);
                        if($db->loadResult())
                        $flag = 0;
                        $i++;
                        
                        return $flag;
 
        }

 			function checkRegistered($username, $event_name)
			{
			 $i =0;
                        $db =& $this->getDBO();
                        $flag = 1;
                        $query = "SELECT * FROM ".$db->nameQuote('#__events_registrations')." WHERE (".$db->nameQuote('username')." = '".$username."' AND ".$db->nameQuote('event_name')." = '".$event_name."')";
                        $db->setQuery($query);
                        if($db->loadResult())
                        $flag = 0;
                        $i++;
			return $flag;
						
			}
 

	function abstractEvents($events)
	{	$i = 0;
		foreach($events as $event)
		{
		$db =& $this->getDBO();
          	$query = "SELECT * FROM ".$db->nameQuote('#__events_names')." WHERE ".$db->nameQuote('event_name')." = '".$event['event_name']."'" ;
                $db->setQuery( $query );
                $res = $db->loadAssoc();
		if($res['abstract'] == '1')
		{
		$abstractEvent[$i] = $res['event_name'];
		$i++;
		}
		
		}
		return $abstractEvent;
		
	}


function upload($filename, $eventname)
{
$user = $this->register();
$userfile = JRequest::getVar($filename, null, 'files', 'array') or die(":(");
$path = 'abstracts'.DS.$eventname.DS.$user.'pdf';
JFile::upload($userfile['file_name'],$path) or die($path);
return 0;
}
}


    ?>
                                 
                                                                                                                                                               


