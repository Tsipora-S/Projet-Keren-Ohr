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
     * Retourne les informations d'un admin
     *
     * @param String $login Login de l'admin
     * @param String $mdp   Mot de passe de l'admin
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
     * Retourne les informations d'un adhérent
     *
     * @param String $login Login de l'adhérent
     * @param String $mdp   Mot de passe de l'adhérent
     *
     * @return l'id, le nom et le prénom sous la forme d'un tableau associatif
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
     * Retourne la liste de tous les adherents.
     * @return array        la liste de tous les adherents sous forme de tableau associatif.
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
     * Retourne la liste des catégories de personnes nécessiteuses
     * @return array        la liste des categories sous forme de tableau associatif.
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
     * @param char $nom
     * @param char $prenom
     * @param char $adresse
     * @param char $telFixe
     * @param char $telPort
     * @param char $dateadher
     * @param char $cat
     */
    public function insertInfosNouvelAdherent($nom,$prenom,$adresse,$cp,$ville,$email,$telFixe,$telPort,$dateAdher,$cat){
        $requetePrepare = PdoKeren::$monPdo->prepare(
            'INSERT INTO adherents'
            . "VALUES(NULL,:unNom,:unPrenom,:uneAdresse,:unCP,:uneVille,:unEmail,:unTelFixe,:unTelPort,:uneDateAdhesion,:uneCat)"
        );
        $requetePrepare->bindParam(':unNom', $nom , PDO::PARAM_STR);
        $requetePrepare->bindParam(':unPrenom', $prenom , PDO::PARAM_STR);
        $requetePrepare->bindParam(':uneAdresse', $adresse , PDO::PARAM_STR);
        $requetePrepare->bindParam(':unCP', $cp , PDO::PARAM_INT);
        $requetePrepare->bindParam(':uneVille', $ville , PDO::PARAM_STR);
        $requetePrepare->bindParam(':unEmail', $email , PDO::PARAM_STR);
        $requetePrepare->bindParam(':unTelFixe', $telFixe , PDO::PARAM_INT);
        $requetePrepare->bindParam(':unTelPort', $telPort , PDO::PARAM_INT);
        $requetePrepare->bindParam(':uneDateAdhesion', $dateAdher , PDO::PARAM_STR);
        $requetePrepare->bindParam(':uneCat', $cat , PDO::PARAM_STR);
        $requetePrepare->execute();
        if($requetePrepare->execute()){
            echo "bien, ligne insérée";
        }else{
            echo "zut, echec d'insertion";
        }
    }
    
    /**
     * Retourne le nom et le prenom du bénéficiaire
     * @param string $idBeneficiaire   id du bénéficiaire
     * @return array                   tableau contenant nom et prenom de l'eleve.    
     */
    public function getNomBeneficiaire($idBeneficiaire){
        $requetePrepare = PdoKeren::$monPdo->prepare(
            'SELECT adherents.nom ,adherents.prenom '
            . 'FROM adherents '
            . 'WHERE adherents.id=:unId '   
        );
        $requetePrepare->bindParam(':unId', $idBeneficiaire , PDO::PARAM_STR);
        $requetePrepare->execute();
        return $requetePrepare->fetch();
    }        
    
    /*public function getInfosDonateur($idDonateur){
        $requetePrepare = PdoKeren::$monPdo->prepare(
            'SELECT *'
            . 'FROM donateur'
            . 'WHERE id=:unId'
        );
        $requetePrepare->bindParam(':unId', $idDonateur , PDO::PARAM_STR);
        $requetePrepare->execute();
        return $requetePrepare->fetch();
    }*/
    public function majCoordonneesBeneficiaire($idBeneficiaire,$nom,$prenom,$adresse,$cp,$ville,$email,$telPort,$telFixe,$dateAdher,$cat){
        $requetePrepare = PdoKeren::$monPdo->prepare(
            'UPDATE adherents'
            . 'SET nom = :unNom, prenom = :unPrenom, adresse = :uneAdresse, cp = :unCP, '
            . 'ville = :uneVille, email = :unEmail, telPort= :unTelPort, telFixe = :unTelFixe, '
            . 'dateAdher = :uneDateAdher, idCategorie = :uneCat'
            . 'WHERE id = :unId'
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
        $requetePrepare->execute();
    }
    
   /* public function getAdresseCPVille($idBeneficiaire){
        $requetePrepare = PdoKeren::$monPdo->prepare(
            'SELECT adresse,cp,ville'
            . 'FROM adherents'
            . 'WHERE id=:unId'
        );
        $requetePrepare->bindParam(':unId', $idBeneficiaire , PDO::PARAM_STR);
        $requetePrepare->execute();
        return $requetePrepare->fetchAll();
    }*/
    
    public function getLieuxVacs(){
        $requetePrepare = PdoKeren::$monPdo->prepare(
            'SELECT *'
            . 'FROM lieuxVacs'
        );
        $requetePrepare->execute();
        return $requetePrepare->fetchAll();
    }
    
    public function insertActivite($libelle,$date,$cat){
        $requetePrepare = PdoKeren::$monPdo->prepare(
            'INSERT INTO activites'
            . 'VALUES(NULL,:unLibelle,:uneDate,(select id from categorie where libelle = :uneCat))'
        );
        $requetePrepare->bindParam(':unLibelle', $libelle , PDO::PARAM_STR);
        $requetePrepare->bindParam(':uneDate', $date , PDO::PARAM_STR);
        $requetePrepare->bindParam(':uneCat', $cat , PDO::PARAM_STR);
        $requetePrepare->execute();
    }
    
    public function getLesInfosAdherent($idAdherent){
        $requetePrepare = PdoKeren::$monPdo->prepare(
            'SELECT nom as nom, prenom as prenom, adresse as adresse, cp as cp, '
            . 'ville as ville,email as email, telFixe as telFixe, telPort as telPort, idcategorie as idcategorie '
            . 'FROM adherents'   
            . 'WHERE id= :unId'
        );
        $requetePrepare->bindParam(':unId', $idAdherent , PDO::PARAM_INT);
        if($requetePrepare->execute()){
            echo 'bien';
        }else{
            echo 'pas bien';
        }
        $laLigne = $requetePrepare->fetch();
        return $laLigne;
    }  
    
    public function getActiviteSuivante($idCategorie,$dateActuelle){
        $requetePrepare = PdoKeren::$monPdo->prepare(
            'SELECT libelle'
            .'FROM activites'
            .'WHERE idcategorie= :unIdCategorie '
            .'AND date > :laDateActuelle'    
                );
        $requetePrepare->bindParam(':unIdCategorie', $idCategorie , PDO::PARAM_STR);
        $requetePrepare->bindParam(':laDateActuelle', $dateActuelle , PDO::PARAM_STR);
        $requetePrepare->execute();
        $requetePrepare->fetchAll();
    }
}