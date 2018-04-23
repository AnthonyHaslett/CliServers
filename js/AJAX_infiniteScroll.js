//Retrieve initial   results, then if results exceeed page height, load more


//on load, call function to retrieve results
window.onload = function () {
    adverts();
};

function adverts() {

    //make new AJAX request
    var request = new XMLHttpRequest();
    request.overrideMimeType("application/json");

    request.onreadystatechange = function () {
        if (request.readyState === 4 && request.status === 200) {

            var JsonResponse = JSON.parse(request.responseText);

            renderAdvertResults(JsonResponse);
        }
        else {
            // console.log("FAIL" + request);

        }
    };

    //send
    request.open("GET", "AJAX_handler.php?", true);
    request.send(null);

}

//Render the results
function renderAdvertResults(JsonResponse) {
    var output = document.getElementById("results");
    var search = document.getElementById("lookUp");
    var content = document.getElementById("scrollcontent");

    console.log("renderAdvertResults:");
    console.log(JsonResponse);

    // output.innerHTML = "Suggestions:<br/>";
    output.innerHTML = "";
    content.innerHTML = "";

    JsonResponse.forEach(function (obj) {

        // output.innerHTML += "<li> <a class='list-group-item' onclick='resultClicked()'>" +
        //     obj._title + ": " + obj._description + "</a> <li>";

        var target = document.getElementById('scrollcontent');

        var divOpen = "<div class='col-xs-12 col-sm-6 col-lg-4'>";
        var title = "<h2> " + obj._title + " </h2>";
        var description = "<p> " + obj._description + "  </p>";
        var price = "<p> " + obj._price + " </p>";
        var color = "<p> " + obj._color + " </p>";
        var image = "<img src='../images/" + obj._photoName + "' id='images'/>";
        var wishList = "<a href='../wishlist.php?id=" + obj._advertId + "' type='button' class='btn btn-primary'> Add to wishlist </a>";
        var divClose = "</div>";


        // var str = " <h2 class='list-group-item' id='ajaxResult' href='#''>" +
        //     obj._title + ": " + obj._description + obj._photo_name +  "</h2> ";

        var temp = document.createElement('div');

        // temp.innerHTML = str;
        temp.innerHTML = divOpen + title + description + price + color + image + wishList + divClose;

        while (temp.firstChild) {
            target.appendChild(temp.firstChild);

        }
    });
}

function getScrollXY() {
    var scrOfX = 0, scrOfY = 0;
    if (typeof( window.pageYOffset ) === 'number') {
        //Netscape compliant
        scrOfY = window.pageYOffset;
        scrOfX = window.pageXOffset;
    } else if (document.body && ( document.body.scrollLeft || document.body.scrollTop )) {
        //DOM compliant
        scrOfY = document.body.scrollTop;
        scrOfX = document.body.scrollLeft;
    } else if (document.documentElement && ( document.documentElement.scrollLeft || document.documentElement.scrollTop )) {
        //IE6 standards compliant mode
        scrOfY = document.documentElement.scrollTop;
        scrOfX = document.documentElement.scrollLeft;
    }
    return [scrOfX, scrOfY];
}

//Get the document height
function getDocHeight() {
    var D = document;
    return Math.max(
        D.body.scrollHeight, D.documentElement.scrollHeight,
        D.body.offsetHeight, D.documentElement.offsetHeight,
        D.body.clientHeight, D.documentElement.clientHeight
    );
}

document.addEventListener("scroll", function (event) {
    if (getDocHeight() - 20 <= getScrollXY()[1] + window.innerHeight) {
        adverts();
    }
});