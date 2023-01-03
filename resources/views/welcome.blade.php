<html>
    <head>
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,400;0,700;1,400;1,700&family=Roboto+Slab:wght@400;700&display=swap');

html {
  height: 100%;
  min-height:800px;
}
body {
  background: url('https://i.pinimg.com/originals/48/79/86/487986c17560a8ed1afdc55e480e5be2.png');
  background-size:cover;
  background-repeat:no-repeat;
  text-align: center;
 font-family: 'Noto Sans', sans-serif;
  -webkit-touch-callout: none;
  -webkit-user-select: none;
  -khtml-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

h1{
  font-weight:400;
  padding-top:0;
  margin-top:0;
  font-family: 'Roboto Slab', serif;
}

#svg_form_time {
  height: 15px;
  max-width: 80%;
  margin: 40px auto 20px;
  display: block;
}

#svg_form_time circle,
#svg_form_time rect {
  fill: white;
}

.button {
  background: rgb(237, 40, 70);
  border-radius: 5px;
  padding: 15px 25px;
  display: inline-block;
  margin: 10px;
  font-weight: bold;
  color: white;
  cursor: pointer;
  box-shadow:0px 2px 5px rgb(0,0,0,0.5);
}

.disabled {
  display:none;
}

section {
  padding: 50px ;
  max-width: 300px;
  margin: 30px auto;
  background:white;
  background:rgba(255,255,255,0.9);
  backdrop-filter:blur(10px);
  box-shadow:0px 2px 10px rgba(0,0,0,0.3);
  border-radius:5px;
  transition:transform 0.2s ease-in-out;
}


input {
  width: 100%;
  margin: 7px 0px;
  display: inline-block;
  padding: 12px 25px;
  box-sizing: border-box;
  border-radius: 5px;
  border: 1px solid lightgrey;
  font-size: 1em;
  font-family:inherit;
  background:white;
}

p{
  text-align:justify;
margin-top:0;
}
        </style>'<script>
            $( document ).ready(function() {
            var base_color = "rgb(230,230,230)";
            var active_color = "rgb(237, 40, 70)";



            var child = 1;
            var length = $("section").length - 1;
            $("#prev").addClass("disabled");
            $("#submit").addClass("disabled");

            $("section").not("section:nth-of-type(1)").hide();
            $("section").not("section:nth-of-type(1)").css('transform','translateX(100px)');

            var svgWidth = length * 200 + 24;
            $("#svg_wrap").html(
            '<svg version="1.1" id="svg_form_time" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 ' +
                svgWidth +
                ' 24" xml:space="preserve"></svg>'
            );

            function makeSVG(tag, attrs) {
            var el = document.createElementNS("http://www.w3.org/2000/svg", tag);
            for (var k in attrs) el.setAttribute(k, attrs[k]);
            return el;
            }

            for (i = 0; i < length; i++) {
            var positionX = 12 + i * 200;
            var rect = makeSVG("rect", { x: positionX, y: 9, width: 200, height: 6 });
            document.getElementById("svg_form_time").appendChild(rect);
            // <g><rect x="12" y="9" width="200" height="6"></rect></g>'
            var circle = makeSVG("circle", {
                cx: positionX,
                cy: 12,
                r: 12,
                width: positionX,
                height: 6
            });
            document.getElementById("svg_form_time").appendChild(circle);
            }

            var circle = makeSVG("circle", {
            cx: positionX + 200,
            cy: 12,
            r: 12,
            width: positionX,
            height: 6
            });
            document.getElementById("svg_form_time").appendChild(circle);

            $('#svg_form_time rect').css('fill',base_color);
            $('#svg_form_time circle').css('fill',base_color);
            $("circle:nth-of-type(1)").css("fill", active_color);

            
            $(".button").click(function () {
            $("#svg_form_time rect").css("fill", active_color);
            $("#svg_form_time circle").css("fill", active_color);
            var id = $(this).attr("id");
            if (id == "next") {
                $("#prev").removeClass("disabled");
                if (child >= length) {
                $(this).addClass("disabled");
                $('#submit').removeClass("disabled");
                }
                if (child <= length) {
                child++;
                }
            } else if (id == "prev") {
                $("#next").removeClass("disabled");
                $('#submit').addClass("disabled");
                if (child <= 2) {
                $(this).addClass("disabled");
                }
                if (child > 1) {
                child--;
                }
            }
            var circle_child = child + 1;
            $("#svg_form_time rect:nth-of-type(n + " + child + ")").css(
                "fill",
                base_color
            );
            $("#svg_form_time circle:nth-of-type(n + " + circle_child + ")").css(
                "fill",
                base_color
            );
            var currentSection = $("section:nth-of-type(" + child + ")");
            currentSection.fadeIn();
            currentSection.css('transform','translateX(0)');
            currentSection.prevAll('section').css('transform','translateX(-100px)');
            currentSection.nextAll('section').css('transform','translateX(100px)');
            $('section').not(currentSection).hide();
            });

            });
        </script>
    </head>
    <body>
        
        <div id="svg_wrap"></div>

 <h1>Online Application</h1>
<section>
  <p>Personal information</p>
  <input type="text" placeholder="Firstname" />
  <input type="text" placeholder="Surname" />
  <input type="text" placeholder="Birthdate" />
  <input type="text" placeholder="Insurance number" />
  <input type="text" placeholder="Family status" />
</section>

<section>
  <p>Address</p>
  <input type="text" placeholder="Street, nbr" />
  <input type="text" placeholder="City" />
  <input type="text" placeholder="Postcode" />
  <input type="text" placeholder="Country" />
</section>

<section>
  <p>Contact information</p>
  <input type="text" placeholder="Email address" />
  <input type="text" placeholder="Phone" />
  <input type="text" placeholder="Mobile" />
</section>

<section>
  <p>Application</p>
  <input type="text" placeholder="Preferred entrance date" />
  <input type="text" placeholder="Number of people" />
</section>

<section>
  <p>General condtitions</p>
  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
</section>

  <div class="button" id="prev">&larr; Previous</div>
<div class="button" id="next">Next &rarr;</div>
<div class="button" id="submit">Agree and send application</div>

        
    </body>
</html>