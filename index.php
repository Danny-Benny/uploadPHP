<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body class="container">
<form action="" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="formFile" class="form-label">Nahrajte fotku, video nebo audio</label>
        <input class="form-control" type="file" id="formFile" name="formFile">
    </div>
    <button type="submit" class="btn btn-primary" name="submit">Potvrdit</button>
</form>
<?php

if (isset($_POST["submit"])) {

    if (isset($_FILES["formFile"]) && !empty($_FILES["formFile"]["name"])) {

        $file = $_FILES["formFile"];
        $fileName = $file["name"];
        $fileSize = $file["size"];
        $fileType = $file["type"];
        $fileTmpName = $file["tmp_name"];

        if ($fileSize > 8000000) 
            echo "<p>Soubor je moc velky</p>";
        
        move_uploaded_file($fileTmpName, "uploaded_files/$fileName");

        if ($fileType == "image/jpeg" || $fileType == "image/png") 
            echo "<img src='uploaded_files/$fileName' alt='Image' />";

        else if ($fileType == "video/mp4") 
            echo "<video width=\"320\" height=\"240\" controls><source src='uploaded_files/$fileName' ></video>";

        else if ($fileType == "audio/mp3")
            echo "<audio src='uploaded_files/$fileName' controls />";
    }
}
?>
</body>
</html>