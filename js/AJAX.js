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

function searchResults(advertId) {

    console.log("advert title is " + advertId);


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

//Renders dropdown results
function renderResult(JsonResponse) {
    var output = document.getElementById("results");
    var search = document.getElementById("lookUp");

    output.innerHTML = "Suggestions:<br/>";
    output.innerHTML = "";

    JsonResponse.forEach(function (obj) {

        var target = document.getElementById('results');

        var str = " <a class='list-group-item' id='ajaxResult' type='button' >" +
            obj._title + ": " + obj._description + "</a> ";

        var button = '<input type="button" value="Search" onClick="searchResults(\'' + obj._title + '\')" />';


        var temp = document.createElement('li');
        var inputElement = document.createElement('input');

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








