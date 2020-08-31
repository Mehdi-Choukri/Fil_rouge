<?php

require_once 'core/init.php';


$user = new User();

if(!$user->isLoggedIn())
{
    Redirect::to('index.php');

}
include 'design/header_co.php';
?>
 <link rel="stylesheet" href="style/style.css">  
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

 
    <title>Exportation</title>
</head>
<body>

    <?php
                    $message = '<div class="alert alert-success"  style="margin-top:-75px;position:absolute;margin-left:250px" role="alert">Télécharger les documents avec la forme souhaitée .</div>';
    echo $message;
 
    ?>
 
    <div class="container" style="margin-top:-200!important">
 
            <div class="classIndex" >
                <ul>
                    <li><a href="allDocsPdf.php" class="badge badge-success">Télécharger tous les documents sous forme PDF</a></li>
                    <li><a href="allDocsExcel.php" class="badge badge-success">Télécharger tous les documents sous forme EXCEL</a></li>
                    <li><a href="allDocsTxt.php" class="badge badge-success">Télécharger tous les documents sous forme .txt</a></li>
                </ul>
            </div>
    </div>

</body>
 
</html>