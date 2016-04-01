<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_slider
 *
 * @copyright   Copyright (C) 2016 Klaus Krippeit
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;


class SliderHelper {


	public static function getImages($moduleImagesDir, $sliderDir) {

		$images = array();

		foreach (glob(JPATH_ROOT . $moduleImagesDir . $sliderDir . '/*.*') as $imageLocalPath) {
			
			$imageStr = '{"large":" ';
			$imageStr .= JUri::base(true) . $moduleImagesDir . $sliderDir . substr($imageLocalPath, strlen(JPATH_ROOT . $moduleImagesDir . $sliderDir));
			$imageStr .= '"';
			$imageStr .= ',"thumb":" ';
			$imageStr .= JUri::base(true) . $moduleImagesDir . $sliderDir . substr($imageLocalPath, strlen(JPATH_ROOT . $moduleImagesDir . $sliderDir));
			$imageStr .= '"}';
			//"thumb":"files/previews/365_4.jpg",

			$images[] = $imageStr;
		}

		return $images;
	}

}