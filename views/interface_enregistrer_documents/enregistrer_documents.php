
<!-- IMPORT CONTROLLERS FOR THE VIEW SAVE DOCUMENTS... -->

<?php


    include("../../controllers/interface_enregistrer_documents/controller_enregistrer_documents.php");

?>

<!-- VIEW OF THE PROFILE | SAVE DOCUMENTS -->

<!DOCTYPE html>

<html lang="fr">

<!-- head section -->

    <head>
        
        <meta charset="UTF-8">
        
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
        <title>Profile | Enregistrer</title>
        
        <style>
        
        /* general settings */
            *
            {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            @font-face 
            {
                src: url('./polices/ballpark.woff') format('woff'),
                    url('./polices/ballpark.eot?#iefix') format('embedded-opentype'),
                    url('./polices/ballpark.ttf') format('truetype');
                font-family: 'ballpark';
            }

            @font-face 
            {

                src: url('./polices/dayrom.woff') format('woff'),
                    url('./polices/dayrom.eot?#iefix') format('embedded-opentype'),
                    url('./polices/dayrom.ttf') format('truetype');
                font-family: 'dayrom';
            }
        
        /* root section */

            html
            {
                font-size: 16px;
            }

        /* body section */
            
            html body
            {
                font-size: 16px;
                font-family: tahoma;
                color: white;
                background-image: url("../images/white_bg_3.jpg");
                background-repeat: no-repeat;
                background-size: cover;
                display: grid;
                grid-template-areas: "header" "middle-content" "footer"; 
                grid-template-columns: 100%;
                grid-template-rows: 15vh 80vh 5vh;
                row-gap: 10vh;
            }
            
            body #header-container
            {
                grid-area: header;
                background-color: rgb(30, 30, 30);
            }

            body #middle-content
            {
                width: 80%;
                margin-left: auto;
                margin-right: auto;
                grid-area: middle-content;
                display: grid;
                grid-template-areas: "nav main"; 
                grid-template-columns: 20% 80%;
                grid-template-rows: auto;
                column-gap: 40px;
            }
            
            body #middle-content nav 
            {   
                grid-area: nav;
            }

            body #middle-content main 
            {
                grid-area: main;
            }
            
            body footer
            {
                grid-area: footer;
                background-color: rgb(30, 30, 30);
            }

        /* header section */

            body #header-container
            {
                color:#d9dfeb;
                font-weight: bolder;
                display: grid;
                grid-template-areas: "header-content";
            }
            
            header #header-content
            {   
                grid-area: header-content;
                display: grid;
                grid-template-areas: "logo-uvs text-uvs-container icon-profile";
                grid-template-columns: 1fr 1fr 1fr;
                align-content: center;
                align-items: center;
                align-content: center;
            }

            header #logo-uvs
            {
                grid-area: logo-uvs;
                width: 130px;
                height: 70px;
                background-image: url("../images/uvs_logo.jpg");
                background-size: cover;
                background-repeat: no-repeat;
                background-position: center;
            }

            header #text-uvs-container
            {
                grid-area: text-uvs-container;
            }

            header #text-uvs
            {
                color: black;
                text-align: center;
                font-family: 'dayrom';
                animation-name: text-uvs-animation;
                animation-duration: 10s;
                animation-timing-function: ease-out;       
                animation-iteration-count: infinite;
            }

            header #icon-profile
            {
                grid-area: icon-profile;
                justify-self: end;
                display: flex;
                flex-direction: column;
            }
            
            header #home-link
            {
                align-self: center;
                text-decoration: none;
            }

            header #text-uvs:hover
            {
                color: rgb(12, 173, 80);
            }

            @keyframes text-uvs-animation
            {
            100% {color: white;}
            }

            header #icon-profile a 
            {
                text-decoration: none;
                color:white;
                align-self: center;
            }

            header #icon-profile img
            {
                border: 1px solid white;
                height: 50px;
                width: 50px;
                border-radius: 50%;
            }

        /* nav section */

            body #middle-content nav 
            {
                display: grid;
                grid-template-areas: "ul";
                grid-template-rows: auto;
                grid-template-columns: auto;
            }

            body #middle-content nav ul
            {
                width: 100%;
                display: flex;
                flex-direction: column;
            }

            body #middle-content nav a 
            {
                text-decoration: none;
                color: #C96C27;
            }

            body #middle-content nav li 
            {
                color: white;
                width:100%;
                margin-top: 2px;
                margin-bottom: 2px;;
                background-color: rgb(30, 30, 30);
                display: flex;
                flex-direction: row;
            }
            
            body #middle-content #nav-links-container
            {
                align-self: center;
            }

            body #middle-content nav .link-hover:hover
            {
                color: white;
                background-color: rgb(12, 173, 80);
            }

            body #middle-content nav img 
            {
                height: 50px;
                width: 50px;
                border: 1px solid #C96C27;
                border-radius: 50%;
            }

            body #middle-content nav #enregistrer_documents_link  
            {
                background-color: #C96C27;
            }
            
        /* main section */
            
            body #middle-content main
            {
                font-size: 16px;
                display: grid;
                grid-template-areas: "main-content";
                grid-template-rows: auto;
                grid-template-columns: auto;
                justify-items: center;
            }

            body #middle-content main #main-content
            {
                font-size: 16px;
                grid-area: main-content;
                color: #C96C27;
                background-color: rgb(30, 30, 30);
                display: grid;
                grid-template-areas: "icon-img" "form";
                grid-template-rows: auto;
                grid-template-columns: auto;
                justify-items: center;
            }

            body #middle-content main #main-content img 
            {
                grid-area: icon-img;
                height: 200px;
                width: 200px;
                border: 1px solid white;
                border-radius: 50%;
                margin-top: 15px;
                margin-bottom: 15px;
                align-self: center;
            }

            body #middle-content main form 
            {
                grid-area: form;
                display: grid;    
                grid-template-areas: "form-section-one" "form-section-two" "form-section-three" "form-section-four" "form-section-five" "form-section-six";
                row-gap: 2px;
            }

            #form-section-one
            {
                grid-area: form-section-one;    
            }
            
            #form-section-two
            {
                grid-area: form-section-two;    
            }
            
            #form-section-three
            {
                grid-area: form-section-three;    
            }
            
            #form-section-four
            {
                grid-area: form-section-four;    
            }            
            
            #form-section-five
            {
                grid-area: form-section-five;  
                justify-self: center;  
            }            
            
            #form-section-six
            {
                grid-area: form-section-six;    
            }

            body #middle-content main .form-sections
            {
                padding: 10px;
                display: grid;
                grid-template-areas: "p p";
                grid-template-rows: 1fr;
                grid-template-columns: 1fr 1fr;                   
                column-gap: 10px;
            }

            body #middle-content main .form-sections label 
            {
                color: white;
            }

            body #middle-content main #section-feedback-errors
            {
                font-weight: bold;
                background-color: white;
                text-transform: uppercase;
                color: red;
                display: flex;
                justify-content: center; 
            }

            body #middle-content main input 
            {
                width: 100%;
                color: black;
                padding: 5px;
            }

            body #middle-content main input:focus
            {
                outline: black;
                border: 1px solid black;
            }

            body #middle-content main select 
            {
                width: 100%;
                color: black;
                padding: 5px;
            }

            body #middle-content main #button 
            {
                font-weight: bolder;
                font-family: Georgia, 'Times New Roman', Times, serif;
                text-transform: uppercase;
                background-color: #C96C27;
                color: white;
                padding: 7px;
                cursor: pointer;
            }
 
            body #middle-content main #button:hover 
            {
                color: white;
                background-color: rgb(12, 173, 80)
            }

        /* the footer section */  

            footer
            {
                text-align: center;
                width: 100%;
                display: flex;
                justify-content: center;
                align-items: center;
            }

        /* tablet view */

            @media only screen and (max-width: 768px)
            {
            
            /* body section */
                html body
                {
                    font-size: 14px;
                    font-family: tahoma;
                    color: white;
                    background-image: url("../images/white_bg_3.jpg");
                    background-repeat: no-repeat;
                    background-size: cover;
                    display: grid;
                    grid-template-areas: "header" "middle-content" "footer"; 
                    grid-template-columns: 100%;
                    grid-template-rows: auto;
                    row-gap: 5vh;
                }
            /* header section */
                
                header #logo-uvs
                {
                    grid-area: logo-uvs;
                    width: 100px;
                    height: 50px;
                }

                header #header-content #text-uvs 
                {
                    font-size: 10px;
                }

                header #icon-profile img
                {
                    height: 40px;
                    width: 40px;
                } 

                
            /* middle content section */

                body #middle-content
                {
                    width: 80%;
                    margin-left: auto;
                    margin-right: auto;
                    grid-area: middle-content;
                    display: grid;
                    grid-template-areas: "nav" "main"; 
                    grid-template-columns: auto;
                    grid-template-rows: auto;
                    row-gap: 1vh;
                }

            /* nav section */

                body #middle-content nav img
                {
                    height: 40px;
                    width: 40px;
                }                
                
                body #middle-content nav 
                {
                    font-size: 14px;
                }

            /* main section */

                body #middle-content main #main-content img 
                {
                    height: 150px;
                    width: 150px;
                }

                body #middle-content main #section-feedback-errors
                {
                    font-size: 14px;
                }

                body #middle-content main .form-sections label 
                {
                    font-size: 14px;
                }

                body #middle-content main #button 
                {
                    font-size: 14px;
                }

            }       
            
        /* mobile view */

            @media only screen and (max-width: 600px) 
            {
            
            /* body section */
                html body
                {
                    font-size: 12px;
                    font-family: tahoma;
                    color: white;
                    background-image: url("../images/white_bg_3.jpg");
                    background-repeat: no-repeat;
                    background-size: cover;
                    display: grid;
                    grid-template-areas: "header" "middle-content" "footer"; 
                    grid-template-columns: 100%;
                    grid-template-rows:  auto;
                    row-gap: 5vh;
                }

            /* header section */
                header #text-uvs
                {
                    display : none;
                }
                
            /* middle content section */

                body #middle-content
                {
                    font-size: 12px;
                    width: 100%;
                    margin-left: auto;
                    margin-right: auto;
                    grid-area: middle-content;
                    display: grid;
                    grid-template-areas: "nav" "main"; 
                    grid-template-columns: 100%;
                    grid-template-rows: auto;
                    row-gap: 1vh;
                }
            /* nav section */
                nav div
                {
                    font-size: 12px;
                }

                body #middle-content nav img 
                {
                    height: 30px;
                    width: 30px;
                }
            
            /* main section */

                body #middle-content main
                {
                    font-size: 12px;
                    display: grid;
                    grid-template-areas: "main-content";
                    grid-template-rows: 100%;
                    grid-template-columns: 100%;
                    justify-items: start;
                }

                body #middle-content main .form-sections label 
                {
                    font-size: 12px;
                } 
                
                body #middle-content main #section-feedback-errors
                {
                    font-size: 12px;
                }

                body #middle-content main #main-content img 
                {
                    grid-area: icon-img;
                    height: 100px;
                    width: 100px;
                }

                body #middle-content main input 
                {
                    padding: 2px;
                }

                body #middle-content main select 
                {
                    padding: 2px;
                }

                body #middle-content main #button 
                {
                    padding: 4px;
                    font-size: 12px;
                    font-weight: bold;
                }
            }

        </style>

    </head>

<!-- body section -->

    <body>

    <!-- header section -->
        
        <?php
            
            include("../header/header_view.php"); 
        
        ?>
    
    <!-- middle content section -->
        
        <section id="middle-content">
            
            <!-- nav section -->

                <?php
                    if ($user_student) 
                    {
                        # user is a student...
                        include("../nav/nav_view_student.php"); 
                    }
                    else 
                    {
                        # user is an agent uvs
                        include("../nav/nav_view_agent_uvs.php"); 
                    } 
                ?>
    
            <!-- main section -->

                <main>

                    <section id="main-content">

                        <!-- icon image section -->

                            <img src="../images/add_file.png" alt="fill_form">

                        <!-- form section -->

                            <form action="" method="post" enctype="multipart/form-data" id="formulaire">
                                
                                <section class="form-sections" id="section-feedback-errors" id="form-section-one">
                                    
                                    <?php

                                        if ($errors_message == "INE INCORRECT")
                                        {
                                            # INE INCORRECT...
                                                echo "$errors_message" ;
                                        }                                       
                                        
                                        if ($errors_message == "INE INTROUVABLE")
                                        {
                                            # INE NOT EXIST...
                                                echo "$errors_message" ;
                                        }
                                        
                                        if($exist_message == "DOCUMENTS DÈJÀ ENREGISTRÉS")
                                        {
                                            # DOCUMENTS ALREADY EXIST...
                                            echo "$exist_message";
                                        }

                                        if ($errors_message == "DOCUMENTS NON ENREGISTRÉS")
                                        {
                                            # DOCUMENTS NOT SAVED...
                                            echo "$errors_message";
                                        }

                                        if($success_message == "DOCUMENTS ENREGISTRÉS")
                                        {
                                            # DOCUMENTS SAVED...
                                            echo 
                                            '   <p style="color: rgb(12, 173, 80);">
                                                    DOCUMENTS ENREGISTRÉS AVEC SUCCÉS
                                                </p>
                                            ';
                                        }   
                                    ?>

                                </section>

                                <section class="form-sections" id="form-section-two">
                        
                                    <p title="N00471720151">
    
                                        <label for="ine">INE*:</label> <br>
                                        
                                        <input type="text" name="ine" id="ine" required maxlength="20">

                                    </p>
                                    
                                    <p title="L1">
                                        
                                        <label for="annee_etude">Année d'étude*:</label> <br>
                                        
                                        <select name="annee_etude" id="annee_etude">
        
                                            <option value="null"></option>
                                            
                                            <option value="L1">Licence 1</option>
                                            
                                            <option value="L2">Licence 2</option>
                                            
                                            <option value="L3">Licence 3</option>
                                            
                                            <option value="M1">Master 1</option>
                                            
                                            <option value="M2">Master 2</option>
                                            
                                            <option value="M2">Doctorat</option>
                                        
                                        </select>
                                    
                                    </p>
                                
                                </section>
                                
                                <section class="form-sections" id="form-section-three">

                                    <p title="MAI">

                                        <label for="programme_etude">Programme d'étude*:</label> <br>
                                        
                                        <select name="programme_etude" id="programme_etude">
                                            
                                            <option value="null"></option>
                                            
                                            <optgroup label="STN:">
                                                
                                                <option value="AGN">Arts graphiques et numériques</option>
                                                
                                                <option value="CD">Communication digitale</option>
                                                
                                                <option value="IDA">Informatique - développement d’applications</option>
                                                
                                                <option value="MAI">Mathématiques appliquées et Informatique</option>
                                                
                                                <option value="MIC">Multimédia, Internet et Communication</option>                                               
                                                
                                                <option value="CYB">Cybersécurité</option>                                               
                                                
                                                <option value="MMASN">
                                                    Modélisation mathématique, Analyse et Simulation numériques
                                                </option>
                                                
                                                <option value="Robotique">Robotique</option>                                                 
                                                
                                                <option value="GMBI">Génétique moléculaire et bio-informatique</option>                                                 
                                            
                                            </optgroup>                                            
                                            
                                            <optgroup label="SEJA:">
                                                
                                                <option value="AES">Administration Economique et Sociale</option>
                                                
                                                <option value="DI">Droit et Informatique</option>
                                                
                                                <option value="SEG">Sciences Economiques et de Gestion</option>
                                                
                                                <option value="SJ">Sciences Juridiques</option>
                                                
                                                <option value="SP">Science Politique</option>                                                                                            
                                            
                                            </optgroup>                                            
                                            
                                            <optgroup label="LSHE:">
                                                
                                                <option value="ANG">Anglais</option>
                                                
                                                <option value="SE">Sciences de l’éducation</option>
                                                
                                                <option value="Sociologie">Sociologie</option>                                                                                            
                                            
                                            </optgroup>
                                        
                                        </select>

                                    </p>

                                    <p title="IL" class="input-control-1">
                                        
                                        <label for="specialite">Spécialité:</label> <br>
                                        
                                        <select name="specialite" id="specialite">
                                            
                                            <option value="null"></option>
                                            
                                            <optgroup label="STN:">
                                                
                                                <option value="IL">Ingénierie Logicielle</option>
                                                
                                                <option value="MCS">Modélisation et Calcul scientifique</option>
                                                
                                                <option value="SRIV">Systèmes, Réseaux et Infrastructures virtuelles</option>
                                                
                                                <option value="MCD">Multimédia et communication digitale</option>
                                                
                                                <option value="RCC">Réalisation et Création cinématographiques</option>
                                                
                                                <option value="CS">Calcul scientifique</option>
                                                
                                                <option value="BDA">Big data analytics</option>
                                                
                                                <option value="CYB">Cybersécurité</option>
                                                
                                                <option value="IA">Intelligence artificielle</option>
                                                
                                                <option value="Robotique">Robotique</option>
                                            
                                            </optgroup>
                                            
                                            <optgroup label="SEJA:" >
                                            
                                                <option value="FC">Finance-Comptabilité</option>  
                                                
                                                <option value="ACG">Audit et Contrôle de Gestion</option>  
                                                
                                                <option value="ELDD">Economie de l’environnement et développement durable</option>  
                                                
                                                <option value="MSCGRH">Management stratégique et conseil en gestion des ressources humaines</option>  
                                                
                                                <option value="MCTDL">Management des collectivités territoriales et développement local</option>  
                                                
                                                <option value="PSD">Paix, Sécurité et Développement</option>  
                                                
                                                <option value="PMP">Politique et Management Publics</option>
                                                
                                                <option value="DPAP">Droit Public - Administration publique</option>
                                                
                                                <option value="DPDIP">Droit Public - Droit International Public</option>
                                                
                                                <option value="DPDIP">Droit Public - Droit International Public</option>
                                            
                                            </optgroup>
                                            
                                            <optgroup label="LSHE:">
                                                
                                                <option value="ANG">Anglais</option>
                                                
                                                <option value="SETE">Sciences de l’éducation : Technologies éducatives</option>
                                                
                                                <option value="SEAGEE">Sciences de l’éducation : Administration et gouvernance des établissements d’enseignement</option>
                                                
                                                <option value="SDIS">Sociologie : Dynamiques et institutions socioprofessionnelles</option>
                                                
                                                <option value="SRSC">Sociologie : Religion, Société et Culture</option>
                                            
                                            </optgroup>
                                        
                                        </select>
                                    </p>
                                </section>

                                <section class="form-sections" id="form-section-four"> 
                                        <p>
                                            <label for="documents_type">Documents*:</label> <br>       
                                            <select name="documents_type" id="documents_type">
                                                <option value=""></option>
                                                <option value="attestations">Attestations</option>
                                                <option value="notes">Notes</option>
                                            </select>
                                        </p>
                                        <p title="S1" >
                                            <label for="semestre_etude">Semestre d'étude:</label> <br>
                                            <select name="semestre_etude" id="semestre_etude">
                                                <option value=""></option>
                                                <option value="">Semestre 1</option>
                                                <option value="">Semestre 2</option>
                                                <option value="">Semestre 3</option>
                                                <option value="">Semestre 4</option>
                                                <option value="">Semestre 5</option>
                                                <option value="">Semestre 6</option>
                                            </select>
                                        </p>
                                                            
                                </section>

                                <section class="form-sections form-section-files" id="form-section-five"> 
                                    
                                        <p class="file">
                                            <label for="file">Le fichier PDF:</label> <br>       
                                            <input type="file" name="documents_pdf" id="file" required>
                                        </p>
                                        <p class="file">
                                            <label for="file">Le fichier JPG:</label> <br>       
                                            <input type="file" name="documents_jpg" id="file" required>
                                        </p>
                                                
                                </section>

                                <section class="form-sections" id="form-section-six">
                                
                                    <p>
                                        
                                        <input type="submit" value="enregistrer" id="button">
                                    
                                    </p>
                            
                                </section>

                            </form>
  
                    </section>

                </main>
            
        </section>
    
    <!-- footer section -->

        <footer id="footer-container">

            <h6>

                Copyright &copy; UVS | 2022 - Tous droits réservés <br>
                
                Ministère de l'Enseignement Supérieur, de la Recherche et de l'Innovation
            
            </h6>
    
        </footer>   

    </body>

</html>