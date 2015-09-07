<?php
/**
 * @package                Joomla.Site
 * @subpackage	Templates.beez_20
 * @copyright        Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license                GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die ;

jimport('joomla.filesystem.file');

// check modules
$showRightColumn = ($this -> countModules('position-3') or $this -> countModules('position-6') or $this -> countModules('position-8'));
$showbottom = ($this -> countModules('position-9') or $this -> countModules('position-10') or $this -> countModules('position-11'));
$showleft = ($this -> countModules('position-4') or $this -> countModules('position-7') or $this -> countModules('position-5'));

if ($showRightColumn == 0 and $showleft == 0) {
	$showno = 0;
}

JHtml::_('behavior.framework', true);

// get params
$color = $this -> params -> get('templatecolor');
$logo = $this -> params -> get('logo');
$navposition = $this -> params -> get('navposition');
$app = JFactory::getApplication();
$doc = JFactory::getDocument();
$templateparams = $app -> getTemplate(true) -> params;

// $doc->addStyleSheet($this->baseurl.'/templates/system/css/system.css');
// $doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/position.css', $type = 'text/css', $media = 'screen,projection');
// $doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/layout.css', $type = 'text/css', $media = 'screen,projection');
// $doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/print.css', $type = 'text/css', $media = 'print');
//
// $files = JHtml::_('stylesheet', 'templates/'.$this->template.'/css/general.css', null, false, true);
// if ($files):
// if (!is_array($files)):
// $files = array($files);
// endif;
// foreach($files as $file):
// $doc->addStyleSheet($file);
// endforeach;
// endif;
//
// $doc->addStyleSheet('templates/'.$this->template.'/css/'.htmlspecialchars($color).'.css');
// if ($this->direction == 'rtl') {
// $doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/template_rtl.css');
// if (file_exists(JPATH_SITE . '/templates/' . $this->template . '/css/' . $color . '_rtl.css')) {
// $doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/'.htmlspecialchars($color).'_rtl.css');
// }
// }

$doc -> addScript($this -> baseurl . '/templates/' . $this -> template . '/javascript/md_stylechanger.js', 'text/javascript');
$doc -> addScript($this -> baseurl . '/templates/' . $this -> template . '/javascript/hide.js', 'text/javascript'); ?>