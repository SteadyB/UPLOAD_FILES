<?php
?>

<!doctype html >
<html lang="fr">
<head >
    <meta charset = "UTF-8" >
    <meta name = "viewport"
          content = "width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" >
    <title >Laisse pas traîner ton file</title >
    <link rel = "stylesheet" href = "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css"
          integrity = "sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin = "anonymous" >
</head >
<body>
    <section class="container-fluid">
        <!--JUMBOTRON HEADER-->
        <div class="jumbotron bg-info text-light mb-0 mt-3">
            <div class="row text-center">
                <div class="col-12 m-0">
                    <a class="text-light" role="..." href="https://www.youtube.com/watch?v=biYdUZXfz9I"><h1>LAISSE PAS TRAÎNER TON FILE.</h1></a>
                </div>
                <div class="col-12">
                    <h3>Stock le ici.</h3>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-12 mt-4 text-warning" style="font-size:5em;">
                    <i class="far fa-images"></i> <i class="fas fa-angle-double-right mx-5"></i> <i class="fas fa-file-archive"></i>
                </div>
            </div>
            <div class="row justify-content-center text-center mt-5 mb-0">
                <div class="col-xl-auto col-auto">
                    <h3 class="text-secondary bg-light rounded p-3"><?php require '../src/upload.php'; ?></h3>
                </div>
            </div>
        </div>
        <!--UPLOADE FORM-->
        <section class="row justify-content-center">
            <form action="" method="post" enctype="multipart/form-data"><!--TODO https://getbootstrap.com/docs/4.0/components/input-group/#custom-forms-->
                <div class="row justify-content-center">
                    <div class="col-auto">
                        <small id="fileHelpId" class=" col-form-label-sm form-text text-muted my-3"> .jpg ou .jpeg, .png ou .gif uniquement. Maximum 1Mo par fichier. </small>
                    </div>
                </div>
                <div class="form-inline justify-content-center">
                    <label class="col-xl-auto col-auto px-0 sr-only" for="upload">Upload de fichier</label>
                    <input type="file" class="col-xl-12 col-12 py-2 px-4 btn btn-lg rounded form-control-file bg-warning" name="files[]" id="upload" placeholder="" aria-describedby="fileHelpId" multiple />
                </div>
                <div class="row justify-content-center">
                    <div class="col-auto m-3">
                        <input class="btn btn-info btn-lg text-light font-weight-bold" type="submit" value="Envoyer" name="submit" />
                    </div>
                </div>
            </form>
        </section>
        <!--UPLOADED FILES GALLERY-->
        <?php $path = new FilesystemIterator($uploadPath);
        if(in_array(pathinfo($gallery->getFilename(), PATHINFO_EXTENSION), $allowedExtensions)): ?>
        <section class="container-fluid mx-auto py-3 mt-3 mb-5 bg-dark rounded">
            <div class="row text-center">

                <div class="col m-3 text-light">
                    <h3>APERÇU DES IMAGES</h3>
                </div>
            </div>
            <?php endif; ?>
            <div class="row justify-content-center mx-auto mb-3">
                <?php foreach($path as $gallery):
                    if(in_array(pathinfo($gallery->getFilename(), PATHINFO_EXTENSION), $allowedExtensions)): ?>
                        <div class="col-3">
                            <div class="card bg-info p-3 pr-0 border-0 ml-2 mb-5 text-light" style="min-height: 350px;">
                                <img class="card-img-top img-responsive" style="max-height: 355px; max-width: 200px;" src="<?php echo $storageDirectory . $gallery->getFilename(); ?>" alt="Card image cap">
                                <div class="card-body">
                                    <p class="card-title"><?php echo $gallery->getFilename();?></p>
                                    <form action="" method="post">
                                        <button type="submit" name="delete" class="btn btn-danger align-self-end" value="<?php echo $gallery->getFilename();?>">Supprimer</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php endif;
                endforeach; ?>
            </div>
            <?php if(!in_array(pathinfo($gallery->getFilename(), PATHINFO_EXTENSION), $allowedzip=['zip']) && in_array(pathinfo($gallery->getFilename(), PATHINFO_EXTENSION), $allowedExtensions)): ?>
            <div class="row justify-content-center p-2 pb-2 mb-3">
                <form action="" method="post">
                    <button type="submit" name="zip" class="btn btn-lg btn-outline-info" value="ZipItNow"><i class="fas fa-file-archive"></i> <strong>Compresser les images</strong></button>
                </form>
            </div>
        </section>
        <?php endif;?>
        <!--TODO ZIP GALLERY FILES-->

    </section>

<script src = "https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src = "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
<script src = "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"
        integrity = "sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin = "anonymous"></script>
<script defer src = "https://use.fontawesome.com/releases/v5.0.9/js/all.js"
        integrity = "sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin = "anonymous"></script>
</body>
</html>