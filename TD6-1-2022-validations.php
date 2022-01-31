<?php
ini_set('display_errors', 'on');
error_reporting(E_ALL);

$error = null;

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
  // Check values
  $validate_values = array();
  $validate_values['nom'] = isset($_POST['nom']) && !empty($_POST['nom']) ? $_POST['nom']: false;
  $validate_values['prenom'] = isset($_POST['prenom']) && !empty($_POST['prenom']) ? $_POST['prenom']: false;
  $validate_values['age'] = filter_input(INPUT_POST, 'age', FILTER_VALIDATE_INT);
  $validate_values['mail'] = filter_input(INPUT_POST, 'mail', FILTER_VALIDATE_EMAIL);
  $validate_values['genre'] = isset($_POST['genre']) && !empty($_POST['genre']) ? $_POST['genre']: false;

  if(!in_array(false, $validate_values)) $personne = new Personne1($validate_values);
  else $error = "Veuillez vérifier vos données";
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

    <?php if (isset($error)) : ?>
    <div style="padding: 20px; background: red; color: white;">
    <?php echo $error; ?>
    </div>
    <?php endif; ?>

    <form action="" method="POST">

      <label for="nom">Nom</label><br />
      <input name="nom" type="text" value="<?php echo isset($_POST['nom']) && !empty($_POST['nom']) ? $_POST['nom']: ''; ?>" /> <br />

      <label for="prenom">Prénom</label><br />
      <input name="prenom" type="text" value="<?php echo isset($_POST['prenom']) && !empty($_POST['prenom']) ? $_POST['prenom']: ''; ?>" /> <br />

      <label for="age">Âge</label><br />
      <input name="age" type="text" value="<?php echo isset($_POST['age']) && !empty($_POST['age']) ? $_POST['age']: ''; ?>" /> <br />

      <label for="mail">Mail</label><br />
      <input name="mail" type="text" value="<?php echo isset($_POST['mail']) && !empty($_POST['mail']) ? $_POST['mail']: ''; ?>" /> <br />

      <label for="genre">Genre</label><br />
      <?php 
        $radio_inputs = array("Masculin", "Féminin", "Sans");
        foreach($radio_inputs as $key => $value) :
      ?>
      <input 
        <?php echo (isset($_POST['genre']) && !empty($_POST['genre']) && $_POST['genre'] == strtolower($value)) ? 'checked': ''; ?>
        name="genre" 
        type="radio" 
        value="<?php echo strtolower($value); ?>"
      /> <?php echo $value; ?>
      <?php endforeach; ?>

      <button type="submit" value="Submit">Submit</button>
    </form>
  <?php endif; ?>
</body>

</html>