<?php
 
require_once 'core/init.php';

$user = new User();

if(!$user->isLoggedIn())
{
    Redirect::to('index.php');

}
else
{
    
    ini_set('default_charset', 'utf-8');
    $downlodedBy = $user->data()->USER ;
    $document_Number = DB::getInstance()->get('documents',array('N_DOCUMENT', ">=" ,'0'));
    $allDocs= $document_Number->results();
    $dateInfrench = new CurrentDate();
    $excelData ='';
    $excelData .='<table border="1">
    <thead>
         <tr>
            <th scope="col">N°Document</th>
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
        

       $excelData .= '<tr > <th scope="row">N°'.$doc->N_DOCUMENT.'</th>';
       $excelData .= '<td > N°'.strval($doc->NUM_COMPTE).'</td>';
       $excelData .= '<td>'.$doc->DATE.'</td>';
       $excelData .= '<td>'.$doc->CIN_BEN.'</td>';
       $excelData .= '<td>'.$doc->NOM_BEN_PC.'</td>';
       $excelData .='<td> N°'.strval($doc->RIB_BEN).'</td>';
       $excelData .= '<td>'.$doc->OP_TYPE.'</td>';
       $excelData .= '<td>'.$doc->DOC_MONTANT.'</td>';

   }
    $excelData .=' </tbody></table>';
    header('Content-Encoding: UTF-8');
    header("Content-Type: application/csv; charset=UTF-8");
    // header('Content-type: text/csv; charset=UTF-8');
    header('Content-Disposition: attachment; filename=Operation/'.$dateInfrench->getDayOfTheWeek() .'/'.$dateInfrench->getDate().'-'.$dateInfrench->getMonth().'-'.$dateInfrench->getYear().'.xls');
    
       echo utf8_decode($excelData);
 
}
?>