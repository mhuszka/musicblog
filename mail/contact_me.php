<?php

$error = array();


if ($_SERVER["REQUEST_METHOD"] == "POST") {


    if (empty($_POST["titre"])) {

        $error['titre'] = true; //vide

    } else {

        $error['titre'] = false; //correctement rempli

    }


    if (empty($_POST["contenu"])) {

        $error['contenu'] = true; // vide

    } else {

        $error['contenu'] = false; //correctement rempli

    }


    if(empty($_POST['auteur'])){

        $error['auteur'] = true; //vide

    }else{

        $error['auteur'] = false; //correctement rempli
    }
    
    if(!in_array(true, $error)){
  $servername = "localhost";
        $username = "pelodie";
        $password = "pelodie@2017";
        $dbname = "pelodie";

       try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

           // prepare sql and bind parameters
            $stmt = $conn->prepare("INSERT INTO contact (title, date, contenu, auteur)
            VALUES (:title, :date, :contenu, :auteur)");
            $stmt->bindParam(':title', $name);
            $stmt->bindParam(':date', $email);
            $stmt->bindParam(':contenu', $message);
            $stmt->bindParam(':auteur', $category);

           // insert a row
            $name = $_GET["title"];
            $email = $_GET["date"];
            $message = $_GET["contenu"];
            $message = $_GET["auteur"];
            
           $stmt->execute();

            $error['bdd'] =  "New records created successfully";
            }
        catch(PDOException $e)
            {
            $error['bdd'] = "Error: " . $e->getMessage();
            }
        $conn = null;
        
    }else{
        $error['sendEmail'] = true;
    }
}

echo json_encode($error); 

?>    

  