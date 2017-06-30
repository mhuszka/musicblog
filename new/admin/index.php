<!DOCTYPE html>
<html lang="fr_FR">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Blog de décoration et jardinage">
        <meta name="author" content="">

        <title>Garden Party - Admin</title>

        <!-- Bootstrap Core CSS -->
        <link href="../vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

        <!-- Theme CSS -->
        <link href="../css/clean-blog.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
       <link href="https://fonts.googleapis.com/css?family=Dosis:200,300,400,500,600,700,800" rel="stylesheet">

    </head>

    <body>
        

        <!-- Page Header -->
        <header class="intro-header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                        <div class="page-heading">
                            <h1>Administrateur</h1>
                            <hr class="small">
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Content -->
    
        <div class="container">
            <div class="row">
                <div class="col-md-offset-2 col-md-8">
                    <p class="col-md-offset-3">Poster un article</p>
                    
                    <form name="sentMessage" id="contactForm" enctype="multipart/form-data" runat="server" novalidate>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Titre</label>
                                <input type="text" class="form-control" placeholder="titre" name="title" id="title">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        
                         <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Sous-titre</label>
                                <input type="text" class="form-control" placeholder="sous-titre" name="soustitre" id="soustitre">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                       
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Contenu</label>
                                <input type="text" class="form-control" placeholder="contenu" name="contenu" id="contenu">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Auteur</label>
                                <input type="name" class="form-control" placeholder="auteur" name="auteur" id="auteur">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        
                         <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <p> Ajouter une image</p>
                                <label>Selectionner une image</label>
                                <input type="file" name="image" id="image" accept="image/*" placeholder="Image du post"> 
                                <input type="hidden" name="MAX_FILE_SIZE" value="2097152">
                                <img id="image" src="" alt="" />
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                    
                         <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <p> Ajouter un motif en fond</p>
                                <label>Selectionner un motif</label>
                                <input type="file" name="fondmotif" id="fondmotif" accept="image/*"> 
                                <input type="hidden" name="MAX_FILE_SIZE" value="2097152">
                                <img id="fondmotif" src="" alt="" />
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        
                   
                        <br>
                        <div id="success"></div>
                        <div class="row">
                            <div class="form-group col-xs-12">
                                <button type="submit" class="btn btn-default">POSTER UN ARTICLE</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <hr>

        <!-- Footer -->
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                       
                    </div>
                </div>
            </div>
        </footer>

        <!-- jQuery -->
        <script src="../vendor/jquery/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

        <!-- Contact Form JavaScript -->
        <script src="../js/jqBootstrapValidation.js"></script>
        <script src="../js/contact_me.js"></script>

        <!-- Theme JavaScript -->
        <script src="../js/clean-blog.min.js"></script>

       

    
   
   
   
    </body>

</html>





