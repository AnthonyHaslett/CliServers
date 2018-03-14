// //Local AJAX
// function showHint(str) {
//     if (str.length == 0) {
//         document.getElementById("txtHint").innerHTML = "";
//         return;
//     } else {
//         var xmlhttp = new XMLHttpRequest();
//         xmlhttp.onreadystatechange = function() {
//             if (this.readyState == 4 && this.status == 200) {
//                 document.getElementById("results").innerHTML = this.responseText;
//             }
//         };
//         xmlhttp.open("GET", "AJAX_handler.php?q=" + str, true);
//         xmlhttp.send();
//     }
// }

//Server side AJAX
// var obj, dbParam, xmlhttp, myObj, x, txt = "";
// obj = {"table": "adverts", "limit": 10};
// dbParam = JSON.stringify(obj);
// xmlhttp = new XMLHttpRequest();
//
//
// xmlhttp.onreadystatechange = function() {
//     if (this.readyState === 4 && this.status === 200) {
//         myObj = JSON.parse(this.responseText);
//         for (x in myObj) {
//
//             myObj.innerHTML += "<p> hello</p>";
//
//             txt += myObj[x].title + "<br>";
//             txt += myObj[x].photo_name + "<br>";
//         }
//         document.getElementById("results").innerHTML = txt;
//     }
// };
//
//
// xmlhttp.open("GET", "AJAX_handler.php?x=" + dbParam, true);
// xmlhttp.send();



var output = document.getElementById("results");
var input = document.getElementById("lookUp");

var search = input.innerHTML;


input.addEventListener("input", function () {

    var theRequest = new XMLHttpRequest();
    theRequest.open('GET', 'AJAX_handler.php?x='+search, true);


    theRequest.onreadystatechange = function () {

        if(theRequest.status >= 200 && theRequest.status < 400){
            //Don#t
            var ourData = JSON.parse(theRequest.responseText);
            renderHTML(ourData);
        }
        else {
            console.log("Connection success. But returned error");
        }
    };

//Need to assign string value here

    theRequest.send();

    theRequest.onerror = function () {
        console.log("Connection error");
    };

});


function renderHTML(data) {
    var htmlString = "HELLO";

    console.log(data);
    for(var i = 0 ; i < data.length ; i++){
        console.log(htmlString);
    }

}