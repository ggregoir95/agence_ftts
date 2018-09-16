<?php
/**
 * Created by PhpStorm.
 * User: mniang1
 * Date: 13/09/2018
 * Time: 11:00
 */

require('requetes.php');

$insertUser = "INSERT INTO user (fname, lname, email, pword)
VALUES (?,?,?,?)";

if(isset($_POST)){
    $firstname = $_POST['firstName'] = test_input($_POST["firstName"]);
    $lastname = $_POST['lastName']  = test_input($_POST["lastName"]);
    $email = $_POST['email']  = test_input($_POST["email"]);
    $pwd = $_POST['password']  = test_input($_POST["password"]);



    $stmt = $conn->prepare($insertUser);
    $stmt->bind_param("ssss", $firstname, $lastname, $email, $pwd);

    $stmt->execute();

    $stmt->close();


    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }



    header('Location: catalogue.php');
}
?>

    <div class="page-content">
        <h2>Inscription</h2>
        <h3 id="incription" class=incription>
            <h3>
                <form id="myFormInsc" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                    <label class="form_col" for="lastName">Nom :</label>
                    <input name="lastName" id="lastName" type="text" placeholder=""/>
                    <br />
                    <label class="form_col" for="firstName">Prénom :</label>
                    <input name="firstName" id="firstName" placeholder="" type="text" />
                    <br />
                    <label class="form_col" for="email">Email :</label>
                    <input name="email" id="email" placeholder="exemple@exemple.com" type="email" />
                    <br />
                    <label class="form_col" for="password">Mot de passe :</label>
                    <input name="password" id="password" placeholder="" type="password" />
                    <br />
                    <input type="submit" id="submitme" value="Inscrire" />
                </form>
    </div>

