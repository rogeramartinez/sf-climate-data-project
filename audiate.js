$(document).ready(function () {

	//$('#myTimeline').horizontalTimeline();

	var pattern_number = "";

	var month = new Array();
	month[0] = "January";
	month[1] = "February";
	month[2] = "March";
	month[3] = "April";
	month[4] = "May";
	month[5] = "June";
	month[6] = "July";
	month[7] = "August";
	month[8] = "September";
	month[9] = "October";
	month[10] = "November";
	month[11] = "December";

	$("#slider").slider({ id: "slider12b", min: 1975, max: 2018, range: true, value: [1975, 2018] });

	function get_min_year(){

		//var min_year = $("#slider12b > div.tooltip.tooltip-min.top > div.tooltip-inner").html();

		return $("#start-year").val();
	}

        function get_max_year(){

        //var max_year = $("#slider12b > div.tooltip.tooltip-max.top > div.tooltip-inner").html();

		return $("#end-year").val();
		}


	var min_year = get_min_year();

	var max_year = get_max_year();


	$("#start-month, #start-year").change(function () {

		if ($("#play-controls").html() == "■") {

			sendToAudio();
		}
	});

	$("#play-controls").click(function () {

		play_controls();
		
	});

	function play_controls() {

		if ($("#play-controls").html() == "■") {

			$("#end-year").css("background-color", "#ffff");

			$("#end-year").css("color", "#black");

			$("#end-year").css("border-color", "initial");

			stop();

			$("#play-controls").html('&#9658;');

			//$.getScript("audiate.js", function () { stop(); }).done(function () { $("#play-controls").html('&#9658;'); });

			$("#end-month, #end-year").prop("disabled", false);

			return false;
		}

		else {
			sendToAudio();

			$("#end-month, #end-year").prop("disabled", true);

			$("#end-year").css("background-color", "#e9ecef");

			$("#end-year").css("color", "#6c757d");

			$("#end-year").css("border-color", "#ced4da");

			$("#play-controls").html('&#9632;');
		}
	}

	function convertToFarenheit(temp){

		//console.log("\ntemp: " + temp);

		var newTemp = temp * 9/5 + 32;
	
		newTemp = Math.floor(newTemp * 10) / 10;
	
		return newTemp;
	}

	function incrementMonth() {

		var month_val = $("#start-month").val();

		if (month_val < 12)
		{
			var new_month_val = month_val + 1;

			$("#start-month").val(new_month_val);
        }
    }

	function sendToAudio() {
		//var date = $("#datepicker").val();

		var start_month = $("#start-month").val();

		var start_year = $("#start-year").val();

		console.log("Month: " + start_month);
		console.log("Year: " + start_year);

		var date = start_year + start_month;

		console.log("Date: " + date);

		var request = $.ajax({
			url: "get-data.php",
			method: "POST",
			data: { year: start_year, date: date },
			dataType: "text"
		});

		request.done(function (data) {

			console.log(data);

			climate_data = JSON.parse(data);

			var dateString = new Date(date);

			console.log(dateString);

			var start_month_string = "";

			if (start_month < 10) {
				start_month_string = start_month.substr(1);
			}
			else {
				start_month_string = start_month;
			}

			start_month_string -= 1;

			var plainDate = month[start_month_string] + ", " + start_year;

			climate_data.min_temp = convertToFarenheit(climate_data.min_temp);

			climate_data.max_temp = convertToFarenheit(climate_data.max_temp);

			climate_data.precip_mm = Math.floor(climate_data.precip_mm * 10) / 10;

			climate_data.co2_ppm = Math.floor(climate_data.co2_ppm * 10) / 10;

			$("#data-display").empty();

			$("#data-display").append("<div id='data-header'><p>" + plainDate + "</p></div>");

			$("#data-display").append("<div id='data'><p>Min Temp: " + climate_data.min_temp + " &#8457;</p>");
			$("#data-display").append("<p>Max Temp: " + climate_data.max_temp + " &#8457;</p>");

			$("#data-display").append("<p>Total Preciptation: " + climate_data.precip_mm + " mm</p>");

			$("#data-display").append("<p>Average CO<sup>2</sup> level: " + climate_data.co2_ppm + " ppm</p></div>");

			audiate(climate_data);

			//var script = $.getScript("audiate.js", function () { audiate(climate_data); });        


		});

		request.fail(function (jqXHR, textStatus) {
			alert("Request failed: " + textStatus);
		});
	}

	function stop() {

		Tone.Transport.cancel();

	}

	function populate_hash() {

		var notes = ["C4", "G4", "D5", "A#4", "A4", "D#4", "D4", "C4", "C5", "G4", "C4", "D#3"];

		var notes_2 = ["G4", "D3", "G3", "D5", "D#3", "G3", "B3", "D#4", "D3", "G3", "C4", "G4"];

		var hash = new Array(11);

		var random_pattern = Math.floor(Math.random() * Math.floor(2));

		if (random_pattern == 0) {
			pattern_number = 1;
		}
		else if (random_pattern == 1) {
			pattern_number = 2;
        }

		for (var i = 0; i < 12; i++) {

			var random_index = Math.floor(Math.random() * Math.floor(11))

			if (random_pattern == 0) {
				hash[i] = notes[random_index];
			}
			else if (random_pattern == 1) {
				hash[i] = notes_2[random_index];
            }
		}

		return hash;
    }

	function audiate(climate_data) {

		var random_hash = populate_hash();

	    var start_month = document.getElementById("start-month").selectedIndex;

		var end_month = document.getElementById("end-month").selectedIndex

		var start_year = document.getElementById("start-year").value;

		var end_year = document.getElementById("end-year").value;

		var start_date = start_year + start_month;

		var end_date = end_year + end_month;

		stop();

		var noise = new Tone.Noise("white");

		var wet = Math.floor(climate_data.precip_mm) / 100;

		var max_percent = climate_data.max_temp / 100;

		var reverb = new Tone.Reverb({ wet: wet });

		reverb.generate();

		//var lfo = new Tone.LFO(1, 0, Number(climate_data.co2_ppm));

		noise.start();

		var max = parseFloat(climate_data.max_temp);

		var min = parseFloat(climate_data.min_temp);

		console.log(max_percent);

		//var frequency = max / min;

		//connect the noise
		//noise.connect(autoFilter);
		//start the autofilter LFO

		var delay = new Tone.Delay({
			delayTime: "16n",
			maxDelay: wet,
		});
        

		var float_wet = parseFloat(wet) + 0.05;

		var fmSynth = new Tone.FMSynth({
			harmonicity: 10,
			volume: -25,
			envelope: {
				attack: wet,
				decay: 0.5,
				sustain: float_wet,
				release: float_wet,
			},
        });

		var fm2 = new Tone.MonoSynth({
			volume: -30,
			envelope: {
				attack: wet,
				decay: 0.05,
				sustain: float_wet,
				release: float_wet,
			},
		});


		//var fmOsc = new Tone.FMOscillator();

		fmSynth.chain(fm2, reverb, Tone.Master);

		var num = 0;

		var poly = new Tone.PolySynth(6, Tone.Synth, {
			oscillator: {
				type: "square"
			},
			envelope: {
				attack: 1.55,
				release: 10.5,
			},
			volume: -25,

		});

		console.log("Wet: " + wet);

        /*
		var phaser = new Tone.Phaser({
			"frequency": 10,
			"octaves": 4,
			"baseFrequency": climate_data.co2_ppm,
            "wet": 0.25,
		});
        */

		delay.toMaster();

		//phaser.toMaster();

		//fm2.connect(phaser);

		//fmSynth.connect(phaser);

		fmSynth.connect(delay);

		var stereo = new Tone.StereoWidener({ "width": 1 });

		var pattern = new Tone.Pattern(function (time, note) {
			fmSynth.triggerAttackRelease(note, 0.64);

			fm2.triggerAttackRelease(note, 0.66);

			num++;

			console.log(start_date);

			console.log(end_date);


			if (num == 24) {

				if (start_date < end_date) {

					if (start_month < 11) {
						var new_month = start_month + 1;
						document.getElementById("start-month").selectedIndex = new_month;

						//$.getScript("client-side.js", function () { sendToAudio(); });

						sendToAudio();

					}
					else {

						next_year = parseInt(start_year) + 10;

						//next_year = 2018;

						document.getElementById("start-year").value = next_year;

						document.getElementById("start-month").selectedIndex = 0;

						sendToAudio();

					}

				}


			}

		}, random_hash, "upDown");

		var filter = new Tone.Filter({
			type: "lowpass",
			frequency: 200,
			rolloff: -12,
			Q: 1,
			gain: -3,
		});

		filter.connect(fm2);

		filter.connect(fmSynth);

		var lfo = new Tone.LFO({
			type: "sine",
			min: 0,
			max: max,
			phase: 1,
			frequency: climate_data.co2_ppm,
			amplitude: 5,
		});

		var distortion = new Tone.Distortion({
			distortion: max_percent,
			oversample: "4x",
		});

		distortion.connect(poly);

		lfo.connect(fm2.detune);
		lfo.connect(fmSynth.detune);
		lfo.connect(poly.detune);

		pattern.cancel();

		poly.toMaster();

		stereo.connect(fmSynth);

		stereo.connect(fm2);

		Tone.Transport.bpm.value = climate_data.co2_ppm;

		pattern.start();

		if (pattern_number == 1) {
			poly.triggerAttackRelease(["C1", "C2", "D#4", "A4"], "1n");
		}
		else if (pattern_number == 2) {
			poly.triggerAttackRelease(["G2", "G3", "D4", "B3"], "1n");

        }

		pattern.iterations = 25;

		document.querySelector('#play-controls').addEventListener('click', e => Tone.Transport.toggle());

		Tone.Transport.start();



	}

})
