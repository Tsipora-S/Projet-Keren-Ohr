<?php
/**
 * Génération du bon en pdf
 *
 * PHP Version 7
 *
 * @category  Projet bachelor developpeur web
 * @package   Keren Ohr
 * @author    Tsipora Schvarcz
 */

require("fpdf.php");

class PDF extends FPDF {

    function Header() {
        $this->Image('images/logo.png', 70, 3, 50);
        $this->SetFont('Arial', 'B', 15);
        $this->Cell(80);
        $this->SetLineWidth(0.3);
        $this->Ln(5);
    }

    function Footer() {
        $this->SetY(-15);
        $this->SetFont('Arial');
        $this->SetFontSize('10');
        $this->Cell(0, 10, '14 rue de Thionville, 75019 Paris - contact@kerenohr.fr - 06 50 24 43 52', 0, 0, 'C');
    }

}

$buffer = ob_get_clean();
$dimension = array(90, 190);
$pdf = new PDF('L', 'mm', $dimension); 
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 12);
$n°Bon = random_int(0, 1000);
$pdf->Cell(0.1, 0, 'Bon numero ' . $n°Bon);
$pdf->SetFont('Arial');
$pdf->SetFontSize('12');
$pdf->Cell(0.1, 10, 'Lieu de vacances: ' . $lieu['nom']);
$date = date('d/m/Y');
$pdf->Cell(0.1, 20, 'Date de remise: ' . $date);
$pdf->Cell(0.1, 30, 'Somme: ' . $montant . ' euros');
$pdf->Cell(0.1, 40, 'Beneficiaire: ' . $nom . ' ' . $prenom);
$pdf->Cell(0.1, 50, 'Demeurant ' . $adresse . ' ' . $cp . ' ' . $ville);
$pdf->Cell(0.1, 54.99, 'Valable jusqu\'au ' . $dateValidite);
$nomPdf = "bon_vacances";
for ($i = 1; $i <= 2; $i++) {
    if ($i == 1) {
        $pdf->Output('C:\wamp64\www\Keren-Ohr\documents\/' . $nomPdf . '.pdf', 'F');
    } else {
        $pdf->output($nomPdf, 'I');
    }
}
