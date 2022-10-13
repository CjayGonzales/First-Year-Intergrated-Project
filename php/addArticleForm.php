<?php
require_once 'classes/Connection.php';
require_once 'classes/Util.php';

try {
    $genres = Util::selectAll('genre');
    $writers = Util::selectAll('writer');
   //This will select everything in the category table, and categoryy is a variable
}
catch (Exception $e) {
    die("Exception: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>View Story</title>
    <link rel="stylesheet" type="text/css" href="css/grid.css">
    <link rel="stylesheet" type="text/css" href="css/mystyle.css">
    <link href="https://fonts.googleapis.com/css?family=Oswald:300,400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700&display=swap" rel="stylesheet">
    <title>Going Viral</title>
    <script src="js/form.js"></script>

</head>

<body class="mint">

    <!--HEADER-->
    <!--THIS IS THE NAV SECTION OF MY PAGE-->
    <header class=" fullWidth">
        <div class=" strip-left">
            <h1 class="title"><a href="index.php">GOING VIRAL</a></h1>
        </div>
        <div class="greenLine  strip-left strip-right"></div>
    </header>
    <nav class="background2 fullWidth" id="navbar">
        <div class="strip-right strip-left background2 fullWidth nav-box">
            <div class="">
                <nav class="link-font">
                    <a class="borderLeftRight" href="addArticleForm.php">ADD ARTICLE</a>
                    <a class="borderLeftRight" href="#">FILM</a>
                    <a class="borderLeftRight" href="#">MUSIC</a>
                    <a class="borderLeftRight" href="#">GAMING</a>
                    <a class="borderLeftRight" href="#">TECH</a>
                    <a class="borderLeftRight" href="index.php">HOME</a>
                </nav>
            </div>
        </div>
    </nav>
    <div class="container">
        <!--NAV-->

        
<!--READ ME-->
<!--For my Javascript and AddForm works. It turns red if it is empty and it adds it to the dadtabse, but for some reason if you leave one thing empty, submit it and the borders turn red (which it is supposed to do), if you hit confirm the Javascript prevents it from adding to the database. This only happens if you make a mistake and leave something empty. You will need to reset the page and fill everything in without making a mistake to add it to the database-->
        
        
        <div class="one">
            <p>&nbsp;</p>
        </div>
        <div class="clear"></div>
        <!--END OF HEADER-->

        <div class="twelve justifyMe">
            <h1 class="secondaryHeadline ten submitArticle underlineMe justifyMe">Add Article</h1>
        </div>
        <form method="POST" action="addArticle.php" id="usrform">
            <!--This takes from the addBike.php -->


            <!--THIS IS THE NAME AND GENRE SECTION-->
            <div class="twelve justifyMe">
                <div class="ten">
                    <h3 class="three articleHeadline">Name*</h3>
                    <div class="two">
                        <p>&nbsp;</p>
                    </div>
                    <label class="three articleHeadline strip-left">Genre*</label>
                </div>
            </div>

            <div class="twelve justifyMe">
                <div class="ten">
                    <div class="five">
                        <select class="strip-left three nameGenreTime" name="writer_id" id="name">
                            <option value="">Please Select</option>
                            <?php foreach ($writers as $writer_id) { ?>
                            <option value="<?= $writer_id['id']; ?>"><?=$writer_id["writer_first_name"] . ' ' . $writer_id["writer_last_name"]; ?></option>
                            <?php } ?>
                        </select>
                        <h5 class="error" id="nameError"></h5>
                    </div>

                    <div class="four strip-left">
                        <select name="genre_id" id="genreId" class=" nameGenreTime">
                            <option value="">Please Select</option>
                            <?php foreach ($genres as $genre_id) { ?>
                            <option value="<?= $genre_id['id']; ?>"><?=$genre_id['name']; ?></option>
                            <?php } ?>
                        </select>
                        <h5 class="error" id="genreIdError"></h5>
                    </div>
                </div>
            </div>

            <!--END OF NAME AND GENRE SECTION-->

            <!--THIS IS THE MAIN HEADLINE AND SECONDARY HEADLINE SECTION-->
            <div class="twelve justifyMe">
                <div class="ten">
                    <label class="three articleHeadline">Main Headline*</label>
                    <div class="two">
                        <p>&nbsp;</p>
                    </div>
                    <label class="three strip-left articleHeadline">Secondary Headline*</label>
                </div>
            </div>

            <div class="twelve justifyMe">
                <div class="ten">
                    <div class="five">
                        <div class="clear"></div>
                        <input type="text" name="main_headline" id="headline" placeholder="Headline">
                        <div class="clear"></div>
                        <h5 class="error" id="headlineError"></h5>
                    </div>

                    <div class="four strip-left">
                        <input type="text" name="secondary_headline" id="secondaryHeadline">
                        <h5 class="error" id="secondaryHeadlineError"></h5>
                    </div>
                </div>
            </div>
            <!--END OF THE MAIN HEADLINE AND SECONDARY HEADLINE SECTION-->

            <!--DATE AND TIME SECTION-->
            <div class="twelve justifyMe">
                <div class="ten">
                    <label class="three articleHeadline">Date*</label>
                    <div class="two">
                        <p>&nbsp;</p>
                    </div>
                    <label class="three articleHeadline strip-left">Time*</label>
                </div>
            </div>

            <div class="twelve justifyMe">
                <div class="ten">
                    <div class="five">
                        <div class="clear"></div>
                        <input type="date" name="date" id="dateId">
                        <div class="clear"></div>
                        <h5 class="error" id="dateIdError"></h5>
                    </div>

                    <div class="four strip-left">
                        <input class=" nameGenreTime" type="time" name="time" id="timeId">
                        <h5 class="error" id="timeIdError"></h5>
                    </div>
                </div>
            </div>
            <!--END OF DATE AND TIME -->

            <div class="twelve justifyMe">
                <div class="ten strip-rightArticle">
                    <label class="articleHeadline">Article Body*</label>
                    <textarea name="article_body" id="articleBody"></textarea>
                    <h5 class="error" id="storyTextError"></h5>
                </div>
            </div>

            <div class="twelve justifyMe">
                <a href="addArticleForm.php" class="reset two">Reset</a>
                <input class="button submit two" type="submit" value="Confirm" id="submit">
            </div>

        </form>


        <!--THIS IS THE FOOTER-->
    </div>
</body>

<footer>
    <div class="fullWidth footer-background justifyMe">
        <div class="ten footer-line">
            <p></p>
        </div>
    </div>
    <div class="fullWidth centerMe footer-background alignCenter">
        <div class=" title footer-background">
            <p>GOING VIRAL</p>
        </div>
        <p class="five strip-right footerInfo">Going Viral is the most trusted news network to bring information in regards to new technology, film, gaming and music</p>
    </div>
    <div class=" footer-background justifyMe">
        <div class="ten footer-line">
            <p></p>
        </div>
    </div>
</footer>
    
    
<!--    For some reason, the javascript wouldnt pick up the ID for id=navbar when i placed it in the form.js file, but if i put it into the HTML file, the sticky navbar works-->
<script>
    window.onscroll = function() {
        myFunction()
    };

    var navbar = document.getElementById("navbar");
    var sticky = navbar.offsetTop;

    function myFunction() {
        if (window.pageYOffset >= sticky) {
            navbar.classList.add("sticky")
        } else {
            navbar.classList.remove("sticky");
        }
    }
</script>
</html>
