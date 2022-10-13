<?php
//this works and is linked to my database and can show different stories when I change the ID tag
//header("Content-Type: text/html; charset=ISO 88-8859-1");
/*This fixes the diamonds thing for the php*/
require_once 'classes/Connection.php';
require_once 'classes/Article.php';
require_once 'classes/Util.php';

try {
    //var_dump($_GET['id']); gets the id in the URL
    $trendingStories = Article::selectAll(6,4);
    $techStories = Article::selectAll(3, 0);
    $articles = Article::find($_GET['id']); //find allows to find story that has id of the URL. It is in the story class//story.php find function
    
    if($articles === false)
    {
        throw new Exception("Story not found");
    }
    else
    {
        $genre = Util::selectById('genre', $articles->genre_id);
        $writer = Util::selectById('writer', $articles->writer_id);
    }
}
catch(Exception $e) {
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

        <!--END OF HEADER-->
        <br>
        <div class="eleven main-story caps">
            <?= $articles->main_headline ?>
            <!--This shows the story headline-->
        </div>

        <!--ARTICLE BODY-->
        <div class="twelve">
            <div class="clear"></div>
            <div>
                <p class="nine secondaryHeadline underlineMe"><?= $articles->secondary_headline ?></p>
            </div>
            <div class="clear"></div>
            <div>
                <a class="two articleAuthor" target="_blank" href="<?= $writer['link']?>">
                    <?= $writer["writer_first_name"] ?>
                    <?= $writer["writer_last_name"] ?></a>
                <p class="two dateArticle strip-left"><?= $articles->date ?></p>
                <!--This brings up the Author name and the a href allows to add the link. We then add php tags and add the link of the writer. Fully functional link that pulls from the writer table in the database.-->
            </div>
            <div class="clear"></div>
            <div>
                <!--The category is being called above in the $category section-->
                <div class="six paragraph-style">
                    <?= $articles->article_body ?>
                </div>
            </div>
            <div class="two">
                <p>&nbsp;</p>
            </div>
            <!--TRENDING NOW-->
            <section class="four strip-right strip-left moveMe">
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
                    <p><a class="two button  strip-right strip-left stripTop" href="viewStory.php?id=<?= $article->article_id ?>">READ MORE</a></p>
                </div>
                <?php } ?>
            </section>
        </div>
        <!--END OF TRENDING NOW-->
    </div>
    <!--THIS IS THE RED PART-->
    <br>
    <section class="twelve pinkStrip strip-left strip-right">
    </section>
    <!--END OF RED PART-->


    <div class="container">

        <!--RELATED HEADINGS-->
        <div class="twelve">
            <div class="three">
                <p>&nbsp;</p>
            </div>
            <div class="six heading2">
                <p>RELATED</p>
            </div>
        </div>
     
        <!--THIS IS THE RELATED STORIES-->
        <div class="twelve justifyMe">
            <?php foreach($techStories as $article) { 
            $writer = Util::selectById("writer", $article->writer_id);
            ?>
            <div class="three">
                <p class="mini-articles my-padding"><?= $article->main_headline ?></p>
                <p class="justifyMe categoryName"><?= $writer["writer_first_name"] . ' ' . $writer["writer_last_name"] ?></p>
                <p><a class="three button strip-left" href="viewStory.php?id=<?= $article->article_id ?>">READ MORE</a></p>
            </div>
            <?php } ?>
        </div>
        <!--END OF RELATED STORIES-->


        <!--SUBSCRIBE TO OUR NEWSLETTER SECTION-->
        <section class="twelve">
            <div class="one">
                <p>&nbsp;</p>
            </div>
            <div class="ten greyLine"></div>
        </section>

        <section class="twelve">
            <div class="four">
                <p>&nbsp;</p>
            </div>
            <div class="four background2 justifyMe">
                <p class="newsletter">SUBSCRIBE TO OUR NEWSLETTER</p>
            </div>
            <div class="clear"></div>
            <div class="four">
                <p>&nbsp;</p>
            </div>
            <div class="four greyBackground"></div><input class="four emailStyle" type="url">
            <div class="clear"></div>
            <div class="twelve centerMe">
                <input type="submit" class="two submitButton">
            </div>
        </section>
        <section class="twelve">
            <div class="one">
                <p>&nbsp;</p>
            </div>
            <div class="ten greyLine"></div>
        </section>
        <!--END OF NEWSLETTER SECTION-->


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
