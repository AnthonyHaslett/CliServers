
// var output = document.getElementById("results").innerHTML;
var search = document.getElementById("lookUp").innerHTML;

//function takes string parameter passed from HTML
function results(string) {
    if(string.length === 0){
        //if user inputted string is empty, assign results to be empty
        document.getElementById("results").innerHTML = "";
    }else{
        //make new AJAX request
        var request = new XMLHttpRequest();
        request.overrideMimeType("application/json");



        request.onreadystatechange = function () {
            if (request.readyState === 4 && request.status === 200) {

                var JsonResponse = JSON.parse(request.responseText);

                console.log(JsonResponse);

                renderResult(JsonResponse);
            }
            else{
                console.log("FAIL" + request);

            }
        };
        //send
        request.open("GET", "AJAX_handler.php?query=" + string, true);
        request.send(null);
    }
}

function renderResult(JsonResponse){
    var output = document.getElementById("results");

    output.innerHTML = "Suggestions:<br/>";

    JsonResponse.forEach(function(obj) {

        output.innerHTML += "<a class='list-group-item'>"+ "<ahref='#'>" +
            obj._title + ": " + obj._description + "</a>";

    });




}
