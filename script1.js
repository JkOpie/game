var score = 0;
var maxScore = 4;
var currentLevel = 0;
var level = 1;
var downloadTimer;
var totalTime = 0;

$(document).ready(function() {
  $("#start").click(function() {
    timer(5);
    createViews(4);
    $('#level').text(1);
    $('#start').hide();
    $('#restart').show();
  });
});

$('#restart').click(()=>{
  restart();
});

function timer(timeleft){
  downloadTimer =  setInterval(function(){
    totalTime++;
    if(timeleft < 0){
      console.log(totalTime);

      $.ajax({
        type: "POST",
        url: 'verify_score.php',
        data: {
            'score' : score,
        }, // serializes the form's elements.
        success: function(data) { 
          if(data){
            console.log(JSON.parse(data));
          }
         
        }
    });
      
      clearInterval(downloadTimer);
      $("#timer").text("0");
      $('.center').css('height', '100vh');
      //alert('Time Out You Lose');
      restart();
    } else {
      $("#timer").text(timeleft + "s remaining");
    }
 
    timeleft -= 1;
  }, 1000);
}

function createViews(numViews) {
  var game = $("#views");
  game.empty();
  //score = 0;
  for (var i = 0; i < numViews; i++) {
    var view = $("<div/>", {class: "view"});
    game.append(view);
    view.click(handleClick);
  }

  highlightRandomView();
}

function handleClick() {
  var target = $(this);
  if (target.hasClass("highlighted")) {
    target.removeClass("highlighted").addClass("clicked");
    score++;
    $('#score').text(score);
    if (score == maxScore) {
      clearInterval(downloadTimer);
      switch (level) {
        case 1:
          $('.center').css('height', '100vh');
          createViews(9);
          maxScore += 9;
          timer(5);
          break;
        case 2: 
          $('.center').css('height', '100vh');
          createViews(16);
          maxScore += 16;
          timer(5);
          break;
        case 3: 
        createViews(25);
          $('.center').css('height', '100%');
          maxScore += 25;
          timer(5);
          break;
        case 4: 
          $('.center').css('height', '100%');
          createViews(36);
          maxScore += 36;
          timer(5);
          break;
      }
      level++;
      $('#level').text(level);
    } else {
      highlightRandomView();
    }
  }
}

function highlightRandomView() {
  var $views = $('.view');
  var unclickedViews = $views.not('.clicked').toArray();

  if (unclickedViews.length > 0) {
    var randomIndex = Math.floor(Math.random() * unclickedViews.length);
    var $randomView = $(unclickedViews[randomIndex]);
    $randomView.addClass('highlighted').on("click", handleClick);
  }
}

function restart(){
  $('#restart').hide();
  $('#start').show();
  $('#score').text(0);
  $('#level').text(0);
  score = 0;
  level = 1;
  maxScore = 4;
  totalTime = 0;
  createViews(4);
  $('.view.highlighted').removeClass('highlighted');
}
