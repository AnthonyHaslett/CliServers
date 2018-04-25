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
            // loadMore(JsonResponse);
        }
        else {
            // console.log("FAIL" + request);

        }
    };

    //Send
    request.open("GET", "AJAX_handler.php?", true);
    request.send(null);

}

function renderAdvertResults(JsonResponse) {
    var output = document.getElementById("results");
    var content = document.getElementById("scrollcontent");
    content.innerHTML = "";
    console.log("renderAdvertResults:");
    console.log(JsonResponse);

    // output.innerHTML = "Suggestions:<br/>";
    output.innerHTML = "";

    JsonResponse.forEach(function (obj) {

        var target = document.getElementById('scrollcontent');

        var divOpen = "<div class='col-xs-12 col-sm-6 col-lg-4' id='cardStyle'>";
        var title = "<h2>" + obj._title + "</h2>";
        var description = "<p> " + obj._description + "</p>";
        var price = "<p>" + obj._price + "</p>";
        var color = "<p>" + obj._color + "</p>";
        var image = "<img src='../images/" + obj._photoName + "' class=\"img-fluid\" alt='No image available'/>";
        var wishList = "<a href='../wishlist.php?id=" + obj._advertId + "' type='button' class='btn btn-primary'> Add to wishlist </a>";
        var divClose = "</div>";


        // var str = " <h2 class='list-group-item' id='ajaxResult' href='#''>" +
        //     obj._title + ": " + obj._description + obj._photo_name +  "</h2> ";

        var div = document.createElement('div');

        // temp.innerHTML = str;
        div.innerHTML = divOpen + title + description + price + color + image + wishList + divClose;

        while (div.firstChild) {
            target.appendChild(div.firstChild);
        }

    });
    loadMore(JsonResponse);
}


//Check if user has scrolled to the bottom of the page, load more results
function loadMore(JsonResponse) {

    console.log("loadMore");
    console.log(JsonResponse);

    document.addEventListener("scroll", function (event) {
        //Get doc height minus 100px, when this happens - continue
        if (getDocHeight() - 100 <= getScrollXY()[1] + window.innerHeight) {

            //get the old page content
            var oldcontent = document.getElementById('scrollcontent');

            oldcontent.innerHTML += "<div class='page'>";

            //Loop through JSON results
            JsonResponse.forEach(function (obj) {

                //Make elements
                var divOpen = "<div class='col-xs-12 col-sm-6 col-lg-4' id='cardStyle'>";
                var title = "<h2>" + obj._title + "</h2>";
                var description = "<p> " + obj._description + "</p>";
                var price = "<p>" + obj._price + "</p>";
                var color = "<p>" + obj._color + "</p>";
                var image = "<img src='../images/" + obj._photoName + "' class=\"img-fluid\" alt='No image available'/>";
                var wishList = "<a href='../wishlist.php?id=" + obj._advertId + "' type='button' class='btn btn-primary'> Add to wishlist </a>";
                var divClose = "</div>";

                //Make div here
                var div = document.createElement('div');

                //Concat all elements to DIV
                div.innerHTML = divOpen + title + description + price + color + image + wishList + divClose;

                //Append HTML
                while (div.firstChild) {
                    oldcontent.appendChild(div.firstChild);
                }
            });

            oldcontent.innerHTML += "</div>";
        }
    });
}

//get scroll X and Y
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

/*
* Keep for REFERENCE
*/

//
//     document.addEventListener("scroll", function (event) {
//         if (getDocHeight() - 100 <= getScrollXY()[1] + window.innerHeight) {
//             // adverts();
//
//             var oldcontent = document.getElementById('scrollcontent');
//
//             //Need to call Ajax method here
//             oldcontent.innerHTML = oldcontent.innerHTML + '<div class="page">new content loaded</div>';
//
//             document.getElementById("scrollcontent").innerHTML=oldcontent.innerHTML;
//
//         }
//     });
//
// }

// document.addEventListener("scroll", function (event) {
//     if (getDocHeight() - 20 <= getScrollXY()[1] + window.innerHeight) {
//         // adverts();
//
//         var oldcontent = document.getElementById('scrollcontent');
//
//         //Need to call Ajax method here
//         oldcontent.innerHTML = oldcontent.innerHTML + '<div class="page">new content loaded</div>';
//
//         document.getElementById("scrollcontent").innerHTML=oldcontent.innerHTML;
//
//
//
//
//     }
// });