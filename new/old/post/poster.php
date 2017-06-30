<?php

$error = array();
/*$extensions = array('.png', '.gif', '.jpg', '.jpeg');
// récupère la partie de la chaine à partir du dernier . pour connaître l'extension.
$extension = strrchr($_FILES['avatar']['name'], '.');
//Ensuite on teste
if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
{
     $erreur = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg, txt ou doc...';
}*/

$uploads_dir = 'img_blog';


/*foreach ($_FILES["image"]["error"] as $key => $error) {
    if ($error == 0) {
        $tmp_name = $_FILES["image"]["tmp_name"][$key];
        $name = $_FILES["image"]["name"][$key];
        move_uploaded_file($tmp_name, "$uploads_dir/$name");
    }
    else{
        var_dump($error);
    }
}*/
if (empty($_POST["titre"])) {

    $error['titre'] = false; 

} else {

    $error['titre'] = true;
}

if (empty($_POST["contenu"])) {

    $error['contenu'] = false;
} else {

    $error['contenu'] = true;
}

if(empty($_POST['auteur'])){

    $error['auteur'] = false;  
}else{

    $error['auteur'] = true; 
}


if ($error['titre'] == true && $error['contenu'] == true && $error['auteur'] == true){
    $servername = "localhost";
    $username = "bmelissa";
    $password = "bmelissa@2017";
    $dbname = "bmelissa";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password,array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // empêcher de charger les mêmes images
        // on leur crée un ID unique avec l'Id de l'article
        $stmt = $conn->prepare("SELECT MAX(id) as id FROM blog");
        $stmt->execute();
        $result = $stmt->fetch();
        $idFuturPost =$result ["id"]+1;

        // prepare sql and bind parameters
        $stmt = $conn->prepare("INSERT INTO blog (titre, contenu, image, video, auteur)
        VALUES (:titre, :contenu, :image, :video, :auteur)");
        $stmt->bindParam(':titre', $titre);
        $stmt->bindParam(':contenu', $contenu);
        $stmt->bindParam(':image', $image);
        $stmt->bindParam(':video', $video);
        $stmt->bindParam(':auteur', $auteur);

        // insert a row
        $titre = $_POST["titre"];
        $contenu = strip_tags(htmlspecialchars($_POST["contenu"]));
        $image = 'img_blog/'.$idFuturPost."-".$_FILES["image"]["name"];
        $video = strip_tags(htmlspecialchars($_POST["video"]));
        $auteur = $_POST["auteur"];
        $stmt->execute();

        if($_FILES["image"]["error"]==0){
            $tmp_name = $_FILES["image"]["tmp_name"];
            $name = $idFuturPost."-".$_FILES["image"]["name"];
            move_uploaded_file($tmp_name,'../img_blog/'.$name);
        }
        $error['bdd'] = "New records created successfully";
    }
    catch(PDOException $e)
    {
        $error['bdd'] = "Error: " . $e->getMessage();
    }
    $conn = null;
}


echo json_encode($error);


?>


