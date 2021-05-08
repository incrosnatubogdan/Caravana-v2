<?php

	if(!isset($item_type))  $item_type = 0;
	if(!isset($item_id))  $item_id = 0;


?>

<script type="text/javascript">
<!--

var settings = {
	flash_url : url_base + "media/admin/js/swfuploader/Flash/swfupload.swf",
	upload_url: url_base + 'administration/pictures/upload/<?=$item_id?>/<?=$item_type?>',
	post_params: {"PHPSESSID" : "<?php echo Session::instance()->id(); ?>"},
	file_types : "*.*",
	file_types_description : "All Files",
	file_size_limit : "4 MB",
	file_upload_limit : "100",
	file_queue_limit : "100",
	button_action : SWFUpload.BUTTON_ACTION.SELECT_FILES,
	custom_settings : {
		progressTarget : "fsUploadProgress",
		cancelButtonId : "btnCancel"
	},
	debug: false,

	// Button settings
	button_image_url: url_base + "media/admin/js/swfuploader/TestImageNoText_65x29.png",
	button_placeholder_id: "spanButtonPlaceHolder",
	button_width: 61,
	button_height: 22,

	// The event handler functions are defined in handlers.js
	file_queued_handler : fileQueued,
	file_queue_error_handler : fileQueueError,
	file_dialog_complete_handler : fileDialogComplete,
	upload_start_handler : uploadStart,
	upload_progress_handler : uploadProgress,
	upload_error_handler : uploadError,
	upload_success_handler : uploadSuccess,
	upload_complete_handler : uploadComplete,
	queue_complete_handler : queueComplete	// Queue plugin event

};

	$(document).ready(function(){

		swfu = new SWFUpload(settings);

	});

	function uploadComplete(){
		$.ajax({
			type: "GET",
			url: url_base + 'administration/pictures/list/' + <?=$item_id?> + '/' + <?=$item_type?>,
			success: function(html){
					$('.picture_container').replaceWith(html);
				}
		});
	}

//-->
</script>

<div>
	<div class="fieldset flash" id="fsUploadProgress">
		<span class="legend"></span>
	</div>
	<div id="divStatus">0 Fisere urcate</div>
	<div style="padding:10px 0 10px 0;">
		<span id="spanButtonPlaceHolder"></span>
		<input id="btnCancel" type="button" value="Anuleaza upload-ul" onclick="swfu.cancelQueue();" disabled="disabled" style="margin-left:2px; margin-top:-5px; font-size:8pt; height:25px;" />
	</div>
</div>
