<?php
 
require_once 'core/init.php';

$user = new User();

if(!$user->isLoggedIn())
{
    Redirect::to('index.php');

}
else
{
    $document_Number = DB::getInstance()->get('documents',array('N_DOCUMENT', ">=" ,'0'));
    $allDocs= $document_Number->results();
    $dateInfrench = new CurrentDate();

    $txtData = '';
    foreach($allDocs as $doc)
    {
         
 
        $txtData .= $doc->N_DOCUMENT.';';
        $txtData .= $doc->NUM_COMPTE.';';
        $txtData .= $doc->DATE.';';
        $txtData .= $doc->CIN_BEN.';';
        $txtData .= $doc->NOM_BEN_PC.';';
        $txtData .= $doc->RIB_BEN.';';
        $txtData .= $doc->OP_TYPE.';';
        $txtData .= $doc->DOC_MONTANT.';';
        $txtData .="\n";

 
    }
    
    $handle = fopen("file.txt", "w");
    fwrite($handle, $txtData);
    fclose($handle);

    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename='.basename('file.txt'));
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize('file.txt'));
    readfile('file.txt');
    exit;
     
 

}