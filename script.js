let score = 0;
let time = 5;
let timer;
var $views = $('.view');

function startGame() {
  score = 0;
  time = 5;
  $("#score").text(score);
  $("#time").text(time);
  $views.removeClass("highlight clicked").off("click", handleViewClick);
  timer = setInterval(updateTime, 10000);
  highlightView();
}

function highlightView() {
  var unclickedViews = $views.not('.clicked').toArray();
  if (unclickedViews.length > 0) {
    var randomIndex = Math.floor(Math.random() * unclickedViews.length);
    var $randomView = $(unclickedViews[randomIndex]);
    $randomView.addClass('highlight').on("click", handleViewClick);
  }
}

function handleViewClick(event) {
  if (score < 3) {
    score++;
    $("#score").text(score);
  } else {
    $(this).addClass("clicked").removeClass("highlight");
    clearInterval(timer);
    $views.off("click", handleViewClick);
    alert(`Congratulations! You reached the maximum score of 4!`);
    return;
  }
 
  $(this).addClass("clicked").removeClass("highlight").off("click", handleViewClick);
  highlightView();
}

function updateTime() {
  time--;
  $("#time").text(time);
  if (time === 0) {
    clearInterval(timer);
    $views.off("click", handleViewClick);
    if (score === 4) {
      alert(`Congratulations! You reached the maximum score of 4!`);
    } else {
      alert(`Game over! Your score is ${score}.`);
    }
  }
}

$("#start").on("click", startGame);
$("#restart").on("click", startGame);

