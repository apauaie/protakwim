$(document).ready(function() {
	
	// enable fileupload plugin
	$('input[name="files[]"]').fileuploader({
		limit: 1,
        extensions: ['jpg', 'jpeg', 'png', 'gif'],
		changeInput: ' ',
		theme: 'thumbnails',
        enableApi: true,
		addMore: true,
		thumbnails: {
			box: '<div class="fileuploader-items">' +
                      '<ul class="fileuploader-items-list">' +
					      '<li class="fileuploader-thumbnails-input"><div class="fileuploader-thumbnails-input-inner">+</div></li>' +
                      '</ul>' +
                  '</div>',
			item: '<li class="fileuploader-item">' +
				       '<div class="fileuploader-item-inner">' +
                           '<div class="thumbnail-holder">${image}</div>' +
                           '<div class="actions-holder">' +
						   	   '<a class="fileuploader-action fileuploader-action-remove" title="${captions.remove}"><i class="remove"></i></a>' +
							   '<span class="fileuploader-action-popup"></span>' +
                           '</div>' +
                       	   '<div class="progress-holder">${progressBar}</div>' +
                       '</div>' +
                   '</li>',
			item2: '<li class="fileuploader-item">' +
				       '<div class="fileuploader-item-inner">' +
                           '<div class="thumbnail-holder">${image}</div>' +
                           '<div class="actions-holder">' +
                               '<a class="fileuploader-action fileuploader-action-remove" title="${captions.remove}"><i class="remove"></i></a>' +
							   '<span class="fileuploader-action-popup"></span>' +
                           '</div>' +
                       '</div>' +
                   '</li>',
			startImageRenderer: true,
			canvasImage: false,
			_selectors: {
				list: '.fileuploader-items-list',
				item: '.fileuploader-item',
				start: '.fileuploader-action-start',
				retry: '.fileuploader-action-retry',
				remove: '.fileuploader-action-remove'
			},
			onItemShow: function(item, listEl, parentEl, newInputEl, inputEl) {
				var plusInput = listEl.find('.fileuploader-thumbnails-input'),
					api = $.fileuploader.getInstance(inputEl.get(0));
				
				if(api.getFiles().length >= api.getOptions().limit) {
					plusInput.hide();
				}
				
				plusInput.insertAfter(item.html);
				
				
				if(item.format == 'image') {
					item.html.find('.fileuploader-item-icon').hide();
				}
			},
			onItemRemove: function(html, listEl, parentEl, newInputEl, inputEl) {
				var plusInput = listEl.find('.fileuploader-thumbnails-input'),
					api = $.fileuploader.getInstance(inputEl.get(0));
				
                html.children().animate({'opacity': 0}, 200, function() {
                    setTimeout(function() {
                        html.remove();
						
						if(api.getFiles().length - 1 < api.getOptions().limit) {
							plusInput.show();
						}
                    }, 100);
                });
				
            }
		},
		afterRender: function(listEl, parentEl, newInputEl, inputEl) {
			var plusInput = listEl.find('.fileuploader-thumbnails-input'),
				api = $.fileuploader.getInstance(inputEl.get(0));
		
			plusInput.on('click', function() {
				api.open();
			});
		}
    });
	
});