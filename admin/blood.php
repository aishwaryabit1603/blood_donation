<?php
    require 'C:\xampp\htdocs\blood_donation\db_connection.php';
    $sql = "Select bloodgroup from donors";
    $query = mysqli_query($connection,$sql);

    $o_pos = 0;
    $o_neg = 0;

    $a_pos = 0;
    $a_neg = 0;

    $b_pos = 0;
    $b_neg = 0;

    $ab_pos = 0;
    $ab_neg = 0;

    while($row = mysqli_fetch_array($query))
    {
        if($row['bloodgroup'] == "O+"){
             $o_pos = $o_pos + 1;
        }
        elseif ($row['bloodgroup'] == "O-") {
            $o_neg = $o_neg + 1;
        }
        elseif ($row['bloodgroup'] == "A+") {
            $a_pos = $a_pos + 1;
        }
        elseif ($row['bloodgroup'] == "A-") {
            $a_neg = $a_neg + 1;
        }
        elseif ($row['bloodgroup'] == "B+") {
            $b_pos = $b_pos + 1;
        }
        elseif ($row['bloodgroup'] == "B-") {
            $b_neg = $b_neg + 1;
        }
        elseif ($row['bloodgroup'] == "AB+") {
            $ab_pos = $ab_pos + 1;
        }
        else
        {
            $ab_neg = $ab_neg + 1;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="icon" type="image/x-icon" href="C:\xampp\htdocs\blood_donation\images\icon2.ico" />
    <style>
        article {
        --img-scale: 1;
        --title-color: black;
        --link-icon-translate: -20px;
        --link-icon-opacity: 0;
        position: relative;
        border-radius: 16px;
        box-shadow: none;
        background: #fff;
        transform-origin: center;
        transition: all 0.4s ease-in-out;
        overflow: hidden;
        }

        article a::after {
        position: absolute;
        inset-block: 0;
        inset-inline: 0;
        cursor: pointer;
        content: "";
        }

        /* basic article elements styling */
        article h2 {
        margin: 0 0 18px 0;
        font-family: "Bebas Neue", cursive;
        font-size: 1.9rem;
        letter-spacing: 0.06em;
        color: red;
        transition: color 0.3s ease-out;
        }

        figure {
        margin: 0;
        padding: 0;
        aspect-ratio:  5/ ;
        overflow: hidden;
        }

        article img {
        max-width: 100%;
        transform-origin: center;
        transform: scale(var(--img-scale));
        transition: transform 0.4s ease-in-out;
        }

        .article-body {
        padding: 24px;
        }

        article a {
        display: inline-flex;
        align-items: center;
        text-decoration: none;
        color: #28666e;
        }

        article a:focus {
        outline: 1px dotted #28666e;
        }

        article a .icon {
        min-width: 24px;
        width: 24px;
        height: 24px;
        margin-left: 5px;
        transform: translateX(var(--link-icon-translate));
        opacity: var(--link-icon-opacity);
        transition: all 0.3s;
        }

        /* using the has() relational pseudo selector to update our custom properties */
        article:has(:hover, :focus) {
        --img-scale: 1.1;
        --title-color: #28666e;
        --link-icon-translate: 0;
        --link-icon-opacity: 1;
        box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;
        }

        /************************ 
        Generic layout (demo looks)
        **************************/

        *,
        *::before,
        *::after {
        box-sizing: border-box;
        }

        body {
        margin: 0;
        padding: 48px 0;
        font-family: "Figtree", sans-serif;
        font-size: 1.2rem;
        line-height: 1.6rem;
        background-image: linear-gradient(45deg, #7c9885, #b5b682);
        min-height: 100vh;
        }

        .articles {
        display: grid;
        max-width: 1200px;
        margin-inline: auto;
        padding-inline: 24px;
        grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
        gap: 24px;
        }

        @media screen and (max-width: 960px) {
        article {
            container: card/inline-size;
        }
        .article-body p {
            display: none;
        }
        }

        @container card (min-width: 380px) {
        .article-wrapper {
            display: grid;
            grid-template-columns: 100px 1fr;
            gap: 16px;
        }
        .article-body {
            padding-left: 0;
        }
        figure {
            width: 100%;
            height: 100%;
            overflow: hidden;
        }
        figure img {
            height: 100%;
            aspect-ratio: 1;
            object-fit: cover;
        }
        }

        .sr-only:not(:focus):not(:active) {
        clip: rect(0 0 0 0); 
        clip-path: inset(50%);
        height: 1px;
        overflow: hidden;
        position: absolute;
        white-space: nowrap; 
        width: 1px;
        }
    </style>
    </head>
<body>
<section class="articles">
  <article>
    <div class="article-wrapper">
        <center><img  src="C:\xampp\htdocs\blood_donation\images\O+.jpg" width = "200";alt="" /></center>
      <div class="article-body">
        <h2>BLOOD GROUP : O+</h2>
        <p>
        </p>
          No of Donors = <?php echo $o_pos ?>;
      </div>
    </div>
  </article>
  <article>
    <div class="article-wrapper">
        <center><img width = "200"; src="C:\xampp\htdocs\blood_donation\images\O-.jpg" alt="" /></center>
      <div class="article-body">
        <h2>BLOOD GROUP : O-</h2>
        <p>
        </p>
          No of Donors = <?php echo $o_neg ?>;
      </div>
    </div>
  </article>
  <article>
    <div class="article-wrapper">
        <center><img width = "200"; src="C:\xampp\htdocs\blood_donation\images\A+.png" alt="" /></center>
      <div class="article-body">
        <h2>BLOOD GROUP : A+</h2>
        <p>
        </p>
          No of Donors = <?php echo $a_pos ?>;
      </div>
    </div>
  </article>
  <article>
    <div class="article-wrapper">
        <center><img width = "200"; src="C:\xampp\htdocs\blood_donation\images\A-.png" alt="" /></center>
      <div class="article-body">
        <h2>BLOOD GROUP : A-</h2>
        <p>
        </p>
          No of Donors = <?php echo $a_neg ?>;
      </div>
    </div>
  </article>
  <article>
    <div class="article-wrapper">
        <center><img width = "200"; src="C:\xampp\htdocs\blood_donation\images\B+.jpg" alt="" /></center>
      <div class="article-body">
        <h2>BLOOD GROUP : B+</h2>
        <p>
        </p>
          No of Donors = <?php echo $b_pos ?>;
      </div>
    </div>
  </article>
  <article>
    <div class="article-wrapper">
        <center><img width = "200"; src="C:\xampp\htdocs\blood_donation\images\B-.jpg" alt="" /></center>
      <div class="article-body">
        <h2>BLOOD GROUP : B-</h2>
        <p>
        </p>
          No of Donors = <?php echo $b_neg ?>;
      </div>
    </div>
  </article>
  <article>
    <div class="article-wrapper">
        <center><img width = "200"; src="C:\xampp\htdocs\blood_donation\images\AB-.jpg" alt="" /></center>
      <div class="article-body">
        <h2>BLOOD GROUP : AB-</h2>
        <p>
        </p>
          No of Donors = <?php echo $ab_pos ?>;
      </div>
    </div>
  </article>
  <article>
    <div class="article-wrapper">
        <center><img width = "200"; src="C:\xampp\htdocs\blood_donation\images\AB+.jpg" alt="" /></center>
      <div class="article-body">
        <h2>BLOOD GROUP : AB+</h2>
        <p>
        </p>
          No of Donors = <?php echo $ab_neg ?>; 
      </div>
    </div>
  </article>

</section>
</body>
</html>