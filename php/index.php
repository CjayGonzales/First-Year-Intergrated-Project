<?php
//header("Content-Type: text/html; charset=ISO 88-8859-1");
//This allows to remove the questionmark icon thingy
require_once 'classes/Connection.php';
require_once 'classes/Article.php';
require_once 'classes/Util.php';

try {
//THIS TAKES IN THE ARTICLES, SIDE STORIES ETC
    $articles = Article::selectAll(1, 0);
    $sideStories = Article::selectAll(3, 1); //limit, offset
    $techStories = Article::selectByCategory("tech", 3, 0);
    $gamingStories = Article::selectByCategory("gaming", 3, 0);
//    var_dump($gamingStories);
    $trendingStories = Article::selectAll(7,4);
    $latestStories = Article::selectAll(3, 10);
}
catch(Exception $e) {
    die("Exception: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" type="text/css" href="css/grid.css">
    <link rel="stylesheet" type="text/css" href="css/mystyle.css">
    <link href="https://fonts.googleapis.com/css?family=Oswald:300,400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700&display=swap" rel="stylesheet">
    <title>Going Viral</title>
</head>

<body class=" mint">

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


        <div class="one">
            <p>&nbsp;</p>
        </div>
        <div class="clear"></div>
        <!--END OF NAV SECTION-->

        <!--THIS IS THE MAIN STORY -->
        <div class="eleven main-story caps">
            <?php foreach($articles as $article) { 
                $writer = Util::selectById("writer", $article->writer_id); //This takes the article with writer Id
            ?>
            <h4><?php echo $article->main_headline ?></h4>
        </div>
        <div class="clear"></div>
        <p class="two author">By <?= $writer["writer_first_name"] . ' ' . $writer["writer_last_name"] ?></p>
        <!--Takes the first name and last name from database and puts it into the page-->
        <p class="two date"><?= $article->date ?></p>
        <!--/*Takes the date from the database and puts it into the page*/-->
        <div class="clear"></div>
        <div class="ten paragraph-style">
            <p><?= substr($article->article_body,0,500) ?>...</p>
        </div>
        <div class="clear"></div>
        <p><a class="two button" href="viewStory.php?id=<?= $article->article_id ?>">READ MORE</a></p>

        <!--        <?php } ?> The } closes the loop in the -->

        <!--END OF MAIN STORY LOOP-->

        <!--SMALLER STORIES-->
        <div class="clear"></div>
        <div class="seven">

            <div class="six strip-left">
                <?php foreach($sideStories as $article) { 
                $writer = Util::selectById("writer", $article->writer_id);
                ?>
                <p class="headline-title"><?php echo $article->main_headline ?></p>
                <div class="clear"></div>
                <p class="two author strip-left">By <?= $writer["writer_first_name"] . ' ' . $writer["writer_last_name"] ?></p>
                <p class="two date"><?= $article->date ?></p>
                <div class="clear"></div>
                <div class="paragraph-style">
                    <p><?= substr($article->article_body,0,350) ?>...</p>
                </div>
                <p><a class="two button strip-left" href="viewStory.php?id=<?= $article->article_id ?>">READ MORE</a></p>
                <div class="clear"></div>
                <?php } ?>
            </div>
        </div>
        <div class="one strip-left">
            <p>&nbsp;</p>
        </div>

        <!--END OF SMALLER STORIES-->

        <!--TRENDING NOW-->
        <section class="four strip-right moveMe">
            <div class="three">
                <p class="trending-heading">TRENDING NOW</p>
            </div>
            <?php foreach($trendingStories as $article) { 
                ?>
            <div class="four strip-right">
                <p class="trending-style"><?php echo $article->main_headline ?></p>
                <div class="two">
                    <p>&nbsp;</p>
                </div>
                <p><a  class="two button  strip-right strip-left stripTop" href="viewStory.php?id=<?= $article->article_id ?>">READ MORE</a></p>
            </div>
            <?php } ?>
        </section>
        <!--ARROWS-->
        <div class="twelve">
            <div class="four strip-left">
                <p>&nbsp;</p>
            </div>
            <div class="one arrow">
                <img width="31" height="31" src="svg/chevron-left-solid.svg">
            </div>
            <div class="two">
                <p>&nbsp;</p>
            </div>
            <div class="one arrow">
                <img width="31" height="31" src="svg/chevron-right-solid.svg">
            </div>
            <div class="three strip-right">
                <p>&nbsp;</p>
            </div>
        </div>
        <!--LATEST STORIES HEADING-->
        <div class="twelve background2">
            <div class="three strip-left">
                <p>&nbsp;</p>
            </div>
            <div class="six latest">
                <p>LATEST</p>
            </div>
            <div class="three strip-right">
                <p>&nbsp;</p>
            </div>
        </div>

        <!--LATEST STORIES-->
        <div class="twelve background2 justifyMe">
            <?php foreach($latestStories as $article) { 
                $writer = Util::selectById("writer", $article->writer_id);
                ?>
            <div class="three latestFont">
                <p class="mint blackFont my-padding"><?= substr($article->main_headline,0,65) ?>...</p>
                <div class="myHr"></div>
                <p class="latestDate">Dec 10, 2019</p>
                <div class="justifyMe">
                    <p><a class="two button" href="viewStory.php?id=<?= $article->article_id ?>">READ MORE</a></p>
                </div>
            </div>
            <?php } ?>
        </div>
        <!--ARROWS-->
        <div class="twelve background2">
            <div class="four strip-left">
                <p>&nbsp;</p>
            </div>
            <div class="one arrow2">
                <img width="31" height="31" src="svg/chevron2-left-solid.svg">
            </div>
            <div class="two">
                <p>&nbsp;</p>
            </div>
            <div class="one arrow2">
                <img width="31" height="31" src="svg/chevron2-right-solid.svg">
            </div>
            <div class="three strip-right">
                <p>&nbsp;</p>
            </div>
        </div>
        <!--END OF LATEST STORIES-->

        <!--THIS SECTION HERE IS THE GAMING SECTION IN MY PAGE-->
        <div class="twelve">
            <div class="three">
                <p>&nbsp;</p>
            </div>
            <div class="six heading2">
                <p>GAMING</p>
            </div>
        </div>

        <!--GAMING STORIES-->
        <div class="twelve gamingFlex justifyMe">
            <?php foreach($gamingStories as $article) { 
        $writer = Util::selectById("writer", $article->writer_id);
        ?>
            <div class="three">
                <p class="mini-articles my-padding"><?= substr($article->main_headline,0,65) ?>...</p>
                <p class="justifyMe categoryName"><?= $writer["writer_first_name"] . ' ' . $writer["writer_last_name"] ?></p>
                <p><a class="three button strip-left" href="viewStory.php?id=<?= $article->article_id ?>">READ MORE</a></p>
            </div>
            <?php } ?>
        </div>

        <!--ARROWS-->
        <div class="twelve">
            <div class="four strip-left">
                <p>&nbsp;</p>
            </div>
            <div class="one arrow">
                <img width="31" height="31" src="svg/chevron-left-solid.svg">
            </div>
            <div class="two">
                <p>&nbsp;</p>
            </div>
            <div class="one arrow">
                <img width="31" height="31" src="svg/chevron-right-solid.svg">
            </div>
            <div class="three strip-right">
                <p>&nbsp;</p>
            </div>
        </div>

        <!--THIS SECTION HERE IS THE TECH SECTION OF MY PAGE-->
        <div class="twelve">
            <div class="three">
                <p>&nbsp;</p>
            </div>
            <div class="six heading2">
                <p>TECH</p>
            </div>
        </div>
        <!--THIS IS THE TECH STORIES-->
        <div class="twelve justifyMe">
            <?php foreach($techStories as $article) { 
            $writer = Util::selectById("writer", $article->writer_id);
            ?>
            <div class="three">
                <p class="mini-articles my-padding"><?= substr($article->main_headline,0,65) ?>...</p>
                <p class="justifyMe categoryName"><?= $writer["writer_first_name"] . ' ' . $writer["writer_last_name"] ?></p>
                <p><a class="three button strip-left" href="viewStory.php?id=<?= $article->article_id ?>">READ MORE</a></p>
            </div>
            <?php } ?>
        </div>
        
<!--ARROWS-->
        <div class="twelve">
            <div class="four strip-left">
                <p>&nbsp;</p>
            </div>
            <div class="one arrow">
                <img width="31" height="31" src="svg/chevron-left-solid.svg">
            </div>
            <div class="two">
                <p>&nbsp;</p>
            </div>
            <div class="one arrow">
                <img width="31" height="31" src="svg/chevron-right-solid.svg">
            </div>
            <div class="three strip-right">
                <p>&nbsp;</p>
            </div>
        </div>
<!--ARROWS END-->
        
    </div>
</body>

<!--THIS IS THE FOOTER-->
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

<!--For some reason, the javascript wouldnt pick up the ID for id=navbar when i placed it in the form.js file, but if i put it into the HTML file, the sticky navbar works-->
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
