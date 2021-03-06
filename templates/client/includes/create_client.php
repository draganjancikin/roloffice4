<?php
// create client
if($_SERVER["REQUEST_METHOD"] == "POST" AND isset($_GET["createClient"])) {
  
  // curent loged user
  $user_id = $_SESSION['user_id'];
  $user = $entityManager->find("\Roloffice\Entity\User", $user_id);

  $type_id = $_POST["type_id"];
  $type = $entityManager->find("\Roloffice\Entity\ClientType", $type_id);

  
  if (empty($_POST['name'])) {
    $nameError = 'Ime mora biti upisano';
    die('<script>location.href = "?new&name_error" </script>');
	} else {
    $name = basicValidation($_POST['name']);
  }
  
  $name_note = basicValidation($_POST["name_note"]);

  if(isset($_POST["lb"])) {
    $lb = $_POST["lb"];
  } else {
    $lb = "";
  }

  if(isset($_POST["is_supplier"])) {
      $is_supplier = $_POST["is_supplier"];
  } else {
      $is_supplier = 0;
  }

  $country_id = $_POST["country_id"];
  $country = $entityManager->find("\Roloffice\Entity\Country", $country_id);
  $city_id = $_POST["city_id"];
  $city = $entityManager->find("\Roloffice\Entity\City", $city_id);
  $street_id = $_POST["street_id"];
  $street = $entityManager->find("\Roloffice\Entity\Street", $street_id);
  $home_number = basicValidation($_POST["home_number"]);
  $address_note = basicValidation($_POST["address_note"]);
  $note = basicValidation($_POST["note"]);

  // check if name already exist in database
  $control_name = $entityManager->getRepository('\Roloffice\Entity\Client')->findBy( array('name' => $name) );
  if ($control_name) {
    echo "Username already exist in database. Please choose new username!";
    exit(1);
    // die('<script>location.href = "?alert&ob=2" </script>');
  }

  $newClient = new \Roloffice\Entity\Client();

  $newClient->setType($type);
  $newClient->setName($name);
  $newClient->setNameNote($name_note);
  $newClient->setLb($lb);
  $newClient->setIsSupplier($is_supplier);
  $newClient->setCountry($country);
  $newClient->setCity($city);
  $newClient->setStreet($street);
  $newClient->setHomeNumber($home_number);
  $newClient->setAddressNote($address_note);
  $newClient->setNote($note);
  $newClient->setCreatedAt(new DateTime("now"));
  $newClient->setCreatedByUser($user);
  $newClient->setModifiedAt(new DateTime("0000-01-01 00:00:00"));

  $entityManager->persist($newClient);
  $entityManager->flush();

  // gest last id and redirect
  $new_client_id = $newClient->getId();
  die('<script>location.href = "?viewClient&client_id='.$new_client_id.'" </script>');

}
