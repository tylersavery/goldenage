<?php $image_upload = $this->image_upload; $imagecrops = $this->imagecrops; ?>
<div id="modal_manage_images" class="modal hide fade">
	<?php foreach ($imagecrops as $imagecrop): ?>
		<input type="hidden" class="image_crops" value="<?php echo $imagecrop->get_name(); ?>" crop_id="<?php echo $imagecrop->get_id(); ?>" ratio="<?php echo $imagecrop->get_aspect_ratio(); ?>" width="<?php echo $imagecrop->get_width(); ?>" />
	<?php endforeach; ?>
	<div class="modal-header">
		<a href="#" class="close">&times;</a>
		<h3 id="manage_images_title">Select Image</h3>
	</div>
	<div class="modal-body">
		<div class="loading_icon"></div>
		<div id="image_upload_wrapper">
			<form id="dummy_form" class="display_none"></form>
			<div id="related_image_select" class="modal_action">
				<div class="image_select_gallery"></div>
				<div class="clear_both"></div>
			</div>
			<div id="image_select" class="modal_action">
				<div class="image_select_gallery"></div>
				<div class="clear_both"></div>
				<input type="button" class="btn" id="load_more_button" name="load_more_button" value="Load More" />
				<div class="clear_both"></div>
			</div>
			<div id="upload_area" class="modal_action"></div>
			<form action="/ajax/image/upload" method="post" name="image_upload_form" id="image_upload_form" class="modal_action" enctype="multipart/form-data">
				<input type="file" name="filename" />
			</form>
			<form action="/ajax/image/crop" method="post" name="image_crop_form" id="image_crop_form" class="modal_action" enctype="multipart/form-data" onsubmit="return checkCoords();">
				<input type="hidden" id="crop_x" name="crop_x" />
				<input type="hidden" id="crop_y" name="crop_y" />
				<input type="hidden" id="crop_w" name="crop_w" />
				<input type="hidden" id="crop_h" name="crop_h" />
				<input type="hidden" id="crop_img_w" name="crop_img_w" />
				<input type="hidden" id="crop_img_h" name="crop_img_h" />
				<input type="hidden" id="file_img_w" name="file_img_w" />
				<input type="hidden" id="file_img_h" name="file_img_h" />
				<input type="hidden" id="file_type" name="file_type" />
				<input type="hidden" id="crop_image_hash" name="crop_image_hash" />
				<input type="hidden" id="image_crop_id" name="image_crop_id" />
				<input type="hidden" id="file_suffix" name="file_suffix" />
				<input type="hidden" id="target_width" name="target_width" />
				<input type="hidden" id="object_status" name="object_status" />
			</form>
		</div>
	</div>
	<div class="modal-footer">
		<input type="button" class="btn success modal_action" id="upload_image_button" name="upload_image_button" value="Upload Image" />
		<input type="button" class="btn success modal_action" id="add_related_image_button" name="add_related_image_button" value="Add Image" />
		<input type="button" class="btn primary modal_action" id="image_select_button" name="image_select_button" value="Select Image" />
		<input type="button" class="btn primary modal_action" id="image_upload_button" name="image_upload_button" value="Upload Image" onclick="ajaxUpload(document.getElementById('image_upload_form'),'<?php echo $image_upload['ajax_url']; ?>?filename=filename&amp;maxSize=<?php echo $image_upload['maxSize']; ?>&amp;maxW=<?php echo $image_upload['maxW']; ?>&amp;fullPath=<?php echo $image_upload['fullPath']; ?>&amp;relPath=<?php echo $image_upload['relPath']; ?>&amp;colorR=<?php echo $image_upload['colorR']; ?>&amp;colorG=<?php echo $image_upload['colorG']; ?>&amp;colorB=<?php echo $image_upload['colorB']; ?>&amp;maxH=<?php echo $image_upload['maxH']; ?>','upload_area','&lt;div class=&quot;loading_icon&quot;&gt;&lt;/div&gt;',''); return false;" />
		<input type="button" class="btn primary modal_action" id="image_crop_button" name="image_crop_button" value="Crop" />				
		<input type="button" class="btn secondary" id="modal_back_button" name="modal_back_button" value="Back" />
	</div>
</div>