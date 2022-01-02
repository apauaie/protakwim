$(document).ready(function() {
	
	// enable fileuploader plugin
	$('input[name="files"]').fileuploader({
		extensions: ['jpg', 'jpeg', 'png', 'gif'],
		addMore: true,
		editor: {
			cropper: {
				ratio: '1:1',
				minWidth: 100,
				minHeight: 100,
				showGrid: true
			}
		}
	});
	
});