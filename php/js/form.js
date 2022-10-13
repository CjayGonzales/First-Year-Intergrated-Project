//alert("JavaScript file connected");
window.addEventListener("load", function () {
    console.log("load entered");
    var submitBtn = document.getElementById("submit");
    submitBtn.addEventListener("click", submitForm);
    Boolean(doSubmit = true);

    function submitForm(event) {
        console.log("submit form enetered");

        var secondaryHeadlineData = document.getElementById("secondaryHeadline").value;
        console.log(secondaryHeadlineData);
        var dateIdData = document.getElementById("dateId").value;
        console.log(dateIdData);
        var headlineData = document.getElementById("headline").value;
        console.log(headlineData);
        var articleBodyData = document.getElementById("articleBody").value;
        console.log(articleBodyData);
        var genreIdData = document.getElementById("genreId").value;
        console.log(genreIdData);
        var timeIdData = document.getElementById("timeId").value;
        console.log(timeIdData);
        var nameData = document.getElementById("name").value;
        console.log(nameData);




        if (nameData === "") {
            console.log("nameData Empty");
            nameError.innerHTML = "Please enter a name";

            document.getElementById("name").style.borderColor = "#f44242";

            document.getElementById("nameError").style.borderColor = "#f44242";

            doSubmit = false;
        } else {
            //            name.style.borderColor = "#62f441";
            nameError.innerHTML = "&#10003";
            nameError.style.borderColor = "#62f441";
        }

        /*Secondary Headline*/
        if (secondaryHeadlineData === "") {
            console.log("secondaryHeadlineData Empty");
            secondaryHeadlineError.innerHTML = "Please enter a Secondary Headline"

            document.getElementById("secondaryHeadline").style.borderColor = "#f44242";

            document.getElementById("secondaryHeadlineError").style.borderColor = "#f44242";

            doSubmit = false;

        } else {
            secondaryHeadline.style.borderColor = "#62f441";
            secondaryHeadlineError.innerHTML = "&#10003";
            secondaryHeadlineError.style.borderColor = "#62f441";
        }

        if (dateIdData === "") {

            dateIdError.innerHTML = "Please enter a date"

            document.getElementById("dateId").style.borderColor = "#f44242";

            document.getElementById("dateIdError").style.borderColor = "#f44242";

            doSubmit = false;
        } else {
            dateId.style.borderColor = "#62f441";
            dateIdError.innerHTML = "&#10003";
            dateIdError.style.borderColor = "#62f441";
        }


        if (headlineData === "") {
            headlineError.innerHTML = "Please enter a Headline for your Article"
            document.getElementById("headline").style.borderColor = "#f44242";

            document.getElementById("headlineError").style.borderColor = "#f44242";

            doSubmit = false;
        } else {
            headline.style.borderColor = "#62f441";
            headlineError.innerHTML = "&#10003";
            headlineError.style.borderColor = "#62f441";
        }


        if (articleBodyData === "") {
            console.log("empty");
            storyTextError.innerHTML = "Please enter the Article Body"
            document.getElementById("articleBody").style.borderColor = "#f44242";

            document.getElementById("storyTextError").style.borderColor = "#f44242";

            doSubmit = false;
        } else {
            console.log("not empty");
            articleBody.style.borderColor = "#62f441";
            storyTextError.innerHTML = "&#10003";
            storyTextError.style.borderColor = "#62f441";
        }


        if (genreIdData === "") {
            genreIdError.innerHTML = "Please enter the Genre"
            document.getElementById("genreId").style.borderColor = "#f44242";

            document.getElementById("genreIdError").style.borderColor = "#f44242";

            doSubmit = false;
        } else {
            genreId.style.borderColor = "#62f441";
            genreIdError.innerHTML = "&#10003";
            genreIdError.style.borderColor = "#62f441";
        }


        if (timeIdData === "") {
            timeIdError.innerHTML = "Please enter a Headline for your Article"
            document.getElementById("timeId").style.borderColor = "#f44242";
            document.getElementById("timeIdError").style.borderColor = "#f44242";

            doSubmit = false;
        } else {
            timeId.style.borderColor = "#62f441";
            timeIdError.innerHTML = "&#10003";
            timeIdError.style.borderColor = "#62f441";
        }
        console.log("test");
        console.log(event);

        if (doSubmit == false) {
            event.preventDefault();
        } else(doSubmit == true);
    }
});
