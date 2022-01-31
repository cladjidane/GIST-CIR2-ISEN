<?php
ini_set('display_errors', 'on');
error_reporting(E_ALL);

class Personne1 {
  //attributs non accessibles directements
  private $nom;
  private $prenom;
  private $age;
  private $mail;
  private $genre;

  //constructeur initialisant les attributs
  public function __construct($personne) {
    $this->nom = $personne['nom'];
    $this->prenom = $personne['prenom'];
    $this->age = $personne['age'];
    $this->mail = $personne['mail'];
    $this->genre = $personne['genre'];
  }

  public function getNom() {
    return $this->nom;
  }

  public function setNom($nom) {
    $this->nom = $nom;
  }

  public function getPrenom() {
    return $this->prenom;
  }

  public function setPrenom($prenom) {
    $this->prenom = $prenom;
  }

  public function getAge() {
    return $this->age;
  }

  public function setAge($age) {
    $this->age = $age;
  }

  public function getMail() {
    return $this->mail;
  }

  public function setMail($mail) {
    $this->mail = $mail;
  }

  public function getGenre() {
    return $this->genre;
  }

  public function setGenre($genre) {
    $this->genre = $genre;
  }
}

if (isset($_POST) && !empty($_POST)) {
  $personne = new Personne1($_POST);
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
</head>

<body>

  <?php if (isset($personne)) : ?>
    <div style="padding: 20px; background: silver">
      <h3>Infos saisies</h3>
      Nom : <?php echo $personne->getNom(); ?><br />
      Prénom : <?php echo $personne->getPrenom(); ?><br />
      Mail : <?php echo $personne->getMail(); ?><br />
      Âge : <?php echo $personne->getAge(); ?><br />
      Genre : <?php echo $personne->getGenre(); ?><br />
    </div>
  <?php else : ?>

    <form action="" method="POST">

      <label for="nom">Nom</label><br />
      <input name="nom" type="text" value="" /> <br />

      <label for="prenom">Prénom</label><br />
      <input name="prenom" type="text" value="" /> <br />

      <label for="age">Âge</label><br />
      <input name="age" type="text" value="" /> <br />

      <label for="mail">Mail</label><br />
      <input name="mail" type="text" value="" /> <br />

      <label for="genre">Genre</label><br />
      <input checked="checked" name="genre" type="radio" value="Masculin" /> Masculin <br />
      <input name="genre" type="radio" value="Féminin" /> Masculin <br />
      <input name="genre" type="radio" value="Sans" /> Sans<br />

      <button type="submit" value="Submit">Submit</button>
    </form>
  <?php endif; ?>
</body>

</html>