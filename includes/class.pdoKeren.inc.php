<?php
/**
 * Classe d'accès aux données
 *
 * PHP Version 7
 *
 * @category  Projet bachelor developpeur web
 * @package   Keren Ohr
 * @author    Tsipora Schvarcz
 */

class PdoKeren
{
    private static $serveur = 'mysql:host=localhost';
    private static $bdd = 'dbname=keren-ohr';
    private static $user = 'root';
    private static $mdp = '';
    private static $monPdo;
    private static $monPdoKeren = null;

    /**
     * Constructeur privé, crée l'instance de PDO qui sera sollicitée
     * pour toutes les méthodes de la classe
     */
    private function __construct()
    {
        PdoKeren::$monPdo = new PDO(
            PdoKeren::$serveur . ';' . PdoKeren::$bdd,
            PdoKeren::$user,
            PdoKeren::$mdp
        );
        PdoKeren::$monPdo->query('SET CHARACTER SET utf8');
    }

    /**
     * Méthode destructeur appelée dès qu'il n'y a plus de référence sur un
     * objet donné, ou dans n'importe quel ordre pendant la séquence d'arrêt.
     */
    public function __destruct()
    {
        PdoKeren::$monPdo = null;
    }

    /**
     * Fonction statique qui crée l'unique instance de la classe
     * Appel : $instancePdoEuro = PdoEuro::getPdoEuro();
     *
     * @return l'unique objet de la classe PdoEuro
     */
    public static function getPdoKeren()
    {
        if (PdoKeren::$monPdoKeren == null) {
            PdoKeren::$monPdoKeren = new PdoKeren();
        }
        return PdoKeren::$monPdoKeren;
    }
    
    /**
     * Récupère les informations d'un admin
     *
     * @param String $login  Login de l'admin
     * @param String $mdp    Mot de passe de l'admin
     *
     * @return l'id, le nom et le prénom sous la forme d'un tableau associatif
     */
    public function getInfosAdmin($login, $mdp)
    {
        $requetePrepare = PdoKeren::$monPdo->prepare(
            'SELECT utilisateur.id AS id, utilisateur.nom AS nom, '
            . 'utilisateur.prenom AS prenom '
            . 'FROM utilisateur '
            . 'WHERE utilisateur.login = :unLogin AND utilisateur.mdp = :unMdp'
        );
        $requetePrepare->bindParam(':unLogin', $login, PDO::PARAM_STR);
        $requetePrepare->bindParam(':unMdp', $mdp, PDO::PARAM_STR);
        $requetePrepare->execute();
        return $requetePrepare->fetch();
    }
    
    /**
     * Récupère les informations d'un adhérent pour sa connexion
     *
     * @param String $login  Login de l'adhérent
     * @param String $mdp    Mot de passe de l'adhérent
     *
     * @return l'id, le nom et le prénom sous forme d'un tableau associatif
     */
    public function getInfosAdherent($login, $mdp)
    {
        $requetePrepare = PdoKeren::$monPdo->prepare(
            'SELECT adherents.id AS id, adherents.nom AS nom, '
            . 'adherents.prenom AS prenom '
            . 'FROM adherents '
            . 'WHERE adherents.login = :unLogin AND adherents.mdp = :unMdp'
        );
        $requetePrepare->bindParam(':unLogin', $login, PDO::PARAM_STR);
        $requetePrepare->bindParam(':unMdp', $mdp, PDO::PARAM_STR);
        $requetePrepare->execute();
        return $requetePrepare->fetch();
    }
    
    /**
     * Récupère la liste de tous les adherents.
     * 
     * @return Array        La liste de tous les adherents sous forme de tableau associatif.
     */
    public function getLesAdherents()
    {
        $requetePrepare = PdoKeren::$monPdo->prepare(
            'SELECT *'
            . 'FROM adherents '
            . 'ORDER BY nom'
        );
        $requetePrepare->execute();
        return $requetePrepare->fetchAll();
    }
    
    /**
     * Récupère la liste des catégories de personnes nécessiteuses
     * 
     * @return Array        La liste des categories sous forme de tableau associatif.
     */
    public function getLesCategories()
    {
        $requetePrepare = PdoKeren::$monPdo->prepare(
            'SELECT *'
            . 'FROM categorie '
        );
        $requetePrepare->execute();
        return $requetePrepare->fetchAll();
    }
    
    /**
     * Insert dans la bdd les infos de l'adhérent ajouté 
     * 
     * @param String $nom        Nom de l'adhérent        
     * @param String $prenom     Prénom de l'adhérent
     * @param String $login      Login de l'adhérent
     * @param String $mdp        Mot de passe de l'adhérent
     * @param String $adresse    Adresse de l'adhérent
     * @param String $cp         Code postal de l'adhérent
     * @param String $ville      Ville de l'adhérent
     * @param String $email      E-mail de l'adhérent
     * @param int $telFixe       Téléphone fixe de l'adhérent
     * @param int $telPort       Téléphone portable de l'adhérent
     * @param String $dateAdher  Date d'adhésion de l'adhérent
     * @param String $cat        Catégorie de l'adhérent
     */
    public function insertInfosNouvelAdherent($nom,$prenom,$login,$mdp,$adresse,$cp,$ville,$email,$telFixe,$telPort,$dateAdher,$cat){
        $requetePrepare = PdoKeren::$monPdo->prepare(
            'INSERT INTO adherents'
            . " VALUES(NULL,:unNom,:unPrenom,:unLogin,:unMdp,:uneAdresse,:unCP,:uneVille,:unEmail,"
            . " :unTelFixe,:unTelPort,:uneDateAdhesion,:uneCat)"
        );
        $requetePrepare->bindParam(':unNom', $nom , PDO::PARAM_STR);
        $requetePrepare->bindParam(':unPrenom', $prenom , PDO::PARAM_STR);
        $requetePrepare->bindParam(':unLogin', $login , PDO::PARAM_STR);
        $requetePrepare->bindParam(':unMdp', $mdp , PDO::PARAM_STR);
        $requetePrepare->bindParam(':uneAdresse', $adresse , PDO::PARAM_STR);
        $requetePrepare->bindParam(':unCP', $cp , PDO::PARAM_INT);
        $requetePrepare->bindParam(':uneVille', $ville , PDO::PARAM_STR);
        $requetePrepare->bindParam(':unEmail', $email , PDO::PARAM_STR);
        $requetePrepare->bindParam(':unTelFixe', $telFixe , PDO::PARAM_INT);
        $requetePrepare->bindParam(':unTelPort', $telPort , PDO::PARAM_INT);
        $requetePrepare->bindParam(':uneDateAdhesion', $dateAdher , PDO::PARAM_STR);
        $requetePrepare->bindParam(':uneCat', $cat , PDO::PARAM_STR);
        $requetePrepare->execute();
    }      
    
    /**
     * Met à jour les coordonnées d'un bénéficiaire donné
     * 
     * @param int $idBeneficiaire  ID du bénéficiaire
     * @param String $nom          Nom du bénéficiaire
     * @param String $prenom       Prénom du bénéficiaire
     * @param String $adresse      Adresse du bénéficiaire
     * @param String $cp           Code postal du bénéficiaire
     * @param String $ville        Ville du bénéficiaire
     * @param String $email        E-mail du bénéficiaire
     * @param int $telPort         Téléphone portable du bénéficiaire
     * @param int $telFixe         Téléphone fixe du bénéficiaire
     * @param String $dateAdher    Date d'adhésion du bénéficiaire
     * @param String $cat          Catégorie du bénéficiaire
     */
    public function majCoordonneesBeneficiaire($idBeneficiaire,$nom,$prenom,$adresse,$cp,$ville,$email,$telPort,$telFixe,$dateAdher,$cat){
        $requetePrepare = PdoKeren::$monPdo->prepare(
            'UPDATE adherents'
            . ' SET nom = :unNom, prenom = :unPrenom, adresse = :uneAdresse, cp = :unCP, '
            . ' ville = :uneVille, email = :unEmail, telPort= :unTelPort, telFixe = :unTelFixe, '
            . ' dateAdher = :uneDateAdher, idCategorie = :uneCat'
            . ' WHERE id = :unId'
        );
        $requetePrepare->bindParam(':unId', $idBeneficiaire , PDO::PARAM_INT);
        $requetePrepare->bindParam(':unNom', $nom , PDO::PARAM_STR);
        $requetePrepare->bindParam(':unPrenom', $prenom , PDO::PARAM_STR);
        $requetePrepare->bindParam(':uneAdresse', $adresse , PDO::PARAM_STR);
        $requetePrepare->bindParam(':unCP', $cp , PDO::PARAM_INT);
        $requetePrepare->bindParam(':uneVille', $ville , PDO::PARAM_STR);
        $requetePrepare->bindParam(':unEmail', $email , PDO::PARAM_STR);
        $requetePrepare->bindParam(':unTelPort', $telPort , PDO::PARAM_INT);
        $requetePrepare->bindParam(':unTelFixe', $telFixe , PDO::PARAM_INT);
        $requetePrepare->bindParam(':uneDateAdher', $dateAdher , PDO::PARAM_STR);
        $requetePrepare->bindParam(':uneCat', $cat , PDO::PARAM_STR);
        if($requetePrepare->execute()){
            echo 'succes';
        }else echo 'erreur';
    }
    
    /**
     * Récupère la liste des lieux de vacances disponibles
     * 
     * @return Array    La liste des lieux sous forme de tableau associatif
     */
    public function getLieuxVacs(){
        $requetePrepare = PdoKeren::$monPdo->prepare(
            'SELECT *'
            . 'FROM lieuxVacs'
        );
        $requetePrepare->execute();
        return $requetePrepare->fetchAll();
    }
    
    /**
     * Insert une nouvelle activité dans la bdd
     * 
     * @param String $libelle   Libellé de l'activité
     * @param String $date      Date de l'activité
     * @param String $cat       Catégorie de l'activité
     */
    public function insertActivite($libelle,$date,$cat){
        $dateEn=dateFrancaisVersAnglais($date);
        $dateColle=@list($jour, $mois, $annee) = explode('/', $date);       
        if((substr($date,0,2) > $jour && (substr($date,2,2) == $mois)) || ((substr($date,2,2) >= $mois ))
           && (substr($date,4,4) >= $annee)){
            $etat='Prévue';
        }else{
            $etat='Terminée';
        }
        $requetePrepare = PdoKeren::$monPdo->prepare(
            'INSERT INTO activites'
            . ' VALUES(NULL,:unLibelle,:uneDate,:unEtat,:uneCat)'
        );
        $requetePrepare->bindParam(':unLibelle', $libelle , PDO::PARAM_STR);
        $requetePrepare->bindParam(':uneDate', $dateEn , PDO::PARAM_STR);
        $requetePrepare->bindParam(':unEtat', $etat , PDO::PARAM_STR);
        $requetePrepare->bindParam(':uneCat', $cat , PDO::PARAM_STR);
        $requetePrepare->execute();   
    }
    
    /**
    * Récupère toutes les informations d'un adhérent donné
    * 
    * @param int $id  ID de l'adhérent connecté
    * @return les differentes infos sous forme de tableau
    */
    public function getInformationsAdherent($id){
        $requetePrepare = PdoKeren::$monPdo->prepare(
                'SELECT nom,prenom,adresse,cp,ville,email,telFixe,telPort,idcategorie'
                . ' FROM adherents'
                . ' WHERE id= :unId'
                );
        $requetePrepare->bindParam(':unId', $id , PDO::PARAM_INT);
        $requetePrepare->execute();
        $laLigne = $requetePrepare->fetch();
        return $laLigne;
    }
    
    /**
     * Récupère l'activité dont la date est postérieure à la date actuelle 
     * et en fonction de la catégorie de l'adhérent connecté
     * 
     * @param int $idCategorie      ID de la catégorie
     * @param String $dateActuelle  La date actuelle
     * @return l'activité suivante 
     */
    public function getActiviteSuivante($idCategorie,$dateActuelle){
        $dateColle=@list($jour, $mois, $annee) = explode('/', $dateActuelle);       
        $requetePrepare = PdoKeren::$monPdo->prepare(
            'SELECT libelle'
            .' FROM activites'
            .' WHERE idcategorie= :unIdCategorie '
            ." AND substr(date,0,2) > $jour"   
            ." AND substr(date,2,2)= $mois"
            ." AND substr(date,4,4)= $annee"    
            );
        $requetePrepare->bindParam(':unIdCategorie', $idCategorie , PDO::PARAM_STR);
        $requetePrepare->bindParam(':laDateActuelle', $dateActuelle , PDO::PARAM_STR);
        var_dump($jour,$mois,$annee,$dateColle);
        $requetePrepare->execute();
        return $requetePrepare->fetch();
    }
    
    /**
     * Récupère la liste des activités pour un mois donné
     * 
     * @param int $moisChoisi   Mois sélectionné
     * @return Array            Les activités sous forme de tableau associatif
     */
    public function getActivites($moisChoisi){
        $moisChoisi="'".$moisChoisi."%";
        $requetePrepare = PdoKeren::$monPdo->prepare(
            'SELECT libelle as libelle, etat as etat'
            .'FROM activites '
            ."WHERE date LIKE $moisChoisi"
                );
        //$requetePrepare->bindParam(':leMoisChoisi', $moisChoisi , PDO::PARAM_STR);
        if($requetePrepare->execute()){
            echo 'succes';
        }else {
            echo "erreur";
            print_r($requetePrepare->errorInfo());
        }
        return $requetePrepare->fetchAll();
    }
    
    public function getNomLieu($idLieu){
        $requetePrepare = PdoKeren::$monPdo->prepare(
                'SELECT nom'
                . ' FROM lieuxvacs'
                . ' WHERE id= :unId'
                );
        $requetePrepare->bindParam(':unId', $idLieu , PDO::PARAM_INT);
        $requetePrepare->execute();
        return $requetePrepare->fetch();
    }
}