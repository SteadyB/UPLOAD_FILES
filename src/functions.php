<?php
/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 03/04/18
 * Time: 19:05
 */

$currentWorkDir = getcwd();
$storageDirectory = "/Storage/";

$fileERR = []; // Store all foreseen and unforseen errors here

$fileName = $fileSize = $fileTemporaryName  = $fileType = $fileExtension = '';

$fileExtensions = ['jpeg','jpg','png','gif']; // Get all the file extensions
if (!empty($_FILES)){
    $fileName = $_FILES['file']['name'];
    $fileSize = $_FILES['file']['size'];
    $fileTemporaryName  = $_FILES['file']['tmp_name'];
    $fileType = $_FILES['file']['type'];
    $fileExtension  = pathinfo($fileName, PATHINFO_EXTENSION);
}


$uploadPath = $currentWorkDir . $storageDirectory . basename($fileName);

if (!empty($_POST['submit'])) {

    if (!in_array($fileExtension,$fileExtensions)) {
        var_dump($fileExtension);
        $fileERR[] = "Extension non prise en charge. Veuillez utiliser uniquement les suivantes : .jpg ou .jpeg ; .png ou .gif , merci.";
    }

    if ($fileSize > 1000000) {
        $fileERR[] = "fichier trop volumineux. MAXIMUM 1Mo.";
    }

    if (empty($fileERR)) {
        $upload = move_uploaded_file($fileTemporaryName, $uploadPath);

        if ($upload) {
            echo "<i class=\"fas fa-check-circle\"></i> " . "Le fichier " . basename($fileName) . " a bien été uploader";
        } else {
            echo "<i class=\"fas fa-exclamation-circle\"></i> " . "une erreur s'est produite. le fichier n'a pas été uploader veuillez recommencer.";
        }
    } else {
        foreach ($fileERR as $error) {
            echo "erreur  : " . $error . "\n";
        }
    }
}
