<?php
/**
 * Envoi du mail
 *
 * PHP Version 7
 *
 * @category  Projet bachelor developpeur web
 * @package   Keren Ohr
 * @author    Tsipora Schvarcz
 */

ini_set('display_errors', 1);
error_reporting(E_ALL);
$nomBeneficiaire = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_STRING);
$from = "tmaof55@gmail.com";
$to = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$filename = "bienvenue.pdf";
$fichier = 'C:\wamp64\www\Keren-Ohr\documents\/' . $filename;
$subject = $nomBeneficiaire . ", bienvenue dans notre association!";
$login = $nomBeneficiaire;
$message = "Bienvenue! Voici votre identifiant et mot de passe pour "
        . "votre connexion à la plateforme de l'association: " . '<br>' . "Identifiant: " . $login . '<br>' . "Mot de passe: " . $mdp;
$headers = "From:" . $from;
$boundary = "_" . md5(uniqid(rand()));
$contenu = file_get_contents($fichier); //file name ie: ./image.jpg
$attached_file = chunk_split(base64_encode($contenu));
$attached = "\n\n" . "--" . $boundary . "\nContent-Type: application; "
        . "name=\"$fichier\"\r\nContent-Transfer-Encoding: base64\r\n"
        . "Content-Disposition: attachment; filename=\"$fichier\"\r\n\n" .
        $attached_file . "--" . $boundary . "--";
$headers .= "MIME-Version: 1.0\r\nContent-Type: multipart/mixed; boundary=\"$boundary\"\r\n";
$body = "--" . $boundary . "\nContent-Type: text/plain; charset=ISO-8859-1\r\n\n" . $message . $attached;
//$mail->AddAttachment($path, '', $encoding = 'base64', $type = 'application/pdf');-->ac phpMailer
$date = getDateAc(date('d/m/Y'));
$envoi = mail($to, $subject, $body, $headers);
if ($envoi == true) {
    echo "L'email a été envoyé.";
} else {
    echo "echec de l'envoi";
}
?>