<?php



// No direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.application.component.model');



class eventsModelEvents extends JModel
{

    function store($data)
    {
        $event = $data['name'];
        $category = $data['category'];
        $abstract = $data['abstract'];
        $enable = $data['enable'];
        if($event && $category && $abstract && $enable)
        {
		$db =& JFactory::getDBO();
		$query = "INSERT INTO #__events_names ( event_name, event_category, enable, abstract ) VALUES ( '". $event. "', '". $category . "', '". $abstract . "', '". $enable . "' )";
		if($db->Execute($query))
		    return true;
		else
		    return false;
		 }
		 else
		 return false;   
		  

    }

        function eventsList()
        {
                $db =& $this->getDBO();
                $query = "SELECT * FROM ".$db->nameQuote('#__events_names') ;
                $db->setQuery( $query );
                $events = $db->loadAssocList();
                return $events;
        }


}
