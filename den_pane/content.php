<?php
$pdf->setAbsXY(3, 39);
$pdf->SetFont($font, '', 12);                                                    
$pdf->SetTextColor(0, 0, 0);
$text = "K zamyšlení";
$pdf->Cell(0, 6 , $text, $border, 1, 'L', 0, '', 0, true, 'T', 'B');

$pdf->SetFont($font, '', 10.2);
$pdf->setXY(7,45);
// prázdné ohraničení
$pdf->MultiCell(65, 155 , '', $border, 'L', 0, 0, '', '', true);
$pdf->MultiCell(70, 155 , '', $border, 'L', 0, 0, '', '', true);
// oblast bez vykreslování (bez textu a obrázku)
$region = array('page'=>0,'xt'=>40,'yt'=>80,'xb'=>40, 'yb'=>130, 'side'=>'R');
$pdf->addPageRegion($region);
// rozdělení na dva sloupce(možná by šlo sloupci, ale nedařilo se)
// první sloupec
$pdf->SetMargins(7, 7, 77, true);  
$pdf->setXY(8,45);
$text = 'Nemusí být bez užitku položit si poněkud provokativní otázku: Co bychom dělali, kdyby se objevil mezi námi Ježíš a začal působit podobně, jak o tom čteme v evangeliu? Byli bychom rádi? A hlavně: hodilo by se nám jeho působení do života církve? Je samozřejmě třeba uznat, že od situací, o kterých píše evangelium, uplynulo na dva tisíce let. Že žijeme v jiném prostředí, v jiné kultuře. Ale i my jsme jen lidmi, jako byli Ježíšovi současníci, a žijeme ve stejném, Bohem stvořeném světě, ve kterém žili oni i Ježíš. Co tedy Ježíš v Palestině dělal? Dnešní evangelium to podává v určitém přehledu. Učil, tedy hlásal Boží slovo, uzdravoval a modlil se. Jinými slovy: vnášel slovem i činem do světa to, co bylo a je Boží a tak tento svět měnil k lepšímu. A přitom zůstával v naprostém sjednocení s Otcem. Napravovat svět - pro to by měl jistě smysl i člověk dneška. Mnozí, ať už v církvi nebo mimo ni - se o to snaží, někteří ale rezignují, protože nevidí úspěchy. Všimněme si ale, že Ježíš na jedné straně vnáší dobro do světa tak, že je to ke prospěchu všech, ale na druhé straně jasně vidíme, že se neobrací k jakémusi "všeobecnému" světu či lidstvu, ale obrací se k lidem jednotlivě, osobně. A nezdá se, že by ho trápila malá produktivita takovéto práce. Vidíme však, že Ježíš svou činností z mnohých dělá učedníky. Nepočítá jen se svou vlastní prací, se svým vlastním působením, ale zřetelně počítá se zmnožením, znásobením svých sil těmi, které oslovil, ovlivnil, vyučil a získal. Druhou věcí, kterou nesmíme přehlédnout, je to, že Ježíš neopouští hlavní linii svého působení, nenechá se řídit tím, co si lidé přejí. Vyšel proto, aby kázal, to dělá, a svá slova doprovází mocnými činy. Konečně nesmíme přehlédnout, že se Ježíš modlil. Kardinál Ratzinger dokonce píše, že: Středem Ježíšovy osoby a života je podle svědectví Písma nepřetržitá komunikace s Otcem. Modlitba sjednocující s Ježíšem, modlitba sjednocující s Otcem - to je zřejmě naprosto podstatná součást Ježíšova života. A to je také nezbytným úkolem církve. Při intenzivním "napravování" světa či církve se může tato nezbytná úloha dostat někam na okraj nebo přímo zmizet. Neznamená to jen vadu na kráse zbožnosti křesťanů, ale znamená to vlastně vynechání podstatné části úkolu, které církev od Krista převzala.';
// vypisování po řádcích až do konce stránky nebo prázdného zbývajícího textu
while($text != '' ){
    $zbytek = $pdf->Write(0, $text, '', false, 'J', false, 0, true, false, 0, 0, '');
    $text = $zbytek;
    if($pdf->getY()>=($pdf->getPageHeight() - $page_margin_bottom - 5)) break;
}
// druhý sloupec                                                                                    
$pdf->setPageRegions(array()); // vymazání předchozí oblasti
$region = array('page'=>0,'xt'=>108,'yt'=>80,'xb'=>108, 'yb'=>130, 'side'=>'L');
$pdf->addPageRegion($region);

$pdf->SetMargins(72, 7, 7, true);
$pdf->setXY(72,45);
while($text !== ''){
    $zbytek = $pdf->Write(0, $text, '', false, 'J', false, 0, true, false, 0, 0, '');
    $text = $zbytek;
    if($pdf->getY()>=($pdf->getPageHeight() - $page_margin_bottom - 5)) break;
}
$pdf->setPageRegions(array()); // vymazání oblasti
// přidání středového obrázku
$img = $pdf->Image('https://wordpress.farnostfulnek.cz/wp-content/uploads/2021/01/DSC_0027-scaled.jpg', 55, 80, 65, 45, '', '', '', false, 300, '', false, false, 0, '', false, false);
$pdf->AddPage();
?>
