<?php

namespace ZApp\Services;

use easyTable;
use exFPDF;

include_once ROOT_PATH . 'vendor/fpdf-easytable/exfpdf.php';
include_once ROOT_PATH . 'vendor/fpdf-easytable/easyTable.php';

class MYFPDF extends exFPDF
{
    public function __construct()
    {
        parent::__construct();
        $this->setMargins(4, 4, 4); // Définir les marges gauche, haut et droite
    }


    public function Header()
    {

        $header_pos = $_SESSION['header_position'] ?? 0;
        $position = $this->PageNo();

        if ($header_pos == 0 && $position == 1)
        {
            $banniere = ROOT_PATH . 'assets/front/img/entete_deep_grille.png';

            // Affichage de la bannière
            $tableza = new easyTable($this, '{280}', 'align:{C};border:0; border-color:#ffffff;');
            $tableza->easyCell("", 'img:' . $banniere . ', w600; align:C;');
            $tableza->printRow();
            $tableza->endTable();
        }


        if ($header_pos == 1)
        {
            $this->SetFont('Arial', '', 10);
            $this->Ln(5);

            // Création de la table d'en-tête
            $table = new easyTable($this, '{100, 100}', 'width:200; border:0; paddingY:2; font-size:10; align:C;');

            // Colonne gauche (Ministère)
            $table->easyCell("MINISTERE DE L'EDUCATION NATIONALE\nET DE L'ALPHABETISATION\n------------------", 'align:C; font-size:10;');
            // Colonne droite (République)
            $table->easyCell("REPUBLIQUE DE COTE D'IVOIRE\nUnion - Discipline - Travail\n------------------", 'align:C; font-size:10;');
            $table->printRow(0);

            // Deuxième ligne de l'en-tête
            $table->easyCell("DIRECTION DE LA MUTUALITE\nET DES OEUVRES SOCIALES EN MILIEU SCOLAIRE (DMOSS)", 'align:C; font-size:10; font-style:B;');
            $table->easyCell("", ''); // Colonne vide pour l'alignement
            $table->printRow();

            $table->endTable();
            $this->Ln(5);
        }




    }


    public function Footer()
    {
        $footer_pos = $_SESSION['footer_position'] ?? 0;

        if ($footer_pos == 1) {
            $this->setFooterSimple();
        } elseif ($footer_pos == 2) {
            $this->setFooterWithPages();
        }
    }

    private function setFooterSimple()
    {
        $this->SetY(-10);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Page ' . $this->PageNo(), 0, 0, 'C');
    }

    private function setFooterWithPagesx()
    {

        // Vérifie si on est trop bas pour écrire sans empiéter sur le footer
        if ($this->GetY() > ($this->h - $this->bMargin - 13 + 2)) {
            $this->AddPage();
        }

        $this->AliasNbPages();
        $this->SetY(-13);
        $this->SetFont('Arial', '', 8);



        $this->Cell(0, 10, "", 0, 0, 'C');
        $this->SetY(-9);
        $this->Cell(0, 10, "GRILLE D'EVALUATION DES ETABLISSEMENTS SECONDAIRES PRIVES / 2023-2024", 0, 0, 'L');
        $this->Cell(0, 10, "Page " . $this->PageNo() . ' sur {nb}', 0, 0, 'R');
    }


    private function setFooterWithPagesXX()
    {
        // Vérifie si on est trop bas pour écrire sans empiéter sur le footer
        if ($this->GetY() > ($this->h - $this->bMargin - 13 + 2)) {
            $this->AddPage();
        }

        $this->AliasNbPages();
        $this->SetY(-13);
        $this->SetFont('Arial', '', 8);

        $this->Cell(0, 10, "", 0, 1, 'C'); // Ligne vide pour espacement
        $this->SetY(-14);
        $this->Cell(0, 5, "GRILLE D'EVALUATION DES ETABLISSEMENTS SECONDAIRES PRIVES / 2023-2024", 0, 1, 'L');
        $this->Cell(0, 5, "Page " . $this->PageNo() . ' sur {nb}', 0, 0, 'R');
    }


    private function setFooterWithPages()
    {
        // Vérifie si on est trop bas pour écrire sans empiéter sur le footer
        if ($this->GetY() > ($this->h - $this->bMargin - 10 + 2)) {
            $this->AddPage();
        }

        $this->AliasNbPages();
        $this->SetY(-10);
        $this->SetFont('Arial', '', 8);

        // Cellule de gauche (titre)
        $this->Cell(0, 5, "GRILLE D'EVALUATION DES ETABLISSEMENTS SECONDAIRES PRIVES / 2023-2024", 0, 0, 'L');

        // Positionner pour écrire à droite
        $this->SetY(-10); // Remet à la même hauteur
        $this->Cell(0, 5, "Page " . $this->PageNo() . ' sur {nb}', 0, 0, 'R');
    }





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
}
