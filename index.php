<?php

// namespace ZApp\Services;

//  use easyTable;
//  use exFPDF;

include('fpdf-easytable/exfpdf.php');
include('fpdf-easytable/easyTable.php');



class MYFPDF extends exFPDF
{
    public function __construct()
    {
        parent::__construct();
        $this->setMargins(4, 4, 4); // Définir les marges gauche, haut et droite
    }

// ******   util 

    public function conv(string $text): string
    {
        return $this->convertEncoding($text);
    }



    public function convx(string $text): string
    {
        return $this->convertEncoding($text);
    }




    public function convw(string $text): string
    {
        return $this->convertEncoding($text, 25);
    }



    public function convy(string $text): string
    {
        return $this->convertEncoding($text, 5);
    }


    private function convertEncoding(string $text, int $wordLimit = null): string
    {
        try {
            if ($wordLimit) {
                $text = $this->truncateText($text, $wordLimit);
            }
            return mb_convert_encoding(html_entity_decode($text, ENT_QUOTES, 'UTF-8'), 'Windows-1252', 'UTF-8');
        } catch (\Throwable $e) {
            return '';
        }
    }

    private function truncateText(string $text, int $wordLimit, string $suffix = '...'): string
    {
        $words = preg_split('/\s+/', trim($text));
        return count($words) > $wordLimit ? implode(' ', array_slice($words, 0, $wordLimit)) . $suffix : $text;
    }


    private function validateColor(string $color): string
    {
        return preg_match('/^#[0-9A-Fa-f]{6}$/', $color) ? $color : "#FFFFFF";
    }

    private function sanitize(string $string): string
    {
        return htmlspecialchars(trim($string), ENT_QUOTES, 'UTF-8');
    }


    /* wrap function */
function vcell($c_width,$c_height,$x_axis,$text){
    $w_w=$c_height/3;
    $w_w_1=$w_w+2;
    $w_w1=$w_w+$w_w+$w_w+3;
    $len=strlen($text);
    
    // check the length of the cell and splits the text into 7 character each and saves in a array 
    $lengthToSplit = 70;
    if($len>$lengthToSplit){
    $w_text=str_split($text,$lengthToSplit);
    $this->SetX($x_axis);
    $this->Cell($c_width,$w_w_1,$w_text[0],'','','');
    if(isset($w_text[1])) {
        $this->SetX($x_axis);
        $this->Cell($c_width,$w_w1,$w_text[1],'','','');
    }
    $this->SetX($x_axis);
    //$this->Cell($c_width,$c_height,'','LTRB',0,'L',0);
    $this->Cell($c_width,$c_height,'','LTRB',0,'L',0);
    }
    else{
        $this->SetX($x_axis);
       // $this->Cell($c_width,$c_height,$text,'LTRB',0,'L',0);}
       $this->Cell($c_width,$c_height,$text,'LTRB',0,'L',0);}
 }


///****util  */



    public function Header()
    {

        $header_pos = $_SESSION['header_position'] ?? 0;
        $position = $this->PageNo();

     }

 }



    $pdf= new MYFPDF();

    $pdf->AddPage();


    // $pdf->Header();
    // $pdf->SetFont('Arial', 'B', 14);
    // $pdf->Text('15','30','ETABLISSEMENT : ');
    // $pdf->Line(59,31,15,31);
    // longueur; position,abcisee , position ) 


    $row_lib ="COLLEGE MODERNE ANADOR ABOBO";
    $row_nom_f=" KOFFI SERGE ";
    $row_dir_nom =" BONWLE ";
    $row_dir_prenom="KOUASSI KOUADIO WILFRIED ";
    $row_dren = "DRENA DE BOUAFLE ";
    $ma_ville="BOUAFLE";

    $row_mail ="test@live.com";
    $row_c1="0504809230";
    $row_c2="0708564534";
    $row_fixe="23123456";
    $row_total="500";
    $row_garcon ="300";
    $row_fille ="200";
    $row_homo="1er cycle";
    $row_auto="1er cycle";
    $row_gps="12,15";
    $row_ilot="NUM123";
    $row_lot ="NUM768";
    $row_ref_c="REF_100";
    $row_ref_hom ="REF_h123";
    $row_ref_o="REF_ENS";
    $row_super="600";
    $row_ens ="OUI";
    $row_code_et="ref_code10";


    //fondateur 
    $nomprenom_fond ="yapi sylvain";
    $c1_fond ="0987654322";
    $c2_fond ="0806034455";
    $mail_fond="fond@test.com";

    //directeur 
    $nom_dir ="kouame frederic";
    $date_nai_dir="12/01/1980 à Bouafle";
    $situation_mat_dir="Marié";
    $nombre_enf_dir ="3";
    $date_arrive_dir="13/03/2020";
    $matricule_dir="AE1245";
    $ancien_fonct_dir ="4 ans";
    $ancien_drena_dir="2 ans";
    $academic_dir = "LICENCE, MASTER";
    $pedagogique_dir = "Ingénieur des Technique";
    $num_auto_ens_dir ="auto1234";
    $auto_diriger_dir = "oui"; 
    $num_auto_diriger_dir= "dir1235"; 
    $c1_dir="0998099877"; 
    $c2_dir="0123345677";
    $mail_dir ="dir@tsest.com";


     $pdf->SetFont('Arial','B',16);
     $pdf->Rect(20, 25, 180, 25);
     $mid_x=105;
     $text1 = " FICHE D'EVALUATION DE L'ECOLE ";
     $y = 35; 
     $pdf->Text($mid_x-$pdf->GetStringWidth($text1)/2,$y,$text1);
     $y=45;
     $pdf->SetFont('Arial','B',10);
     $pdf->SetTextColor(200,100,150);
     $text1 = utf8_decode("COLLEGE MODERNE ANADOR YOPOUGON ");
     $pdf->Text($mid_x-$pdf->GetStringWidth($text1)/2,$y,$text1);
     $pdf->SetTextColor(0,0,0);

     
     $pdf->SetFont('Arial','B',11);
     // Infos de la commande calées à gauche
     $pdf->Text(20,80,'ETABLISSEMENT :');
     $pdf->Line(20,81,54,81);
          //linewrap($string, $width, $break, $cut)
     $pdf->Text(58,80,utf8_decode($row_lib.''));
     
     //$pdf->Text(20,90,WordWrap($row_dir['ent_Nom'],30));
     //$pdf->Text(20,90,linewrap($row_dir['ent_Nom'],11,'<br>',TRUE));
     $pdf->Text(20,95,'FONDATEUR / FONDATRICE: ');
     $pdf->Text(75,95,utf8_decode($row_nom_f.''));
     $pdf->Line(20,96,72,96);

     //$pdf->Text(15,70,'RAISON SOCIALE  : "'.wordwrap($row_dir['ent_Nom'],15,"",TRUE));
     //echo wordwrap($row_dir['ent_Nom'],15,"<br>\n",TRUE)

     $pdf->Text(20,110,'DIRECTEUR/DIRECTRICE DES ETUDES :');
     $pdf->Line(20,111,95,111);
     $pdf->Text(98,110,utf8_decode($row_dir_nom.' '.$row_dir_prenom.''));

    $pdf->AddPage('P','A4');

     $c_width=98;// cell width 
     $c_height=7;
     $x_axis=8;

     //$x_axis=$pdf->getx();

     $pdf->SetFillColor(555,555,555); // Couleur des filets
     $pdf->SetTextColor(555,555,555);
     $pdf->cell($c_width,$c_height,$x_axis,utf8_decode("Référence création"));// pass all values inside the cell 
     
     $c_width=96;// cell width 
     $c_height=7;
     $x_axis=$pdf->getx();// now get current pdf x axis value
     $pdf->cell($c_width,$c_height,$x_axis,utf8_decode($row_ref_c));

     $pdf->Ln();
     $pdf->Ln();
     $pdf->Ln();
     $pdf->Ln();
     $pdf->Ln();
     $pdf->Ln();
     $pdf->Ln();
     $pdf->Ln();
     $pdf->Ln();

     $pdf->SetTextColor(0);

    $pdf->AddPage('P','A4');
    $pdf->SetFont('Arial','B',12);

    // $pdf->Text(8,8,'jesus kouassi ');

    $pdf->Text(20,20,"I - IDENTIFICATION DE L'ETABLISSEMENT");
    $pdf->Line(20,21,106,21);

    $pdf->SetFont('Arial','',12);
    $pdf->Text(15,35,'DRENA  :');
    $pdf->SetFont('Arial','',12);
    $pdf->Text(38,35,utf8_decode($row_dren.''));

    $pdf->Text(15,45,'VILLE/COMMUNE :');
    $pdf->SetFont('Arial','',12);
    $pdf->Text(57,45,utf8_decode($ma_ville.''));
   
    $pdf->Text(15,55,'DENOMINATION :');
    $pdf->SetFont('Arial','',12);
    $pdf->Text(57,55,utf8_decode($row_lib.''));

    $pdf->Text(15,65,'1.');
    $pdf->Text(90,65,utf8_decode('L\'établissement'));
    $pdf->Line(90,66,120,66);

    $table=new easyTable($pdf, 2, 'width:180;border:1');
    // 2 cellules par ligne 


    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();


    $table->easyCell('Reference Creation', 'bgcolor:#b3ccff;'); 
    $table->easyCell(utf8_decode($row_ref_c), 'bgcolor:#b3ccff;');
    $table->printRow();

    $table->easyCell('Reference Ouverture', 'bgcolor:#b3ccff;'); 
    $table->easyCell(utf8_decode($row_ref_o), 'bgcolor:#b3ccff;');
    $table->printRow();

    $table->easyCell('Ordre d\'enseignement', 'bgcolor:#b3ccff;'); 
    $table->easyCell($row_ens, 'bgcolor:#b3ccff;');
    $table->printRow();

     $table->easyCell('Code', 'bgcolor:#b3ccff;'); 
    $table->easyCell($row_code_et, 'bgcolor:#b3ccff;');
    $table->printRow();

     $table->easyCell('Reference homologation', 'bgcolor:#b3ccff;'); 
    $table->easyCell($row_ref_hom, 'bgcolor:#b3ccff;');
    $table->printRow();

    
    $table->easyCell('Superficie', 'bgcolor:#b3ccff;'); 
    $table->easyCell($row_super, 'bgcolor:#b3ccff;');
    $table->printRow();

    $table->easyCell('Num lot :'.$row_lot, 'bgcolor:#b3ccff;'); 
    $table->easyCell('Num Ilot :'.$row_ilot, 'bgcolor:#b3ccff;');
    $table->printRow();

    $table->easyCell('Situation geographique/Localite/Coordonnees GPS', 'bgcolor:#b3ccff;'); 
    $table->easyCell($row_gps, 'bgcolor:#b3ccff;');
    $table->printRow();
     $table->easyCell('Cycle autorise', 'bgcolor:#b3ccff;'); 
    $table->easyCell($row_auto, 'bgcolor:#b3ccff;');
    $table->printRow();

     $table->easyCell('Cycle homologue', 'bgcolor:#b3ccff;'); 
    $table->easyCell($row_homo, 'bgcolor:#b3ccff;');
    $table->printRow();

    
    $table->easyCell('Effectif fille', 'bgcolor:#b3ccff;'); 
    $table->easyCell($row_fille, 'bgcolor:#b3ccff;');
    $table->printRow();

    $table->easyCell(utf8_decode('Effectif garçon'), 'bgcolor:#b3ccff;'); 
    $table->easyCell($row_garcon, 'bgcolor:#b3ccff;');
    $table->printRow();

    $table->easyCell('Effectif total', 'bgcolor:#b3ccff;'); 
    $table->easyCell($row_total, 'bgcolor:#b3ccff;');
    $table->printRow();

     $table->easyCell('Telephone fixe', 'bgcolor:#b3ccff;'); 
    $table->easyCell($row_fixe, 'bgcolor:#b3ccff;');
    $table->printRow();

    $table->easyCell('Cellulaire C1 :'.$row_c1, 'bgcolor:#b3ccff;'); 
    $table->easyCell(' Cellulaire C2 :'.$row_c2, 'bgcolor:#b3ccff;');
    $table->printRow();
    
    $table->easyCell('Mail', 'bgcolor:#b3ccff;'); 
    $table->easyCell($row_mail, 'bgcolor:#b3ccff;');
    $table->printRow();
    
    // $table->rowStyle('min-height:20');
    // $table->easyCell('Text 4', 'bgcolor:#3377ff; rowspan:2');
    // $table->printRow();

    // $table->easyCell('Text 5', 'bgcolor:#99bbff;colspan:2');
    // $table->printRow();
    
    $table->endTable();

    $pdf->Text(15,220,'2.');
    $pdf->Text(90,220,utf8_decode('LE/LA FONDATEUR / FONDATRICE'));
    $pdf->Line(90,221,160,221);

    $pdf->Text(15,231,'Nom et Prenoms (Mme/mlle/M.) :');
    $pdf->SetFont('Arial','',12);
    $pdf->Text(90,231,utf8_decode($nomprenom_fond));

    $pdf->Text(15,241,'Contact C1 :');
    $pdf->SetFont('Arial','',12);
    $pdf->Text(65,241,utf8_decode($c1_fond));

    $pdf->Text(15,251,'Contact C1 :');
    $pdf->SetFont('Arial','',12);
    $pdf->Text(65,251,utf8_decode($c2_fond));


    $pdf->Text(15,261,'Mail:');
    $pdf->SetFont('Arial','',12);
    $pdf->Text(65,261,utf8_decode($mail_fond));



    $pdf->AddPage('P','A4');
    $pdf->SetFont('Arial','B',12);


    $pdf->Text(15,20,'3.');
    $pdf->Text(90,20,utf8_decode('LE/LA DIRECTEUR / DIRECTRICE DES ETUDES'));
    $pdf->Line(90,21,185,21);

    $pdf->SetFont('Arial','',12);
    $pdf->Text(15,30,'Nom et Prenoms  (Mme/mlle/M.) :');
    $pdf->SetFont('Arial','',12);
    $pdf->Text(90,30,utf8_decode($nom_dir.''));

    $pdf->Text(15,40,'Date et lieu de naissance :');
    $pdf->SetFont('Arial','',12);
    $pdf->Text(65,40,utf8_decode($date_nai_dir.''));

    $pdf->Text(15,50,'Situation matrimoniale :');
    $pdf->SetFont('Arial','',12);
    $pdf->Text(65,50,utf8_decode($situation_mat_dir.''));

    $pdf->Text(15,60,'Nombre d\'enfants : ');
    $pdf->SetFont('Arial','',12);
    $pdf->Text(65,60,utf8_decode($nombre_enf_dir.''));

    $pdf->Text(15,70,'Date d\'arrivee au poste : ');
    $pdf->SetFont('Arial','',12);
    $pdf->Text(65,70,utf8_decode($date_arrive_dir.''));

   
    $pdf->Text(15,80,'Numero matricule ( fonctionnaire ) : ');
    $pdf->SetFont('Arial','',12);
    $pdf->Text(100,80,utf8_decode($matricule_dir.''));

    $pdf->Text(15,90,'Anciennete dans la fonction : ');
    $pdf->SetFont('Arial','',12);
    $pdf->Text(100,90,utf8_decode($ancien_fonct_dir.''));

    $pdf->Text(15,100,'Anciennete dans la DRENA : ');
    $pdf->SetFont('Arial','',12);
    $pdf->Text(100,100,utf8_decode($ancien_drena_dir.''));

    $pdf->Text(15,110,'Diplome academiques : ');
    $pdf->SetFont('Arial','',12);
    $pdf->Text(65,110,utf8_decode($academic_dir.''));
    
    $pdf->Text(15,120,'Diplome pedagogique : ');
    $pdf->SetFont('Arial','',12);
    $pdf->Text(65,120,utf8_decode($pedagogique_dir.''));
    $pdf->Text(115,120,'ou autorisation d\'enseigner No : ');
    $pdf->SetFont('Arial','',12);
    $pdf->Text(180,120,utf8_decode($num_auto_ens_dir.''));

    $pdf->Text(15,130,'Autorisation de diriger : ');
    $pdf->SetFont('Arial','',12);
    $pdf->Text(65,130,utf8_decode($auto_diriger_dir.''));
    $pdf->Text(100,130,'Numero de l\'autorisation : ');
    $pdf->SetFont('Arial','',12);
    $pdf->Text(150,130,utf8_decode($num_auto_diriger_dir.''));

    $pdf->Text(15,140,'Contact C1 : ');
    $pdf->SetFont('Arial','',12);
    $pdf->Text(45,140,utf8_decode($c1_dir.''));
    $pdf->Text(80,140,'Contact C2: ');
    $pdf->SetFont('Arial','',12);
    $pdf->Text(105,140,utf8_decode($c2_dir.''));

    $pdf->Text(15,150,'Mail : ');
    $pdf->SetFont('Arial','',12);
    $pdf->Text(30,150,utf8_decode($mail_dir.''));

// cadre juridique 

  $pdf->AddPage('P','A4');
  $pdf->SetFont('Arial','B',14);
  
  $pdf->Text(15,20,'4.');
  $pdf->Text(90,20,utf8_decode('LE CADRE JURIDIQUE'));

  $pdf->SetTextColor(200,100,150);
  $pdf->Text(145,20,utf8_decode('22'));
  $pdf->Line(90,21,150,21);

    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();


//var 
$pdf->SetFont('Arial','',11);

$cadr_lib=array(
'Identification de l\'établissement par la CNPS',
'Déclaration du personnel à la CNPS',
'Etablissement assuré (incendie)',
'Etablissement assuré (inondation)',
'Elèves assurés par l\'établissement (accident)',
'Personnels assurés par l\'établissement
(accident)',
'Attestation de Régularité Fiscale (ARF)',
'Contrats de travail avec les personnels',
'Respect de la convention collective (salaire)',
'Respect de la convention avec le MENA ',
'Bulletins de paie pour les personnels'
);

$cadre_source=array(
'Code d\'identification',
'',
'Contrat d\'assurance',
'Contrat d\'assurance',
'Contrat d\'assurance',
'Contrat d\'assurance',
'ARF',
'Contrats de travail',
'',
'',
'Bulletins de paie'
);

$total_cadre =2;


//******************** */
$pdf->SetFont('Arial','B',9);
$pdf->SetTextColor(000,000,000);

 $tabl_test=new easyTable($pdf,'%{5,17,9,9,6,6,5,6,8,5,5,6,5,8}', 'border:1;');
 // ligne 1

 //1
 $tabl_test->easyCell(utf8_decode('N°'), 'bgcolor:#b3ccff;rowspan:2;');

 //2
 $tabl_test->easyCell(utf8_decode('Libellé'), 'bgcolor:#b3ccff;colspan:5;rowspan:2;');

 //$tabl_test->easyCell('Text 2', 'bgcolor:#b3ccff;');
 // $tabl_test->easyCell('Text 2', 'bgcolor:#b3ccff;');
 // $tabl_test->easyCell('Text 2', 'bgcolor:#b3ccff;');
 // $tabl_test->easyCell('Text 2', 'bgcolor:#b3ccff;');

 //7
 $tabl_test->easyCell('EXISTENCE', 'bgcolor:#b3ccff;colspan:2;');
 //$tabl_test->easyCell('Text 2', 'bgcolor:#b3ccff;');

//9
 $tabl_test->easyCell('SOURCE DE VERIFICATION', 'bgcolor:#b3ccff;colspan:4;rowspan:2;');
//  $tabl_test->easyCell('Text 5', 'bgcolor:#b3ccff;');
//  $tabl_test->easyCell('Text 6', 'bgcolor:#b3ccff;');

//13
  $tabl_test->easyCell('NOTE', 'bgcolor:#b3ccff;colspan:2;rowspan:2;');

 $tabl_test->printRow(); 
 // ligne 2
 //1
//$tabl_test->easyCell('Text 2', 'bgcolor:#b3ccff;');
//  $tabl_test->easyCell('Text 2', 'bgcolor:#b3ccff;');
//  $tabl_test->easyCell('Text 2', 'bgcolor:#b3ccff;');
//  $tabl_test->easyCell('Text 2', 'bgcolor:#b3ccff;');
//  $tabl_test->easyCell('Text 2', 'bgcolor:#b3ccff;');
//  $tabl_test->easyCell('Text 2', 'bgcolor:#b3ccff;');


 $tabl_test->easyCell('Oui', 'bgcolor:#b3ccff;');
 $tabl_test->easyCell('Non', 'bgcolor:#b3ccff;');

// $tabl_test->easyCell('Text 2', 'bgcolor:#b3ccff;');
//  $tabl_test->easyCell('Text 2', 'bgcolor:#b3ccff;');
//  $tabl_test->easyCell('Text 2', 'bgcolor:#b3ccff;');
//  $tabl_test->easyCell('Text 2', 'bgcolor:#b3ccff;');

 $tabl_test->printRow(); 

 //ligne 3
 // $tabl_test->easyCell('Text 31', 'bgcolor:#b3ccff;');

  //$tabl_test->easyCell('Text 32', 'bgcolor:#b3ccff;colspan:5;');

// $tabl_test->easyCell('Text 2', 'bgcolor:#b3ccff;');
// $tabl_test->easyCell('Text 2', 'bgcolor:#b3ccff;');
// $tabl_test->easyCell('Text 2', 'bgcolor:#b3ccff;');
// $tabl_test->easyCell('Text 2', 'bgcolor:#b3ccff;');

 //$tabl_test->easyCell('Text 33', 'bgcolor:#b3ccff;');

// $tabl_test->easyCell('Text 34', 'bgcolor:#b3ccff;');

// $tabl_test->easyCell('Text 35', 'bgcolor:#b3ccff;colspan:4;');
 
// $tabl_test->easyCell('Text 2', 'bgcolor:#b3ccff;');
// $tabl_test->easyCell('Text 2', 'bgcolor:#b3ccff;');
// $tabl_test->easyCell('Text 2', 'bgcolor:#b3ccff;');

 //$tabl_test->printRow(); // ligne 3

 $tabl_test->endTable();

 $pdf->SetFont('Arial','',11);

 //$tabl_test=new easyTable($pdf,'%{5,10,9,9,6,9,6,9,8,10,6,13}', 'width:200;border:1;');
 $tableA=new easyTable($pdf,'%{5,47,5,6,24,13}','align:R; l-margin:50; border:1; font-color:#000');
 //getTete($tabl_test);

//   $tableA->easyCell('No', 'bgcolor:#b3ccff;'); 
//   $tableA->easyCell(utf8_decode("libellé"), 'bgcolor:#b3ccff;');
//   $tableA->easyCell('oui', 'bgcolor:#b3ccff;'); 
//   $tableA->easyCell(utf8_decode('non'), 'bgcolor:#b3ccff;');
//   $tableA->easyCell('Source de Verification', 'bgcolor:#b3ccff;'); 
//   $tableA->easyCell(utf8_decode("NOTE"), 'bgcolor:#b3ccff;');
//   $tableA->printRow();

     for($i=0; $i<11; $i++)
 { 

     $pdf->SetFont('Arial','',12);
     $tableA->easyCell($i+1);
     $tableA->easyCell(utf8_decode($cadr_lib[$i]));
     $tableA->easyCell('x');
     $tableA->easyCell('x');
     $tableA->easyCell($cadre_source[$i]);
     $tableA->easyCell('/'.$total_cadre);
     $tableA->printRow();
 }

  $tableA->endTable();

  // infrastructure 

$pdf->AddPage('P','A4');
$pdf->SetFont('Arial','B',14);

$pdf->SetTextColor(000,000,000);

$pdf->Text(15,20,'II.');
$pdf->Text(90,20,utf8_decode('INFRASTRUCTURES'));

$pdf->SetTextColor(200,100,150);
$pdf->Text(145,20,utf8_decode('47'));
$pdf->Line(90,21,150,21);

$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
  

$infra_lib=array(
'Les salles de classe sont au rez-
de-chaussée ou au 2ème étage au
maximum (avec deux escaliers
protégés)',
'Les salles de classe ont deux (2)
entrées ;',
'Les toilettes sont carrelées en
blanc pour une question
d\'hygiène',
'Toilettes élèves : au moins dix
(10) avec chasse d\'eau',
'Les toilettes sont séparées selon
le genre (filles / garçons)',
'L\'établissement dispose d\'au
moins deux (02) toilettes
séparées pour enseignants et
enseignantes :',
'L\'établissement dispose d\'au
moins deux (02) toilettes
séparées pour le personnel
administratif hommes et
femmes',
'Une aire de recréation et de
jeux pour les élèves',
'Une clôture de l\'établissement',
'Un point d\'eau (environnement)',
'Des rampes d\'accès pour les
handicapés moteurs',
'Une boîte à pharmacie fournie
en produits pour les soins
primaires',
'Les bâtiments sont peints',
'L\'extérieur du bâtiment : orange
et jaune ;',
'L\'intérieur du bâtiment : jaune
clair ;',
'Les salles de classe disposent de
plafonds',
'Le plafond des salles de classe
est peint en blanc',
'L\'établissement dispose d\'un
terrain de sport'
);

$total_infra1=1.5;
$total_infra2=1.5;


//******************** */
$pdf->SetFont('Arial','B',9);
$pdf->SetTextColor(000,000,000);

 $tabl_test=new easyTable($pdf,14,'width:250;border:1;');

 // ligne 1
  $tabl_test->easyCell(utf8_decode('N°'), 'bgcolor:#b3ccff;rowspan:2;');

  $tabl_test->easyCell(utf8_decode('Libellé'), 'bgcolor:#b3ccff;colspan:5;rowspan:2;');

  $tabl_test->easyCell('EXISTENCE', 'bgcolor:#b3ccff;colspan:2;');

  $tabl_test->easyCell('NOTE', 'bgcolor:#b3ccff;rowspan:2;');

  $tabl_test->easyCell('Etat', 'bgcolor:#b3ccff;colspan:4;');

  $tabl_test->easyCell('NOTE', 'bgcolor:#b3ccff;rowspan:2;');
  $tabl_test->printRow(); 
    //ligne 2

  $tabl_test->easyCell('Oui', 'bgcolor:#b3ccff;');
  $tabl_test->easyCell('Non', 'bgcolor:#b3ccff;');

  $tabl_test->easyCell('fonctionnel', 'bgcolor:#b3ccff;colspan:2;');
  $tabl_test->easyCell('non fonctionnel', 'bgcolor:#b3ccff;colspan:2;');
  $tabl_test->printRow(); 


 //ligne 3
 // $tabl_test->easyCell('Text 31', 'bgcolor:#b3ccff;');


// $tabl_test->printRow(); 


 $tabl_test->endTable();

 $pdf->SetFont('Arial','',12);



 $tableB=new easyTable($pdf,'%{7,36,7,7,8,13,15,7}','align:R; l-margin:50; border:1; font-color:#000');

//   $tableB->easyCell('No', 'bgcolor:#b3ccff;'); 
//   $tableB->easyCell(utf8_decode("libellé"), 'bgcolor:#b3ccff;');
//   $tableB->easyCell('oui', 'bgcolor:#b3ccff;'); 
//   $tableB->easyCell(utf8_decode('non'), 'bgcolor:#b3ccff;');
//   $tableB->easyCell(utf8_decode("note"), 'bgcolor:#b3ccff;');
//   $tableB->easyCell('fonctionnel', 'bgcolor:#b3ccff;'); 
//   $tableB->easyCell('non fonctionnel', 'bgcolor:#b3ccff;'); 
//   $tableB->easyCell(utf8_decode("note"), 'bgcolor:#b3ccff;');
//   $tableB->printRow();

     for($i=0; $i<17; $i++)
 { 

     $tableB->easyCell($i+1);
     $tableB->easyCell(utf8_decode($infra_lib[$i]));
     $tableB->easyCell('x');
     $tableB->easyCell('x');
     $tableB->easyCell('/'.$total_infra1);
     $tableB->easyCell('x');
     $tableB->easyCell('x');
     $tableB->easyCell('/'.$total_infra2);
     $tableB->printRow();
 }


    $tableB->endTable();

  // equipement 

  $pdf->AddPage('P','A4');
 $pdf->SetFont('Arial','B',14);
  $pdf->SetTextColor(000,000,000);
  $pdf->Text(15,33,'III.');
  $pdf->Text(90,30,utf8_decode('EQUIPEMENTS'));

  $pdf->SetTextColor(200,100,150);
  $pdf->Text(130,30,utf8_decode('80'));
  $pdf->Line(90,31,135,31);

  $pdf->Ln();
  $pdf->Ln();
  $pdf->Ln();
  $pdf->Ln();
  $pdf->Ln();


 $equipement_lib=array(
 'L\'établissement dispose de
l\'électricité',
'L\'établissement dispose de la
connexion internet',
'Une salle des professeurs équipée
: grande table, casier pour chaque
professeur, etc.',
'Un bureau des Educateurs
(équipé)',
'Un laboratoire (PC) équipé en
tables/ en paillasse avec carreaux
blancs et deux points d\'eau au
premier cycle',
'Un laboratoire (SVT) équipé en
tables/en paillasse avec carreaux
blancs et deux points d\'eau au
premier cycle',
'Un laboratoire (PC) équipé en
tables/ en paillasse avec carreaux
blancs et deux points d\'eau au
second cycle',
'Un laboratoire (SVT) équipé en
tables/en paillasse avec carreaux
blancs et deux points d\'eau au
second cycle',
'Des équipements scientifiques et Page 6 sur 15
didactiques en nombre suffisant ?',
'Les salles de classe sont équipées
en tables-bancs en nombre
suffisant ?',
'Les salles de classe sont équipées
en tableaux',
'Les salles de classe sont équipées
en bureau et chaise pour
l\'enseignant',
'Le bureau du DE est équipé d\'un
bureau, d\'un fauteuil de direction
et au moins de deux chaises pour
visiteurs',
'Une bibliothèque aménagée et
équipée en livres et en
ordinateurs (15 au moins) /Centre
de documentation et
d\'Informations (CDI)',
'L\'établissement dispose de
matériels informatiques',
'L\'établissement dispose d\'un
photocopieur',
'L\'établissement dispose d\'un mât
avec un drapeau',
'L\'établissement dispose d\'un abri
d\'attente ou d\'un préau',
'L\'établissement dispose de
poubelles',
'L\'établissement est doté de
dispositifs de lavage de mains'
 );
 $total_equipement =2;



//******************** */
$pdf->SetFont('Arial','B',9);
$pdf->SetTextColor(000,000,000);

 $tabl_test=new easyTable($pdf,14,'width:250;border:1;');

 // ligne 1
  $tabl_test->easyCell(utf8_decode('N°'), 'bgcolor:#b3ccff;rowspan:2;');

  $tabl_test->easyCell(utf8_decode('Libellé'), 'bgcolor:#b3ccff;colspan:5;rowspan:2;');

  $tabl_test->easyCell('EXISTENCE', 'bgcolor:#b3ccff;colspan:2;');

  $tabl_test->easyCell('NOTE', 'bgcolor:#b3ccff;rowspan:2;');

  $tabl_test->easyCell('Etat', 'bgcolor:#b3ccff;colspan:4;');

  $tabl_test->easyCell('NOTE', 'bgcolor:#b3ccff;rowspan:2;');
  $tabl_test->printRow(); 
    //ligne 2

  $tabl_test->easyCell('Oui', 'bgcolor:#b3ccff;');
  $tabl_test->easyCell('Non', 'bgcolor:#b3ccff;');

  $tabl_test->easyCell('fonctionnel', 'bgcolor:#b3ccff;colspan:2;');
  $tabl_test->easyCell('non fonctionnel', 'bgcolor:#b3ccff;colspan:2;');
  $tabl_test->printRow(); 


 //ligne 3
 // $tabl_test->easyCell('Text 31', 'bgcolor:#b3ccff;');


// $tabl_test->printRow(); 


 $tabl_test->endTable();

 $pdf->SetFont('Arial','',12);


$tableC=new easyTable($pdf,'%{7,36,7,7,8,13,15,7}','align:R; l-margin:50; border:1; font-color:#000');

//   $tableC->easyCell('No', 'bgcolor:#b3ccff;'); 
//   $tableC->easyCell(utf8_decode("libellé"), 'bgcolor:#b3ccff;');
//   $tableC->easyCell('oui', 'bgcolor:#b3ccff;'); 
//   $tableC->easyCell(utf8_decode('non'), 'bgcolor:#b3ccff;');
//   $tableC->easyCell(utf8_decode("note"), 'bgcolor:#b3ccff;');
//   $tableC->easyCell('fonctionnel', 'bgcolor:#b3ccff;'); 
//   $tableC->easyCell('non fonctionnel', 'bgcolor:#b3ccff;'); 
//   $tableC->easyCell(utf8_decode("note"), 'bgcolor:#b3ccff;');
//   $tableC->printRow();

  
     for($i=0; $i<20; $i++)
 { 

     $pdf->SetFont('Arial','',12);
     $tableC->easyCell($i+1);
     $tableC->easyCell(utf8_decode($equipement_lib[$i]));
     $tableC->easyCell('x');
     $tableC->easyCell('x');
     $tableC->easyCell('/'.$total_equipement);
     $tableC->easyCell('x');
     $tableC->easyCell('x');
     $tableC->easyCell('/'.$total_equipement);
     $tableC->printRow();
 }

    $tableC->endTable();

// reunion 

$pdf->AddPage('P','A4');
$pdf->SetFont('Arial','B',14);

$pdf->SetTextColor(000,000,000);

$pdf->Text(15,20,'IV.');
$pdf->Text(90,20,utf8_decode('GESTION ADMINISTRATIVE'));

$pdf->SetTextColor(200,100,150);
$pdf->Text(160,20,utf8_decode('90'));
$pdf->Line(90,21,165,21);

$pdf->SetTextColor(000,000,000);
$pdf->Text(20,35,'A.');
$pdf->Text(90,35,utf8_decode('Réunions'));

$pdf->SetTextColor(200,100,150);
$pdf->Text(120,35,utf8_decode('29,5'));
$pdf->Line(90,36,129,36);

$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();


$reunion_lib=array(
'Rentrée',
'Respect de la date officielle du
début des cours',
'Conseils d\'enseignement(CE)',
'Participation des enseignants de
l\'établissement aux réunions
d\'Unités Pédagogiques',
'Conseil Intérieur',
'Conseil Scolaire',
'Parents d\'élèves',
'Responsables de Clubs',
'Responsables Associations scolaires ',
'Bureau des syndicats',
'Autres personnels',
'Partenaires de l\'école',
'Autres (Mutuelle, Amicale) à
préciser'
);

$prevu=array(
    '50',
     '50',
      '50',
       '50',
        '50',
    '50',
     '50',
      '50',
       '50',
        '50',
    '50',
     '50',
      '50'
);
$realise = array(
 '25',
     '25',
      '25',
       '25',
        '25',
    '25',
     '25',
      '25',
       '25',
        '25',
    '25',
     '25',
      '25'
);

$real = array(
     '50',
     '50',
      '50',
       '50',
        '50',
    '50',
     '50',
      '50',
       '50',
        '50',
    '50',
     '50',
      '50'
);

$total_reunion1 = 1;
$total_reunion2 = 1.5;

$hebdo =array(

     '5',
     '5',
      '5',
       '5',
        '5',
    '5',
     '5',
      '5',
       '5',
        '5',
    '5',
     '5',
      '5'
);

$quinzaine =array(
     '10',
     '10',
      '10',
       '10',
        '10',
    '10',
     '10',
      '10',
       '10',
        '10',
    '10',
     '10',
      '10'

);

$mois = array(
     '15',
     '15',
      '15',
       '15',
        '15',
    '15',
     '15',
      '15',
       '15',
        '15',
    '15',
     '15',
      '15'

);




//******************** */
 $pdf->SetFont('Arial','B',9);
 $pdf->SetTextColor(000,000,000);

 $tabl_test=new easyTable($pdf,21,'width:250;border:1;');

 // ligne 1
  $tabl_test->easyCell(utf8_decode('N°'), 'bgcolor:#b3ccff;rowspan:2;');
  $tabl_test->easyCell(utf8_decode('Libellé'), 'bgcolor:#b3ccff;colspan:5;rowspan:2;');
  $tabl_test->easyCell('Nombre', 'bgcolor:#b3ccff;colspan:6;');
  $tabl_test->easyCell('note', 'bgcolor:#b3ccff;rowspan:2;');
  $tabl_test->easyCell(utf8_decode('Fréquence'), 'bgcolor:#b3ccff;colspan:7;');
  $tabl_test->easyCell('note', 'bgcolor:#b3ccff;rowspan:2;');
  $tabl_test->printRow(); 

    //ligne 2
  $tabl_test->easyCell(utf8_decode('prévu'), 'bgcolor:#b3ccff;colspan:2;');
  $tabl_test->easyCell(utf8_decode('réalisé'), 'bgcolor:#b3ccff;colspan:2;');
  $tabl_test->easyCell(utf8_decode('%real'), 'bgcolor:#b3ccff;colspan:2;');


  $tabl_test->easyCell('Hebdo', 'bgcolor:#b3ccff;colspan:2;');
  $tabl_test->easyCell('Quinzaine', 'bgcolor:#b3ccff;colspan:3;');
  $tabl_test->easyCell('Mois', 'bgcolor:#b3ccff;colspan:2;');


  $tabl_test->printRow(); 


 //ligne 3
 // $tabl_test->easyCell('Text 31', 'bgcolor:#b3ccff;');
 // $tabl_test->printRow(); 


 $tabl_test->endTable();



$pdf->SetFont('Arial','',10);

$tableD=new easyTable($pdf,'%{5,24,9,10,9,5,10,14,9,5}','align:R; l-margin:50; border:1; font-color:#000;font-size:10;');

//   $tableD->easyCell('No', 'bgcolor:#b3ccff;'); 

//   $tableD->easyCell(utf8_decode("libellé"), 'bgcolor:#b3ccff;');
//   $tableD->easyCell(utf8_decode('prévu'), 'bgcolor:#b3ccff;'); 
//   $tableD->easyCell(utf8_decode('Réalisé'), 'bgcolor:#b3ccff;');
//   $tableD->easyCell(utf8_decode('%réal.'), 'bgcolor:#b3ccff;');
//   $tableD->easyCell(utf8_decode("note"), 'bgcolor:#b3ccff;');
//   $tableD->easyCell(utf8_decode('Hebdo'), 'bgcolor:#b3ccff;');
//   $tableD->easyCell(utf8_decode('Quinzaine'), 'bgcolor:#b3ccff;');
//   $tableD->easyCell(utf8_decode('Mois'), 'bgcolor:#b3ccff;');
//   $tableD->easyCell(utf8_decode("note"), 'bgcolor:#b3ccff;');

//   $tableD->printRow();


  $pdf->SetFont('Arial','',10);

       for($i=0; $i<13; $i++)
 { 

     $pdf->SetFont('Arial','',10);
     $tableD->easyCell($i+1);
     $tableD->easyCell(utf8_decode($equipement_lib[$i]));
     $tableD->easyCell(utf8_decode($prevu[$i]));
     $tableD->easyCell(utf8_decode($realise[$i]));
     $tableD->easyCell(utf8_decode($real[$i]));
     $tableD->easyCell('/'.$total_reunion1);
     $tableD->easyCell(utf8_decode($hebdo[$i]));
     $tableD->easyCell(utf8_decode($quinzaine[$i]));
     $tableD->easyCell(utf8_decode($mois[$i]));
     $tableD->easyCell('/'.$total_reunion2);
     $tableD->printRow();
 }

    $tableD->endTable();


  
// document  

$pdf->AddPage('P','A4');
$pdf->SetFont('Arial','B',14);

$pdf->SetTextColor(000,000,000);

$pdf->Text(20,20,'B.');
$pdf->Text(90,20,utf8_decode('Documents de bureau'));

$pdf->SetTextColor(200,100,150);
$pdf->Text(160,20,utf8_decode('28'));
$pdf->Line(90,21,165,21);

$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();

$document_lib =array(
'Courrier arrivée',
'Courrier départ',
'Chrono arrivée',
'Chrono départ',
'Cahier de transmission',
'Rapport d\'activités de fin de
Trimestre/Semestre/Année ',
'Liste des pièces périodiques',
'Tableau d\'affichage des informations officielles',
'Registre d\'absence des Professeurs',
'Registre d\'absence du personnel administratif
(DE, DEA, comptable, secrétaire …)',
'Registre d\'absence des Educateurs ',
'Registre d\'absence du personnel de service',
'Registre des élèves reçus à l\'infirmerie/ Hôpital ',
'Registre des élèves reçus à la bibliothèque',
'Cahier de réunions',
'Dispositif de partage d\'informations (Tableau
d\'affichage/voie numérique) ',
'Cahier de rattrapage des heures perdues
(enseignants) ',
'Dossiers administratifs des professeurs (Casier
judiciaire, Certificat de nationalité, Extrait de
naissance, CNI, autorisation d\'enseigner,
diplômes)',
'Dossiers administratifs des autres personnels',
'Dossiers élèves : Extrait de naissance',
'Dossiers élèves : Fiche de préinscription ',
'Dossiers élèves : Fiche d\'inscription',
'Dossiers élèves : Fiche de renseignements',
'Dossiers élèves : Copie de la Carte scolaire DSPS',
'Dossiers élèves : Fiche de Visite médicale systématique',
'Dossiers élèves : Fiche quitus',
'Dossiers élèves : Fiche cursus',
'Rapport de la visite médicale systématique'
);

$observation = array(
    'observation1',
     'observation2',
      'observation3',
       'observation4',
        'observation5',
         'observation6',
          'observation7',
           'observation8',
            'observation9',
             'observation10',
     'observation11',
      'observation12',
       'observation13',
        'observation14',
         'observation15',
          'observation16',
           'observation17',
            'observation18',
             'observation19',
              'observation20',
     'observation21',
      'observation22',
       'observation23',
        'observation24',
         'observation25',
          'observation26',
           'observation27',
            'observation28',

);

$total_document = 1;





//******************** */
 $pdf->SetFont('Arial','B',9);
 $pdf->SetTextColor(000,000,000);

 $tabl_test=new easyTable($pdf,20,'width:250;border:1;');
 // ligne 1
  $tabl_test->easyCell(utf8_decode('N°'), 'bgcolor:#b3ccff;rowspan:2;');
  $tabl_test->easyCell(utf8_decode('Libellé'), 'bgcolor:#b3ccff;colspan:10;rowspan:2;');
  $tabl_test->easyCell('EXISTENCE', 'bgcolor:#b3ccff;colspan:2;');
  $tabl_test->easyCell('Bien tenu', 'bgcolor:#b3ccff;colspan:3;');
  $tabl_test->easyCell(utf8_decode('Observations'), 'bgcolor:#b3ccff;colspan:3;rowspan:2;');
  $tabl_test->easyCell('note', 'bgcolor:#b3ccff;rowspan:2;');
  $tabl_test->printRow(); 

    //ligne 2
  $tabl_test->easyCell(utf8_decode('oui'), 'bgcolor:#b3ccff;');
  $tabl_test->easyCell(utf8_decode('non'), 'bgcolor:#b3ccff;');


  $tabl_test->easyCell(utf8_decode('oui'), 'bgcolor:#b3ccff;colspan:2;');
  $tabl_test->easyCell('non', 'bgcolor:#b3ccff;');

  $tabl_test->printRow(); 


 //ligne 3
 // $tabl_test->easyCell('Text 31', 'bgcolor:#b3ccff;');
 // $tabl_test->printRow(); 


 $tabl_test->endTable();



$pdf->SetFont('Arial','',10);                            
$tableE=new easyTable($pdf,'%{5,50,5,5,10,5,15,5}','align:R; l-margin:50; border:1; font-color:#000;font-size:10;');

//   $tableE->easyCell(utf8_decode('N°'), 'bgcolor:#b3ccff;'); 
//   $tableE->easyCell(utf8_decode("libellé"), 'bgcolor:#b3ccff;'); 35 Y5 Y5 Y5
//   $tableE->easyCell(utf8_decode('oui'), 'bgcolor:#b3ccff;'); 
//   $tableE->easyCell(utf8_decode('non'), 'bgcolor:#b3ccff;');
//   $tableE->easyCell(utf8_decode('oui'), 'bgcolor:#b3ccff;');
//   $tableE->easyCell(utf8_decode('non'), 'bgcolor:#b3ccff;');
//   $tableE->easyCell(utf8_decode('observation'), 'bgcolor:#b3ccff;');
//   $tableE->easyCell(utf8_decode("note"), 'bgcolor:#b3ccff;');




  $tableE->printRow();

  //28 

  $pdf->SetFont('Arial','',10);

       for($i=0; $i<28; $i++)
 { 
     $pdf->SetFont('Arial','',10);
     $tableE->easyCell($i+1);
     $tableE->easyCell(utf8_decode($document_lib[$i]));
     $tableE->easyCell('x');
     $tableE->easyCell('x');
     $tableE->easyCell('x');
     $tableE->easyCell('x');
     $tableE->easyCell(utf8_decode($observation[$i]));
     $tableE->easyCell('/'.$total_document);
     $tableE->printRow();
 }

    $tableE->endTable();




//liste et contacts 
$pdf->AddPage('P','A4');
$pdf->SetFont('Arial','B',14);

$pdf->SetTextColor(000,000,000);

$pdf->SetFont('Arial','B',14);

$pdf->SetTextColor(000,000,000);

$pdf->Text(20,10,'C.');
$pdf->Text(40,10,utf8_decode('Listes et contacts des personnels et partenaires '));

$pdf->SetTextColor(200,100,150);
$pdf->Text(160,10,utf8_decode('15'));
$pdf->Line(40,11,165,11);

$pdf->Ln();
$pdf->Ln();

$liste_lib=array(
'Personnels administratifs',
'Professeurs par discipline',
'Professeurs principaux',
'Membres du Conseil Intérieur',
'Membres du Conseil de discipline',
'Animateurs des C E',
'Membres du bureau des syndicats ',
'Autres
personnels : Secrétaires',
'Autres
personnels : nformaticiens /
Correspondant fichier',
'Autres
personnels : Gardiens',
'Autres
personnels : Laborantins',
'Autres
personnels : Archivistes',
'Autres
personnels : Documentalistes',
'Liste du bureau
des parents
d\'élèves de
l\'établissement'

);

$observation = array(
    'observation1',
     'observation2',
      'observation3',
       'observation4',
        'observation5',
         'observation6',
          'observation7',
           'observation8',
            'observation9',
             'observation10',
     'observation11',
      'observation12',
       'observation13',
        'observation14'
       
);

$total_liste =1;





//******************** */
 $pdf->SetFont('Arial','B',9);
 $pdf->SetTextColor(000,000,000);

 $tabl_test=new easyTable($pdf,15,'width:250;border:1;');
 // ligne 1
  $tabl_test->easyCell(utf8_decode('N°'), 'bgcolor:#b3ccff;rowspan:2;');
  $tabl_test->easyCell(utf8_decode('Libellé'), 'bgcolor:#b3ccff;colspan:5;rowspan:2;');
  $tabl_test->easyCell('EXISTENCE', 'bgcolor:#b3ccff;colspan:2;');
  $tabl_test->easyCell('Bien tenu', 'bgcolor:#b3ccff;colspan:3;');
  $tabl_test->easyCell(utf8_decode('Observations'), 'bgcolor:#b3ccff;colspan:3;rowspan:2;');
  $tabl_test->easyCell('note', 'bgcolor:#b3ccff;rowspan:2;');
  $tabl_test->printRow(); 

    //ligne 2
  $tabl_test->easyCell(utf8_decode('oui'), 'bgcolor:#b3ccff;');
  $tabl_test->easyCell(utf8_decode('non'), 'bgcolor:#b3ccff;');


  $tabl_test->easyCell(utf8_decode('oui'), 'bgcolor:#b3ccff;colspan:2;');
  $tabl_test->easyCell('non', 'bgcolor:#b3ccff;');

  $tabl_test->printRow(); 


 //ligne 3
 // $tabl_test->easyCell('Text 31', 'bgcolor:#b3ccff;');
 // $tabl_test->printRow(); 


 $tabl_test->endTable();


$pdf->SetFont('Arial','',10);                            
$tableF=new easyTable($pdf,'%{7,33,7,7,13,7,20,6}','align:R; l-margin:50; border:1; font-color:#000;font-size:10;');

//   $tableF->easyCell(utf8_decode('N°'), 'bgcolor:#b3ccff;'); 
//   $tableF->easyCell(utf8_decode("libellé"), 'bgcolor:#b3ccff;');
//   $tableF->easyCell(utf8_decode('oui'), 'bgcolor:#b3ccff;'); 
//   $tableF->easyCell(utf8_decode('non'), 'bgcolor:#b3ccff;');
//   $tableF->easyCell(utf8_decode('oui'), 'bgcolor:#b3ccff;');
//   $tableF->easyCell(utf8_decode('non'), 'bgcolor:#b3ccff;');
//   $tableF->easyCell(utf8_decode('observation'), 'bgcolor:#b3ccff;');
//   $tableF->easyCell(utf8_decode("note"), 'bgcolor:#b3ccff;');

//   $tableF->printRow();

  
  $pdf->SetFont('Arial','',10);

       for($i=0; $i<14; $i++)
 { 
     $pdf->SetFont('Arial','',10);
     $tableF->easyCell($i+1);
     $tableF->easyCell(utf8_decode($liste_lib[$i]));
     $tableF->easyCell('x');
     $tableF->easyCell('x');
     $tableF->easyCell('x');
     $tableF->easyCell('x');
     $tableF->easyCell(utf8_decode($observation[$i]));
     $tableF->easyCell('/'.$total_liste);
   
     $tableF->printRow();
 }

    $tableF->endTable();



//effectifs personnel administratif 
$pdf->SetFont('Arial','B',14);

$pdf->SetTextColor(000,000,000);

$pdf->Text(20,190,'D.');
$pdf->Text(40,190,utf8_decode('Effectifs personnels administratifs et de service'));

$pdf->SetTextColor(200,100,150);
$pdf->Text(160,190,utf8_decode('9,5'));
$pdf->Line(40,191,167,191);

$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();

$effectif_lib = array(
'Adjoint au DE',
'Personnel d\'éducation',
'Informaticien',
'Comptable',
'Secrétaires',
'Technicien de surface',
'Gardiens',
'Bibliothécaire',
'Bureau du Conseil Scolaire des
Elèves');

$observation = array(
    'observation1',
     'observation2',
      'observation3',
       'observation4',
        'observation5',
         'observation6',
          'observation7',
           'observation8',
            'observation9'
             
);

$effectif_h =array(
     '5',
      '5',
       '5',
        '5',
    '5',
     '5',
      '5',
       '5',
        '5'
  );

$effectif_f =array(
     '20',
      '20',
       '20',
        '20',
    '20',
     '20',
      '20',
       '20',
        '20'
 );

$effectif_t =array(
     '25',
      '25',
       '25',
        '25',
    '25',
     '25',
      '25',
       '25',
        '25'
   );


$total_effectif1 =0.5;
$total_effectif2 =1;



//******************** */
 $pdf->SetFont('Arial','B',9);
 $pdf->SetTextColor(000,000,000);

 $tabl_test=new easyTable($pdf,15,'width:250;border:1;');
 // ligne 1
  $tabl_test->easyCell(utf8_decode('N°'), 'bgcolor:#b3ccff;rowspan:2;');
  $tabl_test->easyCell(utf8_decode('Libellé'), 'bgcolor:#b3ccff;colspan:5;rowspan:2;');
  $tabl_test->easyCell('Effectifs', 'bgcolor:#b3ccff;colspan:3;');
  $tabl_test->easyCell('Autorisation MENA ', 'bgcolor:#b3ccff;colspan:2;');
  $tabl_test->easyCell(utf8_decode('Observations'), 'bgcolor:#b3ccff;colspan:3;rowspan:2;');
  $tabl_test->easyCell('note', 'bgcolor:#b3ccff;rowspan:2;');
  $tabl_test->printRow(); 

    //ligne 2
  $tabl_test->easyCell(utf8_decode('H'), 'bgcolor:#b3ccff;');
  $tabl_test->easyCell(utf8_decode('F'), 'bgcolor:#b3ccff;');
  $tabl_test->easyCell(utf8_decode('T'), 'bgcolor:#b3ccff;');


  $tabl_test->easyCell(utf8_decode('oui'), 'bgcolor:#b3ccff;');
  $tabl_test->easyCell('non', 'bgcolor:#b3ccff;');

  $tabl_test->printRow(); 


 //ligne 3
 // $tabl_test->easyCell('Text 31', 'bgcolor:#b3ccff;');
 // $tabl_test->printRow(); 


 $tabl_test->endTable();


$pdf->SetFont('Arial','',10);       

  $tableG=new easyTable($pdf,'%{7,33,7,6,7,7,7,20,6}','align:R; l-margin:50; border:1; font-color:#000;font-size:10;');

//   $tableG->easyCell(utf8_decode('N°'), 'bgcolor:#b3ccff;'); 
//   $tableG->easyCell(utf8_decode("libellé"), 'bgcolor:#b3ccff;');
//   $tableG->easyCell(utf8_decode('H'), 'bgcolor:#b3ccff;'); 
//   $tableG->easyCell(utf8_decode('F'), 'bgcolor:#b3ccff;');
//   $tableG->easyCell(utf8_decode('T'), 'bgcolor:#b3ccff;');
//   $tableG->easyCell(utf8_decode('oui'), 'bgcolor:#b3ccff;');
//   $tableG->easyCell(utf8_decode('non'), 'bgcolor:#b3ccff;');
//   $tableG->easyCell(utf8_decode('observation'), 'bgcolor:#b3ccff;');
//   $tableG->easyCell(utf8_decode("note"), 'bgcolor:#b3ccff;');

//   $tableG->printRow();



  $pdf->SetFont('Arial','',10);

       for($i=0; $i<9; $i++)
 { 
     $pdf->SetFont('Arial','',10);
     $tableG->easyCell($i+1);
     $tableG->easyCell(utf8_decode($effectif_lib[$i]));
     $tableG->easyCell($effectif_h[$i]);
     $tableG->easyCell($effectif_f[$i]);
     $tableG->easyCell($effectif_t[$i]);
     $tableG->easyCell('x');
     $tableG->easyCell('x');
     $tableG->easyCell(utf8_decode($observation[$i]));


  if($i<2){

     $tableG->easyCell('/'.$total_effectif1);

  }else{

     $tableG->easyCell('/'.$total_effectif2);

  }

     $tableG->printRow();
 }

    $tableG->endTable();

   

    // norme  

$pdf->AddPage('P','A4');
$pdf->SetFont('Arial','B',14);
$pdf->SetTextColor(000,000,000);

$pdf->Text(20,20,'E.');
$pdf->Text(90,20,utf8_decode('Respect des normes'));

$pdf->SetTextColor(200,100,150);
$pdf->Text(160,20,utf8_decode('4'));
$pdf->Line(90,21,165,21);

$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();


$norme_lib = array(
'Respect du ratio enseignants permanents supérieur ou égal à
2/3 et enseignants vacataires inférieur ou égal à 1/3',
'L\'enseignant vacataire fonctionnaire dispose d’une autorisation 
du DRENA/DDENA',
'Respect du ratio éducateur/élèves : un éducateur
pour 250 élèves. (voir DELC)',
'L\'établissement respecte le volume horaire affecté à chaque
discipline'
);


$observation = array(
    'observation1',
     'observation2',
      'observation3',
       'observation4'
       
);

$total_norme =1;


  $pdf->SetFont('Arial','B',10);                            
  $tableH=new easyTable($pdf,'%{5,58,7,8,15,7}','align:R; l-margin:50; border:1; font-color:#000;font-size:10;');

  $tableH->easyCell(utf8_decode('N°'), 'bgcolor:#b3ccff;'); 
  $tableH->easyCell(utf8_decode("Normes"), 'bgcolor:#b3ccff;');
  $tableH->easyCell(utf8_decode('OUI'), 'bgcolor:#b3ccff;'); 
  $tableH->easyCell(utf8_decode('NON'), 'bgcolor:#b3ccff;');
  $tableH->easyCell(utf8_decode('Observations'), 'bgcolor:#b3ccff;');
  $tableH->easyCell(utf8_decode("NOTE"), 'bgcolor:#b3ccff;');

  $tableH->printRow();


  $pdf->SetFont('Arial','',10);

       for($i=0; $i<4; $i++)
 { 
     $pdf->SetFont('Arial','',10);
     $tableH->easyCell($i+1);
     $tableH->easyCell(utf8_decode($norme_lib[$i]));
     $tableH->easyCell('x');
     $tableH->easyCell('x');
     $tableH->easyCell(utf8_decode($observation[$i]));
     $tableH->easyCell('/'.$total_norme);
   
     $tableH->printRow();
 }

    $tableH->endTable();



    // liste des eleves 

$pdf->SetFont('Arial','B',14);
$pdf->SetTextColor(000,000,000);

$pdf->Text(20,95,'F.');
$pdf->Text(90,95,utf8_decode('Listes des élèves'));

$pdf->SetTextColor(200,100,150);
$pdf->Text(160,95,utf8_decode('8'));
$pdf->Line(90,96,165,96);

$pdf->Ln();
$pdf->Ln();
$pdf->Ln();

$eleve_lib=array(
'Liste des élèves par classe (âge, statut,
sexe, matricule, nationalité)',
'Responsables des délégués des classes',
'Responsables des clubs et associations',
'Responsables des coopératives'
);

$observation = array(
    'observation1',
     'observation2',
      'observation3',
       'observation4'
       
);

$total_eleve =2;


//******************** */
 $pdf->SetFont('Arial','B',9);
 $pdf->SetTextColor(000,000,000);

 $tabl_test=new easyTable($pdf,15,'width:250;border:1;');
 // ligne 1
  $tabl_test->easyCell(utf8_decode('N°'), 'bgcolor:#b3ccff;rowspan:2;');
  $tabl_test->easyCell(utf8_decode('Libellé'), 'bgcolor:#b3ccff;colspan:5;rowspan:2;');
  $tabl_test->easyCell('EXISTENCE', 'bgcolor:#b3ccff;colspan:2;');
  $tabl_test->easyCell('Bien tenu', 'bgcolor:#b3ccff;colspan:3;');
  $tabl_test->easyCell(utf8_decode('Observations'), 'bgcolor:#b3ccff;colspan:3;rowspan:2;');
  $tabl_test->easyCell('note', 'bgcolor:#b3ccff;rowspan:2;');
  $tabl_test->printRow(); 

    //ligne 2
  $tabl_test->easyCell(utf8_decode('oui'), 'bgcolor:#b3ccff;');
  $tabl_test->easyCell(utf8_decode('non'), 'bgcolor:#b3ccff;');


  $tabl_test->easyCell(utf8_decode('oui'), 'bgcolor:#b3ccff;colspan:2;');
  $tabl_test->easyCell('non', 'bgcolor:#b3ccff;');

  $tabl_test->printRow(); 


 //ligne 3
 // $tabl_test->easyCell('Text 31', 'bgcolor:#b3ccff;');
 // $tabl_test->printRow(); 


 $tabl_test->endTable();


$pdf->SetFont('Arial','',10); 
                                                      
$tableI=new easyTable($pdf,'%{7,33,7,7,13,7,20,6}','align:R; l-margin:50; border:1; font-color:#000;font-size:10;');

//   $tableI->easyCell(utf8_decode('N°'), 'bgcolor:#b3ccff;'); 
//   $tableI->easyCell(utf8_decode("libellé"), 'bgcolor:#b3ccff;');
//   $tableI->easyCell(utf8_decode('oui'), 'bgcolor:#b3ccff;'); 
//   $tableI->easyCell(utf8_decode('non'), 'bgcolor:#b3ccff;');
//   $tableI->easyCell(utf8_decode('oui'), 'bgcolor:#b3ccff;');
//   $tableI->easyCell(utf8_decode('non'), 'bgcolor:#b3ccff;');
//   $tableI->easyCell(utf8_decode('observation'), 'bgcolor:#b3ccff;');
//   $tableI->easyCell(utf8_decode("note"), 'bgcolor:#b3ccff;');

//   $tableI->printRow();



  $pdf->SetFont('Arial','',10);

       for($i=0; $i<4; $i++)
 { 
     $pdf->SetFont('Arial','',10);
     $tableI->easyCell($i+1);
     $tableI->easyCell(utf8_decode($eleve_lib[$i]));
     $tableI->easyCell('x');
     $tableI->easyCell('x');
     $tableI->easyCell('x');
     $tableI->easyCell('x');
     $tableI->easyCell(utf8_decode($observation[$i]));
     $tableI->easyCell('/'.$total_eleve);
   
     $tableI->printRow();
 }

    $tableI->endTable();


    // GESTION FINANCIERE

$pdf->SetFont('Arial','B',14);
$pdf->SetTextColor(000,000,000);

$pdf->Text(20,155,'V-1');
$pdf->Text(90,155,utf8_decode('GESTION FINANCIERE'));

$pdf->SetTextColor(200,100,150);
$pdf->Text(160,155,utf8_decode('7'));
$pdf->Line(90,156,165,156);

$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();


$finance_lib=array(
'Le personnel est
déclaré à la CNPS ',
'L\'établissement
applique le seuil des
frais annexes fixés par
l\'Etat (arrêté N°… )',
'L\'établissement assure
le paiement des
salaires selon la
convention en vigueur'
);

$observation = array(
    'observation1',
     'observation2',
      'observation3'
       
);

$source = array(
    'source1',
     'source2',
      'source3'
        
);

$total_finance =1;



//******************** */
 $pdf->SetFont('Arial','B',9);
 $pdf->SetTextColor(000,000,000);

 $tabl_test=new easyTable($pdf,15,'width:250;border:1;');
 // ligne 1
  $tabl_test->easyCell(utf8_decode('N°'), 'bgcolor:#b3ccff;rowspan:2;');

  $tabl_test->easyCell(utf8_decode('Libellé'), 'bgcolor:#b3ccff;colspan:5;rowspan:2;');

  $tabl_test->easyCell('EXISTE', 'bgcolor:#b3ccff;colspan:2;');

  $tabl_test->easyCell(utf8_decode('Source de vérification'), 'bgcolor:#b3ccff;colspan:3;');
  $tabl_test->easyCell(utf8_decode('Observations'), 'bgcolor:#b3ccff;colspan:3;');
  $tabl_test->easyCell('note', 'bgcolor:#b3ccff;');
  $tabl_test->printRow(); 

    //ligne 2
  $tabl_test->easyCell(utf8_decode('oui'), 'bgcolor:#b3ccff;');
  $tabl_test->easyCell(utf8_decode('non'), 'bgcolor:#b3ccff;');


  $tabl_test->easyCell(utf8_decode(''), 'bgcolor:#b3ccff;colspan:3;');
  $tabl_test->easyCell(utf8_decode(''), 'bgcolor:#b3ccff;colspan:3;');
  $tabl_test->easyCell(utf8_decode(''), 'bgcolor:#b3ccff;');


  $tabl_test->printRow(); 


 //ligne 3
 // $tabl_test->easyCell('Text 31', 'bgcolor:#b3ccff;');
 // $tabl_test->printRow(); 


 $tabl_test->endTable();


$pdf->SetFont('Arial','',10);                          
$tableJ=new easyTable($pdf,'%{6,34,7,7,19,21,6}','align:R; l-margin:50; border:1; font-color:#000;font-size:10;');

//   $tableJ->easyCell(utf8_decode('N°'), 'bgcolor:#b3ccff;'); 
//   $tableJ->easyCell(utf8_decode("libellé"), 'bgcolor:#b3ccff;');
//   $tableJ->easyCell(utf8_decode('oui'), 'bgcolor:#b3ccff;'); 
//   $tableJ->easyCell(utf8_decode('non'), 'bgcolor:#b3ccff;');
//   $tableJ->easyCell(utf8_decode('Source de vérification'), 'bgcolor:#b3ccff;');
//   $tableJ->easyCell(utf8_decode('observations'), 'bgcolor:#b3ccff;');
//   $tableJ->easyCell(utf8_decode("NOTE"), 'bgcolor:#b3ccff;');

//   $tableJ->printRow();



  $pdf->SetFont('Arial','',10);

       for($i=0; $i<3; $i++)
 { 
     $pdf->SetFont('Arial','',10);
     $tableJ->easyCell($i+1);
     $tableJ->easyCell(utf8_decode($eleve_lib[$i]));
     $tableJ->easyCell('x');
     $tableJ->easyCell('x');
     $tableJ->easyCell(utf8_decode($source[$i]));
     $tableJ->easyCell(utf8_decode($observation[$i]));
     $tableJ->easyCell('/'.$total_finance);
   
     $tableJ->printRow();
 }

    $tableJ->endTable();




// FREQUENCE ( new )

$pdf->SetFont('Arial','B',14);
$pdf->SetTextColor(000,000,000);

$pdf->Text(20,215,'V-2');
$pdf->Text(90,215,utf8_decode('frequence'));

$pdf->SetTextColor(200,100,150);
$pdf->Text(120,215,utf8_decode('4'));
$pdf->Line(90,216,123,216);

$pdf->Ln();
$pdf->Ln();


$observation = array(
    'observation1',     
);


$total_frequence =4;

$pdf->SetFont('Arial','B',10);                            
$tableK=new easyTable($pdf,'%{5,35,8,9,8,8,20,7}','align:R; l-margin:50; border:1; font-color:#000;font-size:10;');

  $tableK->easyCell(utf8_decode('N°'), 'bgcolor:#b3ccff;'); 
  $tableK->easyCell(utf8_decode("libellé"), 'bgcolor:#b3ccff;');
  $tableK->easyCell(utf8_decode('Plus de 3 mois'), 'bgcolor:#b3ccff;'); 
  $tableK->easyCell(utf8_decode('3 mois'), 'bgcolor:#b3ccff;');
  $tableK->easyCell(utf8_decode('2 mois'), 'bgcolor:#b3ccff;');
  $tableK->easyCell(utf8_decode('chaque mois'), 'bgcolor:#b3ccff;');
  $tableK->easyCell(utf8_decode('Observations'), 'bgcolor:#b3ccff;');
  $tableK->easyCell(utf8_decode("NOTE"), 'bgcolor:#b3ccff;');

  $tableK->printRow();


 $pdf->SetFont('Arial','',10);
 $tableK->easyCell($i+1);
 $tableK->easyCell(utf8_decode("Fréquence à laquelle l\'établissement paye les salaires des enseignants"));
 $tableK->easyCell('x');
 $tableK->easyCell('x');
 $tableK->easyCell('x');
 $tableK->easyCell('x');
 $tableK->easyCell(utf8_decode($observation[0]));
 $tableK->easyCell('/'.$total_frequence);

 $tableK->printRow();
 $tableK->endTable();



$pdf->AddPage('P','A4');
$pdf->SetFont('Arial','B',14);
$pdf->SetTextColor(000,000,000);

$pdf->Text(20,20,'VI-');
$pdf->Text(90,20,utf8_decode('GESTION PEDAGOGIQUE'));

$pdf->SetTextColor(200,100,150);
$pdf->Text(160,20,utf8_decode('167'));
$pdf->Line(90,21,167,21);


$pdf->SetFont('Arial','B',14);
$pdf->SetTextColor(000,000,000);

$pdf->Text(30,40,'1.');
$pdf->Text(40,40,utf8_decode('Pyramide de l\'établissement et effectifs élèves'));
$pdf->SetTextColor(200,100,150);
$pdf->Text(160,40,utf8_decode('15'));
$pdf->Line(40,41,165,41);

$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();


//----------------  ANGULAR, 20
//---------------- PHP,orienté objet 
//google cloud
// amazon web service 
//15 
//VPS 

$pyramide_lib = array(
    '6ème',
    '5ème',
    '4ème',
    '3ème',
    'Total 1er
     cycle',
     '2A',
     '2C',
     '1A',
     '1C',
     '1D',
     'TA',
     'TC',
     'TD',
     'Total
      2ème
      cycle',
      'TOTAL
      GENERAL'
);

$pyramide = array('123','100','200','210','300','111','222','220','342','301','120','130','290','123','342');

$effectif_garcon=array('30','30','30','30','30','30','30','30','30','30','30','30','30','30','30');
$effectif_fille=array('5','5','5','5','5','5','5','5','5','5','5','5','5','5','5','5','5','5','5','5','5');
$effectif_total= array('15','15','15','15','15','15','15','15','15','15','15','15','15','15','15','15','15','15','15');

$redouble_garcon=array('20','20','20','20','20','20','20','20','20','20','20','20','20','20','20');
$redouble_fille=array('5','5','5','5','5','5','5','5','5','5','5','5','5','5','5','5','5','5','5','5','5');
$redouble_total= array('25','25','25','25','25','25','25','25','25','25','25','25','25','25','25');

$affecte_garcon=array('10','10','10','10','10','10','10','10','10','10','10','10','10','10','10','10');
$affecte_fille=array('3','3','3','3','3','3','3','3','3','3','3','3','3','3','3','3','3');
$affecte_total= array('13','13','13','13','13','13','13','13','13','13','13','13','13','13','13','13');

$source=array('source1','source2','source3','source4','source5','source6','source7','source8','source9',
'source10','source11','source12','source13','source14','source15');

$total_pyra1 = 1;
$total_pyra2 = 1;
$total_pyra3 = 1;




//******************** */
 $pdf->SetFont('Arial','B',9);
 $pdf->SetTextColor(000,000,000);

 $tabl_test=new easyTable($pdf,20,'width:250;border:1;');
 // ligne 1     3 3 3 1 3 1 3 1 2
  $tabl_test->easyCell(utf8_decode('Niveau'), 'bgcolor:#b3ccff;rowspan:2;colspan:3;');
  $tabl_test->easyCell(utf8_decode('Pyramides'), 'bgcolor:#b3ccff;colspan:3;rowspan:2;');
  $tabl_test->easyCell('Effectifs', 'bgcolor:#b3ccff;colspan:3;');
  $tabl_test->easyCell('note', 'bgcolor:#b3ccff;rowspan:2;');
  $tabl_test->easyCell('Redoublants', 'bgcolor:#b3ccff;colspan:3;');
  $tabl_test->easyCell('note', 'bgcolor:#b3ccff;rowspan:2;');
  $tabl_test->easyCell(utf8_decode('Affectés'), 'bgcolor:#b3ccff;colspan:3;');
  $tabl_test->easyCell('note', 'bgcolor:#b3ccff;rowspan:2;');
  $tabl_test->easyCell(utf8_decode('Source de vérification'), 'bgcolor:#b3ccff;colspan:2;rowspan:2;');
  $tabl_test->printRow(); 

    //ligne 2  1 1 1   1 1 1  1 1 1  

  $tabl_test->easyCell(utf8_decode('G'), 'bgcolor:#b3ccff;');
  $tabl_test->easyCell(utf8_decode('F'), 'bgcolor:#b3ccff;');
  $tabl_test->easyCell(utf8_decode('T'), 'bgcolor:#b3ccff;');

  $tabl_test->easyCell(utf8_decode('G'), 'bgcolor:#b3ccff;');
  $tabl_test->easyCell(utf8_decode('F'), 'bgcolor:#b3ccff;');
  $tabl_test->easyCell(utf8_decode('T'), 'bgcolor:#b3ccff;');

  $tabl_test->easyCell(utf8_decode('G'), 'bgcolor:#b3ccff;');
  $tabl_test->easyCell(utf8_decode('F'), 'bgcolor:#b3ccff;');
  $tabl_test->easyCell(utf8_decode('T'), 'bgcolor:#b3ccff;');

  $tabl_test->printRow(); 


 //ligne 3
 // $tabl_test->easyCell('Text 31', 'bgcolor:#b3ccff;');
 // $tabl_test->printRow(); 


 $tabl_test->endTable();


$pdf->SetFont('Arial','',10);     

                           
 $tableL=new easyTable($pdf,'%{15,15,5,5,5,5,5,5,5,5,5,5,5,5,10}','align:R; l-margin:50; border:1; font-color:#000;font-size:10;');

//  $tableL->easyCell(utf8_decode("Niveau"), 'bgcolor:#b3ccff;');
//  $tableL->easyCell(utf8_decode("Pyramides"), 'bgcolor:#b3ccff;'); 
//  $tableL->easyCell(utf8_decode('G'), 'bgcolor:#b3ccff;');
//  $tableL->easyCell(utf8_decode('F'), 'bgcolor:#b3ccff;');
//  $tableL->easyCell(utf8_decode('T'), 'bgcolor:#b3ccff;');
//  $tableL->easyCell(utf8_decode("NOTE"), 'bgcolor:#b3ccff;');
//  $tableL->easyCell(utf8_decode('G'), 'bgcolor:#b3ccff;');
//  $tableL->easyCell(utf8_decode('F'), 'bgcolor:#b3ccff;');
//  $tableL->easyCell(utf8_decode('T'), 'bgcolor:#b3ccff;');
//  $tableL->easyCell(utf8_decode("NOTE"), 'bgcolor:#b3ccff;');
//  $tableL->easyCell(utf8_decode('G'), 'bgcolor:#b3ccff;');
//  $tableL->easyCell(utf8_decode('F'), 'bgcolor:#b3ccff;');
//  $tableL->easyCell(utf8_decode('T'), 'bgcolor:#b3ccff;');
//  $tableL->easyCell(utf8_decode("NOTE"), 'bgcolor:#b3ccff;');
//  $tableL->easyCell(utf8_decode('SOURCE DE VERIFICATION'), 'bgcolor:#b3ccff;');
//  $tableL->printRow();


    for($i=0; $i<15; $i++)
 { 
     $pdf->SetFont('Arial','',10);
     $tableL->easyCell(utf8_decode($pyramide_lib[$i]));
     $tableL->easyCell($pyramide[$i]);

     $tableL->easyCell(utf8_decode($effectif_garcon[$i]));
     $tableL->easyCell(utf8_decode($effectif_fille[$i]));
     $tableL->easyCell(utf8_decode($effectif_total[$i]));

          $tableL->easyCell('/'.$total_pyra1);

     $tableL->easyCell(utf8_decode($redouble_garcon[$i]));
     $tableL->easyCell(utf8_decode($redouble_fille[$i]));
     $tableL->easyCell(utf8_decode($redouble_total[$i]));

          $tableL->easyCell('/'.$total_pyra2);

     $tableL->easyCell(utf8_decode($affecte_garcon[$i]));
     $tableL->easyCell(utf8_decode($affecte_fille[$i]));
     $tableL->easyCell(utf8_decode($affecte_total[$i]));

          $tableL->easyCell('/'.$total_pyra3);

     $tableL->easyCell($source[$i]);
   

     $tableL->printRow();
 }

    $tableL->endTable();

//------------------effectifs des enseignants 


$pdf->SetFont('Arial','B',14);
$pdf->SetTextColor(000,000,000);

$pdf->Text(30,180,'2.');
$pdf->Text(40,180,utf8_decode('Effectifs des enseignants'));
$pdf->SetTextColor(200,100,150);
$pdf->Text(160,180,utf8_decode('26'));
$pdf->Line(40,181,165,181);

$pdf->Ln();
$pdf->Ln();
$pdf->Ln();

$pdf->SetFont('Arial','',9);  
$discipline_lib=array(
    'All',
    'Angl',
    'Art.Plast',
    'EDHC',
    'Edu.Mus',
    'EPS',
    'Esp',
    'Hist-Géo',
    'Français',
    'Maths',
    'Philo',
    'SP',
    'SVT',
    'Total'
);

$per_effectif_H=array('30','30','30','30','30','30','30','30','30','30','30','30','30','30','30');
$per_effectif_f=array('5','5','5','5','5','5','5','5','5','5','5','5','5','5','5','5','5','5','5','5','5');
$per_effectif_t= array('15','15','15','15','15','15','15','15','15','15','15','15','15','15','15','15','15','15','15');

$va_effectif_H=array('30','30','30','30','30','30','30','30','30','30','30','30','30','30','30');
$va_effectif_f=array('5','5','5','5','5','5','5','5','5','5','5','5','5','5','5','5','5','5','5','5','5');
$va_effectif_t= array('15','15','15','15','15','15','15','15','15','15','15','15','15','15','15','15','15','15','15');

$va_fonc_effectif_H=array('30','30','30','30','30','30','30','30','30','30','30','30','30','30','30');
$va_fonc_effectif_f=array('5','5','5','5','5','5','5','5','5','5','5','5','5','5','5','5','5','5','5','5','5');
$va_fonc_effectif_t= array('15','15','15','15','15','15','15','15','15','15','15','15','15','15','15','15','15','15','15');


$total_h=array('10','10','10','10','10','10','10','10','10','10','10','10','10','10','10','10');
$total_f=array('3','3','3','3','3','3','3','3','3','3','3','3','3','3','3','3','3');
$total_t= array('13','13','13','13','13','13','13','13','13','13','13','13','13','13','13','13');


$obs_ens=array('obs1','obs2','obs3','obs4','obs5','obs6','obs7','obs8','obs9',
'obs10','obs11','obs12','obs13','obs14','obs15');


$total_ens1 = 1;
$total_ens2 = 1;




//******************** */
 $pdf->SetFont('Arial','B',9);
 $pdf->SetTextColor(000,000,000);

 $tabl_test=new easyTable($pdf,22,'width:250;border:1;');

 // ligne 1     2 6 8 3 2  1 
  $tabl_test->easyCell(utf8_decode('Discipline'), 'bgcolor:#b3ccff;rowspan:3;colspan:2;');
  $tabl_test->easyCell(utf8_decode('PERMANENTS'), 'bgcolor:#b3ccff;colspan:6;');
  $tabl_test->easyCell(utf8_decode('VACATAIRES'), 'bgcolor:#b3ccff;colspan:8;');
  $tabl_test->easyCell(utf8_decode('TOTAL'), 'bgcolor:#b3ccff;rowspan:2;colspan:3;');
  $tabl_test->easyCell('OBSERVATIONS ', 'bgcolor:#b3ccff;colspan:2;rowspan:3;');
  $tabl_test->easyCell('note', 'bgcolor:#b3ccff;rowspan:3;');

  $tabl_test->printRow(); 

    //ligne 2     3 2 1   3 2 3  

  $tabl_test->easyCell('Effectifs', 'bgcolor:#b3ccff;colspan:3;');
  $tabl_test->easyCell(utf8_decode('Autorisat° MENA'), 'bgcolor:#b3ccff;colspan:2;');
  $tabl_test->easyCell(utf8_decode('note'), 'bgcolor:#b3ccff;rowspan:2;');

  $tabl_test->easyCell('Effectifs', 'bgcolor:#b3ccff;colspan:3;');
  $tabl_test->easyCell('Autor. MENA ', 'bgcolor:#b3ccff;colspan:2;');
  $tabl_test->easyCell('FONCTIONNAIRES', 'bgcolor:#b3ccff;colspan:3;');

  $tabl_test->printRow(); 


 //ligne 3   16 UNIQUE 

  $tabl_test->easyCell(utf8_decode('H'), 'bgcolor:#b3ccff;');
  $tabl_test->easyCell(utf8_decode('F'), 'bgcolor:#b3ccff;');
  $tabl_test->easyCell(utf8_decode('T'), 'bgcolor:#b3ccff;');

  $tabl_test->easyCell(utf8_decode('oui'), 'bgcolor:#b3ccff;');
  $tabl_test->easyCell(utf8_decode('non'), 'bgcolor:#b3ccff;');

  $tabl_test->easyCell(utf8_decode('H'), 'bgcolor:#b3ccff;');
  $tabl_test->easyCell(utf8_decode('F'), 'bgcolor:#b3ccff;');
  $tabl_test->easyCell(utf8_decode('T'), 'bgcolor:#b3ccff;');


  $tabl_test->easyCell(utf8_decode('oui'), 'bgcolor:#b3ccff;');
  $tabl_test->easyCell(utf8_decode('non'), 'bgcolor:#b3ccff;');

  $tabl_test->easyCell(utf8_decode('H'), 'bgcolor:#b3ccff;');
  $tabl_test->easyCell(utf8_decode('F'), 'bgcolor:#b3ccff;');
  $tabl_test->easyCell(utf8_decode('T'), 'bgcolor:#b3ccff;');

  $tabl_test->easyCell(utf8_decode('H'), 'bgcolor:#b3ccff;');
  $tabl_test->easyCell(utf8_decode('F'), 'bgcolor:#b3ccff;');
  $tabl_test->easyCell(utf8_decode('T'), 'bgcolor:#b3ccff;');



  $tabl_test->printRow(); 


  $tabl_test->endTable();


$pdf->SetFont('Arial','',10);     

 $tableM=new easyTable($pdf,'%{9,5,4,5, 4,5,4, 5,4,5, 4,5,  5,4,5,  5,4,5,9,4}','align:R; l-margin:50; border:1; font-color:#000;font-size:10;');
 
//  $tableM->easyCell(utf8_decode("Discipline"), 'bgcolor:#b3ccff;');
//  $tableM->easyCell(utf8_decode('H'), 'bgcolor:#b3ccff;');
//  $tableM->easyCell(utf8_decode('F'), 'bgcolor:#b3ccff;');
//  $tableM->easyCell(utf8_decode('T'), 'bgcolor:#b3ccff;');
//  $tableM->easyCell(utf8_decode('Oui'), 'bgcolor:#b3ccff;');
//  $tableM->easyCell(utf8_decode('Non'), 'bgcolor:#b3ccff;');
//  $tableM->easyCell(utf8_decode("NOTE"), 'bgcolor:#b3ccff;');

//  $tableM->easyCell(utf8_decode('H'), 'bgcolor:#b3ccff;');
//  $tableM->easyCell(utf8_decode('F'), 'bgcolor:#b3ccff;');
//  $tableM->easyCell(utf8_decode('T'), 'bgcolor:#b3ccff;');
//  $tableM->easyCell(utf8_decode('Oui'), 'bgcolor:#b3ccff;');
//  $tableM->easyCell(utf8_decode('Non'), 'bgcolor:#b3ccff;');

//  $tableM->easyCell(utf8_decode('H'), 'bgcolor:#b3ccff;');
//  $tableM->easyCell(utf8_decode('F'), 'bgcolor:#b3ccff;');
//  $tableM->easyCell(utf8_decode('T'), 'bgcolor:#b3ccff;');

//  $tableM->easyCell(utf8_decode('H'), 'bgcolor:#b3ccff;');
//  $tableM->easyCell(utf8_decode('F'), 'bgcolor:#b3ccff;');
//  $tableM->easyCell(utf8_decode('T'), 'bgcolor:#b3ccff;');

 //$tableM->easyCell(utf8_decode("NOTE"), 'bgcolor:#b3ccff;');

//  $tableM->easyCell(utf8_decode("OBS"), 'bgcolor:#b3ccff;');
//  $tableM->easyCell(utf8_decode('NOTE'), 'bgcolor:#b3ccff;');

 $tableM->printRow();



    for($i=0; $i<14; $i++)
 { 
     $pdf->SetFont('Arial','',10);
     $tableM->easyCell(utf8_decode($discipline_lib[$i]));

     $tableM->easyCell(utf8_decode($per_effectif_H[$i]));
     $tableM->easyCell(utf8_decode($per_effectif_f[$i]));
     $tableM->easyCell(utf8_decode($per_effectif_t[$i]));
     $tableM->easyCell(utf8_decode('X'));
     $tableM->easyCell(utf8_decode('X'));
     $tableM->easyCell('/'.$total_ens1);
     $tableM->easyCell(utf8_decode($va_effectif_H[$i]));
     $tableM->easyCell(utf8_decode($va_effectif_f[$i]));
     $tableM->easyCell(utf8_decode($va_effectif_t[$i]));
     $tableM->easyCell(utf8_decode('X'));
     $tableM->easyCell(utf8_decode('X'));
     $tableM->easyCell(utf8_decode($va_fonc_effectif_H[$i]));
     $tableM->easyCell(utf8_decode($va_fonc_effectif_f[$i]));
     $tableM->easyCell(utf8_decode($va_fonc_effectif_t[$i]));
     $tableM->easyCell(utf8_decode($total_h[$i]));
     $tableM->easyCell(utf8_decode($total_f[$i]));
     $tableM->easyCell(utf8_decode($total_t[$i]));
     $tableM->easyCell($obs_ens[$i]);
     $tableM->easyCell('/'.$total_ens2);
     $tableM->printRow();
 }

    $tableM->endTable();


//-----------Les enseignements-------
//--------Auxiliaires pédagogiques 

$pdf->SetFont('Arial','B',14);
$pdf->SetTextColor(000,000,000);

$pdf->Text(30,35,'3.');
$pdf->Text(40,35,utf8_decode('Les enseignements'));
//$pdf->Text(160,180,utf8_decode('26'));
$pdf->Line(40,36,86,36);

$pdf->Text(35,45,'a)');
$pdf->Text(40,45,utf8_decode('Auxiliaires pédagogiques'));
$pdf->SetTextColor(200,100,150);
$pdf->Text(120,45,utf8_decode('21'));
$pdf->Line(40,46,124,46);

$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();


$auxiliaire_lib=array(
    'Emplois du temps
     professeurs ',
    'Emplois du temps classe',
    'ableau récapitulatif
    des volumes horaires ',
    'Tableaux des devoirs de
     niveau ',
    'Calendrier des Examens
     blancs ',
    'Progressions',
    'Cahiers de textes',
    'Cahiers d’appel ',
    'Cahiers de notes',
    'Livrets scolaires ',
    'Rythme des visas des
    documents par le DE ',
);


$obs_aux=array('observation1','observation2','observation3','observation4','observation5','observation6','observation7','observation8','observation9',
'observation','observation','observation','observation','observation','observation');

$total_aux1 = 1;
$total_aux2 = 2;
$total_aux3 = 3;


//******************** */
 $pdf->SetFont('Arial','B',9);
 $pdf->SetTextColor(000,000,000);

 $tabl_test=new easyTable($pdf,16,'width:250;border:1;');
 // ligne 1    1 5 2 2 2 1

  $tabl_test->easyCell(utf8_decode('N°'), 'bgcolor:#b3ccff;rowspan:2;');
  $tabl_test->easyCell(utf8_decode('Libellé'), 'bgcolor:#b3ccff;colspan:5;rowspan:2;');
  $tabl_test->easyCell('Existe', 'bgcolor:#b3ccff;colspan:2;');
  $tabl_test->easyCell('A jour ', 'bgcolor:#b3ccff;colspan:2;');
  $tabl_test->easyCell('Visa du DE', 'bgcolor:#b3ccff;colspan:2;');
  $tabl_test->easyCell(utf8_decode('Observations'), 'bgcolor:#b3ccff;colspan:3;rowspan:2;');
  $tabl_test->easyCell(utf8_decode('NOTE'), 'bgcolor:#b3ccff;rowspan:2;');
  $tabl_test->printRow(); 

    //ligne 2  111 111
  $tabl_test->easyCell(utf8_decode('oui'), 'bgcolor:#b3ccff;');
  $tabl_test->easyCell(utf8_decode('non'), 'bgcolor:#b3ccff;');
  $tabl_test->easyCell(utf8_decode('oui'), 'bgcolor:#b3ccff;');
  $tabl_test->easyCell(utf8_decode('non'), 'bgcolor:#b3ccff;');
  $tabl_test->easyCell(utf8_decode('oui'), 'bgcolor:#b3ccff;');
  $tabl_test->easyCell(utf8_decode('non'), 'bgcolor:#b3ccff;');

  $tabl_test->printRow(); 

 //ligne 3
 // $tabl_test->easyCell('Text 31', 'bgcolor:#b3ccff;');
 // $tabl_test->printRow(); 

$tabl_test->endTable();
$pdf->SetFont('Arial','',10);  
  
$tableN=new easyTable($pdf,'%{7,31,6,6, 6,7, 6,6,19,6}','align:R; l-margin:50; border:1; font-color:#000');

// $tableN->easyCell(utf8_decode('N°'), 'bgcolor:#b3ccff;'); 
// $tableN->easyCell(utf8_decode("libellé"), 'bgcolor:#b3ccff;');

// $tableN->easyCell('oui', 'bgcolor:#b3ccff;'); 
// $tableN->easyCell(utf8_decode('non'), 'bgcolor:#b3ccff;');

// $tableN->easyCell('oui', 'bgcolor:#b3ccff;'); 
// $tableN->easyCell(utf8_decode('non'), 'bgcolor:#b3ccff;');

// $tableN->easyCell('oui', 'bgcolor:#b3ccff;'); 
// $tableN->easyCell(utf8_decode('non'), 'bgcolor:#b3ccff;');

// $tableN->easyCell('Observations', 'bgcolor:#b3ccff;'); 
// $tableN->easyCell(utf8_decode("NOTE"), 'bgcolor:#b3ccff;');

//$tableN->printRow();


  $pdf->SetFont('Arial','',10);

       for($i=0; $i<11; $i++)
 { 
     $pdf->SetFont('Arial','',10);
     $tableN->easyCell($i+1);
     $tableN->easyCell(utf8_decode($auxiliaire_lib[$i]));

     $tableN->easyCell('x');
     $tableN->easyCell('x');

     $tableN->easyCell('x');
     $tableN->easyCell('x');

     $tableN->easyCell('x');
     $tableN->easyCell('x');
     
     $tableN->easyCell(utf8_decode($obs_aux[$i]));

     if($i<5){
     $tableN->easyCell('/'.$total_aux1);
     }else if ($i==5){

     $tableN->easyCell('/'.$total_aux2);
      
     }else if($i>5&&$i<10){

     $tableN->easyCell('/'.$total_aux3);

     }else {

    $tableN->easyCell('/'.$total_aux2);

     }

     $tableN->printRow();
 }

    $tableN->endTable();


//------------- tableau /mois   / trim 

//----------------Les activités pédagogiques---   OK
$pdf->SetTextColor(000,000,000);
$pdf->SetFont('Arial','B',14);

$pdf->Text(35,190,'b)');
$pdf->Text(40,190,utf8_decode('Les activités pédagogiques'));
$pdf->SetTextColor(200,100,150);
$pdf->Text(120,190,utf8_decode('7'));
$pdf->Line(40,191,121,191);
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();


$activite_lib=array(
    'Visites de classes initiées par le DE',
    'Visites de classes initiées par l\'APFC',
    'Classes ouvertes initiées par l\'APFC',
    'Ateliers/séminaires de formation',
    'Examens blancs régionaux',
    'CE/UP'
);

$source_activite = array(
 'source1',
 'source2',
 'source3',
 'source4',
 'source5',
 'source6'
);

$obs_activite=array(
'observation1',
'observation2',
'observation3',
'observation4',
'observation5',
'observation6'
);

$total_activite1 =1;
$total_activite2 =2;


$pdf->SetFont('Arial','B',10);                            
$tableO=new easyTable($pdf,'%{5,35,8,9,13,23,7}','align:R; l-margin:50; border:1; font-color:#000;font-size:10;');
$tableO->easyCell(utf8_decode('N°'), 'bgcolor:#b3ccff;'); 
$tableO->easyCell(utf8_decode("libellé"), 'bgcolor:#b3ccff;');
$tableO->easyCell(utf8_decode('oui'), 'bgcolor:#b3ccff;'); 
$tableO->easyCell(utf8_decode('non'), 'bgcolor:#b3ccff;');
$tableO->easyCell(utf8_decode('Source de vérification'), 'bgcolor:#b3ccff;');
$tableO->easyCell(utf8_decode('observations'), 'bgcolor:#b3ccff;');
$tableO->easyCell(utf8_decode("NOTE"), 'bgcolor:#b3ccff;');
$tableO->printRow();



  $pdf->SetFont('Arial','',10);

       for($i=0; $i<6; $i++)
 { 
     $pdf->SetFont('Arial','',10);
     $tableO->easyCell($i+1);
     $tableO->easyCell(utf8_decode($activite_lib[$i]));
     $tableO->easyCell('x');
     $tableO->easyCell('x');

     $tableO->easyCell(utf8_decode($source_activite[$i]));
     $tableO->easyCell(utf8_decode($obs_activite[$i]));

    if($i<3 || $i>3){
    $tableO->easyCell('/'.$total_activite1);
    }else if($i==3){
    $tableO->easyCell('/'.$total_activite2);
    }
     $tableO->printRow();
 }
    $tableO->endTable();

//-------------Taux d’exécution des programmes  OK

$pdf->AddPage('P','A4');
$pdf->SetFont('Arial','B',14);
$pdf->SetTextColor(000,000,000);

$pdf->Text(20,20,'c)');

$pdf->Text(30,20,utf8_decode('Taux d\'exécution des programmes% '));

$pdf->SetTextColor(200,100,150);
$pdf->Text(160,20,utf8_decode('39'));
$pdf->Line(30,21,165,21);

$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();


$discipline_lib=array(
    'All',
    'Angl',
    'Art.Plast',
    'EDHC',
    'Edu.Mus',
    'EPS',
    'Esp',
    'Hist-Géo',
    'Français',
    'Maths',
    'Philo',
    'SP',
    'SVT'
);



$sixieme =array(
'10',
'12',
'13',
'13',
'10',
'11',
'12',
'14',
'18',
'11',
'16',
'13',
'19'
);



$cinquieme =array(
'11',
'12',
'13',
'13',
'10',
'11',
'12',
'14',
'18',
'11',
'16',
'13',
'19'

);

$quatrieme = array(
'10',
'12',
'13',
'13',
'10',
'11',
'12',
'14',
'18',
'11',
'16',
'13',
'19'
);

$troisieme =array(
'10',
'12',
'13',
'13',
'10',
'11',
'12',
'14',
'18',
'11',
'16',
'13',
'19'
);

$secondA=array(
'10',
'12',
'13',
'13',
'10',
'11',
'12',
'14',
'18',
'11',
'16',
'13',
'19'
);

$secondeC = array(
'10',
'12',
'13',
'13',
'10',
'11',
'12',
'14',
'18',
'11',
'16',
'13',
'19'
);

$premiereA = array(
'10',
'12',
'13',
'13',
'10',
'11',
'12',
'14',
'18',
'11',
'16',
'13',
'19'
);

$premiereC =array(
'10',
'12',
'13',
'13',
'10',
'11',
'12',
'14',
'18',
'11',
'16',
'13',
'19'
);

$premiereD = array(
'10',
'12',
'13',
'13',
'10',
'11',
'12',
'14',
'18',
'11',
'16',
'13',
'19'
);


$terminalA = array(
'10',
'12',
'13',
'13',
'10',
'11',
'12',
'14',
'18',
'11',
'16',
'13',
'19'
);

$terminalC = array(
'10',
'12',
'13',
'13',
'10',
'11',
'12',
'14',
'18',
'11',
'16',
'13',
'19'
);

$terminalD = array(
'10',
'12',
'13',
'13',
'10',
'11',
'12',
'14',
'18',
'11',
'16',
'13',
'19'
);

$total_programme = 3;
$source_programme=array(
    'source1',
     'source2',
      'source3',
       'source4',
        'source5',
         'source6',
          'source7',
           'source8',
            'source9',
             'source10',
     'source11',
      'source12',
       'source13'

);

$pdf->SetFont('Arial','B',10);                            
$tableP=new easyTable($pdf,'%{10,8,6,6,6,6,6,6,5,4,4,5,4,9,15}','align:R; l-margin:50; border:1; font-color:#000;font-size:10;');
 //15 
 $tableP->easyCell(utf8_decode("Discipline"), 'bgcolor:#b3ccff;');
 $tableP->easyCell(utf8_decode('6ème'), 'bgcolor:#b3ccff;');
 $tableP->easyCell(utf8_decode('5ème'), 'bgcolor:#b3ccff;');
 $tableP->easyCell(utf8_decode('4ème'), 'bgcolor:#b3ccff;');
 $tableP->easyCell(utf8_decode('3ème'), 'bgcolor:#b3ccff;');
 $tableP->easyCell(utf8_decode('2A'), 'bgcolor:#b3ccff;');
 $tableP->easyCell(utf8_decode("2C"), 'bgcolor:#b3ccff;');

 $tableP->easyCell(utf8_decode('1A'), 'bgcolor:#b3ccff;');
 $tableP->easyCell(utf8_decode('1C'), 'bgcolor:#b3ccff;');
 $tableP->easyCell(utf8_decode('1D'), 'bgcolor:#b3ccff;');
 $tableP->easyCell(utf8_decode('TA'), 'bgcolor:#b3ccff;');
 $tableP->easyCell(utf8_decode('TC'), 'bgcolor:#b3ccff;');

 $tableP->easyCell(utf8_decode('TD'), 'bgcolor:#b3ccff;');
 $tableP->easyCell(utf8_decode('NOTE'), 'bgcolor:#b3ccff;');
 $tableP->easyCell(utf8_decode('SOURCE DE VERIFICATION'), 'bgcolor:#b3ccff;');

 $tableP->printRow();


 
  $pdf->SetFont('Arial','',10);

       for($i=0; $i<13; $i++)
 { 
     $pdf->SetFont('Arial','',10);
     $tableP->easyCell(utf8_decode($discipline_lib[$i]));
     $tableP->easyCell(utf8_decode($sixieme[$i]));
     $tableP->easyCell(utf8_decode($cinquieme[$i]));

     $tableP->easyCell(utf8_decode($quatrieme[$i]));
     $tableP->easyCell(utf8_decode($troisieme[$i]));
     $tableP->easyCell(utf8_decode($secondA[$i]));

     $tableP->easyCell(utf8_decode($secondeC[$i]));
     $tableP->easyCell(utf8_decode($premiereA[$i]));
     $tableP->easyCell(utf8_decode($premiereC[$i]));
     $tableP->easyCell(utf8_decode($premiereD[$i]));

     $tableP->easyCell(utf8_decode($terminalA[$i]));
     $tableP->easyCell(utf8_decode($terminalC[$i]));
     $tableP->easyCell(utf8_decode($terminalD[$i]));
     
     $tableP->easyCell('/'.$total_programme);
     $tableP->easyCell(utf8_decode($source_programme[$i]));

     $tableP->printRow();

 }
    $tableP->endTable();


//----------- la matrice d\'actions------------
$pdf->SetFont('Arial','B',14);
$pdf->SetTextColor(000,000,000);

$pdf->Text(20,130,'d)');

$pdf->Text(30,130,utf8_decode('Le projet d\'établissement, la matrice d\'actions, le Contrat'));
$pdf->Line(30,131,165,131);
$pdf->Text(30,140,utf8_decode('d\'Objectifs et de Performance'));
$pdf->SetTextColor(200,100,150);
$pdf->Text(160,140,utf8_decode('24'));
$pdf->Line(30,141,165,141);

$pdf->Ln();
$pdf->Ln();
$pdf->Ln();


$matrice_lib =array(
    'Le projet d\'établissement',
    'La matrice d\'actions ',
    'Le Contrat d\'Objectifs et de
     Performance (COP)'
);

$prevu_matrice=array(
    '50',
     '50',
      '50'
   
);
$realise_matrice = array(
    '25',
     '25',
      '25'
);

$real_matrice = array(
     '50',
     '50',
      '50'
);

$source_matrice=array(
    'source1',
     'source2',
      'source3'
);

$observation_matrice=array(
    'observation1',
     'observation2',
      'observation3'

);
$total_matrice1 =2;
$total_matrice2= 2;
$total_matrice3= 4;






//******************** */
 $pdf->SetFont('Arial','B',9);
 $pdf->SetTextColor(000,000,000);

 $tabl_test=new easyTable($pdf,16,'width:250;border:1;');
 // ligne 1    2 2 1 2 1 3 1 2 2

  $tabl_test->easyCell(utf8_decode('Libellé'), 'bgcolor:#b3ccff;colspan:2;rowspan:2;');
  $tabl_test->easyCell('Existence', 'bgcolor:#b3ccff;colspan:2;');
  $tabl_test->easyCell(utf8_decode('note'), 'bgcolor:#b3ccff;rowspan:2;');
  $tabl_test->easyCell(utf8_decode('Mise en oeuvre'), 'bgcolor:#b3ccff;colspan:2;');
  $tabl_test->easyCell(utf8_decode('note'), 'bgcolor:#b3ccff;rowspan:2;');
  $tabl_test->easyCell(utf8_decode('Etat d\'exécution des Activités'), 'bgcolor:#b3ccff;colspan:3;');
  $tabl_test->easyCell(utf8_decode('note'), 'bgcolor:#b3ccff;rowspan:2;');
  $tabl_test->easyCell(utf8_decode('SOURCE DE VERIFICATION'), 'bgcolor:#b3ccff;colspan:2;rowspan:2;');
  $tabl_test->easyCell(utf8_decode('Observations'), 'bgcolor:#b3ccff;colspan:2;rowspan:2;');
  $tabl_test->printRow(); 

    //ligne 2  111 111 1
  $tabl_test->easyCell(utf8_decode('oui'), 'bgcolor:#b3ccff;');
  $tabl_test->easyCell(utf8_decode('non'), 'bgcolor:#b3ccff;');
  $tabl_test->easyCell(utf8_decode('oui'), 'bgcolor:#b3ccff;');
  $tabl_test->easyCell(utf8_decode('non'), 'bgcolor:#b3ccff;');
  $tabl_test->easyCell(utf8_decode('Prévu'), 'bgcolor:#b3ccff;');
  $tabl_test->easyCell(utf8_decode('Réalisé'), 'bgcolor:#b3ccff;');
  $tabl_test->easyCell(utf8_decode('% Réal.'), 'bgcolor:#b3ccff;');
  $tabl_test->printRow(); 

 //ligne 3
 // $tabl_test->easyCell('Text 31', 'bgcolor:#b3ccff;');
 // $tabl_test->printRow(); 

$tabl_test->endTable();
$pdf->SetFont('Arial','',10);  

$tableQ=new easyTable($pdf,'%{13,6,6,6,7,6,  6,6,6,7,6,13,12}','align:R; l-margin:50; border:1; font-color:#000;font-size:10;');

// $tableQ->easyCell(utf8_decode("libellé"), 'bgcolor:#b3ccff;');
// $tableQ->easyCell(utf8_decode('oui'), 'bgcolor:#b3ccff;'); 
// $tableQ->easyCell(utf8_decode('non'), 'bgcolor:#b3ccff;');
// $tableQ->easyCell(utf8_decode("NOTE"), 'bgcolor:#b3ccff;');
// $tableQ->easyCell(utf8_decode('oui'), 'bgcolor:#b3ccff;'); 
// $tableQ->easyCell(utf8_decode('non'), 'bgcolor:#b3ccff;');
// $tableQ->easyCell(utf8_decode("NOTE"), 'bgcolor:#b3ccff;');
// $tableQ->easyCell(utf8_decode('Prévu'), 'bgcolor:#b3ccff;'); 
// $tableQ->easyCell(utf8_decode('Réalisé'), 'bgcolor:#b3ccff;');
// $tableQ->easyCell(utf8_decode('%Réal.'), 'bgcolor:#b3ccff;');
// $tableQ->easyCell(utf8_decode("NOTE"), 'bgcolor:#b3ccff;');
// $tableQ->easyCell(utf8_decode('Source de vérification'), 'bgcolor:#b3ccff;');
// $tableQ->easyCell(utf8_decode('observations'), 'bgcolor:#b3ccff;');
// $tableQ->printRow();


  $pdf->SetFont('Arial','',10);

       for($i=0; $i<3; $i++)
 { 
     $pdf->SetFont('Arial','',10);
     $tableQ->easyCell(utf8_decode($matrice_lib[$i]));
     $tableQ->easyCell('x');
     $tableQ->easyCell('x');
     $tableQ->easyCell('/'.$total_matrice1);
     $tableQ->easyCell('x');
     $tableQ->easyCell('x');
     $tableQ->easyCell('/'.$total_matrice2);
     $tableQ->easyCell(utf8_decode($prevu_matrice[$i]));
     $tableQ->easyCell(utf8_decode($realise_matrice[$i]));
     $tableQ->easyCell(utf8_decode($real_matrice[$i]));
     $tableQ->easyCell('/'.$total_matrice3);
    $tableQ->easyCell(utf8_decode($source_matrice[$i]));
    $tableQ->easyCell(utf8_decode($observation_matrice[$i]));

     $tableQ->printRow();
 }
    $tableQ->endTable();


//------------------ resultat des examens 

$pdf->SetFont('Arial','B',14);
$pdf->SetTextColor(000,000,000);

$pdf->Text(20,220,'e)');

$pdf->Text(30,220,utf8_decode('Résultats des examens à grand tirage des trois dernières années'));
$pdf->Line(30,221,183,221);

$pdf->Text(30,230,utf8_decode('BEPC'));
$pdf->SetTextColor(200,100,150);
$pdf->Text(160,230,utf8_decode('15'));
$pdf->Line(30,231,165,231);

$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();

$bepc_lib = array(
    'Année-1',
    'Année-2',
    'Année-3'
);

$inscri_fille_bepc = array(
'100',
'200',
'300'
);

$inscri_garcon_bepc = array(
'200',
'300',
'100'
);

$inscri_total_bepc = array(
 '300',
 '500',
 '300' 
);


$present_fille_bepc = array(
'100',
'200',
'300'
);

$present_garcon_bepc = array(
'200',
'300',
'100'
);

$present_total_bepc = array(
 '300',
 '500',
 '300' 
);

$admis_fille_bepc = array(
'100',
'200',
'300'
);

$admis_garcon_bepc = array(
'200',
'300',
'100'
);

$admis_total_bepc = array(
 '300',
 '500',
 '300' 
);


$pourcent_fille_bepc = array(
'100',
'200',
'300'
);

$pourcent_garcon_bepc = array(
'200',
'300',
'100'
);

$pourcent_total_bepc = array(
 '300',
 '500',
 '300' 
);

$total_bepc = 5;




//******************** */
 $pdf->SetFont('Arial','B',9);
 $pdf->SetTextColor(000,000,000);

 $tabl_test=new easyTable($pdf,15,'width:250;border:1;');

    //ligne 1    2 3 3 3 3 1 

  $tabl_test->easyCell('ANNEES', 'bgcolor:#b3ccff;colspan:2;rowspan:2;');

  $tabl_test->easyCell(utf8_decode('Inscrits'), 'bgcolor:#b3ccff;colspan:3;');
  $tabl_test->easyCell(utf8_decode('Présents'), 'bgcolor:#b3ccff;colspan:3;');
  $tabl_test->easyCell(utf8_decode('Admis'), 'bgcolor:#b3ccff;colspan:3;');
  $tabl_test->easyCell(utf8_decode('%'), 'bgcolor:#b3ccff;colspan:3;');
  $tabl_test->easyCell(utf8_decode('note'), 'bgcolor:#b3ccff;rowspan:2;');

  $tabl_test->printRow(); 


 //ligne 2    1 1 1 1 1 1 1 1 1 1 1 1 1

  $tabl_test->easyCell(utf8_decode('F'), 'bgcolor:#b3ccff;');
  $tabl_test->easyCell(utf8_decode('G'), 'bgcolor:#b3ccff;');
  $tabl_test->easyCell(utf8_decode('T'), 'bgcolor:#b3ccff;');

  $tabl_test->easyCell(utf8_decode('F'), 'bgcolor:#b3ccff;');
  $tabl_test->easyCell(utf8_decode('G'), 'bgcolor:#b3ccff;');
  $tabl_test->easyCell(utf8_decode('T'), 'bgcolor:#b3ccff;');

  $tabl_test->easyCell(utf8_decode('F'), 'bgcolor:#b3ccff;');
  $tabl_test->easyCell(utf8_decode('G'), 'bgcolor:#b3ccff;');
  $tabl_test->easyCell(utf8_decode('T'), 'bgcolor:#b3ccff;');

  $tabl_test->easyCell(utf8_decode('F'), 'bgcolor:#b3ccff;');
  $tabl_test->easyCell(utf8_decode('G'), 'bgcolor:#b3ccff;');
  $tabl_test->easyCell(utf8_decode('T'), 'bgcolor:#b3ccff;');

  $tabl_test->printRow(); 
  $tabl_test->endTable();


$pdf->SetFont('Arial','',10);                               
$tableR=new easyTable($pdf,'%{13, 7,7,6 ,7,6,7, 6,7,7 ,7,7,7,6}','align:R; l-margin:50; border:1; font-color:#000;font-size:10;');
 //15 
//  $tableR->easyCell(utf8_decode("ANNEE"), 'bgcolor:#b3ccff;');
//  $tableR->easyCell(utf8_decode('F'), 'bgcolor:#b3ccff;');
//  $tableR->easyCell(utf8_decode('G'), 'bgcolor:#b3ccff;');
//  $tableR->easyCell(utf8_decode('T'), 'bgcolor:#b3ccff;');

//  $tableR->easyCell(utf8_decode('F'), 'bgcolor:#b3ccff;');
//  $tableR->easyCell(utf8_decode('G'), 'bgcolor:#b3ccff;');
//  $tableR->easyCell(utf8_decode("T"), 'bgcolor:#b3ccff;');

//  $tableR->easyCell(utf8_decode('F'), 'bgcolor:#b3ccff;');
//  $tableR->easyCell(utf8_decode('G'), 'bgcolor:#b3ccff;');
//  $tableR->easyCell(utf8_decode('T'), 'bgcolor:#b3ccff;');

//  $tableR->easyCell(utf8_decode('F'), 'bgcolor:#b3ccff;');
//  $tableR->easyCell(utf8_decode('G'), 'bgcolor:#b3ccff;');
//  $tableR->easyCell(utf8_decode('T'), 'bgcolor:#b3ccff;');

//  $tableR->easyCell(utf8_decode('NOTE'), 'bgcolor:#b3ccff;');


 $tableR->printRow();

  $pdf->SetFont('Arial','',10);

       for($i=0; $i<3; $i++)
 { 
     $pdf->SetFont('Arial','',10);
     $tableR->easyCell(utf8_decode($bepc_lib[$i]));
     $tableR->easyCell(utf8_decode($inscri_fille_bepc[$i]));
     $tableR->easyCell(utf8_decode($inscri_garcon_bepc[$i]));
     $tableR->easyCell(utf8_decode($inscri_total_bepc[$i]));
  
     $tableR->easyCell(utf8_decode($present_fille_bepc[$i]));
     $tableR->easyCell(utf8_decode($present_garcon_bepc[$i]));
     $tableR->easyCell(utf8_decode($present_total_bepc[$i]));
  
     $tableR->easyCell(utf8_decode($admis_fille_bepc[$i]));
     $tableR->easyCell(utf8_decode($admis_garcon_bepc[$i]));
     $tableR->easyCell(utf8_decode($admis_total_bepc[$i]));
  
     $tableR->easyCell(utf8_decode($pourcent_fille_bepc[$i]));
     $tableR->easyCell(utf8_decode($pourcent_garcon_bepc[$i]));
     $tableR->easyCell(utf8_decode($pourcent_total_bepc[$i]));
     $tableR->easyCell('/'.$total_bepc);

     $tableR->printRow();
 }
    $tableR->endTable();



    //------------ baccalaureat 
    
$pdf->AddPage('P','A4');
$pdf->SetFont('Arial','B',14);
$pdf->SetTextColor(000,000,000);

$pdf->Text(20,20,'f)');

$pdf->Text(30,20,utf8_decode('BACCALAUREAT'));

$pdf->SetTextColor(200,100,150);
$pdf->Text(160,20,utf8_decode('20'));
$pdf->Line(30,21,165,21);

$pdf->Ln();
$pdf->Ln();
$pdf->Ln();


$bac_lib = array(
    'A1',
    'A2',
    'C',
    'D'
    );

$inscri_fille_bac = array(
'100',
'200',
'300',
'300',
);

$inscri_garcon_bac = array(
'200',
'300',
'100',
'100'
);

$inscri_total_bac = array(
 '300',
 '500',
 '300',
 '300'
);


$present_fille_bac = array(
'100',
'200',
'300',
'300'
);

$present_garcon_bac = array(
'200',
'300',
'100',
'100'
);

$present_total_bac = array(
 '300',
 '500',
 '300',
 '300'
);

$admis_fille_bac = array(
'100',
'200',
'300',
'300'
);

$admis_garcon_bac = array(
'200',
'300',
'100',
'100'
);

$admis_total_bac = array(
 '300',
 '500',
 '300',
 '300'
);


$pourcent_fille_bac_n_1 = array(
'100',
'200',
'300',
'300'
);

$pourcent_garcon_bac_n_1 = array(
'200',
'300',
'100',
'100'
);

$pourcent_total_bac_n_1 = array(
 '300',
 '500',
 '300',
 '300'
);

$total_bac = 5;



//******************** */
 $pdf->SetFont('Arial','B',9);
 $pdf->SetTextColor(000,000,000);

 $tabl_test=new easyTable($pdf,15,'width:250;border:1;');

    //ligne 1    2 3 3 3 3 1 

  $tabl_test->easyCell(utf8_decode('Séries'), 'bgcolor:#b3ccff;colspan:2;rowspan:2;');

  $tabl_test->easyCell(utf8_decode('Inscrits'), 'bgcolor:#b3ccff;colspan:3;');
  $tabl_test->easyCell(utf8_decode('Présents'), 'bgcolor:#b3ccff;colspan:3;');
  $tabl_test->easyCell(utf8_decode('Admis'), 'bgcolor:#b3ccff;colspan:3;');
  $tabl_test->easyCell(utf8_decode('% Année N-1 '), 'bgcolor:#b3ccff;colspan:3;');
  $tabl_test->easyCell(utf8_decode('note'), 'bgcolor:#b3ccff;rowspan:2;');

  $tabl_test->printRow(); 


 //ligne 2    1 1 1 1 1 1 1 1 1 1 1 1 1

  $tabl_test->easyCell(utf8_decode('F'), 'bgcolor:#b3ccff;');
  $tabl_test->easyCell(utf8_decode('G'), 'bgcolor:#b3ccff;');
  $tabl_test->easyCell(utf8_decode('T'), 'bgcolor:#b3ccff;');

  $tabl_test->easyCell(utf8_decode('F'), 'bgcolor:#b3ccff;');
  $tabl_test->easyCell(utf8_decode('G'), 'bgcolor:#b3ccff;');
  $tabl_test->easyCell(utf8_decode('T'), 'bgcolor:#b3ccff;');

  $tabl_test->easyCell(utf8_decode('F'), 'bgcolor:#b3ccff;');
  $tabl_test->easyCell(utf8_decode('G'), 'bgcolor:#b3ccff;');
  $tabl_test->easyCell(utf8_decode('T'), 'bgcolor:#b3ccff;');

  $tabl_test->easyCell(utf8_decode('F'), 'bgcolor:#b3ccff;');
  $tabl_test->easyCell(utf8_decode('G'), 'bgcolor:#b3ccff;');
  $tabl_test->easyCell(utf8_decode('T'), 'bgcolor:#b3ccff;');

  $tabl_test->printRow(); 
  $tabl_test->endTable();


$pdf->SetFont('Arial','',10);       

$tableS = new easyTable($pdf,'%{13, 7,7,6 ,7,6,7, 6,7,7 ,7,7,7,6}','align:R; l-margin:50; border:1; font-color:#000;font-size:10;');
 //15 
//  $tableS->easyCell(utf8_decode("Séries"), 'bgcolor:#b3ccff;');
//  $tableS->easyCell(utf8_decode('F'), 'bgcolor:#b3ccff;');
//  $tableS->easyCell(utf8_decode('G'), 'bgcolor:#b3ccff;');
//  $tableS->easyCell(utf8_decode('T'), 'bgcolor:#b3ccff;');

//  $tableS->easyCell(utf8_decode('F'), 'bgcolor:#b3ccff;');
//  $tableS->easyCell(utf8_decode('G'), 'bgcolor:#b3ccff;');
//  $tableS->easyCell(utf8_decode("T"), 'bgcolor:#b3ccff;');

//  $tableS->easyCell(utf8_decode('F'), 'bgcolor:#b3ccff;');
//  $tableS->easyCell(utf8_decode('G'), 'bgcolor:#b3ccff;');
//  $tableS->easyCell(utf8_decode('T'), 'bgcolor:#b3ccff;');

//  $tableS->easyCell(utf8_decode('F'), 'bgcolor:#b3ccff;');
//  $tableS->easyCell(utf8_decode('G'), 'bgcolor:#b3ccff;');
//  $tableS->easyCell(utf8_decode('T'), 'bgcolor:#b3ccff;');

//  $tableS->easyCell(utf8_decode('NOTE'), 'bgcolor:#b3ccff;');

//  $tableS->printRow();



  $pdf->SetFont('Arial','',10);

       for($i=0; $i<4; $i++)
 { 
     $pdf->SetFont('Arial','',10);
     $tableS->easyCell(utf8_decode($bac_lib[$i]));
     $tableS->easyCell(utf8_decode($inscri_fille_bac[$i]));
     $tableS->easyCell(utf8_decode($inscri_garcon_bac[$i]));
     $tableS->easyCell(utf8_decode($inscri_total_bac[$i]));
  
     $tableS->easyCell(utf8_decode($present_fille_bac[$i]));
     $tableS->easyCell(utf8_decode($present_garcon_bac[$i]));
     $tableS->easyCell(utf8_decode($present_total_bac[$i]));
  
     $tableS->easyCell(utf8_decode($admis_fille_bac[$i]));
     $tableS->easyCell(utf8_decode($admis_garcon_bac[$i]));
     $tableS->easyCell(utf8_decode($admis_total_bac[$i]));
  
     $tableS->easyCell(utf8_decode($pourcent_fille_bac_n_1[$i]));
     $tableS->easyCell(utf8_decode($pourcent_garcon_bac_n_1[$i]));
     $tableS->easyCell(utf8_decode($pourcent_total_bac_n_1[$i]));
     $tableS->easyCell('/'.$total_bac);

     $tableS->printRow();
 }
    $tableS->endTable();


//------------------- vie scolaire et environnement 


$pdf->SetFont('Arial','B',14);
$pdf->SetTextColor(000,000,000);

$pdf->Text(20,75,'VII)');

$pdf->Text(30,75,utf8_decode('ACTIVITÉS DE LA VIE SCOLAIRE ET ENVIRONNEMENT DE'));
$pdf->Line(30,76,165,76);
$pdf->Text(30,85,utf8_decode('L\'ETABLISSEMENT'));
$pdf->SetTextColor(200,100,150);
$pdf->Text(160,85,utf8_decode('68'));
$pdf->Line(30,86,165,86);

$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();


$scolaire_lib = array(
    'Coopératives',
    'Bibliothèque',
    'Club
Environnement',
    'Hygiène Santé',
    'Messagers de La
Paix ',
    'VIH/SIDA',
    'Autres Clubs',
    'Associations',
    'Tournois
interclasses ',
    'Office Ivoirien
de Sport Scolaire
et Universitaire
(OISSU)',
    'Festival National
des Arts et de la
Culture en
Milieu Scolaire
(FENACMIS)',
    'Entrepreneuriat',
    'Les animateurs
du marché sont
à jour de leurs
obligations vis-à-
vis de l\'Institut
National
d\'Hygiène
Publique',
    'L\'environnemen
t extérieur de
l\'établissement
est assaini
(absence de
fumoirs, de
débit d\'alcool,
de nuisance
sonores et
visuelles, eaux
usées,
décharges
d\'ordures, …)',
    'Le cadre
physique de
l\'établissement
est propice aux
enseignements
(propreté des
lieux, des locaux,
observance des
règles
d\'hygiène.)',
    'Des slogans pour
la promotion
des valeurs au
sein de
l\'établissement',
    'La sécurité des
acteurs et des
biens est
assurée par l\'établissement'
);


$total_scolaire1 = 1;
$total_scolaire2 = 1;
$total_scolaire3= 1;
$total_scolaire4 = 1;



//******************** */
 $pdf->SetFont('Arial','B',9);
 $pdf->SetTextColor(000,000,000);

 $tabl_test=new easyTable($pdf,16,'width:250;border:1;');
 // ligne 1    1321212121

  $tabl_test->easyCell(utf8_decode('N°'), 'bgcolor:#b3ccff;rowspan:2;');
  $tabl_test->easyCell(utf8_decode('Libellé'), 'bgcolor:#b3ccff;colspan:3;rowspan:2;');
  $tabl_test->easyCell('Existe', 'bgcolor:#b3ccff;colspan:2;');
  $tabl_test->easyCell(utf8_decode('note'), 'bgcolor:#b3ccff;rowspan:2;');
  $tabl_test->easyCell(utf8_decode('Fonctionne'), 'bgcolor:#b3ccff;colspan:2;');
  $tabl_test->easyCell(utf8_decode('note'), 'bgcolor:#b3ccff;rowspan:2;');
  $tabl_test->easyCell(utf8_decode('Programme d\'activités '), 'bgcolor:#b3ccff;colspan:2;');
  $tabl_test->easyCell(utf8_decode('note'), 'bgcolor:#b3ccff;rowspan:2;');
  $tabl_test->easyCell(utf8_decode('Liste des responsables '), 'bgcolor:#b3ccff;colspan:2;');
  $tabl_test->easyCell(utf8_decode('note'), 'bgcolor:#b3ccff;rowspan:2;');

  $tabl_test->printRow(); 

    //ligne 2  111 111 1
  $tabl_test->easyCell(utf8_decode('oui'), 'bgcolor:#b3ccff;');
  $tabl_test->easyCell(utf8_decode('non'), 'bgcolor:#b3ccff;');
  $tabl_test->easyCell(utf8_decode('oui'), 'bgcolor:#b3ccff;');
  $tabl_test->easyCell(utf8_decode('non'), 'bgcolor:#b3ccff;');
  $tabl_test->easyCell(utf8_decode('oui'), 'bgcolor:#b3ccff;');
  $tabl_test->easyCell(utf8_decode('non'), 'bgcolor:#b3ccff;');
  $tabl_test->easyCell(utf8_decode('oui'), 'bgcolor:#b3ccff;');
  $tabl_test->easyCell(utf8_decode('non'), 'bgcolor:#b3ccff;');


  $tabl_test->printRow(); 

 //ligne 3
 // $tabl_test->easyCell('Text 31', 'bgcolor:#b3ccff;');
 // $tabl_test->printRow(); 

$tabl_test->endTable();
$pdf->SetFont('Arial','',10);                          
$tableT=new easyTable($pdf,'%{6,19,6,7,6,6,6,6,7,7,6,6,6,6}','align:R; l-margin:50; border:1; font-color:#000;font-size:10;');

// $tableT->easyCell(utf8_decode('N°'), 'bgcolor:#b3ccff;'); 
// $tableT->easyCell(utf8_decode("libellé"), 'bgcolor:#b3ccff;');

// $tableT->easyCell(utf8_decode('oui'), 'bgcolor:#b3ccff;'); 
// $tableT->easyCell(utf8_decode('non'), 'bgcolor:#b3ccff;');
// $tableT->easyCell(utf8_decode("NOTE"), 'bgcolor:#b3ccff;');
// $tableT->easyCell(utf8_decode('oui'), 'bgcolor:#b3ccff;'); 
// $tableT->easyCell(utf8_decode('non'), 'bgcolor:#b3ccff;');
// $tableT->easyCell(utf8_decode("NOTE"), 'bgcolor:#b3ccff;');
// $tableT->easyCell(utf8_decode('oui'), 'bgcolor:#b3ccff;'); 
// $tableT->easyCell(utf8_decode('non'), 'bgcolor:#b3ccff;');
// $tableT->easyCell(utf8_decode("NOTE"), 'bgcolor:#b3ccff;');
// $tableT->easyCell(utf8_decode('oui'), 'bgcolor:#b3ccff;'); 
// $tableT->easyCell(utf8_decode('non'), 'bgcolor:#b3ccff;');
// $tableT->easyCell(utf8_decode("NOTE"), 'bgcolor:#b3ccff;');
// $tableT->printRow();

  $pdf->SetFont('Arial','',10);

       for($i=0; $i<17; $i++)
 { 
     $pdf->SetFont('Arial','',10);
     $tableT->easyCell($i+1);
     $tableT->easyCell(utf8_decode($scolaire_lib[$i]));
     $tableT->easyCell('x');
     $tableT->easyCell('x');
     $tableT->easyCell('/'.$total_scolaire1);
     $tableT->easyCell('x');
     $tableT->easyCell('x');
     $tableT->easyCell('/'.$total_scolaire2);
     $tableT->easyCell('x');
     $tableT->easyCell('x');
     $tableT->easyCell('/'.$total_scolaire3);
     $tableT->easyCell('x');
     $tableT->easyCell('x');
     $tableT->easyCell('/'.$total_scolaire4);

     $tableT->printRow();
 }
    $tableT->endTable();

    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();




















//  $tabl=new easyTable($pdf, 3, 'width:200;border:1;');
//  $tabl->easyCell('Text 1', 'rowspan:2; valign:T'); 
//  $tabl->easyCell('Text 2', 'bgcolor:#b3ccff; rowspan:2');
//  $tabl->easyCell('Text 3');
//  $tabl->printRow();
//  $tabl->rowStyle('min-height:20');
//  $tabl->easyCell('Text 4', 'bgcolor:#3377ff; rowspan:2');
//  $tabl->printRow();
//  $tabl->easyCell('Text 5', 'bgcolor:#99bbff;colspan:2');
//  $tabl->printRow();
//  $tabl->endTable();

//******************* */


$pdf->Output('I');
