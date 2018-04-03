<?php
/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 03/04/18
 * Time: 19:03
 */


?>


<!--//PAGE//-->
<!doctype html >
<html lang="en">
<head >
    <meta charset = "UTF-8" >
    <meta name = "viewport"
          content = "width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" >

    <title > Title</title >
    <link rel = "stylesheet" href = "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css"
          integrity = "sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin = "anonymous" >
</head >
<body class="container-fluid">
    <div class="jumbotron bg-info text-light">
        <div class="row text-center">
            <div class="col-12">
                <a class="text-light" role="..." href="https://www.youtube.com/watch?v=biYdUZXfz9I"><h1>LAISSE PAS TRAÎNER TON FILE</h1></a>
            </div>
            <div class="col-12">
                <h5>Stock le ici</h5>
            </div>
        </div>
    </div>
    <section class="row justify-content-center">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="row justify-content-center">
                <div class="col-auto">
                    <small id="fileHelpId" class=" col-form-label-sm form-text text-muted">Images only, max 1Mo ( 1000Ko Q.E.D ;) )</small>
                </div>
            </div>
            <div class="form-inline justify-content-center">
                <label class="col-xl-auto col-auto mx-1 px-0" for="upload">Upload files</label>
                <input type="text" class="col-xl-7 col-auto p-1 mx-2 form-control" name="readOnly" id="readOnlyFiles" placeholder="" readonly>
                <input type="file" class="col-xl-2 col-auto p-1 form-control-file" name="files" id="upload" placeholder="" aria-describedby="fileHelpId">
            </div>
            <div class="row justify-content-center">
                <div class="col-auto m-3">
                    <input class="btn btn-warning text-light font-weight-bold" type="submit" value="Send files" name="submit">
                </div>
            </div>
        </form>
    </section>



<script src = "https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script >
<script src = "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" ></script >
<script src = "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"
        integrity = "sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin = "anonymous" ></script >
</body >
</html >