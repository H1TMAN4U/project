<!DOCTYPE html>
<html lang="en" >
<head>
<meta charset="UTF-8">
<title>CodePen - Simple Weather App Design</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>
<link rel="stylesheet" href="/style.css">
</head>
<nav class="nav">
    <div class="container">
        <div class="logo">
            <a href="index.php"><img src="https://upload.wikimedia.org/wikipedia/commons/b/b5/Logo_Game_of_Thrones.png" alt="" width="250px"></a>
        </div>
        <div id="mainListDiv" class="main_list">
            <ul class="navlinks">
                <li><a href="#">About</a></li>
                <li><a href="#">Portfolio</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </div>
    </div>
</nav>

<section class="home"></section>
<div style="height: 700px; padding-top:5% ">
    <h2 class="myH2"><b>Game Of Thrones</b></h2>
    <div>
        <h2 class="myH2" style="padding-left:15%; padding-top:2%; text-align: left; font-size: 28px;"><b>Discription:</b></h2>
        <p class="myP">
            Years after a rebellion spurred by a stolen bride to be and the blind ambitions of a mad King, Robert of the house Baratheon
            sits on the much desired Iron Throne. In the mythical land of Westeros, nine noble families fight for every inch of control 
            and every drop of power. The King's Hand, Jon Arryn (Sir John Standing), is dead. And Robert seeks out his only other ally in
            all of Westeros, his childhood friend Lord Eddard "Ned" Stark. The solemn and honorable Warden of the North is tasked to depart
            his frozen sanctuary and join the King in the capital of King's Landing to help the now overweight and drunk Robert rule.
            However, a letter in the dead of night informs "Ned" that the former Hand was murdered, and that Robert will be next.
            So noble Ned goes against his better desires in an attempt to save his friend and the kingdoms. But political intrigue,
            plots, murders, and sexual desires lead to a secret that could tear the Seven Kingdoms apart.
            And soon Eddard will find out what happens when you play the Game of Thrones.
        </p>
        <button id="search" class="btn btn-secondary" style="width: 70%; margin-top:5%; margin-left:15%; margin-right: 15%;">
            <h1 style="font-size: 36px;"><b>Cast</b></h1>
        </button>
        <div style="width:100%;">
            <div class="container" style="margin: 0%; width: 30%; margin-left: 15%; margin-right: 15%; margin-top: 5%;">
                <div class="row"></div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="card">
        <div id="card1"></div>
    </div>
</div>


<script>
$(window).scroll(function() {
if ($(document).scrollTop() > 50) {
$('.nav').addClass('affix');
console.log("OK");
} else {
$('.nav').removeClass('affix');
}
});
$('.navTrigger').click(function () {
$(this).toggleClass('active');
console.log("Clicked menu");
$("#mainListDiv").toggleClass("show_list");
$("#mainListDiv").fadeIn();
});
$("#search").on("click",function(){
var name   =$('#name').val();
var url = "https://game-of-thrones1.p.rapidapi.com/Characters"
search(url);
});
function search(url)
{
const settings = {
"async": true,
"crossDomain": true,
"url": url,
"method": "GET",
"headers": {
"X-RapidAPI-Key": "3dfcc1e681mshc352d6db407c85fp139807jsn66f7245bbdf3",
"X-RapidAPI-Host": "game-of-thrones1.p.rapidapi.com"
}
}

$.ajax(settings).done(function (response) {
console.log(response);
$.each(response, function(key, val){
var template = 
`  
<div class="row" style="border: 4px solid #000; padding: 2% 1% 2% 1%; margin: 10px 0 10px 0;">
<div class="col">
<img class="card-img-top" src="`+ val.imageUrl +`" alt="" style="width:100%; height: 400px;">
</div>
<div class="col">
<ul class="list-group list-group-flush" style="font-size: 18px;">
<li class="list-group-item"><b>First name:</b> ` + val.firstName + `</li>
<li class="list-group-item"><b>Last name:</b> ` + val.lastName + `</li>
<li class="list-group-item"><b>Full name:</b> ` + val.fullName + `</li>
<li class="list-group-item"><b>Title:</b> ` + val.title + `</li>
</ul>
<div class="card-body" style="font-size: 18px;">
<p class="card-text"><b>Discription:</b></br>    Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus accusamus accusantium ratione quibusdam aspernatur aliquid dolores voluptatibus excepturi, reiciendis necessitatibus magnam voluptas hic recusandae enim sapiente nobis labore aut mollitia, quidem nemo et perspiciatis! Neque quis molestias recusandae voluptatem, laudantium sapiente laboriosam explicabo, odit libero nobis repellat magnam ipsam blanditiis!</p>

</div>
</div>
</div>
`;
$("#card1").append(template);
})
});
};
</script>
</body>
</html>
