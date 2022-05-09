<?php    
    //$_FILES에 담긴 배열 정보 구하기. 확인 후에 주석처리
    var_dump($_FILES);

    // 임시로 저장된 정보(tmp_name)
$tempFile = $_FILES['img']['tmp_name'];

// 파일타입 및 확장자 체크
$fileTypeExt = explode("/", $_FILES['img']['type']);

// 파일 타입 
$fileType = $fileTypeExt[0]; //image

// 파일 확장자
$fileExt = $fileTypeExt[1]; //jpg, png 등

// 확장자 검사
$extStatus = false;

switch($fileExt){
	case 'jpeg':
	case 'jpg':
	case 'gif':
	case 'bmp':
	case 'png':
		$extStatus = true;
		break;
	
	default:
		echo "이미지 전용 확장자(jpg, bmp, gif, png)외에는 사용이 불가합니다."; 
		exit;
		break;
}

// 이미지 파일이 맞는지 검사. 
if($fileType == 'image'){
	// 허용할 확장자를 jpg, bmp, gif, png로 정함, 그 외에는 업로드 불가
	if($extStatus){
        $res_path = "../img"; // 상위 디렉토리 이동 ->  ../
        if(!is_dir($res_path)) {
            mkdir($res_path, 0777, true);
        }
		// 임시 파일 옮길 디렉토리 및 파일명
		$resFile = $res_path . "/{$_FILES['img']['name']}";
		// 임시 저장된 파일을 우리가 저장할 디렉토리 및 파일명으로 옮김
		$imageUpload = move_uploaded_file($tempFile, $resFile);
		
		// 업로드 성공 여부 확인
		if($imageUpload == true){
			echo "파일이 정상적으로 업로드 되었습니다. <br>";
			echo "<img src='{$resFile}' width='100' />";
		}else{
			echo "파일 업로드에 실패하였습니다.";
		}
	}	// end if - extStatus
		// 확장자가 jpg, bmp, gif, png가 아닌 경우 else문 실행
	else {
		echo "파일 확장자는 jpg, bmp, gif, png 이어야 합니다.";
		exit;
	}	
}	// end if - filetype
	// 파일 타입이 image가 아닌 경우 
else {
	echo "이미지 파일이 아닙니다.";
	exit;
}