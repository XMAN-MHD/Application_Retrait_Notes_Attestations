
<!-- IMPORT THE CONTROLLERS FOR THE VIEW LOGIN -->
    <?php
        include("../../controllers/login/controller_login.php"); 
    ?>

<!-- THE VIEW OF THE LOGIN -->

<!DOCTYPE html>

<html lang="fr">

<!--the head of the page-->    
    <head>
        <meta charset="UTF-8">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Login</title>

        <style>

/* general settings */
*{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body
    {
        font-family: tahoma;
        height: 100vh;
        background-color: #e9ebee;
        background-image: url("../images/uvs_building.jpg");
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
    }

/* the header section  */
    #header_container
    {
        height: 110px;
        width: 100%;
        background-color: rgb(30, 30, 30);
        color:#d9dfeb;
        font-weight: bolder;
        padding: 4px;
    }

    #logo_uvs
    {
        width: 130px;
        height: 70px;
        margin-left: 30px;
        margin-top: 12px;
        background-image: url("../images/uvs_logo.jpg");
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
    }

    #word-connexion
    {
        color: white;
        text-align: center;
        position: relative;
        top: -20px;
    }

/* the main section */
    main
    {
        display:flex;
        justify-content: center
    }

    form
    {
        background-color: white;
        width: 500px;
        height:auto;
        margin: auto;
        border-radius: 10px;
        margin-top: 50px;
        padding: 10px;
        text-align: center;
        font-weight: bold;
        padding-top: 50px;
        opacity: 88%;
    }

    form input 
    {
        margin-bottom: 50px;
        
    }

    #email_input
    {
        width: 300px;
        height: 40px;
        border-radius: 4px;
        border: 1px solid rgb(30, 30, 30);
        padding: 4px;
        font-size: 14px;
    
    }

    #password_input
    {
        width: 300px;
        height: 40px;
        border-radius: 4px;
        border: 1px solid rgb(30, 30, 30);
        padding: 4px;
        font-size: 14px;
        
    }

    #form_button
    {
        width: 300px;
        height: 40px;
        border-radius: 4px;
        border: none;
        padding: 4px;
        background-color: rgb(30, 30, 30);
        font-weight: bold;
        color: white;
        cursor: pointer;
    }

/* the footer section */    
    #footer-container
    {
        text-align: center;
        margin-top: 40px;
    }

    #footer-container h2, #footer-container h4
    {
        color: white;
    }

    h6
    {
        color: #C96C27;
    }

/* Media Query For Mobile Screen Size */
    @media only screen and (max-width:300px)
    {

        #logo_uvs
        {
            visibility: hidden;
        }
    }

    @media only screen and (max-width:600px)
    {
        #logo_uvs
        {
            width: 50px;
            height: 50px;
            border: 1px solid #C96C27;
            border-radius: 50%;
            margin-left: 30px;
            margin-top: 12px;
            background-image: url("images/uvs_logo.jpg");
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center;

        }

        form
        {
            background-color: white;
            width: 100%;
            height:auto;
            margin: auto;
            border-radius:0;
            margin-top: 50px;
            padding: 10px;
            text-align: center;
            font-weight: bold;
            padding-top: 50px;
            opacity: 88%;
        }

        #email_input
        {
            width: 150px;
            height: 25px;
            border-radius: 4px;
            border: 1px solid #C96C27;
            padding: 4px;
            font-size: 14px;
            outline: rgb(59, 89, 152);
        }
    
        #password_input
        {
            width: 150px;
            height: 25px;
            border-radius: 4px;
            border: 1px solid #C96C27;
            padding: 4px;
            font-size: 14px;
            outline: rgb(59, 89, 152);
        }

        #form_button
        {
            width: 150px;
            height: 25px;
            border-radius: 4px;
            border: none;
            padding: 4px;
            background-color: #C96C27;
            font-weight: bold;
            color: white;
            cursor: pointer;
        }

        h2
        {
            font-size:medium;
        }

        h4
        {
            font-size:small;
        }
    } 
        </style>
        
    </head>

<!--the body of the page-->    
    <body>

    <!--the header section-->
        <header id="header_container">

            <div id="logo_uvs"></div>

            <h1 id="word-connexion">Connexion</h1> 

        </header>

    <!-- the main section -->
        <main id="main_container">

            <form action="" method="post">

            <input type="text" name="email" id="email_input" placeholder="email"><br>

            <input type="password" name="passcode" id="password_input" placeholder="password"><br>

            <input type="submit" id="form_button" value="Login">

            <br>

            <span style="color:red;" >

                <?= $errors_message ?>

            </span>

            </form>

        </main> 

    <!--the footer section-->
        <footer id="footer-container">

            <h2>UNIVERSITÉ VIRTUELLE DU SÉNÉGAL</h2>

            <h4>foo nekk foofu la</h4>

        </footer>   
        
    </body>

</html>