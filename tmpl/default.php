<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_slider
 *
 * @copyright   Copyright (C) 2016 Klaus Krippeit
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

?>

<div id="gallery-wrapper">
<?php if (empty($images)): ?>	
	<div class="error"><?php echo JText::_('MOD_SLIDER_ERROR_NO_IMAGES'); ?></div>

<?php endif; ?>
</div>

	<script type="text/javascript" charset="utf-8">


	(function($)
			{
	$(document).ready(function() {
	    gallery = kGallery({
	        wrapper: '#gallery-wrapper',
	        startItem: 0,
	        slideshowOptions: {
	            autoPlay: false,
	        },
	        thumbnailPickerOptions: {
	            vertical: true,
	            itemsOnPage: 3
	        },
	        dataType: 'array',
	        dataSource: [
	        		<?php if (! empty($images) ): echo join (',',$images); endif;?>
	        ]
	    });
	});}
	)(jQuery);
	</script>