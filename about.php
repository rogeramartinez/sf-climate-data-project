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

<div id ="data-display" class="container-md">

<div id="about-page">About This Project</div>

<div id ="info"><p></p>This web application was developed by Roger A. Martinez, working on behalf of the San Francisco Conservatory of Music in conjunction with the Climate Music Project.
<p></p><p>The Project takes monthly climate data from San Francisco between 1975 and 2018, and converts it to audio.
The monthly data provided by the Climate Music Project group includes minimum and maximum temperature, total precipitation, and average CO<sup>2</sup> parts per million.</p>
<p></p>
Each of the data points corresponds with a set of audio effects that alters the music. As the CO<sup>2</sup>
parts per million level rises, the music plays faster.

The precipitation level is mapped to the envelope of the synthesizer, and the reverb settings. As precipitation rises, the notes play shorter and with more echo.

Maximum monthly temperature is mapped to the distortion levels in the opening chord of each sequence.

<p></p>

Users have the choice between hearing monthly climate data from a range of dates by decade or year.
They may also listen to the data from a selected month, or a random month.

<p></p>
The goal of this project is to use music to depict the dangers of an unstable climate.

<p></p><p>This application was built using Tone.js.</p>

<p></p>
<div id="image-attr">Image by Eduardo Manchon, licensed under the <a href="https://creativecommons.org/licenses/by-sa/3.0/deed.en">Creative Commons Attribution-Share Alike 3.0 Unported license.</a></div>


</div>

<div id = "back"><a href="index.php">Back to Main</a></div>


</div>



<!--<div id="image-attr">Image by Eduardo Manchon<br>Licensed under the <br><a href="https://creativecommons.org/licenses/by-sa/3.0/deed.en">Creative Commons Attribution-Share Alike 3.0 Unported license.</a></div>-->

</div>

</div>



</body>

</html>
