<?php
/*
 * hlavička Den Páně
*/
// set color for text
$pdf->SetTextColor(255, 1, 16);
$pdf->SetFontSize(9.5);

// write the text  
$text = "LITURGICKÝ BULLETIN  Fulnek, Děrné, Jílovec, Jerlochovice, Lukavec, Stachovice, Vrchy";  
$pdf->Write(5, $text, '', 0, 'C', true, 0, false, false, 0);
$pdf->Ln(6);
$pdf->SetFillColor(255, 255, 255); 
$pdf->Cell(0, 14 , '', $border, 1, 'L', 0, '', 4, true, 'T', 'B');

$pdf->SetTextColor(255, 1, 16);
$pdf->SetFontSize(11);
$pdf->SetFillColor(255, 255, 255);
// lépe než mezerami jsem to zatím neudělal 
$text = "2. neděle postní                                      28. února                                         neprodejné";
$pdf->Cell(0, 0, $text, 1, 1, 'C', 0, '', 0);
// Nadpis Den páně         
$pdf->setXY(2, 5); // posun kurzoru
$pdf->SetMargins($left=3, $top=7, $right=2, true);
$pdf->SetFont($font_header, '',72);                                                    
$pdf->SetTextColor(0, 176, 240);
$pdf->Write(0, 'D ', '', 0, 'L', false, 0, false, false, 0);

$pdf->setAbsY(13.5);
$pdf->SetFontSize(46.8);
$text="E N   ";
$pdf->Write(5, $text, '', 0, 'L', false, 0, false, false, 0);

$pdf->setAbsY(5);
$pdf->SetFontSize(72);;
$pdf->SetTextColor(0, 176, 240);
$pdf->Write(5, 'P ', '', 0, 'L', false, 0, false, false, 0);

$pdf->setAbsXY(95,13.5);
$pdf->SetFontSize(46.8);
$text="Á N Ě";
$pdf->Write(5, $text, '', 0, 'L', false, 0, false, false, 0);

// původní nastavení
$pdf->SetMargins($left=3, $top=7, $right=6, true);
$pdf->setAbsXY(3,10);
?>