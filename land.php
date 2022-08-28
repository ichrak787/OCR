<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>SmartId</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />

        <style>
            table {
            border-collapse: collapse;
            border-radius: 10px;
            box-shadow: 4px 5px 30px #7031dd ;
            overflow: hidden;
            font-family: "Quicksand", sans-serif;
            font-weight: bold;
            font-size: 20px;
            width: 100%;
            color: #0f18c0;
            }

            th {
            background: #94f7e6;
            color: #c8a9f7;
            text-align: left;
            }

            th,
            td {
            padding: 10px 20px;
            }

            tr:nth-child(even) {
            background: #d4bae4;
            }
            nav .logo{
                width: 120px;
                cursor: pointer;
                font-size: 2.5rem;
                font-style: oblique;
                font-weight: bold;
                text-decoration: none;
                color: #94f7e6;
            }

            input[type=file]::file-selector-button {
            border: 2px solid #94f7e6;
            padding: .2em .4em;
            border-radius: .8em;
            background-color: #94f7e6;
            transition: 1s;
            box-shadow: 4px 5px 30px #94f7e6 ;
            font-Size:14pt;
            height: 60px;
            }

            input[type=file]::file-selector-button:hover {
            background-color: #81ecec;
            border: 2px solid #00cec9;
            }

        </style>
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>       
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <a href="#" class="logo">SmartId</a>
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link" href="#services" style="color:#8a9898 ;">Services</a></li>
                        <li class="nav-item"><a class="nav-link" href="#about" style="color:#8a9898 ;">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="#team" style="color:#8a9898 ;">Team</a></li>
                        <li class="nav-item"><a class="nav-link" href="#contact" style="color:#8a9898 ;">Contact</a></li>
                        <li class="nav-item"><a class="nav-link" href="deconnexion.php" style="color:#FFB3B3">Deconnexion</a></li>
                    </ul>
                </div>
            </div>
        </nav>



        <!-- Masthead-->
        <header class="masthead">
            <div class="container">
                <input type="file" id="csvFileInput" style="padding-bottom: none ;  height: 60px;  box-shadow: 8px 10px 20px #94f7e6 ; color: #000000;background-color: #ffffff;  border-radius: .8em;">
                <div class="masthead-heading text-uppercase"> Data Science</div>
        
                <table id="csvRoot"></table>
            </div>
        </header>





        <div class="container">
        <a href="index3.php" class="back_btn"><img src="images/back.png"  width="10" height="20"> CRUD  </a>
        </div>




    
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
        <script src="lib/papaparse.min.js"></script>
      <script type="module" src="js/main.js"></script>
    </body>
</html>
