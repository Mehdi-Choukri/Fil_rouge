<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<img src="../Images/logo-ocp-doc.jpg" width="80" height="110" style="margin-left:50px;" alt="">

<p style="margin-left:250px;font-weight:bold;font-size:21px">Safi, le '.  $date  .'</p>
<p style="margin-left:150px;font-weight:bold;font-size:21px;color:#57AB3F">La liste de toutes les opérations effectuées </p>
<p style="margin-left:50px;font-weight:bold;font-size:17px">Document téléchargé par </p>
<table border="1">
        <thead>
             <tr>
                <th scope="col">N° Document</th>
                <th scope="col">N° Compte</th>
                <th scope="col">Date</th>
                <th scope="col">CIN</th>
                <th scope="col">Nom bénéficiaire</th>
                <th scope="col">RIB bénéficiaire</th>
                <th scope="col">Type d'opération</th>
                <th scope="col">Montant</th>
            </tr>
       </thead>
       <tbody>
                    <?php
                        foreach($allDocs as $doc)
                        {
                            if($doc->SIGNED == 0)
                            {
                                $trColor = 'style="background-color:#edb9c2"';
                            }
                            else if($doc->SIGNED == 1)
                            {
                                $trColor = 'style="background-color:#b6bfb4"';

                            }
                            else
                            {
                                $trColor = 'style="background-color:#d4f5cb"';
                            }

                            echo '<tr '.$trColor.'> <th scope="row">'.$doc->N_DOCUMENT.'</th>';
                            echo '<td>'.$doc->NUM_COMPTE.'</td>';
                            echo '<td>'.$doc->DATE.'</td>';
                            echo '<td>'.$doc->CIN_BEN.'</td>';
                            echo '<td>'.$doc->NOM_BEN_PC.'</td>';
                            echo '<td>'.$doc->RIB_BEN.'</td>';
                            echo '<td>'.$doc->OP_TYPE.'</td>';
                            echo '<td>'.$doc->DOC_MONTANT.'</td>';
 
                        }
                    
                    
                    ?>
                    
                </tbody>
</table>
    
</body>
</html>