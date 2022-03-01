<?php 

    $op = @$_REQUEST["op"];
    if (function_exists($op)) call_user_func($op);
    

    function updloadPdfFile(){
        if (@$_FILES["pdfFile"]) {
            $udir = "pdfFiles";
            if (!is_dir($udir)) mkdir($udir);
            $file = $_FILES["pdfFile"];

            $outFile = $udir."/".$file["name"];
            move_uploaded_file($file["tmp_name"], $outFile);
            echo convertUploadedFile($file["name"]);
        }        
    }

    function convertUploadedFile($file){
        $r = array(" ",',','/');
        $file = str_replace($r, "", $file);

        if (!is_dir("xmlOut")) mkdir("xmlOut");
        if (!is_dir("xmlOut/$file")) mkdir("xmlOut/$file");
        $fileOut = "xmlOut/$file/".str_replace($file,' ','');




        exec($_SERVER["DOCUMENT_ROOT"]."/pdfonlineeditor/tools/pdftohtml.exe -xml pdfFiles/$file $fileOut");
        //echo $_SERVER["DOCUMENT_ROOT"]."/pdfonlineeditor/tools/pdftohtml.exe -xml pdfFiles/$file $fileOut";
        return "$fileOut.xml";
        //exec($_SERVER["DOCUMENT_ROOT"]."/tools/pdftohtml.exe -xml ".$PdfFile." ".$XMLFile);
    }

 ?>