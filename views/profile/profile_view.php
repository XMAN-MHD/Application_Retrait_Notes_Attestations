<!-- user profile view -->

    <section id="profile">

        <div class="img-profile">

            <img src="<?= $image ?>" alt="profile_image">

        </div>

        <div id="name-profile">

            <?php

                echo $first_name . " " . $last_name;

            ?>

        </div>
        
    </section>