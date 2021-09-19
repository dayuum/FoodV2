function count10(){
    console.log("1 2 3 4 5 6 7 8 9 10");
}
function dbclick(){
    document.getElementById("pi").innerHTML = "3,141 592 653 589 793 238 462 643 383 279";
}

var clickBox = document.getElementById("button");
clickBox.addEventListener("click", count10);
clickBox.addEventListener("dblclick", dbclick);