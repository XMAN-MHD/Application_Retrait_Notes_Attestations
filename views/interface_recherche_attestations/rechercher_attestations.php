
<!-- IMPORT CONTROLLERS FOR THE VIEW SEARCH CERTIFICATIONS... -->

<?php

    include("../../controllers/interface_recherche_attestations/controller_rechercher_attestations.php");
    
?>

<!-- VIEW OF THE PROFILE | CERTIFICATIONS | SEARCH -->

<!DOCTYPE html>

<html lang="fr">

<!-- head section -->

    <head>
        
        <meta charset="UTF-8">
        
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
        <title>Profile | Attestations</title>
        
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
        
        /* root element */

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

            header #text-uvs:hover h3, header #text-uvs:hover h4
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
                margin-bottom: 2px;
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

            body #middle-content nav #rechercher_attestations_link 
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
                grid-template-areas: "form-section-one" "form-section-two" "form-section-three" "form-section-four";
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
                color: red;
                font-weight: bold;
                background-color: white;
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

            @media only screen and (min-width: 600px) and (max-width: 768px)
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

                header #header-content #text-uvs 
                {
                    font-size: 10px;
                }

                header #logo-uvs
                {
                    grid-area: logo-uvs;
                    width: 100px;
                    height: 50px;
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
                    grid-template-rows: 10vh 85vh 5vh;
                    row-gap: 5vh;
                }
                
            /* middle content section */

                body #middle-content
                {
                    width: 100%;
                    margin-left: auto;
                    margin-right: auto;
                    grid-area: middle-content;
                    display: grid;
                    grid-template-areas: "nav" "main"; 
                    grid-template-columns: auto;
                    grid-template-rows: 1fr 2fr;
                    row-gap: 1vh;
                }

            /* header section */

                header #text-uvs
                {
                    display : none;
                    color: black;
                    text-align: center;
                    align-self: center; 
                    font-family: 'dayrom';
                    animation-name: text-uvs-animation;
                    animation-duration: 10s;
                    animation-timing-function: ease-out;       
                    animation-iteration-count: infinite;
                }

                header #logo-uvs
                {
                    grid-area: logo-uvs;
                    width: 80px;
                    height: 40px;
                }

                header #icon-profile img
                {
                    height: 30px;
                    width: 30px;
                } 

            /* nav section */

                body #middle-content nav img 
                {
                    height: 30px;
                    width: 30px;
                }

            /* main section */

                body #middle-content main #main-content img 
                {
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

                body #middle-content main .form-sections label 
                {
                    font-size: 12px;
                }

                body #middle-content main #section-feedback-errors
                {
                    font-size: 12px;
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

                            <img src="../images/search.png" alt="fill_form">

                        <!-- form section -->

                            <form action="" method="post" enctype="multipart/form-data" id="formulaire">
                                
                                <section class="form-sections" id="section-feedback-errors" id="form-section-one">
                                    
                                    <?php 
                                        
                                        if ($is_form_sent == true && $errors_message == "ATTESTATIONS INTROUVABLES") 
                                        {
                                        # documents not found...
                                            echo "$errors_message";
                                        }
                                        
                                        if ($is_form_sent == true && $errors_message == "INE INCORRECT") 
                                        {
                                        # ine incorrect...
                                            echo "$errors_message";
                                        }                                        
                                        
                                        if ($is_form_sent == true && $errors_message == "INE INTROUVABLE") 
                                        {
                                        # ine not exist...
                                            echo "$errors_message";
                                        }

                                    ?>

                                </section>

                                <section class="form-sections" id="form-section-two">
                        
                                    <p title="N00471720151">
    
                                        <label for="ine">INE*:</label> <br>
                                        
                                        <input type="text" name="ine" id="ine" required maxlength="20">

                                    </p>
                                    
                                    <p title="L1">
                                        
                                        <label for="annee_etude">Ann??e d'??tude*:</label> <br>
                                        
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

                                        <label for="programme_etude">Programme d'??tude*:</label> <br>
                                        
                                        <select name="programme_etude" id="programme_etude">
                                            
                                            <option value="null"></option>
                                            
                                            <optgroup label="STN:">
                                                
                                                <option value="AGN">Arts graphiques et num??riques</option>
                                                
                                                <option value="CD">Communication digitale</option>
                                                
                                                <option value="IDA">Informatique - d??veloppement d???applications</option>
                                                
                                                <option value="MAI">Math??matiques appliqu??es et Informatique</option>
                                                
                                                <option value="MIC">Multim??dia, Internet et Communication</option>                                               
                                                
                                                <option value="CYB">Cybers??curit??</option>                                               
                                                
                                                <option value="MMASN">
                                                    Mod??lisation math??matique, Analyse et Simulation num??riques
                                                </option>
                                                
                                                <option value="Robotique">Robotique</option>                                                 
                                                
                                                <option value="GMBI">G??n??tique mol??culaire et bio-informatique</option>                                                 
                                            
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
                                                
                                                <option value="SE">Sciences de l?????ducation</option>
                                                
                                                <option value="Sociologie">Sociologie</option>                                                                                            
                                            
                                            </optgroup>
                                        
                                        </select>

                                    </p>

                                    <p title="IL" class="input-control-1">
                                        
                                        <label for="specialite">Sp??cialit??:</label> <br>
                                        
                                        <select name="specialite" id="specialite">
                                            
                                            <option value="null"></option>
                                            
                                            <optgroup label="STN:">
                                                
                                                <option value="IL">Ing??nierie Logicielle</option>
                                                
                                                <option value="MCS">Mod??lisation et Calcul scientifique</option>
                                                
                                                <option value="SRIV">Syst??mes, R??seaux et Infrastructures virtuelles</option>
                                                
                                                <option value="MCD">Multim??dia et communication digitale</option>
                                                
                                                <option value="RCC">R??alisation et Cr??ation cin??matographiques</option>
                                                
                                                <option value="CS">Calcul scientifique</option>
                                                
                                                <option value="BDA">Big data analytics</option>
                                                
                                                <option value="CYB">Cybers??curit??</option>
                                                
                                                <option value="IA">Intelligence artificielle</option>
                                                
                                                <option value="Robotique">Robotique</option>
                                            
                                            </optgroup>
                                            
                                            <optgroup label="SEJA:" >
                                            
                                                <option value="FC">Finance-Comptabilit??</option>  
                                                
                                                <option value="ACG">Audit et Contr??le de Gestion</option>  
                                                
                                                <option value="ELDD">Economie de l???environnement et d??veloppement durable</option>  
                                                
                                                <option value="MSCGRH">Management strat??gique et conseil en gestion des ressources humaines</option>  
                                                
                                                <option value="MCTDL">Management des collectivit??s territoriales et d??veloppement local</option>  
                                                
                                                <option value="PSD">Paix, S??curit?? et D??veloppement</option>  
                                                
                                                <option value="PMP">Politique et Management Publics</option>
                                                
                                                <option value="DPAP">Droit Public - Administration publique</option>
                                                
                                                <option value="DPDIP">Droit Public - Droit International Public</option>
                                                
                                                <option value="DPDIP">Droit Public - Droit International Public</option>
                                            
                                            </optgroup>
                                            
                                            <optgroup label="LSHE:">
                                                
                                                <option value="ANG">Anglais</option>
                                                
                                                <option value="SETE">Sciences de l?????ducation : Technologies ??ducatives</option>
                                                
                                                <option value="SEAGEE">Sciences de l?????ducation : Administration et gouvernance des ??tablissements d???enseignement</option>
                                                
                                                <option value="SDIS">Sociologie : Dynamiques et institutions socioprofessionnelles</option>
                                                
                                                <option value="SRSC">Sociologie : Religion, Soci??t?? et Culture</option>
                                            
                                            </optgroup>
                                        
                                        </select>
                                    </p>
                                </section>

                                <section class="form-sections" id="form-section-four">
                                
                                    <p>
                                        
                                        <input type="submit" value="rechercher" id="button">
                                    
                                    </p>
                            
                                </section>

                            </form>
  
                    </section>

                </main>
            
        </section>
    
    <!-- footer section -->

        <footer id="footer-container">

            <h6>

                Copyright &copy; UVS | 2022 - Tous droits r??serv??s <br>
                
                Minist??re de l'Enseignement Sup??rieur, de la Recherche et de l'Innovation
            
            </h6>
    
        </footer>   

    </body>

</html>