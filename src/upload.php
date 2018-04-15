<?php


// init limit values //
$sizeERR = $typeERR = [];
$allowedExtensions = ['jpeg', 'jpg', 'png', 'gif'];
$allowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];
$maxSize = 100000;
/////////////////////

// init storage path //
$currentWorkDirectory = getcwd();
$storageDirectory = "upload/";
$uploadPath = $currentWorkDirectory . "/" . $storageDirectory;
$gallery = new FilesystemIterator($uploadPath);
/////////////////////

// FUNCTIONS //
require_once 'functions.php';
//////////////

// greeting //
if(empty($_POST)){
    echo "Prêt à uploader !";
}
//////////////

// trigger validator //
if (!empty($_POST['submit']) && !empty($_FILES)) {

    sizeValidator($_FILES);
    if(!empty($sizeERR)){
        echo "LES FICHIERS SUIVANT SONT TROP VOLUMINEUX : <br>";
        foreach($sizeERR as $error){
            echo $error . "<br>";
        }
        echo "<br>";
    }

    if(!empty($_FILES)){
        mimeValidator($_FILES);
    }

    if(!empty($sizeERR)){
        echo "LES FICHIERs SUIVANT NE SONT PAS DES IMAGES ET/OU NE SONT PAS DE LA BONNE EXTENSION : <br>";
        foreach($sizeERR as $error){
            echo $error . "<br>";
        }
        echo "<br>";
    }

    if(!empty($_FILES['files']['name'])){
        upload($_FILES, $uploadPath);
           echo "<i class=\"fas fa-check-circle text-warning\"'></i>" . " UPLOAD RÉUSSI POUR : " . implode(', ' ,$_FILES['files']['name']);
    }
}

// deleting //
if(!empty($_POST['delete'])) {
    $fileToDelete = $uploadPath . $_POST['delete'];
    if (file_exists($fileToDelete)) {
        unlinkImage($uploadPath, $_POST['delete']);
    }
}
///////////////

// create archive //
if(!empty($_POST['zip'])) {
    $filesToZip= scandir($storageDirectory);
    unset($filesToZip[0],$filesToZip[1]);
    $archiveName = $uploadPath . "NewZIP_" . uniqid() . ".zip";
    $zip = new ZipArchive();

    if ($zip->open($archiveName, ZipArchive::CREATE)!==TRUE) {
        exit("OOOOPPPPSSS... Impossible d'ouvrir le fichier <$archiveName>\n");
    }
    foreach($filesToZip as $files => $filename){
        $zip->addFile($uploadPath . $filename, "/$filename");
    }

    if($zip->status === 0){
        echo "<i class=\"fas fa-check-circle text-warning\"'></i> " . "Compression réussi, votre archive ce trouve ici : " . "<br><br>";
        echo $archiveName . "<br><br>";
        echo "Nombre de fichiers : " . $zip->numFiles;
        $zip->close();
    }
    unlinkAll($uploadPath, $filesToZip);


}
///////////////
