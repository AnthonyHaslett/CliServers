function Person(fullName, favColor) {
    this.name = fullName;
    this.favouriteColor = favColor;

    this.greet =function () {
        console.log("\n *****");
        console.log("JavaScript OOP tutorial");
        console.log("Hello my name is, " + fullName + ". My fav color is " + favColor);
        console.log("\n *****");

    }
}

var anthony = new Person("Anthony Haslett", "red");
anthony.greet();
