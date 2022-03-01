<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PDF Online Editor</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><i class="fa fa-cloud"></i> Cloud</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <div class="d-flex w-100">
                    
                    
                    <ul class="mainmenu navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll p-2 w-100 bd-highlight" style="--bs-scroll-height: 100px;">
                        <li class="nav-item">
                            <a name="uploadfile" class="nav-link active" aria-current="page" href="#">Upload File</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Link
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled">Link</a>
                        </li>
                    </ul>
                    <!--
                    <form class="d-flex p-2 flex-shrink-1 bd-highlight">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>-->
                </div>
            </div>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div id="docContainer">
                    <!--<div id="docBody"></div>-->
                </div>
            </div>
        </div>
    </div>






    <div class="modal fade" id="modaluploadfile">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Upload file</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="dropzone"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button id="uploadfile" type="button" class="btn btn-primary">Upload</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->






</body>
<footer>
    <script type="text/javascript" src="jquery.js"></script>
    <!--<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>-->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>   
    <script type="text/javascript" src="pdfEditor.js"></script>
    <script type="text/javascript" src="functions.js"></script>
</footer>
</html>


<style type="text/css">
    .dropzone{
        background: rgba(0,0,0,0.2);
        width: 100%;
        height: 200px;
        border-radius: 5px;
        border: dashed 3px rgba(0,0,0,0.3);
        overflow: hidden;
        position: relative;
        padding: 10px;
    }
    .dropzone input[type="file"]{
        background: red;
        font-size: 8em;
        position: absolute;
        opacity: 0;
        top: 0;
        left: 0;
    }
    .dzIconFile{
        width: 100px;
        height: 100px;
        background: #343a406e;
        padding: 20px;
        border-radius: 2px;
        text-align: center;
        display: inline-block;
        margin: 10px;
        color: white;
    }

    #docContainer{
        background: rgba(0, 0, 0, 0.3);
        width: 100%;
        height: 100%;
        text-align: center;
        padding: 20px;
        overflow-x: auto;
    }
    #docBody{
        width: 500px;
        height: 200px;
        background: white;
        margin: auto;
    }
    #docContainer .page{
        width: 500px;
        height: 200px;
        background: white;
        margin: 20px auto;
        position: relative;
    }
    .text{
        position: absolute;
        text-align: left;
    }

</style>