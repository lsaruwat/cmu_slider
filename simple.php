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
        <img src="superslides-0.6.2/examples/images/affinity.jpeg" width="1024" height="685" alt="Affinity">
        <div class="content_container" id="content_container">
          <h1>This is a cool looking bike</h1>
          <p>They are cool and fun to ride</p>
        </div>
      </li>
      <li>
        <!-- <iframe src="http://saruwatari.tk/pickle_cat_tribute/lettuceLemur.html"></iframe> -->
        <iframe src="http://coloradomesa.edu"></iframe>
        <div class="content_container" id="content_container">
          <h1>Drew Loves this website</h1>
          <p>Because it reminds him of stuff</p>
        </div>
      </li>
    </ul>
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
      animation : 'slide'
    });

    console.log(slideshow);
     //$("body").on("animated.slides",function(){$("ul.slides-container li")[0].remove();});

    setInterval(getNextSlide, 5000);
    //setTimeout(function(){location.reload()},50000);
  }

  function getNextSlide(){

    // var nextSlideData = {
    //   title : "This is a title for a slide",
    //   content : "This is some content for a slide that also has a picture.",
    //   image : "https://www.google.com/images/branding/googlelogo/2x/googlelogo_color_272x92dp.png",
    //   url : "http://saruwatari.tk"
    // };
    $.ajax({
      url : "getSlide.php",
      dataType : 'json',
      type : 'POST',
      async : false,
      data : {},

      success : function (returnData) {
        if(returnData.message == "Success"){
          //console.log(returnData);
          var nextSlideData = returnData.slide[0];
          console.log(returnData.slide[0].title);


          var imageTag = "<img src='http://www.coloradomesa.edu//_files/images/news/campus.jpg'/>";
          if(nextSlideData.image !== ""){
            console.log("this is true");
            imageTag = "<img src='" + nextSlideData.image + "'/>";
          }
          var nextSlide = "<li>" + imageTag + "<div class='content_container'><h1>" + nextSlideData.title + "</h1><p>" + nextSlideData.content + "</p></div></li>";

          var slidesContainer = $("ul.slides-container li");
          
          if(slideNumber === 0){
            slideshow.superslides('start');
            slideshow.superslides('next');
            console.log("first slide");
          }
          else{
            console.log("next slide");
            $('#slides').superslides('stop');
            slideshow.superslides('next');
            slidesContainer.parent().append(nextSlide);
            //$("ul.slides-container li")[0].remove();
            slideshow.superslides('update');
            slideshow.superslides('start');
          }
          slideNumber++;
        }
        else {
          //$("#login_error").html("<p>"+ returnData.message + "</p>");
          console.log(returnData);
        }

      }

    });

  }

  </script>
</body>
</html>
