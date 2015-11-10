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
            <li><a href="about.html" class="nav"><h4>Tentang</h4></a></li>
          </ul>
        </div>
      </div>
      <div class="row" id="quizcol">
        <div class="twelve columns box">
					<form method="POST" action="result.php" id="qa">
						<span id="q" style="font-size: 3rem;"></span><br>
						<input name="ans" type="radio" id="ans1" value="A"><span id="ans1l" style="margin-left: 1rem;"></span>
						<br>
						<input name="ans" type="radio" id="ans2" value="B"><span id="ans2l" style="margin-left: 1rem;"></span>
						<br>
						<input name="ans" type="radio" id="ans3" value="C"><span id="ans3l" style="margin-left: 1rem;"></span>
						<br>
						<input name="ans" type="radio" id="ans4" value="D"><span id="ans4l" style="margin-left: 1rem;"></span>
						<br>
						<a href="#" class="button button-primary" id="next">Next Question</a>
					</form>
        </div>
      </div>
			<div class="row" id="result" style="display: none;">
				<div class="twelve columns box">
					<span id="resulttext"></span>
				</div>
			</div>
			</div>
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
							loadQ();
						}
						function loadQ(){
							document.getElementById("q").innerHTML = qnum+1+". " + json.questions[qnum]["question"];
							document.getElementById("ans1l").innerHTML = json.questions[qnum]["opt1"];
							document.getElementById("ans2l").innerHTML = json.questions[qnum]["opt2"];
							document.getElementById("ans3l").innerHTML = json.questions[qnum]["opt3"];
							document.getElementById("ans4l").innerHTML = json.questions[qnum]["opt4"];
						}
						function nextQuestion(){
							answers[qnum] = document.getElementById("qa").elements["ans"].value;
							qnum += 1;
							loadQ();
							if(qnum+1 == json.questions.length){
								document.getElementById("next").innerHTML = "Submit quiz!";
								document.getElementById("next").removeEventListener("click", nextQuestion);
								document.getElementById("next").addEventListener("click", function(){
									answers[qnum] = document.getElementById("qa").elements["ans"].value;
									document.getElementById("quizcol").style.display = "none";
									document.getElementById("result").style.display = "block";
									var result = new XMLHttpRequest();
									result.addEventListener("load", finres);
									result.open("POST", "submit.php");
									result.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
									result.send(JSON.stringify(answers));
								});
							}
						}
						function finres(){
							document.getElementById("resulttext").innerHTML = this.responseText;
						}
					</script>

      <div class="row">
        <div class="twelve columns center" style="margin-top: 20%;"><h6>Design (C)opyright <a href="http://ryanz12.github.io">BlueRizk</a> 2015, using <a href="http://getskeleton.com">Skeleton</a></h6></div>
      </div>
    </div>
  </body>
</html>
<?php
	$answers = json_decode(file_get_contents("php://input"));
	$point = 0;
	$noobie = 1;
	$pro = 2;
	if($answers[0] === "A"){
		$point += $pro;
	}
	if($answers[0] === "B"){
		$point += $noobie;
	}
	if($answers[0] === "C"){
		$point += $noobie;
	}
	
	if($answers[1] === "A"){
		$point += $noobie;
	}
	if($answers[1] === "B"){
		$point += $pro;
	}
	if($answers[1] === "C"){
		$point += $noobie;
	}
	
	if($answers[2] === "A"){
		$point += $noobie;
	}
	if($answers[2] === "C"){
		$point += $pro;
	}
	
	if($answers[3] === "A"){
		$point += $noobie;
	}
	if($answers[3] === "B"){
		$point += $noobie;
	}
	if($answers[3] === "C"){
		$point += $pro;
	}
	
	if($answers[4] === "D"){
		$point += $pro;
	}
	if($answers[4] === "B"){
		$point += $noobie;
	}
	if($answers[4] === "C"){
		$point += $noobie;
	}
	
	if($answers[5] === "A"){
		$point += $noobie;
	}
	if($answers[5] === "B"){
		$point += $pro;
	}
	if($answers[5] === "C"){
		$point += $noobie;
	}
	
	if($answers[6] === "A"){
		$point += $pro;
	}
	if($answers[6] === "D"){
		$point += $noobie;
	}
	if($answers[6] === "C"){
		$point += $noobie;
	}
	
	if($answers[7] === "A"){
		$point += $noobie;
	}
	if($answers[7] === "B"){
		$point += $noobie;
	}
	if($answers[7] === "C"){
		$point += $pro;
	}
	
	if($answers[8] === "A"){
		$point += $pro;
	}
	if($answers[8] === "C"){
		$point += $noobie;
	}
	
	if($answers[9] === "A"){
		$point += $pro;
	}
?>
