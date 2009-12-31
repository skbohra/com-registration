<?php defined('_JEXEC') or die('Restricted access'); ?>
 
<form action="index.php" method="post" name="adminForm" id="adminForm">
<div class="col100">
    <fieldset class="adminform">
        <legend><?php echo JText::_( 'Add Event' ); ?></legend>
        <table class="admintable">
        <tr>
            <td width="100" align="right" class="key">
                <label for="greeting">
                    <?php echo JText::_( 'Name' ); ?>:
                </label>
            </td>
            <td>
                <input class="text_area" type="text" name="name" id="name" size="32" maxlength="250" />
            </td>
        </tr>
         <tr>
            <td width="100" align="right" class="key">
                <label for="greeting">
                    <?php echo JText::_( 'Category' ); ?>:
                </label>
            </td>
            <td>
                <input class="text_area" type="text" name="category" id="category" size="32" maxlength="250" />
            </td>
        </tr>
         <tr>
            <td width="100" align="right" class="key">
                <label for="greeting">
                    <?php echo JText::_( 'Abstract Required?' ); ?>:
                </label>
            </td>
            <td>
                <input class="text_area" type="text" name="abstract" id="abstract" size="32" maxlength="250" value="" />
            </td>
        </tr>
         <tr>
            <td width="100" align="right" class="key">
                <label for="greeting">
                    <?php echo JText::_( 'Enable?' ); ?>:
                </label>
            </td>
            <td>
                <input class="text_area" type="text" name="enable" id="enable" size="32" maxlength="250" value />
            </td>
        </tr>
    </table>
    <input type="submit" value="Add Event">
    </fieldset>
</div>
 
<div class="clr"></div>
 
<input type="hidden" name="option" value="com_events" />
<input type="hidden" name="id" value="<?php echo $this->hello->id; ?>" />
<input type="hidden" name="task" value="save" />
<input type="hidden" name="controller" value="events" />
</form>

