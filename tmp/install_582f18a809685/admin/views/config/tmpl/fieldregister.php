<?php 
/**
* @version      4.9.0 13.08.2013
* @author       MAXXmarketing GmbH
* @package      Jshopping
* @copyright    Copyright (C) 2010 webdesigner-profi.de. All rights reserved.
* @license      GNU/GPL
*/
defined('_JEXEC') or die('Restricted access');

$jshopConfig=JSFactory::getConfig();
JHtml::_('bootstrap.tooltip');
$fields=$this->fields;
$current_fields=$this->current_fields;
?>
<div id="j-sidebar-container" class="span2">
    <?php echo $this->sidebar; ?>
</div>
<div id="j-main-container" class="span10">
<?php displaySubmenuConfigs('fieldregister');?>
<div class="jshop_edit">
<form class="jshopfieldregister" action="index.php?option=com_jshopping&controller=config" method="post" name="adminForm" id="adminForm" enctype="multipart/form-data">
<?php print $this->tmp_html_start?>
<input type="hidden" name="task" value="">
<input type="hidden" name="tab" value="9">

<div class="col100">
<fieldset class="adminform">
    <legend><?php echo _JSHOP_REGISTER?></legend>
<table class="admintable table-striped">
<tr>
    <th class="key">
        &nbsp;
    </th>
    <th style="padding-right: 5px">
        <?php echo _JSHOP_DISPLAY;?>
    </th>
    <th>
        <?php echo _JSHOP_REQUIRE;?>
    </th>
</tr>
<?php foreach($fields['register'] as $field){?>
<tr>
    <td class="key">
        <?php 
        $constant="_JSHOP_FIELD_".strtoupper($field);
        if (defined($constant)) echo constant($constant); else print $constant;
        ?>
    </td>
    <td align="center"><input type="checkbox" name="field[register][<?php print $field?>][display]" class="inputbox" value="1" <?php if (isset($current_fields['register'][$field]['display']) && $current_fields['register'][$field]['display']) echo 'checked="checked"';?> <?php if (in_array($field, $this->fields_sys['register'])){?>disabled="disabled"<?php }?> /></td>
    <td align="center"><input type="checkbox" name="field[register][<?php print $field?>][require]" class="inputbox" value="1" <?php if (isset($current_fields['register'][$field]['require']) && $current_fields['register'][$field]['require']) echo 'checked="checked"';?> <?php if (in_array($field, $this->fields_sys['register'])){?>disabled="disabled"<?php }?> /></td>
</tr>
<?php } ?>

</table>
</fieldset>
</div>

<div class="col100">
<fieldset class="adminform">
    <legend><?php echo _JSHOP_CHECKOUT_ADDRESS?></legend>
<table class="admintable table-striped">
<tr>
    <th class="key">
        &nbsp;
    </th>
    <th style="padding-right: 5px">
        <?php echo _JSHOP_DISPLAY;?>
    </th>
    <th>
        <?php echo _JSHOP_REQUIRE;?>
    </th>
</tr>
<?php 
$display_delivery=0;
foreach($fields['address'] as $field){?>
<?php if (!$display_delivery && substr($field,0,2)=="d_"){?>
<tr>
    <td class="key"><?php print _JSHOP_FIELD_DELIVERY_ADRESS;?></td>
</tr>    
<?php $display_delivery=1; } ?>
<tr>
    <td class="key">
        <?php
        $field_c=$field; 
        if (substr($field_c,0,2)=="d_") $field_c=substr($field_c,2,strlen($field_c)-2);
        $constant="_JSHOP_FIELD_".strtoupper($field_c);
        if (defined($constant)) echo constant($constant); else print $constant;
        ?>
    </td>
    <td align="center"><input type="checkbox" name="field[address][<?php print $field?>][display]" class="inputbox" value="1" <?php if (isset($current_fields['address'][$field]['display']) && $current_fields['address'][$field]['display']) echo 'checked="checked"';?> <?php if (in_array($field, $this->fields_sys['address'])){?>disabled="disabled"<?php }?> /></td>
    <td align="center"><input type="checkbox" name="field[address][<?php print $field?>][require]" class="inputbox" value="1" <?php if (isset($current_fields['address'][$field]['require']) && $current_fields['address'][$field]['require']) echo 'checked="checked"';?> <?php if (in_array($field, $this->fields_sys['address'])){?>disabled="disabled"<?php }?> /></td>
</tr>
<?php } ?>

</table>
</fieldset>
</div>

<div class="col100">
<fieldset class="adminform">
    <legend><?php echo _JSHOP_EDIT_ACCOUNT?></legend>
<table class="admintable table-striped">
<tr>
    <th class="key">
        &nbsp;
    </th>
    <th style="padding-right: 5px">
        <?php echo _JSHOP_DISPLAY;?>
    </th>
    <th>
        <?php echo _JSHOP_REQUIRE;?>
    </th>
</tr>
<?php 
$display_delivery=0;
foreach($fields['editaccount'] as $field){?>
<?php if (!$display_delivery && substr($field,0,2)=="d_"){?>
<tr>
    <td class="key"><?php print _JSHOP_FIELD_DELIVERY_ADRESS;?></td>
</tr>    
<?php $display_delivery=1; } ?>
<tr>
    <td class="key">
        <?php
        $field_c=$field; 
        if (substr($field_c,0,2)=="d_") $field_c=substr($field_c,2,strlen($field_c)-2);
        $constant="_JSHOP_FIELD_".strtoupper($field_c);
        if (defined($constant)) echo constant($constant); else print $constant;
        ?>
    </td>
    <td align="center"><input type="checkbox" name="field[editaccount][<?php print $field?>][display]" class="inputbox" value="1" <?php if (isset($current_fields['editaccount'][$field]['display']) && $current_fields['editaccount'][$field]['display']) echo 'checked="checked"';?> <?php if (in_array($field, $this->fields_sys['editaccount'])){?>disabled="disabled"<?php }?> /></td>
    <td align="center"><input type="checkbox" name="field[editaccount][<?php print $field?>][require]" class="inputbox" value="1" <?php if (isset($current_fields['editaccount'][$field]['require']) && $current_fields['editaccount'][$field]['require']) echo 'checked="checked"';?> <?php if (in_array($field, $this->fields_sys['editaccount'])){?>disabled="disabled"<?php }?> /></td>
</tr>
<?php } ?>
<?php $pkey="etemplatevar";if ($this->$pkey){print $this->$pkey;}?>

</table>
</fieldset>
</div>
<div class="clr"></div>
<?php print $this->tmp_html_end?>
</form>
</div>
</div>