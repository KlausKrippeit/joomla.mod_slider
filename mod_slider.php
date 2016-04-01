<?php
/**
 * @package     Joomla.Site
* @subpackage  mod_slider
*
* @copyright   Copyright (C) 2016 Klaus Krippeit.
* @license     GNU General Public License version 2 or later; see LICENSE.txt
*/

defined('_JEXEC') or die;


require_once __DIR__ . '/helper.php';

$images = array();
$moduleImagesDir = '/images/slider/';

// Auto-Mode: look for images in a directory with the same name as the menu-item alias
if ($params->get('mode') == 0) {
	$menu = JFactory::getApplication()->getMenu();
	$active = $menu->getActive() ? $menu->getActive() : $menu->getDefault();
	$sliderDir = $active->alias;
} else {
	$sliderDir = $params->get('images_folder');
}


if (is_dir(JPATH_ROOT . $moduleImagesDir . $sliderDir)) {

	JHtml::_('jquery.framework');
	$doc = JFactory::getDocument();
	$doc->addStyleSheet(JUri::base(true) . '/modules/mod_slider/css/kGallery.css');
	$doc->addStyleSheet(JUri::base(true) . '/modules/mod_slider/css/slider.css');
	//$doc->addScript('http://code.jquery.com/jquery-1.10.1.min.js');
	$doc->addScript(JUri::base(true) . '/modules/mod_slider/js/kGallery.js');
	$doc->addScript(JUri::base(true) . '/modules/mod_slider/js/kThumbnailPicker.js');
	$doc->addScript(JUri::base(true) . '/modules/mod_slider/js/kSlideshow.js');

	$images = SliderHelper::getImages($moduleImagesDir, $sliderDir);
}



require JModuleHelper::getLayoutPath('mod_slider', $params->get('layout', 'default'));