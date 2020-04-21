<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.6.2/css/bootstrap-slider.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="styles.css">

<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/ycodetech/horizontal-timeline-2.0@2/css/horizontal_timeline.2.0.min.css">

<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.6.2/bootstrap-slider.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/ycodetech/horizontal-timeline-2.0@2/JavaScript/horizontal_timeline.2.0.min.js"></script>   
<script src="tone.js"></script>
<script src="audiate.js"></script>

</head>
<body class="container-lg">
<div id ="main-container">
<div id= "title-text"><p>San Francisco <span id ="daily-climate-data">Monthly Climate Data</span></p><p>1975-2018</p></div>

<!--
<div class="horizontal-timeline" id="myTimeline">
  <div class="events-content">
    <ol>
      <li class="selected" data-horizontal-timeline='{"date": "12/12/2012", "customDisplay": "Custom Text"}'>
        Event 1
      </li>
      <li data-horizontal-timeline='{"date": "12/12/2016", "customDisplay": "Custom Text"}'>
        Event 2
      </li>
      <li data-horizontal-timeline='{"date": "12/12/2019", "customDisplay": "Custom Text"}'>
        Event 3
      </li>
      ... more events here ...
    </ol>
  </div>
</div>
-->
<!--<p>Date: <input type="date" min="1975-01-01" max="2018-12-31" value="1975-07-07" id="datepicker">
</p>-->


<div id ="data-display" class="container-md">

<h6> Play Data By: </h6>


<div id="play-option">


<div id="play-by"><button id ="play-controls">&#9658;</button>


<button type="button" class="btn btn-primary btn-md increment active" id="by-decade">Decade</button>

<button type="button" class="btn btn-primary btn-md increment disabled" id="by-year">Year</button>

<button type="button" class="btn btn-primary btn-md increment disabled" id="one-month">Selection</button>

<button type="button" class="btn btn-primary btn-md increment disabled" id="random">Random</button>

</div>

<div id="date-range-label"><h6> Date Range </h6></div>

<div id = "selection">
<div id="date-range-form">

<span class ="year-range">

<select class="date-range custom-select" id="start-month">
  <option selected value="01" size="2">January</option>
  <option value="02">February</option>
  <option value="03">March</option>
  <option value="04">April</option>
  <option value="05">May</option>
  <option value="06">June</option>
  <option value="07">July</option>
  <option value="08">August</option>
  <option value="09">September</option>
  <option value="10">October</option>
  <option value="11">November</option>
  <option value="12">December</option>
</select>
<input type ="number" min="1975" max ="2018" value="1975" id="start-year" class="input-lg"></input>

</span>
<!-- Range slider, low track: -->

<!--<input id="slider" type="text"/><br/>-->

<span class="year-range">
<!--<span class ="range-label" id="to-date">To: </span>-->

<select class="date-range custom-select" id="end-month">
  <option value="01" size="2">January</option>
  <option value="02">February</option>
  <option value="03">March</option>
  <option value="04">April</option>
  <option value="05">May</option>
  <option value="06">June</option>
  <option value="07">July</option>
  <option value="08">August</option>
  <option value="09">September</option>
  <option value="10">October</option>
  <option value="11">November</option>
  <option selected value="12">December</option>
</select>

<input type ="number" min="1975" max ="2018" value="2018" id="end-year"></input>

<!--<div id = "max-year"></div>-->
</span>


</div>

<div id ="data-display-inner" class="container-md lead"></div>

<div id = "audio-settings"><div id="audio header">Audio Settings</div>

<div id ="audio-details">

<div>CO<sup>2</sup> ppm = Tempo</div>

<div>Precipitation = Note Length, Reverb</div>

<div>Max Temperature = Distortion</div>

</div>

</div>



<div></div>


<div id = "about"><a href="about.php">About This Project</a></div>


</div>



<!--<div id="image-attr">Image by Eduardo Manchon<br>Licensed under the <br><a href="https://creativecommons.org/licenses/by-sa/3.0/deed.en">Creative Commons Attribution-Share Alike 3.0 Unported license.</a></div>-->

</div>

</div>



</body>

</html>
