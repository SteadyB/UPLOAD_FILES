<?php

function sizeValidator(array $files): array
{
    $maxSize = 100000;
    $numberOfFiles = count($files['files']['name']);
    $sizeERR = [];

    for ($i = 0; $i < $numberOfFiles; $i++) {
        $fileSize = $files['files']['size'][$i];
        if ($fileSize > $maxSize) {
            $sizeERR[$i] = $files['files']['name'][$i];
            unset($files['files']['name'][$i], $files['files']['type'][$i], $files['files']['tmp_name'][$i], $files['files']['size'][$i], $files['files']['error'][$i]);
        }
    }
    $files['files']['name'] = array_values($files['files']['name']);
    $files['files']['type'] = array_values($files['files']['type']);
    $files['files']['tmp_name'] = array_values($files['files']['tmp_name']);
    $files['files']['size'] = array_values($files['files']['size']);
    $files['files']['size'] = array_values($files['files']['error']);
    $_FILES = $files;
    return $sizeERR;
}

//////////////

function mimeValidator(array $files): array
{
    $allowedTypes = ['image/jpeg','image/jpg','image/png','image/gif'];
    $numberOfFiles = count($files['files']['name']);
    $typeERR = [];

    for ($i = 0; $i < $numberOfFiles; $i++) {
        $fileType = mime_content_type($files['files']['tmp_name'][$i]);
        if (!in_array($fileType, $allowedTypes)) {
            $typeERR[$i] = $files['files']['name'][$i];
            unset($files['files']['name'][$i], $files['files']['type'][$i], $files['files']['tmp_name'][$i], $files['files']['size'][$i], $files['files']['error'][$i]);
        }
    }
    $files['files']['name'] = array_values($files['files']['name']);
    $files['files']['type'] = array_values($files['files']['type']);
    $files['files']['tmp_name'] = array_values($files['files']['tmp_name']);
    $files['files']['size'] = array_values($files['files']['size']);
    $files['files']['size'] = array_values($files['files']['error']);
    $_FILES = $files;
    return$typeERR;
}

//////////////

function upload(array $files, string $uploadPath): void
{
    $numberOfFiles = count($files['files']['name']);

    for ($i = 0; $i < $numberOfFiles; $i++) {
            $fileNameTMP = $files['files']['tmp_name'][$i];
            $fileName = "image" . uniqid() . "." . pathinfo($files['files']['name'][$i], PATHINFO_EXTENSION);
            move_uploaded_file($fileNameTMP, "$uploadPath/$fileName");
        }
}

//////////////

function unlinkImage(string $uploadPath, string $filesname)//TODO need improvement
{
    $fileToDelete = $uploadPath . $filesname;
    if(is_file($fileToDelete)){
        unlink($fileToDelete);
    }else{
        echo "sorry, " . $_POST['delete'] . " has not been found.";
    }
}

//////////////

function unlinkAll(string $uploadPath, array $allFiles): void
{
    foreach($allFiles as $files){
        $fileToDelete = $uploadPath . $files;
        unlink($fileToDelete);
        if(is_file($fileToDelete)){
            unlink($fileToDelete);
        }
    }
}

//////////////