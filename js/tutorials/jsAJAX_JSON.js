// var myCat = {
//     "name": "jimmy",
//     "species": "cat",
//     "favFood": "tuna"
// };
//
// var myFavColors = ["red","blue","orange", "purple"];
//
// myFavColors[0];

// var thePets = [
//     {
//         "name": "jimmy",
//         "species": "cat",
//         "favFood": "tuna"
//     },
//     {
//         "name": "bruno",
//         "species": "dog",
//         "favFood": "pizza"
//     }
// ];
//
// thePets[1].favFood;

var pageCounter = 1;
var animalContainer = document.getElementById("animal-info");
var btn = document.getElementById("btn");

btn.addEventListener("click", function () {

    var ourRequest = new XMLHttpRequest();
    ourRequest.open('GET', 'https://learnwebcode.github.io/json-example/animals-'+ pageCounter +'.json');
    ourRequest.onload = function () {

      if(ourRequest.status >= 200 && ourRequest.status < 400){
          var ourData = JSON.parse(ourRequest.responseText);
          renderHTML(ourData);

      }
      else{
          console.log("Connection success. But returned error");
        }


    };

    ourRequest.onerror = function () {
        console.log("Connection error");
    };

    ourRequest.send();
    pageCounter++;

    if(pageCounter > 3){
        btn.classList.add("hide-me")
    }

});

function renderHTML(data) {
    var htmlString = "";

    for(var i = 0; i < data.length ; i++ ){
        htmlString += "<p>" + data[i].name + " is a " + data[i].species + " that likes, ";

        for(var ii = 0 ; ii < data[i].foods.likes.length; ii++){
            if(ii==0 ){
                htmlString += data[i].foods.likes[ii];
            }else{
                htmlString += " and " + data[i].foods.likes[ii];

            }
        }

        htmlString += ' and dislikes ';

        for(var ii = 0 ; ii < data[i].foods.dislikes.length; ii++){
            if(ii==0 ){
                htmlString += data[i].foods.dislikes[ii];
            }else{
                htmlString += " and " + data[i].foods.dislikes[ii];

            }
        }

        htmlString += ". </p>";
    }

    animalContainer.insertAdjacentHTML('beforeend', htmlString);

}

