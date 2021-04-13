<?php
// Appel de la librairie FPDF
require("fpdf.php");
class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('images/logo.png',70,3,50);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
    $this->Cell(80);
    $this->SetLineWidth(0.3);
    // Line break
    $this->Ln(5); 
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial');
    $this->SetFontSize('10');
    // Page number
    $this->Cell(0,10,'14 rue de Thionville, 75019 Paris - contact@kerenohr.fr - 06 50 24 43 52',0,0,'C');
}
}
$buffer = ob_get_clean(); 
        $dimension = array(90,190);
        $pdf = new PDF('L','mm',$dimension);//('P', 'cm', $dimension);
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',12);
        $n°Cheque= random_int(0, 1000);
        $pdf->Cell(0.1,0,'Cheque numero '.$n°Cheque);        
        $pdf->SetFont('Arial');
        $pdf->SetFontSize('12');
        $date= date('d/m/Y');
        $montant= filter_input(INPUT_POST, 'montant',FILTER_SANITIZE_STRING);
        $nom= filter_input(INPUT_POST, 'lstBeneficiaires', FILTER_SANITIZE_STRING); //nom et prenom ayant été selectionné
        //$prenom= filter_input(INPUT_POST, 'prenom',FILTER_SANITIZE_STRING);
        $adresse= filter_input(INPUT_POST, 'adresse',FILTER_SANITIZE_STRING);
        $cp= filter_input(INPUT_POST, 'cp',FILTER_SANITIZE_STRING);
        $ville=filter_input(INPUT_POST, 'ville',FILTER_SANITIZE_STRING);
        $dateValidite=filter_input(INPUT_POST, 'dateValidite',FILTER_SANITIZE_STRING);
        $pdf->Cell(0.1,15,'Date de remise: '.$date);
        $pdf->Cell(0.1,25,'Somme: '.$montant.' euros');
        $pdf->Cell(0.1,35,'Beneficiaire: '.$nom);
        $pdf->Cell(0.1,45,'Demeurant '.$adresse.' '.$cp.' '.$ville);
        $pdf->Cell(0.1,54,'Valable jusqu\'au '.$dateValidite); 
        $nomPdf="carte_alimentaire";
        //$pdf->Output($nom,'I');
        for($i=1;$i<=2;$i++)
	{
	    if($i==1)
	    {
		//sortie du fichier
		$pdf->Output('C:\wamp64\www\Keren-Ohr\documents\ '.$nomPdf.'.pdf','F');
	    }
	    else
	    {
		//sortie du fichier
		$pdf->output($nom,'I');
	    }

        }
