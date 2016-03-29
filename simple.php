<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>CSCI Slideshow</title>
  <link rel="stylesheet" href="css/global.css">
  <link rel="stylesheet" href="superslides-0.6.2/dist/stylesheets/superslides.css">
  <link rel="stylesheet" href="css/slider.css">

</head>
<body>
  <div id="slides">
    <ul class="slides-container">
      <li>
        <img src="http://www.coloradomesa.edu//_files/images/slider/sprinter-home-banner.png" alt="Cinelli">
        <div class="content_container" id="content_container">
          <h1>Drew Loves Me</h1>
          <p>Because he's a fucking creep</p>
        </div>
      </li>
      <li>
        <img src="superslides-0.6.2/examples/images/surly.jpeg" width="1024" height="682" alt="Surly">
        <div class="content_container" id="content_container">
          <h1>Drew Rides Me</h1>
          <p>Like he rides big dicks</p>
        </div>
      </li>
      <li>
        <img src="superslides-0.6.2/examples/images/cinelli-front.jpeg" width="1024" height="683" alt="Cinelli">
        <div class="content_container" id="content_container">
          <h1>Drew likes bikes</h1>
          <p>The curvy handlebars remind him of curvy dicks</p>
        </div>      
      </li>
      <li>
        <img src="superslides-0.6.2/examples/images/affinity.jpeg" width="1024" height="685" alt="Affinity">
        <div class="content_container" id="content_container">
          <h1>Drew Loves extra high seats</h1>
          <p>They fit between his loose little asshole and rub his buttplug</p>
        </div>
      </li>
      <li>
        <!-- <iframe src="http://saruwatari.tk/pickle_cat_tribute/lettuceLemur.html"></iframe> -->
        <iframe src="http://coloradomesa.edu"></iframe>
        <div class="content_container" id="content_container">
          <h1>Drew Loves this website</h1>
          <p>Because it reminds him of dicks</p>
        </div>
      </li>
    </ul>

    <nav class="slides-navigation">

    </nav>
  </div>

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script src="superslides-0.6.2/examples/javascripts/jquery.easing.1.3.js"></script>
  <script src="superslides-0.6.2/examples/javascripts/jquery.animate-enhanced.min.js"></script>
  <script src="superslides-0.6.2/dist/jquery.superslides.js" type="text/javascript" charset="utf-8"></script>
  <script>
  window.addEventListener("load", ready);
  var slideshow;
  var slideNumber = 0;
  function ready(){
    slideshow = $('#slides').superslides({
      animation : 'fade'
    });

    console.log(slideshow);
     //$("body").on("animated.slides",function(){$("ul.slides-container li")[0].remove();});

    setInterval(getNextSlide, 5000);
    setTimeout(function(){location.reload()},50000);
  }

  function getNextSlide(){

    var nextSlideData = {
      title : "This is a title for a slide",
      content : "This is some content for a slide that also has a picture.",
      image : "https://www.google.com/images/branding/googlelogo/2x/googlelogo_color_272x92dp.png",
      url : "http://saruwatari.tk"
    };

    var nextSlide = "<li><img src='" + nextSlideData.image + "'><h1>" + nextSlideData.title + "</h1><p>" + nextSlideData.content + "</p></li>";

    var slidesContainer = $("ul.slides-container li");
    
    if(slideNumber === 0){
      slideshow.superslides('start');
      slideshow.superslides('animate');
      console.log("first slide");
    }
    else{
      console.log("next slide");
      //slideshow.superslides('next');
      slideshow.superslides('animate');
      slidesContainer.parent().append(nextSlide);
      slideshow.superslides('update');
      slideshow.superslides('start');
      //$('#slides').superslides('stop');
    }
    slideNumber++;

  }

  </script>
</body>
</html>
