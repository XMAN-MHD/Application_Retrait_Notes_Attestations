
<!-- IMPORT CONTROLLERS FOR THE VIEWS GRADES DOCUMENTS... -->

<?php

    include("../../controllers/interface_recherche_notes/controller_documents_notes.php");
    
?>

<!-- VIEW OF THE PROFILE | GRADES | DOCUMENTS -->

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
                grid-template-rows: 15vh 80vh 5vh ;
                row-gap: 5vh;
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
                
                width: 100%;
                color:#d9dfeb;
                font-weight: bolder;
                display: flex;
                justify-content: center;
                align-items: center;
            }
            
            header #header-content
            {   
                width: 95%; 
                height: 100px;  
                display: grid;
                grid-template-areas: "logo-uvs text-uvs-container icon-profile";
                grid-template-columns: 1fr 1fr 1fr;
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
                align-self: center;
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

            body #middle-content nav #rechercher_notes_link 
            {
                background-color: #C96C27;
            }
            
        /* main section */
            
            body #middle-content main
            {
                font-size: 16px;
                display: grid;  
                grid-template-areas: "main-content" ;
                grid-template-rows: auto;
                grid-template-columns: 100%;
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
                align-content: start;

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
                justify-self: center;
            }

            body #middle-content main form 
            {
                grid-area: form;
                display: grid;    
                grid-template-areas: "form-section-one" "form-section-two" ;
                grid-template-columns: 100%;    
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
                color: #C96C27;
                font-weight: bold;
                background-color: white;
                display: flex;
                justify-content: center; 
            }

            body #middle-content main #section-feedback-errors:hover 
            {
                color:rgb(12, 173, 80);
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
            
            body #middle-content main #download-buttons-container
            {
                display: grid;
                grid-template-areas: "download-buttons-tag" ;
                grid-template-columns: 100%;
                background-color: blue;
                justify-content: center;
            }            
            
            body #middle-content main #download-buttons-tag
            {
                font-weight: bolder;
                padding: 1.5%;
                grid-area: download-buttons-tag;
                text-decoration: none;
                color: white;
                background-color: #C96C27;
                display: grid;
                grid-template-areas: "span";
                justify-content: center;
                
            }

            body #middle-content main #download-buttons-tag:hover
            {
                color: white;
                background-color: rgb(12, 173, 80);
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
                    font-size: 16px;
                    font-family: tahoma;
                    color: white;
                    background-image: url("../images/white_bg_3.jpg");
                    background-repeat: no-repeat;
                    background-size: cover;
                    display: grid;
                    grid-template-areas: "header" "middle-content" "footer"; 
                    grid-template-columns: 100%;
                    grid-template-rows: 10vh 85vh 5vh ;
                    row-gap: 5vh;
                }

            /* header section */
                
                header #header-content #text-uvs 
                {
                    font-size: 10px;
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
                }

            /* nav section */

                body #middle-content nav 
                {
                    font-size: 14px;    
                }

                body #middle-content nav img
                {
                    height: 40px;
                    width: 40px;
                }
                
            /* main section */

                body #middle-content main #download-buttons-tag
                {
                    font-size: 14px;    
                }

                body #middle-content main #section-feedback-errors
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
                    grid-template-rows: 10vh 85vh 5vh ;
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
        
                    width: 80px;
                    height: 40px;
                }

                header #icon-profile img
                {
                    height: 40px;
                    width: 40px;
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

                body #middle-content main .form-sections label 
                {
                    font-size: 12px;
                }

                body #middle-content main #download-buttons-tag
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

                            <img src="../images/render.png" alt="fill_form">

                        <!-- form section -->

                            <form action="" method="post" enctype="multipart/form-data" id="formulaire">
                                
                                <section class="form-sections" id="section-feedback-errors" id="form-section-one">
                                    <?= $marks_name ?>
                                </section>

                                <section class="form-sections" id="form-section-two" id="btn-pdf-tag">
                        
                                    <p id="download-buttons-container">

                                        <a href="<?= $marks_pdf ?>" id="download-buttons-tag">
                                           <span>Consulter PDF</span>
                                        </a>

                                    </p>
                                    
                                    <p id="download-buttons-container">

                                        <a href="<?= $marks_img ?>" id="download-buttons-tag" id="btn-jpg-tag">
                                           <span>Consulter JPG</span>
                                        </a>
                                        
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