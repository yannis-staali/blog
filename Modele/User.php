<?php

require_once 'Modele/Modele.php';

class User extends Model
{

      //Partie connexion -------------------------------------------
      public function check_fields() //sert a verifier le formulaire et retourne false si tout est rempli
      {
          if(isset($_POST['submit']))
          {
                if(empty($_POST['login']) && empty($_POST['password']))
                {
                    $error = 'Veuillez renseigner tous les champs' ;
                    return $error;
                }
                if(empty($_POST['login']))
                {
                   $error='Veuillez renseigner le login';
                    return $error;
                }
                if(empty($_POST['password']))
                {
                    $error='Veuillez renseigner le password';
                    return $error;
                }
               else return false;
          }
          
      }
      
      /**
       * ADAPTEE NOUVEAU MVC
       */
      public function check_login($login) //ici le check verifie si le login existe deja et retourne false si c'est le cas
      {
        //   $query = $this->pdo->prepare("SELECT*FROM utilisateurs WHERE login = ? ");
        $sql = 'SELECT*FROM utilisateurs WHERE login = ?';
        $requete = parent::executerRequete($sql, array($login)); // on utilise la methode du parent

        //   $query->bindValue(1, $login);
        //   $query->execute();

          $row = $requete->rowCount();
            if($row==1)
            {
              return false; 
            }
            elseif($row==0)
            { 
                 $error="login incorrect";
                 return $error; 
            }
        } 

        /**
         * ADAPTEE NOUVEAU MVC
         */
        public function check_pass_hash($login, $password)//ici on verifie le password et retourne false si il existe en bdd
        {   
            $sql = "SELECT * FROM utilisateurs WHERE login = ? ";
            $requete = parent::executerRequete($sql, array($login)); // on utilise la methode du parent
            // $query->bindValue(1, $login);
            // $query->execute();
  
            $row = $requete->fetch(PDO::FETCH_ASSOC);
            $verify_pass = password_verify($password, $row['password']);

              if($verify_pass==true)
              {
                  return false;
              }
              else
              $error= ' mot de passe incorrect';
              return $error;
        }

        /**
         * ADAPTEE NOUVEAU MVC
         */
        public function check_droits($login)//ici on verifie le password et retourne false si il existe en bdd
        {   
            $sql = "SELECT * FROM utilisateurs WHERE login = ? ";
            $requete = parent::executerRequete($sql, array($login)); // on utilise la methode du parent
  
            $row = $requete->fetch(PDO::FETCH_ASSOC);
            $droits = $row['id_droits'];

              // if($verify_pass==true)
              // {
              //     return false;
              // }
              // else
              // $error= ' mot de passe incorrect';
              return $droits;
        }

        /**
         * 
         */
        //changement de la methode create_session par la methode get_id
        public function get_id($login) //sert à creer une session identifiée grace à l'id
        {
          $sql = "SELECT * FROM utilisateurs WHERE login = ? ";
          $requete = parent::executerRequete($sql, array($login)); // on utilise la methode du parent

          $row = $requete->fetch(PDO::FETCH_ASSOC);
          $id = $row['id'];
          return $id;
        }

        //Fin partie connexion
        //--------------------------------------------------------------------------------
        //Debut partie inscription
        public function check_fields_inscription() //sert a verifier le formulaire et retourne false si tout est rempli
       {
           if(isset($_POST['submit']))
           {
 
                 if(empty($_POST['login']) && empty($_POST['password']) && empty($_POST['password2']))
                 {
                     $error = 'Veuillez renseigner tous les champs' ;
                     return $error;
                 }
                 if(empty($_POST['login']))
                 {
                    $error='Veuillez renseigner le login';
                     return $error;
                 }
                 if(empty($_POST['password']))
                 {
                     $error='Veuillez renseigner le password';
                     return $error;
                 }
                 if(empty($_POST['password2']))
                 {
                     $error='Veuillez renseigner le deuxieme password';
                     return $error;
                 }
                else return false;
             }
           
       }
      
       /**
        * ADAPTEE NOUVEAU MVC
        */
        public function check_login_inscription($login) //ici le check verifie si le login existe deja et retourne false si c'est le cas
        {
            $sql = "SELECT*FROM utilisateurs WHERE login = ? ";
            $requete = parent::executerRequete($sql, array($login)); // on utilise la methode du parent

            $row = $requete->rowCount();
            if($row==1)
            {
              return false; 
            }
            elseif($row==0)
            { 
                 $error="login deja pris";
                 return $error; 
            }
  
          } 

       public function check_same_password($password, $password2)
       {
         if($password == $password2)
         {
             return false;            
         }
         else 
         $error = 'les mots de passe ne correspondent pas';
         return $error;  
       }
     
       /**
        * ADAPTEE NOUVEAU MVC
        */
      public function insert($login, $password, $email, $iddroits) //ici on va faire une fonction d'insertion dans la bdd
      {
          $sql = "INSERT INTO utilisateurs (login, password, email, id_droits) VALUES (?, ?, ?, ?)";
          $requete = parent::executerRequete($sql, array($login, $password, $email, $iddroits)); // on utilise la methode du parent

       
          //   $query->bindValue(1, $login);
        //   $query->bindValue(2, $password);
        //   $query->execute();

      }

      //Fin partie inscription
        //--------------------------------------------------------------------------------
        //Debut partie profil

        public function check_fields_profil() //sert a verifier le formulaire et retourne false si tout est rempli
        {
            if(isset($_POST['submit']))
            {
  
                  if(empty($_POST['login']) && empty($_POST['password']) && empty($_POST['password2']))
                  {
                      $error = 'Veuillez renseigner tous les champs' ;
                      return $error;
                  }
                  if(empty($_POST['login']))
                  {
                     $error='Veuillez renseigner le login';
                      return $error;
                  }
                  if(empty($_POST['password']))
                  {
                      $error='Veuillez renseigner le password';
                      return $error;
                  }
                  if(empty($_POST['password2']))
                  {
                      $error='Veuillez renseigner le deuxieme password';
                      return $error;
                  }
                 else return false;
              }
            
        }

        public function check_login_profil($login) //ici le check verifie si le login existe deja et retourne false si ce n'est pas le cas
        {
            $query = $this->pdo->prepare("SELECT*FROM utilisateurs WHERE login = ? ");
            $query->bindValue(1, $login);
            $query->execute();
  
            $row = $query->rowCount();
              if($row==1)
              {
                    $error="login deja pris";
                    return $error;  
              }
              elseif($row==0)
              { 
                   return false;
              }
          }
          
        public function update($login, $password, $email, $iddroits, $idverify) //ici on va faire une fonction d'insertion dans la bdd
        {
            $sql = "UPDATE utilisateurs SET login = ?, password = ?, email = ?, id_droits = ? WHERE id = ? ";
            $requete = parent::executerRequete($sql, array($login, $password, $email, $iddroits, $idverify)); // on utilise la methode du parent

          return 'Changements effectués';
        }
}
?>


