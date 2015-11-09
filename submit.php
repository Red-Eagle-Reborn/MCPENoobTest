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
    <title>MCPE Quiz: About</title>
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
          <?php
            $file = file_get_contents("question/quest.json");
            $jsonFile = json_decode($file,true);
            $rnd = rand(1,1);
            $output = "<form method=\"POST\" action=\"result.php\">";
            if($rnd == 1) {
              foreach($jsonFile["questions"] as $q1) {
                for($i = 0; i < 10; $i++) {
                  $output .= $i . ". <b>" . $q1["question"] . "</b><br>";
                  $output .= "<input type='radio' name=\"quest{$i}\" value=\"{$q1['opt1']}\">";
                  $output .= "<input type='radio' name=\"quest{$i}\" value=\"{$q1['opt2']}\">";
                  $output .= "<input type='radio' name=\"quest{$i}\" value=\"{$q1['opt3']}\">";
                  $output .= "<input type='radio' name=\"quest{$i}\" value=\"{$q1['opt4']}\">";
                }
              }
              $output .= "<input type='submit' value='Submit'>";
              $output .= "</form>";
              echo $output;
            }
          ?>
        </div>
      </div>
      <div class="row">
        <div class="twelve columns center" style="margin-top: 20%;"><h6>Design (C)opyright BlueRizk 2015, using <a href="http://getskeleton.com">Skeleton</a></h6></div>
      </div>
    </div>
  </body>
</html>