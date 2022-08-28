<?php 
    session_start();
    require_once 'config.php'; // ajout connexion bdd 


    // On récupere les données de l'utilisateur
    $req = $bdd->prepare('SELECT * FROM utilisateurs WHERE token = ?');
    $data = $req->fetch();
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="styles.css">

    
    <title>Smart-Id</title>


    <style>
    body {
    background: #262626;
    font-family: raleway;
    color: white;
    margin: 0;
    }


    .popup .content {
        width: 500px;
        height: 450px;
        z-index: 2;
        text-align: center;
        top: 50%;
        left: 50%;
        transform: translate(-50%,-150%) scale(0);
        padding: 20px;
        border-radius: 20px;
        background: #090909;
        position: absolute;
        box-shadow:  38px 38px 56px #9fefef, 
                    -25px -25px 38px #9fefef;
        z-index: 1;
    }
        
        /* CSS Code */


        
    h1 {
    font-weight: 600;
    padding-top: 20px;
    text-align: center;
    font-size: 32px;
    padding-bottom: 10px;
    }

    a {
    font-weight: 600;
    color: white;
    }

    .input-field .validate {
        border: none;
        margin-bottom: 15px;
        color: #000000;
        background: #262626;
        padding: 20px;
        font-size: 16px;
        border-radius: 10px;
        box-shadow: inset 5px 5px 5px #000000, 
                    inset -5px -5px 5px #000000;
        outline: none;
        }

    .second-button {
    margin-top: 20px;
    padding: 20px 30px;
    border-radius: 40px;
    border: none;
    color: white;
    font-size: 18px;
    font-weight: 500;
    background: #262626;
    box-shadow:  8px 8px 15px #202020, 
                -8px -8px 15px #2c2c2c;
    transition: box-shadow .35s ease !important;
    outline: none;
    }

    .second-button:active{
    background: linear-gradient(145deg,#222222, #292929);
    box-shadow: 5px 5px 10px #262626, -5px -5px 10px #262626;
    border: none;
    outline: none;
    }
    p{
    color: #bfc0c0;
    padding: 20px;
    }

    .first-button {
        cursor: pointer;
            border: none;
            background-color: transparent;
            
            color: #94f7e6;
            font-size: 1em;
            box-shadow: rgba(202, 124, 46, 0.8);
    }

    .first-button:active {  
    background: none;
    box-shadow:  5px 5px 10px #a6efe4, 
                -5px -5px 10px #a6efe4;
    border: none;
    }
    /* Popup active */
    .popup.active .content {
    transition: all 300ms ease-in-out;
    transform: translate(-50%,-50%) scale(1);
    }


    .popup .close-btn {
    color: white;
    font-size: 30px;
    border-radius: 50%;
    background: #292929;
    position: absolute;
    right: 20px;
    top: 20px;
    width: 30px;
    padding: 2px 5px 7px 5px;
    height: 30px;
    box-shadow:  5px 5px 15px #1e1e1e, 
                -5px -5px 15px #1e1e1e;
    }

</style>

</head>
<body>

    <div class="popup" id="popup-1">
        <div class="content">

            <!--Cancel Button-->
        
            <!--Login Form-->
            
            <!--Pop-up Button-->
            <form action="layouts/change_password.php" method="POST">
                <h1>Changer mon mot de passe</h1> 
                <br>

                <input type="password" id="email" name="email" placeholder="email" class="form-control" required/>

                <input type="password" id="current_password" name="current_password" placeholder="Mot de passe actuel" class="form-control" required/>
                

                <div class="input-field">
                    <input type="password" id="new_password" name="new_password" placeholder="Nouveau mot de passe" class="form-control" required/>
                </div>

                <div class="input-field">
                <input type="password" id="new_password_retype" name="new_password_retype" placeholder="Retapez le nouveau mot de passe" class="form-control" required/>
                </div>

                <button type="submit" class="second-button">Sauvegarder</button>
            </form>

            <div class="close-btn" onclick="togglePopup()">
            </div>
        
        </div>
    </div>




    <div class="container">
        <nav>
            <a href="#" class="logo">SmartId</a>
            <ul>
                <div>
                <p style="color: #E7A2DB; "> 
                    <font size="5.5">“ Where there is data smoke , there is business fire​. ” </font>
                    <br> - Thomas Redman
                </p>
                </div>
                
                <li>
                    <button class="btn" id="displayForm">Se Connecter</button>
                </li>

            </ul>
        </nav>

        <?php 
            if(isset($_GET['err'])){
                $err = htmlspecialchars($_GET['err']);
                switch($err){
                    case 'current_password':
                        echo "<strong>Le mot de passe actuel est incorrect</strong>";
                    break;

                    case 'success_password':
                        echo "<strong>Le mot de passe a bien été modifié ! </strong>";
                    break; 
                }
            }
        ?>

        <section>
            
            <div class="sec-container">

                <div class="form-wrapper">

                    <div class="card">
                        
                        <div class="card-header">
                            <div id="forLogin" class="form-header active">Se connecter</div>
                            <div id="forRegister" class="form-header">S'inscrire</div>
                        </div>

                        <div class="card-body" id="formContainer">


                            
                            
                            <form id="formLogin" action="connexion.php" method="post">

                                <input type="email" name="email" class="form-control" placeholder="Email" required="required" autocomplete="off">
                                <input type="password" name="password" class="form-control" placeholder="Mot de passe" required="required" autocomplete="off">
                                   

                                <?php 
                                    if(isset($_GET['login_err']))
                                    {
                                        $err = htmlspecialchars($_GET['login_err']);

                                        switch($err)
                                        {
                                            case 'password':
                                            ?>
                                                <p style="color: #EEA0D8 ";> ​🚩​​ Ooops !</p>
                                                    <strong>Erreur</strong> mot de passe <strong>incorrect</strong>
                                                
                                            <?php
                                            break;

                                            case 'email':
                                            ?>
                                                <p style="color: #EEA0D8 ";> ​🙊​​ Ooops !</p>
                                                    <strong>Erreur</strong> email <strong>incorrect</strong>
                                                
                                            <?php
                                            break;

                                            case 'already':
                                            ?>
                                                <p style="color: #EEA0D8 ";> ​🚩​​ Ooops !</p>
                                                    <strong>Erreur compte non existant</strong>
                                                
                                            <?php
                                            break;
                                        }
                                    }
                                    ?> 

                                    
                                    <br>
                                    <br>
                                    <button onclick="togglePopup()" class="first-button">
                                        <p style="color: #90E1E1 ";> ​ Changer mot de passe ? </p>
                                    </button>
                                    
                                    <br>
                                    <button type="submit" class="formButton">Connexion</button>


                            </form>



                            
                            <form id="formRegister" class="toggleForm" action="inscription_traitement.php" method="post">

                                <input type="email" name="email" class="form-control" placeholder="Email" required="required" autocomplete="off">
                                
                                <input type="password" name="password" class="form-control" placeholder="Mot de passe" required="required" autocomplete="off">
                                
                                <input type="password" name="password_retype" class="form-control" placeholder="Confirmer mot de passe" required="required" autocomplete="off"/>
                                                
                                <?php 
                                    if(isset($_GET['reg_err']))
                                    {
                                        $err = htmlspecialchars($_GET['reg_err']);

                                        switch($err)
                                        {
                                            case 'success':
                                                ?>
                                                    <div class="alert alert-success">
                                                        <strong>Succès</strong> inscription réussie !
                                                    </div>
                                                <?php
                                            break;

                                            case 'password':
                                            ?>
                                                <p style="color: #EEA0D8 ";> ​🚩​​ Ooops !</p>
                                                    <strong>Erreur</strong> mot de passe différent
                                            <?php
                                            break;

                                            case 'email':
                                            ?>
                                            <p style="color: #EEA0D8 ";> ​🚩​​ Ooops !</p>
                                                    <strong>Erreur</strong> email non valide
                                            <?php
                                            break;

                                            case 'email_length':
                                            ?>
                                            <p style="color: #EEA0D8 ";> ​🚩​​ Ooops !</p>
                                                    <strong>Erreur</strong> email trop long
                                            <?php 
                                            break;

                                            case 'already':
                                            ?>
                                            <p style="color: #EEA0D8 ";> ​👽​​ Ooops !</p>
                                                    <strong>Erreur</strong> compte deja existant
                                            <?php 

                                        }
                                    }
                                    ?>
                                
                                <button type="submit" class="formButton">Inscription</button>      
                                
                                
                            </form>

                        </div>

                    </div>
                </div>
            </div>
        </section>

    </div>


    

    <script>
        const displayform= _('displayForm');

        const forlogin= _('forLogin');
        const forRegister= _('forRegister');

        const loginForm= _('formLogin');
        const registerForm= _('formRegister');

        const formContainer= _('formContainer');

        displayform.addEventListener('click', showForm);

        
        


        forlogin.addEventListener('click', () => {
            forlogin.classList.add('active')
            forRegister.classList.remove('active')
            if (loginForm.classList.contains('toggleForm')) {
                
                formContainer.style.transform = 'translate(0%)';
                formContainer.style.transition = 'transform .5s';
                registerForm.classList.add('toggleForm');
                loginForm.classList.remove('toggleForm');

            }
        } )




        forRegister.addEventListener('click', () => {
            forlogin.classList.remove('active')
            forRegister.classList.add('active')
            if (registerForm.classList.contains('toggleForm')) {
                
                formContainer.style.transform = 'translate(-100%)';
                formContainer.style.transition = 'transform .5s';
                registerForm.classList.remove('toggleForm');
                loginForm.classList.add('toggleForm');

            }
        } )


        

        function _(e){
            return document.getElementById(e);
        }

        function showForm(){
            document.querySelector('.form-wrapper .card').classList.toggle('show');

        }




        function togglePopup() {
 document.getElementById("popup-1")
  .classList.toggle("active");
}

    </script>

     <!-- Optional JavaScript -->
    
            <!-- jQuery first, then Popper.js, then Bootstrap JS -->
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


</body>
</html>