<?php
    include('../../../../src/class.fileuploader.php');
	
	// initialize FileUploader
    $FileUploader = new FileUploader('files', array(
        'uploadDir' => '../uploads/',
        'title' => 'name',
		'editor' => array(
			'maxWidth' => 1280,
			'maxHeight' => 720,
			'crop' => false,
			'quality' => 90
		)
    ));

	// unlink the files
	// !important only for appended files
	// you will need to give the array with appendend files in 'files' option of the FileUploader
	foreach($FileUploader->getRemovedFiles('file') as $key=>$value) {
		unlink('../uploads/' . $value['name']);
		
		// unlink the thumbnail
		if (file_exists('../uploads/' . 'thumb_' . $value['name']))
			unlink('../uploads/' . 'thumb_' . $value['name']);
	}
	
	// call to upload the files
    $data = $FileUploader->upload();
    
    // if uploaded and success
    if($data['isSuccess'] && count($data['files']) > 0) {
        // get uploaded files
        $uploadedFiles = $data['files'];
		
		// create thumbnails
		foreach($uploadedFiles as $item) {
			FileUploader::resize($filename = $item['file'], $width = 64, $height = 64, $destination = '../uploads/' . 'thumb_' . $item['name'], $crop = false, $quality = 80);
		}
    }
    // if warnings
	if($data['hasWarnings']) {
        // get warnings
        $warnings = $data['warnings'];
        
   		echo '<pre>';
        print_r($warnings);
		echo '</pre>';
        exit;
    }
	
	// get the fileList
	$fileList = $FileUploader->getFileList();
	
	// show
	echo '<pre>';
	print_r($fileList);
	echo '</pre>';