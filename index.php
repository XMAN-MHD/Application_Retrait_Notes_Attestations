
<!-- IMPORT THE CONTROLLERS OF THE HOME VIEW -->
    <?php
        include("./controllers/accueil/controller_index.php"); 
    ?>

<!-- THE HOME VIEW -->
<!DOCTYPE html>

<html lang="fr">

<!--the head of the page-->    
    <head>  

        <meta charset="UTF-8">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
        <title>Accueil</title>
        
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

    body
    {
        font-family: tahoma;
        background-image: url("./views/images/white_bg_3.jpg");
        background-repeat: no-repeat;
        background-size: cover;
        display:flex;
        flex-direction: column;
    }

/* the header section  */
    #header-container
    {
        height: auto;
        width: 100%;
        background-color: rgb(30, 30, 30);
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
    }

    header #logo-uvs
    {
        grid-area: logo-uvs;
        width: 130px;
        height: 70px;
        background-image: url("./views/images/uvs_logo.jpg");
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        
    }

    header #text-uvs-container
    {
        grid-area: text-uvs-container;
    }

    header #text-uvs:hover h3, header #text-uvs:hover h4
    {   
        color: rgb(12, 173, 80);
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
        text-decoration: none;
        align-self: center;
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

    @keyframes text-uvs-animation
    {
       100% {color: white;}
    }

    header #text-uvs:hover
    {
        color: black;
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

/* the main section */

    /* slideshow section */
    main #slideshow
    {
        width: 100%;
        height: 100vh;
    }

    main #controls-of-slides
    {
        width: 100%;
        display: flex;
        justify-content:space-between;
        position:absolute;
        top: 50%;
    }

    main #slideshow button.prev
    {
        background-color: black;
        width: 30px;
        color: white;
        border-radius: 5px;
        cursor: pointer;    
    }

    main #slideshow button.next
    {
        background-color: black;
        color: white;
        border: 1px solid black;
        border-radius: 5px;
        cursor: pointer;
        width: 30px;
    }

    main #images-of-slides
    {
        width: 100%;
        height: 100vh;
    }

    /* bienvenue section */
    main #text-bienvenue
    {
        margin-top: 80px;
        text-align: center;
    }

    main #text-bienvenue h1 
    {
        color: rgb(30, 30, 30);
    }

    main #text-bienvenue p
    {
        color: black;
        margin-top: 20px;
    }

    main #documents-container
    {
        width: 100%;
        display: flex;
        margin-top: 5%;
        justify-content:space-around;
        flex-wrap: wrap;
    }
    
    main section.home-icons-sections:hover
    {
        background-color: #C96C27;
    }

    main .home-icons:hover span 
    {
        background-color: #C96C27;
    }

    main #link-attestations
    {
        width: 100%;
        height: 200px;
        margin-top: 5%;
        border: 1px solid black;
        border-radius: 5px;
        background-image: url("./views/images/certification.png");
        background-size: cover;
        background-repeat:no-repeat;
        background-position: center;
        display: flex;
        justify-content: center;
        align-items: flex-end;
    }

    main #documents-container a
    {
        text-decoration: none;
        width: 300px;
        color: white;
        background-color: rgb(30, 30, 30);
    }

    main #documents-container a:hover span
    {
        background-color: #C96C27;
    }

    main #documents-container a:hover 
    {
        background-color: #C96C27;
    }

    main #link-attestations span 
    {
        background-color: rgb(30, 30, 30);
        width: 100%;
        height:auto;
        text-transform: uppercase;
        color:white;
        text-align: center;
    }

    main #link-attestations span:hover
    {
        background-color:#C96C27;
    }

    main #link-notes
    {
        width: 100%;
        height: 200px;
        margin-top: 5%;
        border: 1px solid black;
        border-radius: 5px;
        background-image: url("./views/images/notes_icon.png");
        background-size: cover;
        background-position: center;
        display: flex;
        justify-content: center;
        align-items: flex-end;
        background-repeat:no-repeat;
    }

    main #link-notes span 
    {
        background-color: rgb(30, 30, 30);
        width: 100%;
        height:auto;
        text-transform: uppercase;
        color:white;
        text-align: center;        
    }

    main #link-notes span:hover
    {
        background-color: #C96C27;
    }

    main #link-enregistrer
    {
        width: 100%;
        height: 200px;
        margin-top: 5%;
        border: 1px solid black;
        border-radius: 5px;
        background-image: url("./views/images/teacher.png");
        background-size: cover;
        background-position: center;
        display: flex;
        justify-content: center;
        align-items: flex-end;    
        background-repeat:no-repeat;    
    }

    main #link-enregistrer span 
    {
        background-color: rgb(30, 30, 30);
        width: 100%;
        height:auto;
        text-transform: uppercase;
        color:white;
        text-align: center;        
    }

    main #link-enregistrer span:hover
    {
        background-color: #C96C27;
    }

    main #link-supprimer
    {
        width: 100%;
        height: 200px;
        margin-top: 5%;
        border: 1px solid black;
        border-radius: 5px;
        background-image: url("./views/images/delete.png");
        background-size: cover;
        background-position: center;
        display: flex;
        justify-content: center;
        align-items: flex-end;    
        background-repeat:no-repeat;    
    }

    main #link-supprimer span 
    {
        background-color: rgb(30, 30, 30);
        width: 100%;
        height:auto;
        text-transform: uppercase;
        color:white;
        text-align: center;        
    }

    main #link-supprimer span:hover
    {
        background-color: #C96C27;
    }

/* communiqués section */
    main .links-communiqués
    {
        width: 100%;
        height: 200px;
        margin-top: 5%;
        border: 1px solid black;
        border-radius: 5px;
        background-image: url("./views/images/news.png");
        background-size: cover;
        background-repeat:no-repeat;
        background-position: center;
        display: flex;
        justify-content: center;
        align-items: flex-end;
    }

    main .a-tag-communiques:hover span
    {
        background-color: #C96C27;
    }

    main .links-communiqués:hover
    {
      background-color: #C96C27;
    }

    main .links-communiqués span 
    {
        background-color: rgb(30, 30, 30);
        width: 100%;
        height:60px;
        color:white;
        text-align: center; 
              
    }

/* link-communiqués section */
    main #link-communiqués
    {
        margin-top: 5%;
        text-align: center;
    }
    
    main #link-communiqués a 
    {
        color: rgb(30, 30, 30);
        font-family: 'dayrom';
    }

    main #link-communiqués a:hover
    {
        color: #C96C27;
    }

/* the footer section */    
    #footer-container
    {
        width: 100%;
        height: 50px;
        margin-top: 5%;
        text-align: center;
        background-color: rgb(30, 30, 30);
        display: flex;
        justify-content: center;
        align-items: center;
    }

    #footer-container h6
    {
        color: white;
    }

/* Media Query For Mobile Screen Size */

    @media only screen and (max-width:600px)
    {
        html
        {
            font-size: 12px;
        }

        #slideshow
        {
            position:absolute;
            visibility: hidden;
        }

        header h3
        {
            font-size: small;
        }

        header h4
        {
            font-size:smaller;
        }

        header #logo-uvs
        {
            width: 80px;
            height: 40px;
        }

        header #icon-profile img 
        {
            height: 30px;
            width: 30px;
        }

        #text-uvs
        {
            visibility: hidden;
            position: absolute;
        }

        h1
        {
            font-size: medium;
        }

        #text-bienvenue p 
        {
            font-size: small;
        }
    
        #link-attestations
        {
            width: 200px;

        }

        #link-attestations span
        {
            text-transform: lowercase;
            font-size: smaller;
        }

        #link-notes
        {
            width: 200px;

        }

        #link-notes span
        {
            text-transform: lowercase;
            font-size: smaller;
        }

        #link-enregistrer
        {
            width: 200px; 
        }

        #link-enregistrer span
        {
            text-transform: lowercase;
            font-size: smaller;
        }

        .links-communiqués
        {
            width: 200px;
            font-size: smaller;
        }

        #link-communiqués a 
        {
            font-size: smaller;        
        }
    }

/* tablet view */

    @media only screen and (min-width:600px) and (max-width:768px)
    {
        html
        {
            font-size: 14px;
        }

        header #header-content #text-uvs 
        {
            font-size: 10px;
        }
    }
        </style>

    </head>

<!--the body of the page-->    

    <body>
    <!--the header section-->
        <?php
            include("./views/header/header_view.php"); 
        ?>

    <!-- the main section -->
        <main id="main-container">

        <!--the slideshow section-->
            <section id="slideshow">

                <div id="controls-of-slides">

                    <button class="prev" onclick="prev()">prev</button>

                    <button class="next" onclick="next()">next</button> 

                </div>

                <div class="slides">

                    <img id="images-of-slides" src="./views/images/1.jpg" alt="Programming">

                </div> 

            </section>
        <!--javascript code of the slideshow-->       
            <script>

                var images= ["./views/images/1.jpg", "./views/images/2.jpg", "./views/images/3.jpg"];

                var imgTag= document.getElementById("images-of-slides")

                var pos=0;

                function prev()
                {
                    pos--;
                    if(pos < 0)
                    {
                        pos= images.length - 1;
                    }
                    imgTag.src= images[pos];
                }

                function next()
                {
                    pos++;
                    if( pos > (images.length - 1))
                    {
                        pos= 0;
                        clearInterval(setInterval(next, 10000));
                    }
                    imgTag.src= images[pos];
                }

                setInterval(next, 10000)

            </script>

        <!--bienvenue section-->
            <section id="text-bienvenue">

                <h1>BIENVENUE</h1>

                <p>Consulter et télécharger <br> vos notes, atestations en toute sécurité et à tout moment.</p>

            </section>

        <!--documents section-->
            <?php

                if ($user_student) 
                {
                    # user is a student...
                    include("./views/accueil/student_home_links_view.php"); 
                } 
                else 
                {
                    # user is an agent uvs
                    include("./views/accueil/agent_uvs_home_links_view.php"); 
                } 
            ?>

        <!--communiqués section-->

            <!--le titre communiqués-->
            <section id="text-bienvenue">

                <h1>COMMUNIQUÉS</h1>

            </section>

            <section id="documents-container">  
                
                <!--communiqués links-->
                <a href="https://www.uvs.sn/resultats-definitifs-des-elections-des-beno-2022/" class="a-tag-communiques">
                    
                    <section class="links-communiqués">

                        <span>Résultats définitifs des élections des BENO 2022</span>

                    </section>   
                
                </a>

                <a href="https://www.uvs.sn/ouverture-des-inscriptions-pour-la-3e-edition-des-olympiades-universitaires-du-cames/" class="a-tag-communiques">
                    
                    <section class="links-communiqués">

                        <span>ouverture des inscriptions pour la 3e édition des Olympiades universitaires du CAMES</span>
                    
                    </section>   
                
                </a>

                <a href="https://www.uvs.sn/ceremonie-de-signature-de-convention-de-partenariat-uvs-plan-international-senegal/" class="a-tag-communiques">
                    
                    <section class="links-communiqués">
                        
                        <span>cérémonie de signature de convention de partenariat UVS – Plan International Sénégal</span>
                    
                    </section>   
                
                </a>
            </section>

            <section id="link-communiqués">

                <a href="https://www.uvs.sn/category/communique/">

                    <h4>Voir tous les communiqués</h4>

                </a>

            </section>   

            
        </main> 

    <!--the footer section-->
        <footer id="footer-container">

            <h6>
                Copyright &copy; UVS | 2022 - Tous droits réservés <br>
                Ministère de l'Enseignement Supérieur, de la Recherche et de l'Innovation
            </h6>

        </footer>   
        
    </body>

</html>