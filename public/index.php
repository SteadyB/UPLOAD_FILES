<?php
/*php*/
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
        <div class="jumbotron bg-info text-light mb-0">

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
                    <h3 class="text-secondary bg-light rounded p-2"><?php require '../src/functions.php'; ?></h3>
                </div>
            </div>
        </div>
        <section class="row justify-content-center">
            <form action="" method="post" enctype="multipart/form-data"><!--TODO https://getbootstrap.com/docs/4.0/components/input-group/#custom-forms-->
                <div class="row justify-content-center">
                    <div class="col-auto">
                        <small id="fileHelpId" class=" col-form-label-sm form-text text-muted my-3"> .jpg ou .jpeg, .png ou .gif uniquement. Maximum 1Mo par fichier. </small>
                    </div>
                </div>
                <div class="form-inline justify-content-center">
                    <label class="col-xl-auto col-auto px-0 sr-only" for="upload">Upload de fichier</label>
                    <input type="file" class="col-xl-12 col-12 py-2 px-4 btn rounded form-control-file bg-warning" name="file" id="upload" placeholder="" aria-describedby="fileHelpId" />
                </div>
                <div class="row justify-content-center">
                    <div class="col-auto m-3">
                        <input class="btn btn-info text-light font-weight-bold" type="submit" value="Envoyer" name="submit" />
                    </div>
                </div>
            </form>
        </section>
    </section>

<script src = "https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src = "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
<script src = "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"
        integrity = "sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin = "anonymous"></script>
<script defer src = "https://use.fontawesome.com/releases/v5.0.9/js/all.js"
        integrity = "sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin = "anonymous"></script>
</body>
</html>