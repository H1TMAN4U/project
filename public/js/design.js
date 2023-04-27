function HideElemenet() {
    // var element = document.getElementById("rating-element");
    var x = document.getElementsByClassName("hide");
    for (let i = 0; i < x.length; i++) {

        if (x[i].style.display === "block") {
            x[i].style.display = "none";
        }
        else {
            x[i].style.display = "block";
            // element.scrollIntoView({
            //     behavior: "smooth"
            //   })
        }
    }
}
