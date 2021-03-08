<?php
function den_pane (){    
    include 'TCPDF/tcpdf.php';
    /* colors: red 255, 1, 16
               blue 0, 176, 240
               white 255, 255, 255
               black 0, 0, 0
    */
    // init fonts (jen pokud není vygenerovaný TCPDF font)
    /*$font_header = TCPDF_FONTS::addTTFfont('fonts/CENSCBK.TTF', 'TrueTypeUnicode', '', 96);
    TCPDF_FONTS::addTTFfont('fonts/SCHLBKB.TTF', 'TrueTypeUnicode', '', 96);
    TCPDF_FONTS::addTTFfont('fonts/SCHLBKI.TTF', 'TrueTypeUnicode', '', 96);
    TCPDF_FONTS::addTTFfont('fonts/SCHLBKBI.TTF', 'TrueTypeUnicode', '', 96);
    $font =  TCPDF_FONTS::addTTFfont('fonts/times.ttf', 'TrueTypeUnicode', '', 96);
    TCPDF_FONTS::addTTFfont('fonts/timesbd.ttf', 'TrueTypeUnicode', '', 96);
    TCPDF_FONTS::addTTFfont('fonts/timesi.ttf', 'TrueTypeUnicode', '', 96);
    TCPDF_FONTS::addTTFfont('fonts/timesbi.ttf', 'TrueTypeUnicode', '', 96);
    */
    $font_header = "censcbk";
    $font = "times";
    
    if(!class_exists('TCPDF')) return 'class not exists';
    // create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Jaromír Feilhauer');
    $pdf->SetTitle('Den Páně 7.3.2021');
    $pdf->SetSubject('Den Páně');
    $pdf->SetKeywords('Den, Páně, Fulnek, 2021, Březen');
    // zakázání vkreslení default hlavičky/patičky
    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);
    // set default font subsetting mode
    $pdf->setFontSubsetting(true);
    // okraje dokumentu
    $pdf->SetMargins($left=3, $top=7, $right=6, true);
    $page_margin_bottom = 10;                           
    // set auto page breaks
    $pdf->SetAutoPageBreak(TRUE, $page_margin_bottom);
    
    $border = array('LTRB' => array('width' => 0.2, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(255, 1, 16)));
    // set font
    $pdf->SetFont($font, 'B', 12);
    // add new page
    $pdf->AddPage($orientation='', $format='A5', $keepmargins=true, $tocpage=true);
    // ---------------------------------------------------------
    // header include
    include 'header.php';
    $pdf->SetFont($font, 'B', 12);
    // ---------------------------------------------------------
    // content
    include 'content.php';
    // ---------------------------------------------------------
    // vymazání všeho před vypsáním pdf (prevent error)
    ob_end_clean();
    // Close and output PDF document
    // I=in browser, D=in browser and download, F=save on local server, S=return PDF string
    return $pdf->Output('Den_Pane_7_3_2021', 'I');
}
?>