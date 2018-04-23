// var output = document.getElementById("results").innerHTML;
var search = document.getElementById("lookUp").innerHTML;

//function takes string parameter passed from HTML
function results(string) {
    if (string.length === 0) {
        //if user inputted string is empty, assign results to be empty
        document.getElementById("results").innerHTML = "";
    } else {
        //make new AJAX request
        var request = new XMLHttpRequest();
        request.overrideMimeType("application/json");


        request.onreadystatechange = function () {
            if (request.readyState === 4 && request.status === 200) {

                var JsonResponse = JSON.parse(request.responseText);

                console.log(JsonResponse);

                renderResult(JsonResponse);
            }
            else {
                // console.log("FAIL" + request);

            }
        };
        //send
        request.open("GET", "AJAX_handler.php?query=" + string, true);
        request.send(null);
    }
}

function resultClicked() {
    var search = document.getElementById("lookUp");
    var output = document.getElementById("results").textContent;
    // var output = document.getElementById("results").children;

    var ajaxResult = document.getElementById("ajaxResult");


    for (var i = 0; i < ajaxResult.length; i++) { // iterate over it

        search.value = ajaxResult;
    }

    console.log("hello");


    // search.value = output;

}


function renderResult(JsonResponse) {
    var output = document.getElementById("results");
    var search = document.getElementById("lookUp");

    // output.innerHTML = "Suggestions:<br/>";
    output.innerHTML = "";

    JsonResponse.forEach(function (obj) {

        // output.innerHTML += "<li> <a class='list-group-item' onclick='resultClicked()'>" +
        //     obj._title + ": " + obj._description + "</a> <li>";

        var target = document.getElementById('results');

        // var advertId = obj._advertId;


        var str = " <a class='list-group-item' id='ajaxResult' type='button' >" +
            obj._title + ": " + obj._description + "</a> ";


        var button = '<input type="button" value="Search" onClick="searchResults(\'' + obj._title + '\')" />';


        var temp = document.createElement('li');
        var inputElement = document.createElement('input');

        // temp.addEventListener('click', function(){
        //     searchResults(advertId);
        // });

        //https://stackoverflow.com/questions/9643311/pass-string-parameter-in-an-onclick-function

        // inputElement.type = "button"
        // inputElement.addEventListener('click', function(){
        //     gotoNode(result.name);
        // });

// ​document.body.appendChild(inputElement);​


        temp.innerHTML = str;
        inputElement.innerHTML = button;

        while (temp.firstChild) {
            target.appendChild(temp.firstChild);
        }

        while (inputElement.firstChild) {
            target.appendChild(inputElement.firstChild);
        }



    });

}

function searchResults(advertId) {


    console.log("advert Id is " + advertId);


    if (advertId.length === 0) {
        //if user inputted string is empty, assign results to be empty
        document.getElementById("scrollcontent").innerHTML = "No results found";
    }
    else {
        //make new AJAX request
        var request = new XMLHttpRequest();
        request.overrideMimeType("application/json");


        request.onreadystatechange = function () {
            if (request.readyState === 4 && request.status === 200) {

                var JsonResponse = JSON.parse(request.responseText);

                console.log(JsonResponse);

                renderAdvertResults(JsonResponse);
            }
            else {
                // console.log("FAIL" + request);

            }
        };
        //send
        request.open("GET", "AJAX_handler.php?id=" + advertId, true);
        request.send(null);
    }


}






