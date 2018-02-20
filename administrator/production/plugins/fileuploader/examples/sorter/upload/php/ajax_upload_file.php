<?php
    include('../../../../src/class.fileuploader.php');
    
    $fileuploader_listInput = null;
    if (isset($_POST['_sortingg'])) {
        $fileuploader_listInput = '_sortingg';  
    }

    // create an empty array
    // we will add to this array the files from directory below
    // here you can also add files from MySQL database
    $appendedFiles = array();

    // scan uploads directory
    $uploadsFiles = array_diff(scandir('../uploads/'), array('.', '..'));

    // add files to our array with
    // made to use the correct structure of a file
    foreach($uploadsFiles as $file) {
        // skip if directory
        if(is_dir($file))
            continue;

        // add file to our array
        // !important please follow the structure below
        $appendedFiles[] = array(
            "name" => $file,
            "type" => FileUploader::mime_content_type('../uploads/' . $file),
            "size" => filesize('../uploads/' . $file),
            "file" => 'uploads/' . $file,
            "data" => array(
                "url" => 'http://localhost/fileuploader/examples/sorter/uploads/' . $file
            )
        );
    }
	
	// initialize FileUploader
    $FileUploader = new FileUploader('files', array(
        'uploadDir' => '../uploads/',
        'title' => 'name',
        'files' => $appendedFiles,
        'listInput' => $fileuploader_listInput
    ));

    if (isset($_POST['_sortingg'])) {
        $FileUploader->sortFiles();
        print_r($FileUploader->getFileList());
        exit;
    }
	
	// call to upload the files
    $data = $FileUploader->upload();

	// export to js
	echo json_encode($data);
	exit;