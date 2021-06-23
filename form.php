<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>formulaire</title>
</head>
<body>
  <?php
  //variable for empty value
    $lastNameErr = $firstNameErr = $courrielErr = $phoneErr = $messageErr = $subjectsErr = "";
    $lastName = $firstName = $courriel = $phone = $subjects = $message = "";

    if($_SERVER["REQUEST_METHOD"]== "POST")
    {
      if(empty($_POST["lastName"]))
      {
        $lastNameErr = "Last Name is requiered";
      }else
      {
        $lastName = test_input($_POST["lastName"]);
        //regex
        if(!preg_match("/^[a-zA-Z-' ]*$/",$lastName))
        {
          $lastNameErr = "Only letters and white space allowed";
        }
      }

      if(empty($_POST["firstName"]))
      {
        $firstNameErr = "First Name is requiered";
      }else
      {
        $firstName = test_input($_POST["firstName"]);
        //regex
        if(!preg_match("/^[a-zA-Z-' ]*$/",$firstName))
        {
          $firstNameErr = "Only letters and white space allowed";
        }
      }
      if(empty($_POST["courriel"]))
      {
        $courrielErr = "email is requiered";
      }else
      {
        $courriel = test_input($_POST["courriel"]);
        //regex
        if(!filter_var($courriel, FILTER_VALIDATE_EMAIL))
        {
          $courrielErr = "Invalid email format";
        }
      }
      if(empty($_POST["phone"]))
      {
        $phoneErr = "phone number is requiered";
      }else
      {
        $phone = test_input($_POST["phone"]);
        //regex
        if(!preg_match("/^(?:(?:\+?1\s*(?:[.-]\s*)?)?(?:\(\s*([2-9]1[02-9]|[2-9][02-8]1|[2-9][02-8][02-9])\s*\)|([2-9]1[02-9]|[2-9][02-8]1|[2-9][02-8][02-9]))\s*(?:[.-]\s*)?)?([2-9]1[02-9]|[2-9][02-9]1|[2-9][02-9]{2})\s*(?:[.-]\s*)?([0-9]{4})(?:\s*(?:#|x\.?|ext\.?|extension)\s*(\d+))?$/" 
        ,$phone))
        {
          $phoneErr= "invalid phone number";
        }
      }
      if(empty($_POST["subjects"]))
      {
        $subjectsErr = "topic is requiered";
      }else
      {
        $gender = test_input($_POST["subjects"]);
      }

      
      if(empty($_POST["message"]))
      {
        $messageErr = "message is requiered";
      }else
      {
        $message = test_input($_POST["message"]);
        
      }
  
    }
    function test_input($data)
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

  ?>
  <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  method="post">
    <div>
      <span class="error"><?php echo $lastNameErr;?></span>
      <br>
      <label  for="lastName">Nom :</label>
      <input  type="text"  id="nom"  name="lastName">
    </div>
    <div>
      <span class="error"><?php echo $firstNameErr;?></span>
      <br>
      <label  for="firstName">Prénom :</label>
      <input  type="text"  id="prenom"  name="firstName">
    </div>
    <div>
      <span class="error"><?php echo $courrielErr;?></span>
      <br>
      <label  for="courriel">Courriel :</label>
      <input  type="email"  id="courriel"  name="email">
    </div>
    <div>
      <span class="error"><?php echo $phoneErr;?></span>
      <br>
      <label  for="phone">Téléphone :</label>
      <input  type="tel"  id="phone"  name="phone">
    </div>

    <span class="error"><?php echo $subjectsErr;?></span>
      <br>
    <select name="subjects" id="subjectSelect">
      <option value="">--Choisissez un sujet--</option>
      <option value="Problème de connexion">Problème de connexion</option>
      <option value="Déposer des suggestons">Déposer des suggestons</option>
      <option value="Remeciements">Remeciements</option>
    </select>
    
    <div>
      <span class="error"><?php echo $messageErr;?></span>
      <br>
      <label  for="message">Message :</label>
      <textarea  id="message"  name="message"></textarea>
    </div>
    <div  class="button">
      <button  type="submit">Envoyer votre message</button>
    </div>


</body>
</html>