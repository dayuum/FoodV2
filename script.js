function count10(){
    for (let index = 0; index < 10; index++) {
        console.log(index + 1);
    }
}
function dbclick(){
    document.getElementById("pi").innerHTML = "3,141 592 653 589 793 238 462 643 383 279";
}

var clickBox = document.getElementById("button");
clickBox.addEventListener("click", count10);
clickBox.addEventListener("dblclick", dbclick);