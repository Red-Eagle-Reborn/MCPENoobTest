<!DOCTYPE html>

<html>
  <head>
    <!-- viewport meta, for mobile phone -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- skeleton -->
    <link rel="stylesheet" href="res/skeleton/css/normalize.css">
    <link rel="stylesheet" href="res/skeleton/css/skeleton.css">
    <!-- Raleway -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">
    <title>MCPE Quiz: Test</title>
  </head>
  <body>
    <style>
      @-webkit-keyframes show{ 0%{opacity: 0;} 100%{opacity: 1;}}
      @-moz-keyframes show{ 0%{opacity: 0;} 100%{opacity: 1;}}
      @-o-keyframes show{ 0%{opacity: 0;} 100%{opacity: 1;}}
      @keyframes show{ 0%{opacity: 0;} 100%{opacity: 1;}}

      .display{ animation: show 2s ease; }
      .center{ text-align: center; }
      .inline{ display: inline-block; }
      .nav{
        text-decoration: none;
        color: inherit;
        -moz-transition: color 0.5s ease;
        -o-transition: color 0.5s ease;
        -webkit-transition: color 0.5s ease;
        transition: color 0.5s ease;
      }
      .nav:hover{
        color: #33C3F0;
      }
      body{
        background: url("res/bg.png");
        color: white;
      }
      .box{
        display: block;
        background: rgba(1,1,1,0.5);
        border-radius: 0.75rem;
        padding: 0.5rem;
      }
      @media (min-width: 750px){
        #nav{
          float: right;
        }
      }
    </style>
    <div class="container">
      <div class="row">
        <div class="three columns">
          <a href="index.html" class="nav"><h4>Noob Test</h4></a>
        </div>
        <div class="eight columns">
          <ul id="nav" style="list-style-type: none">
            <li><a href="about.html" class="nav"><h4>Tetang</h4></a></li>
          </ul>
        </div>
      </div>
      <div class="row">
        <div class="twelve columns box">
					<form method="POST" action="result.php" id="qa">
						<span id="q" style="font-size: 3rem;"></span><br>
						<input name="ans" type="radio" id="ans1" value=""><span id="ans1l" style="margin-left: 1rem;"></span>
						<br>
						<input name="ans" type="radio" id="ans2" value=""><span id="ans2l" style="margin-left: 1rem;"></span>
						<br>
						<input name="ans" type="radio" id="ans3" value=""><span id="ans3l" style="margin-left: 1rem;"></span>
						<br>
						<input name="ans" type="radio" id="ans4" value=""><span id="ans4l" style="margin-left: 1rem;"></span>
						<br>
						<a href="#" class="button button-primary" id="next">Next Question</a>
					</form>
					<script>
						document.getElementById("next").addEventListener("click", nextQuestion);

						var answers = new Array();
						var qnum = 0;
						var json;
						var jsonreq = new XMLHttpRequest();
						jsonreq.addEventListener("load", load);
						jsonreq.open("GET", "question/quest.json");
						jsonreq.send();

						function load(){
							json = JSON.parse(this.responseText);
							nextQuestion();
						}

						function nextQuestion(){
							document.getElementById("q").innerHTML = json.questions[qnum]["question"];
							document.getElementById("ans1").value = json.questions[qnum]["opt1"];
							document.getElementById("ans2").value = json.questions[qnum]["opt2"];
							document.getElementById("ans3").value = json.questions[qnum]["opt3"];
							document.getElementById("ans4").value = json.questions[qnum]["opt4"];

							document.getElementById("ans1l").innerHTML = json.questions[qnum]["opt1"];
							document.getElementById("ans2l").innerHTML = json.questions[qnum]["opt2"];
							document.getElementById("ans3l").innerHTML = json.questions[qnum]["opt3"];
							document.getElementById("ans4l").innerHTML = json.questions[qnum]["opt4"];

							answers[qnum] = document.getElementById("qa").elements["ans"];
							qnum++;
						}
					</script>
        </div>
      </div>
      <div class="row">
        <div class="twelve columns center" style="margin-top: 20%;"><h6>Design (C)opyright BlueRizk 2015, using <a href="http://getskeleton.com">Skeleton</a></h6></div>
      </div>
    </div>
  </body>
</html>
