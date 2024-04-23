$(document).ready(function() {
	
	// enable fileupload plugin
	$('input[name="files"]').fileuploader({
        limit: 6, // limit of the files {Number}
        maxSize: 5, // files maximal size in Mb {Number}
        fileMaxSize: 2, // file maximal size in Mb {Number}
        extensions: ['jpg', 'jpeg', 'png', 'audio/mp3', 'text/plain'], // allowed extensions or types {Array}
		changeInput: '<div class="fileuploader-input">' +
		                  '<div class="fileuploader-input-caption">' +
                              '<span>${captions.feedback}</span>' +
                          '</div>' +
                          '<div class="fileuploader-input-button">' +
                              '<span>${captions.button}</span>' +
                          '</div>' +
                      '</div>',
		inputNameBrackets: true,
        theme: 'default',
        thumbnails: {
			box: '<div class="fileuploader-items">' +
                      '<ul class="fileuploader-items-list"></ul>' +
                  '</div>',
			boxAppendTo: null,
			item: '<li class="fileuploader-item">' +
                       '<div class="columns">' +
                           '<div class="column-thumbnail">${image} <span class="fileuploader-action-popup"></span></div>' +
                           '<div class="column-title">' +
                               '<div title="${name}">${name}</div>' +
                               '<span>${size2}</span>' +
                           '</div>' +
                           '<div class="column-actions">' +
                               '<a class="fileuploader-action fileuploader-action-remove" title="${captions.remove}"><i></i></a>' +
                           '</div>' +
                       '</div>' +
                       '<div class="progress-bar2">${progressBar}<span></span></div>' +
                   '</li>',
            item2: '<li class="fileuploader-item">' +
                        '<div class="columns">' +
                            '<div class="column-thumbnail">${image} <span class="fileuploader-action-popup"></span></div>' +
                            '<a href="${file}" target="_blank">' +
                                '<div class="column-title">' +
                                    '<div title="${name}">${name}</div>' +
                                    '<span>${size2}</span>' +
                                '</div>' +
                            '</a>' +
                            '<div class="column-actions">' +
                                '<a href="${file}" class="fileuploader-action fileuploader-action-download" title="${captions.download}" download><i></i></a>' +
                                '<a class="fileuploader-action fileuploader-action-remove" title="${captions.remove}"><i></i></a>' +
                            '</div>' +
                        '</div>' +
                    '</li>',
            popup: {
                template: function(data) { return '<div class="fileuploader-popup">' +
                    '<div class="fileuploader-popup-preview">' +
                        '<div class="node ${format}">${reader.node}</div>' +
                        '<div class="tools">' +
                            '<ul>' +
                                '<li>' +
                                    '<span>${captions.name}:</span>' +
                                    '<h5>${name}</h5>' +
                                '</li>' +
                                '<li>' +
                                    '<span>${captions.type}:</span>' +
                                    '<h5>${extension.toUpperCase()}</h5>' +
                                '</li>' +
                                '<li>' +
                                    '<span>${captions.size}:</span>' +
                                    '<h5>${size2}</h5>' +
                                '</li>' +
                                (data.reader && data.reader.width ? '<li>' +
                                    '<span>${captions.dimensions}:</span>' +
                                    '<h5>${reader.width}x${reader.height}px</h5>' +
                                '</li>' : ''
								) +
								(data.reader && data.reader.duration ? '<li>' +
                                    '<span>${captions.duration}:</span>' +
                                    '<h5>${reader.duration2}</h5>' +
                                '</li>' : ''
								) +
                                '<li class="separator"></li>' +
                                (data.format == 'image' && data.reader.src && data.editor ? '<li>' +
                                    '<a data-action="crop">' +
                                        '<i></i>' +
                                        '<span>${captions.crop}</span>' +
                                    '</a>' +
                                '</li>' +
                                '<li>' +
                                    '<a data-action="rotate-cw">' +
                                        '<i></i>' +
                                        '<span>${captions.rotate}</span>' +
                                    '</a>' +
                                '</li>' : ''
								) +
                                '<li>' +
                                    '<a data-action="remove">' +
                                        '<i></i>' +
                                        '<span>${captions.remove}</span>' +
                                    '</a>' +
                                '</li>' +
                            '</ul>' +
                            '<div class="buttons">' +
                                '<a class="fileuploader-popup-button" data-action="cancel">${captions.cancel}</a>' +
                                '<a class="fileuploader-popup-button button-success" data-action="save">${captions.confirm}</a>' +
                            '</div>' +
                        '</div>' +
                    '</div>' +
                '</div>'; },
                onShow: function(item) {
                    item.popup.html.on('click', '[data-action="crop"]', function(e) {
						if (item.editor)
                        	item.editor.cropper();
                    }).on('click', '[data-action="rotate-cw"]', function(e) {
						if (item.editor)
                        	item.editor.rotate();
                    }).on('click', '[data-action="remove"]', function(e) {
                        item.popup.close();
                        item.remove();
                    }).on('click', '[data-action="cancel"]', function(e) {
                        item.popup.close();
                    }).on('click', '[data-action="save"]', function(e) {
						if (item.editor)
                        	item.editor.save();
						item.popup.close();
                    });
                },
                onHide: function(item) {
                    var popup = item.popup.html;
                    
                    popup.fadeOut(200, function() {
                        popup.remove();
                    });
                }
            },
			itemPrepend: false,
			removeConfirmation: true,
			startImageRenderer: true,
			synchronImages: true,
			canvasImage: {
				width: null,
				height: null
			},
			_selectors: {
				list: '.fileuploader-items-list',
				item: '.fileuploader-item',
				start: '.fileuploader-action-start',
				retry: '.fileuploader-action-retry',
				remove: '.fileuploader-action-remove',
                popup: '.fileuploader-popup',
                popup_open: '.fileuploader-action-popup'
			},
        	beforeShow: function(parentEl, newInputEl, inputEl) {
				// your callback here
			},
			onItemShow: function(item, listEl, parentEl, newInputEl, inputEl) {
				if(item.choosed)
					item.html.find('.column-actions').prepend(
						'<a class="fileuploader-action fileuploader-action-start" title="Start upload"><i></i></a>'
					);
			},
            onItemRemove: function(itemEl, listEl, parentEl, newInputEl, inputEl) {
                itemEl.children().animate({'opacity': 0}, 200, function() {
                    setTimeout(function() {
                        itemEl.slideUp(200, function() {
                            itemEl.remove(); 
                        });
                    }, 100);
                });
            },
			onImageLoaded: function(itemEl, listEl, parentEl, newInputEl, inputEl) {
				// your callback here
			},
		},
        upload: {
            url: 'index.html',
            data: {
		  		isTest: 'yes'
		    },
            type: 'POST',
            enctype: 'multipart/form-data',
            start: false,
            chunk: false,
            synchron: false,
            beforeSend: function(item, listEl, parentEl, newInputEl, inputEl) {
				item.upload.data.isTest = 'no';
				
				return true;
			},
            onSuccess: function(data, item, listEl, parentEl, newInputEl, inputEl, textStatus, jqXHR) {
                item.html.find('.column-actions').append('<a class="fileuploader-action fileuploader-action-remove fileuploader-action-success" title="Remove"><i></i></a>');
                
                setTimeout(function() {
                    item.html.find('.progress-bar2').fadeOut(400);
                }, 400);
            },
            onError: function(item, listEl, parentEl, newInputEl, inputEl, jqXHR, textStatus, errorThrown) {
				var progressBar = item.html.find('.progress-bar2');
				
				if(progressBar.length > 0) {
					progressBar.find('span').html(0 + "%");
                    progressBar.find('.fileuploader-progressbar .bar').width(0 + "%");
					item.html.find('.progress-bar2').fadeOut(400);
				}
                
                item.upload.status != 'cancelled' && item.html.find('.fileuploader-action-retry').length == 0 ? item.html.find('.column-actions').prepend(
                    '<a class="fileuploader-action fileuploader-action-retry" title="Retry"><i></i></a>'
                ) : null;
            },
            onProgress: function(data, item, listEl, parentEl, newInputEl, inputEl) {
                var progressBar = item.html.find('.progress-bar2');
				
                if(progressBar.length > 0) {
                    progressBar.show();
                    progressBar.find('span').html(data.percentage + "%");
                    progressBar.find('.fileuploader-progressbar .bar').width(data.percentage + "%");
                }
            },
            onComplete: function(listEl, parentEl, newInputEl, inputEl, jqXHR, textStatus) {
				// your callback here
			},
        },
        dragDrop: {
			container: null,
			onDragEnter: function(event, listEl, parentEl, newInputEl, inputEl) {
				// your callback here
			},
			onDragLeave: function(event, listEl, parentEl, newInputEl, inputEl) {
				// your callback here
			},
			onDrop: function(event, listEl, parentEl, newInputEl, inputEl) {
				// your callback here
			},
			
	    },
		editor: {
			cropper: {
				ratio: null,
				minWidth: null,
				minHeight: null,
				showGrid: true
			},
			quality: null,
			maxWidth: null,
			maxHeight: null,
			onSave: function(fileBlob, item, listEl, parentEl, newInputEl, inputEl) {
				// your callback here
			}
		},
        addMore: false,
        skipFileNameCheck: false,
        files: [{
			name: 'filename1.txt',
			size: 1024,
			type: 'text/plain',
			file: 'uploads/filename1.txt',
			data: {
				url: 'http://google.com/'							  
		    }
	  	}],
        clipboardPaste: 2000,
        listInput: true,
        enableApi: true,
		listeners: {
			click: function(event) {
				// input was clicked
			}	
		},
		onSupportError: function(parentEl, inputEl) {
			// your callback here
		},
        beforeRender: function(parentEl, inputEl) {
			// your callback here
			
			return true;
		},
        afterRender: function(listEl, parentEl, newInputEl, inputEl) {
			// your callback here
		},
        beforeSelect: function(files, listEl, parentEl, newInputEl, inputEl) {
			// your callback here
			return true;
		},
        onFilesCheck: function(files, options, listEl, parentEl, newInputEl, inputEl) {
			// your callback here
			return true;
		},
        onFilesCheck: function(item, listEl, parentEl, newInputEl, inputEl) {
            // your callback here
            // item.reader
        },
        onSelect: function(item, listEl, parentEl, newInputEl, inputEl) {
			// your callback here
		},
		afterSelect: function(listEl, parentEl, newInputEl, inputEl) {
			// your callback here
		},
        onListInput: function(list, fileList, listInputEl, listEl, parentEl, newInputEl, inputEl) {
			// your callback
			
			return list;
		},
        onRemove: function(item, listEl, parentEl, newInputEl, inputEl) {
			// your callback
			return true;
		},
        onEmpty: function(listEl, parentEl, newInputEl, inputEl) {
			// your callback
		},
        dialogs: {
            alert: function(text) {
                return alert(text);
            },
            confirm: function(text, callback) {
                confirm(text) ? callback() : null;
            }
        },
        captions: {
            button: function(options) { return 'Choose ' + (options.limit == 1 ? 'File' : 'Files'); },
            feedback: function(options) { return 'Choose ' + (options.limit == 1 ? 'file' : 'files') + ' to upload'; },
            feedback2: function(options) { return options.length + ' ' + (options.length > 1 ? ' files were' : ' file was') + ' chosen'; },
			confirm: 'Confirm',
            cancel: 'Cancel',
			name: 'Name',
			type: 'Type',
			size: 'Size',
			dimensions: 'Dimensions',
			duration: 'Duration',
            crop: 'Crop',
            rotate: 'Rotate',
            download: 'Download',
            remove: 'Remove',
            drop: 'Drop the files here to Upload',
            paste: '<div class="fileuploader-pending-loader"><div class="left-half" style="animation-duration: ${ms}s"></div><div class="spinner" style="animation-duration: ${ms}s"></div><div class="right-half" style="animation-duration: ${ms}s"></div></div> Pasting a file, click here to cancel.',
            removeConfirmation: 'Are you sure you want to remove this file?',
            errors: {
                filesLimit: 'Only ${limit} files are allowed to be uploaded.',
                filesType: 'Only ${extensions} files are allowed to be uploaded.',
                fileSize: '${name} is too large! Please choose a file up to ${fileMaxSize}MB.',
                filesSizeAll: 'Files that you choosed are too large! Please upload files up to ${maxSize} MB.',
                fileName: 'File with the name ${name} is already selected.',
                folderUpload: 'You are not allowed to upload folders.'
            }
        }
	});
	
});