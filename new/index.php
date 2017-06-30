<?php
// afficher la date de manière plus littérale
function dt($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'année',
        'm' => 'mois',
        'w' => 'semaine',
        'd' => 'jour',
        'h' => 'heure',
        'i' => 'minute',
        's' => 'seconde',
    );
    
    foreach ($string as $k => &$v) {
        
            if ($diff->$k) {
                if($k=="m"){
                    $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? '' : '');
                }else{
                    $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
                }
            } else {
                unset($string[$k]);
            }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? "il y a ".implode(', ', $string) : 'just now';
}            


// connection base de données

$servername = "localhost";
$username = "pelodie";
$password = "pelodie@2017";

try {
    $conn = new PDO("mysql:host=$servername;dbname=pelodie", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->query("SELECT * FROM billet ORDER BY id DESC LIMIT 9");   
    }

catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>


<!DOCTYPE html>
<html lang="fr_FR">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Blog de jardinage et déco.">
    <meta name="author" content="">

    <title>Garden Party</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

     <!-- Theme CSS -->
    <link href="css/clean-blog.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Dosis:200,300,400,500,600,700,800" rel="stylesheet">
    
    <!-- Custom Fonts -->
    
    
    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="img/favicon/apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/favicon/apple-touch-icon-114x114.png" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/favicon/apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/favicon/apple-touch-icon-144x144.png" />
    <link rel="apple-touch-icon-precomposed" sizes="60x60" href="img/favicon/apple-touch-icon-60x60.png" />
    <link rel="apple-touch-icon-precomposed" sizes="120x120" href="img/favicon/apple-touch-icon-120x120.png" />
    <link rel="apple-touch-icon-precomposed" sizes="76x76" href="img/favicon/apple-touch-icon-76x76.png" />
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="img/favicon/apple-touch-icon-152x152.png" />
    <link rel="icon" type="image/png" href="img/ffavicon/avicon-196x196.png" sizes="196x196" />
    <link rel="icon" type="image/png" href="img/favicon/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/png" href="img/favicon/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="img/favicon/favicon-16x16.png" sizes="16x16" />
    <link rel="icon" type="image/png" href="img/favicon/favicon-128.png" sizes="128x128" />
    <meta name="application-name" content="&nbsp;"/>
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta name="msapplication-TileImage" content="mstile-144x144.png" />
    <meta name="msapplication-square70x70logo" content="mstile-70x70.png" />
    <meta name="msapplication-square150x150logo" content="mstile-150x150.png" />
    <meta name="msapplication-wide310x150logo" content="mstile-310x150.png" />
    <meta name="msapplication-square310x310logo" content="mstile-310x310.png" />


</head>


<body>
                   
    <!-- HEADER -->
    <!-- Set your background image for this header on the line below. -->
    <header class="intro-header" >
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-offset-1 col-md-10 col-md-offset-1">
                    <div class="site-heading ">
                        <h1 class="accueil">Garden Party</h1>
                        <hr class="small">
                        <span class="subheading">Plante &amp; Lifestyle</span>
                    </div>
                </div>
            </div>
        </div>
    </header>


    
    <nav class="navbar navbar-default col-md-offset-1 col-md-10">
      <div class="container-fluid ">
    
        <ul class="nav navbar-nav col-md-12">
          <li class="text-center col-md-3"><a href="index.php">HOME</a></li>
          <li class="text-center col-md-3" ><a href="index.php">DÉCO</a></li>
          <li class="text-center col-md-3"><a href="index.php"> PLANTES</a></li>
          <li class="text-center col-md-3"><a href="about.html">ABOUT</a></li>
        </ul>
  </div>
</nav>
<!--    </div>         -->
    
    
    <!-- GALLERIE IMAGE GÉNÉRER PAR LE FORMULAIRE DE POST   -->
    
                              
     <div class="container-fluid">
            <div class="row">
                <div class=" col-md-10 col-md-offset-1">
                              
                                                                                         
    <?php   
                
        while($article = $stmt->fetch()) {
        
        $adr_img = $article['image'];
        $adr_img_fond = $article['fondmotif'];
        
    
        
        echo "<div class='box-image col-lg-4 col-md-3 col-xs-12'>";
            echo "<a  href='post.php?id=".$article['id']."'>";
            echo "<img class='image-post-accueil col-lg-2 col-xs-11 ' src='".$adr_img."'>";
                   
                     echo "<div class='overlay'>";
                        echo "<div class='text col-md-8' >".$article['title']."</div>";
                        echo "<div class='text col-md-8' >".$article['soustitre']."</div>";
                        echo "<div class='text col-md-8' >".$article['auteur']."</div>";
                     echo "</div>";
            
                    echo "<div class='box-image-fond'>";
                        echo "<img class='image-post-accueil-fond col-lg-2 col-xs-11 ' src='".$adr_img_fond."'>";
                    echo "</img>";
                    
             echo "</div>";
        echo "</img></a>";
        echo "</div>";
        }  
                    
                    
                
                    
    ?>                
                </div>
            </div>
        </div> 
      
                <!-- Pager -->
                <ul class="pager">
                    <li class=" col-lg-offset-8 col-md-2 col-md-offset-2">
                        <a href="#">Précédent&rarr;</a>
                    </li>
                </ul>

    <hr>

    
    
    
    
    
    <!-- Footer -->
    <footer>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                  
                </div>
            </div>
        </div>
    </footer>

    
    
    <!-- INSTAGRAM -->
  <?php
    
    
    require __DIR__ . '/vendor/autoload.php';
    use RapidApi\RapidApiConnect;

    $rapid = new RapidApiConnect("default-application_594e82fce4b058a9cb038394", "8a49d84b-fe46-47b5-8b01-7643ae576252");

    $result = $rapid->call('Instagram', 'getCurrentUsersRecentMedia', [ 
    "accessToken" => "5637026149.e516166.0afd09e1de31442c947866d4131ffaeb"
    ]);
    
    
   
 
 

  ?>
    
    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>
    

    <!-- Theme JavaScript -->
    <script src="js/clean-blog.js"></script>
    
  
</body>

</html>
