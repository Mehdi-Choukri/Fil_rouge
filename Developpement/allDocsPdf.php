<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once 'core/init.php';

$user = new User();

if(!$user->isLoggedIn())
{
    Redirect::to('index.php');

}
else
{
    $mpdf = new \Mpdf\Mpdf();
    $document = new Document();
    $downlodedBy = $user->data()->USER ;
    $document_Number = DB::getInstance()->get('documents',array('N_DOCUMENT', ">=" ,'0'));
    $dateInfrench = new CurrentDate();


    $allDocs= $document_Number->results();
    $pdfData ='';
    $pdfData .='<img src="../Images/logo-ocp-doc.jpg" width="80" height="110" style="margin-left:50px;" alt="">';
    $pdfData .='<p style="margin-left:250px;font-weight:bold;font-size:21px">Safi, le '.   $dateInfrench->getDayOfTheWeek() .'/'.$dateInfrench->getDate().'-'.$dateInfrench->getMonth().'-'.$dateInfrench->getYear().'</p>';
    $pdfData .='<p style="margin-left:150px;font-weight:bold;font-size:21px;color:#57AB3F">La liste de toutes les opérations effectuées </p>';
    $pdfData .='<p style="margin-left:50px;font-weight:bold;font-size:17px">Document téléchargé par '.$downlodedBy.'</p>';
    $pdfData .='<table border="1">
    <thead>
         <tr>
            <th scope="col">N° Document</th>
            <th scope="col">N° Compte</th>
            <th scope="col">Date</th>
            <th scope="col">CIN</th>
            <th scope="col">Nom bénéficiaire</th>
            <th scope="col">RIB bénéficiaire</th>
            <th scope="col">Type d\'opération</th>
            <th scope="col">Montant</th>
        </tr>
   </thead>
   <tbody>';
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

       $pdfData .= '<tr '.$trColor.'> <th scope="row">'.$doc->N_DOCUMENT.'</th>';
       $pdfData .= '<td>'.$doc->NUM_COMPTE.'</td>';
       $pdfData .= '<td>'.$doc->DATE.'</td>';
       $pdfData .= '<td>'.$doc->CIN_BEN.'</td>';
       $pdfData .= '<td>'.$doc->NOM_BEN_PC.'</td>';
       $pdfData .='<td>'.$doc->RIB_BEN.'</td>';
       $pdfData .= '<td>'.$doc->OP_TYPE.'</td>';
       $pdfData .= '<td>'.$doc->DOC_MONTANT.'</td>';

   }
    $pdfData .=' </tbody></table>';
     //write PDF ;
     $mpdf->writeHTML($pdfData);
     //output to download 
     $mpdf->Output("Liste_Operation_telechargerPar".$downlodedBy.".pdf",'D');
    
     

    
}
?>