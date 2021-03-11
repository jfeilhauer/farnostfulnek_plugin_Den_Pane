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
/*
 * druha strana Den Páně
*/
// první sloupec
$pdf->AddPage($orientation='', $format='A5', $keepmargins=true, $tocpage=true);
$pdf->SetMargins($left=10, $top=10, $right=6, true);
$pdf->setXY(6,10);
$pdf->SetFont($font, 'B', 13); 
$text = 'Texty k rozjímání';
$pdf->MultiCell(53, 7 , $text, $border, 'L', 0, 1, '', '', true);

$pdf->SetFont($font, '', 11); 
$text = 'PONDĚLÍ 1. 3.
Dan 9,4b-10
Lk 6,36-38
Moje představa o tom, jaký je
Bůh, se odráží v mém chování
k druhým. Nezazlívám občas
Bohu jeho milosrdenství bez
podmínek?

ÚTERÝ 2. 3.
Iz 1,10.16-20
Mt 23,1-12
Návod, jaký zaujmout postoj
k představeným, když s nimi
nesouhlasím. Poslechnout,
pokud to není proti mému
svědomí. Ale neřídit se jejich
příkladem.

STŘEDA 3. 3.
Jer 18,18-20
Mt 20,17-28
Ježíš odmítá falešné představy o panování. Dospělý křesťan by měl být připraven mít
spoluúčast na jeho osudu.

ČTVRTEK 4. 3.
Jer 17,5-10
Lk 16,19-31
Jednoho dne budu možná litovat, co jsem nevykonal a svou
';
$pdf->MultiCell(49, 0 , $text, $border, 'L', 0, 1, '', '', true, 0);

// patička
$pdf->SetTextColor(255, 1, 16);
$pdf->setXY(5,193);
$text = '2 Den Páně';
$pdf->MultiCell(30, 7 , $text, $border, 'L', 0, 1, '', '', true, 0);

// druhý sloupec
$pdf->SetMargins($left=61, $top=10, $right=6, true);
$pdf->setXY(61,10);
$pdf->SetTextColor(0,0,0);
$pdf->SetFont($font, 'B', 13); 
$text = '1. čtení Job 7,1-4.6-7';
$pdf->MultiCell(82, 7 , $text, $border, 'L', 0, 1, '', '', true);

$pdf->SetFont($font, '', 11);     
$pdf->setCellHeightRatio(1.0);
$text = 'Bůh zkoušel Abraháma a řekl: „Abraháme!“
Odpověděl: „Tady jsem!“
Bůh pravil: „Vezmi svého syna, svého jediného
syna, kterého miluješ, Izáka, a jdi do země Moria
a obětuj ho tam jako celopal na jedné z hor, kterou ti označím.“
Když došli na místo od Boha určené, Abrahám
tam vystavěl oltář a narovnal dříví. Pak vztáhl
ruku a vzal nůž, aby zabil svého syna.
Ale Hospodinův anděl na něho zavolal z nebe:
„Abraháme, Abraháme!“
Ten se ozval: „Tady jsem!“
Anděl řekl: „Nevztahuj svou ruku na chlapce a
nic mu nedělej, neboť nyní vím, že se bojíš Boha,
když mi neodpíráš svého syna, svého jediného
syna.“ Abrahám pozdvihl své oči, a hle – za ním
beran, který se chytil za rohy v křoví. Abrahám
šel, vzal ho a obětoval jako celopal místo svého
syna.
Hospodinův anděl zavolal na Abraháma podruhé
z nebe a řekl: „Při sobě samém přísahám – praví
Hospodin – že jsi to udělal a neodepřel jsi mi
svého syna, svého jediného syna, zahrnu tě požehnáním a rozmnožím tvé potomstvo jako nebeské hvězdy, jako písek na mořském břehu, a
tvé potomstvo se zmocní brány svých nepřátel. V
tvém potomstvu budou požehnány všechny národy země za to, že jsi mě poslechl.“';
$pdf->MultiCell(79, 0 , $text, $border, 'L', 0, 1, '', '', true);

$pdf->SetFont($font, 'B', 13); 
$text = 'Žalm 116';
$pdf->MultiCell(82, 7 , $text, $border, 'L', 0, 1, '', '', true);


$pdf->SetFont($font, '', 11); 
$text = 'Budu kráčet před Hospodinem v zemi živých.
Měl jsem důvěru, i když jsem si řekl: – „Jsem tak
sklíčen!“ – Drahocenná je v Hospodinových
očích – smrt jeho zbožných.
Ach, Hospodine, jsem tvůj služebník, – jsem tvůj
služebník, syn tvé služebnice, – rozvázal jsi moje
pouta. – Přinesu ti oběť díků, Hospodine, – a budu vzývat tvé jméno.
Splním své sliby Hospodinu – před veškerým
jeho lidem – v nádvořích domu Hospodinova, –
uprostřed tebe, Jeruzaléme! ';
$pdf->MultiCell(79, 0 , $text, $border, 'L', 0, 1, '', '', true);

/*
 * Třetí strana 
*/
$pdf->AddPage($orientation='', $format='A5', $keepmargins=true, $tocpage=true);
$pdf->SetMargins($left=10, $top=10, $right=6, true);
$pdf->setXY(6,10);
$pdf->SetFont($font, 'B', 13); 
$text = '2. čtení Řím 8,31b-34';
$pdf->MultiCell(53, 7 , $text, $border, 'L', 0, 1, '', '', true);

$pdf->SetFont($font, 'B', 13); 
$text = 'Texty k rozjímání';
$pdf->MultiCell(53, 7 , $text, $border, 'L', 0, 1, '', '', true);
?>
