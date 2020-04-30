<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <title>PHP</title>
    <meta charset='UTF-8' />
    <link rel="stylesheet" href="style.css">
</head>

<body>
<?php
    require_once("funkcje.php");

    if(!isset($_SESSION['zalogowany']) or $_SESSION['zalogowany'] == 0){
            header("Location: index.php");
        }

   if(isSet($_POST['upload'])){
        $currentDir = getcwd();
        $uploadDirectory = "/img/";
        $fileName = $_FILES['img']['name'];
        $fileSize = $_FILES['img']['size'];
        $fileTmpName = $_FILES['img']['tmp_name'];
        $fileType = $_FILES['img']['type'];
        if($fileName != "" and
                ($fileType == 'image/png' or $fileType == 'image/jpeg'
                or $fileType == 'image/JPEG' or $fileType == 'image/PNG'))
        {
            $uploadPath = $currentDir."\\".$fileName;
            if(move_uploaded_file($fileTmpName, $currentDir."\\".$fileName))
            echo "<div class ='alert'>Zdjecie zostalo zaladowane na serwer </div>";
        }
    }

?>

<div class ="upper-panel">

<a href="index.php">Strona główna</a>

<?php
    echo"<div class='session-data'>";
    echo $_SESSION['zalogowanyImie'];
    echo"</div>";
?>


<div class="logout-form">
    <form action="index.php" method="POST">
        <input type="submit" name="wyloguj" class='logout' value="Wyloguj"/>
    </form>
</div>

</div>

<div class="user-picture" style="background-image:url('pic.jpg');">
<div class="upload-form">
    <form action="user.php" method="POST" enctype="multipart/form-data">
    <div><input name="img" type="file" required/></div>
    <div><input type="submit" name="upload" value="Dodaj" /></div>
    </form>
</div>



</div>

</body>
</html>