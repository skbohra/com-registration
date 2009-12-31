<?php



// No direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.application.component.controller');

class EventsController extends JController
{

	/**
	 * display the edit form
	 * @return void
	 */
	function edit()
	{
		JRequest::setVar( 'view', 'events' );
		JRequest::setVar( 'layout', 'form'  );
		JRequest::setVar('hidemainmenu', 1);

		parent::display();
	}

	/**
	 * save a record (and redirect to main page)
	 * @return void
	 */
	function save()
	{
		$model = $this->getModel('events');
        $request =& JRequest::get();
		if ($model->store($request)) {
			$msg = JText::_( 'Event Added' );
		} else {
			$msg = JText::_( 'Error adding event' );
		}

		// Check the table in so it can be edited.... we are done with it anyway
		$link = 'index.php?option=com_events';
		$this->setRedirect($link, $msg);
	}

	/**
	 * remove record(s)
	 * @return void
	 */
	function remove()
	{
		$model = $this->getModel('events');
		if(!$model->delete()) {
			$msg = JText::_( 'Error: One or More events Could not be Deleted' );
		} else {
			$msg = JText::_( 'Events(s) Deleted' );
		}

		$this->setRedirect( 'index.php?option=com_events', $msg );
	}

	/**
	 * cancel editing a record
	 * @return void
	 */
	function cancel()
	{
		$msg = JText::_( 'Operation Cancelled' );
		$this->setRedirect( 'index.php?option=com_events', $msg );
	}
	
	function addevent()
	{
	    
		JRequest::setVar( 'view', 'events' );
		JRequest::setVar( 'layout', 'addevent'  );
		JRequest::setVar('hidemainmenu', 1);
		parent::display();
	}
        
    

}
