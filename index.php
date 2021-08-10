<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/favicon.ico">
    <title>Mini Url</title>
</head>
<body>
    <form name="form" action="shortener.php" method="POST">
        <label for="">URL:</label>
        <input type="text" id="url", name="url">
        <button>Go Mini</button><br>
    </form>
    <?php 
        
        if(isset($_GET['url']) && $_GET['url']!="")
        { 
            $url=urldecode($_GET['url']);
            header("location: linker.php/?url={$url}");
        }
        
    ?>
</body>
</html>
