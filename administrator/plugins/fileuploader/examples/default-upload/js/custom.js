$(document).ready(function() {
	
	// enable fileupload plugin
	$('input[name="files"]').fileuploader({
		upload: {
            url: 'php/ajax_upload_file.php',
            data: null,
            type: 'POST',
            enctype: 'multipart/form-data',
            start: true,
            synchron: true,
            beforeSend: function(item) {
				var input = $('#custom_file_name');
				
				// set the POST field
				if(input.length)
					item.upload.data.custom_name = input.val();
				
				// reset input value
				input.val("");
			},
            onSuccess: function(result, item) {
                var data = {},
					nameWasChanged = false;
				
				try {
					data = JSON.parse(result);
				} catch (e) {
					data.hasWarnings = true;
				}
				
				// get the new file name
                if(data.isSuccess && data.files[0]) {
					nameWasChanged = item.name != data.files[0].name;
					
                    item.name = data.files[0].name;
                }
                
				// make HTML changes
				if(nameWasChanged)
					item.html.find('.column-title div').animate({opacity: 0}, 400);
                item.html.find('.column-actions').append('<a class="fileuploader-action fileuploader-action-remove fileuploader-action-success" title="Remove"><i></i></a>');
                setTimeout(function() {
					item.html.find('.column-title div').attr('title', item.name).text(item.name).animate({opacity: 1}, 400);
                    item.html.find('.progress-bar2').fadeOut(400);
                }, 400);
            },
            onError: function(item) {
				var progressBar = item.html.find('.progress-bar2');
				
				// make HTML changes
				if(progressBar.length > 0) {
					progressBar.find('span').html(0 + "%");
                    progressBar.find('.fileuploader-progressbar .bar').width(0 + "%");
					item.html.find('.progress-bar2').fadeOut(400);
				}
                
                item.upload.status != 'cancelled' && item.html.find('.fileuploader-action-retry').length == 0 ? item.html.find('.column-actions').prepend(
                    '<a class="fileuploader-action fileuploader-action-retry" title="Retry"><i></i></a>'
                ) : null;
            },
            onProgress: function(data, item) {
                var progressBar = item.html.find('.progress-bar2');
				
				// make HTML changes
                if(progressBar.length > 0) {
                    progressBar.show();
                    progressBar.find('span').html(data.percentage + "%");
                    progressBar.find('.fileuploader-progressbar .bar').width(data.percentage + "%");
                }
            },
            onComplete: null,
        },
		onRemove: function(item) {
			// send POST request
			$.post('./php/ajax_remove_file.php', {
				file: item.name
			});
		}
	});
	
});