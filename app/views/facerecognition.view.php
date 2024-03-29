<html>
<head>
<script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs@latest"> </script>
<script src="<?=ROOT?>assets/js/webcam.js"></script>
<script src="<?=ROOT?>assets/js/rps-dataset.js"></script>
</head>
<body>
	<div>
		<div>
			<video autoplay playsinline muted id="wc" width="224" height="224"></video>
		</div>
	</div>
	<button type="button" id="0" onclick="handleButton(this)" >Athar Fathana</button>
	<button type="button" id="1" onclick="handleButton(this)" >Cillian Murphy</button>
	<button type="button" id="2" onclick="handleButton(this)" >Ryan gosling</button>
	<div id="samplesAthar">Athar Fathana samples:</div>
	<div id="samplesCillian">Cillian Murphy samples:</div>
	<div id="samplesRyan">Ryan Gosling Samples:</div>
	<button type="button" id="train" onclick="doTraining()" >Train Network</button>
	<div id="dummy">Once training is complete, click 'Start Predicting' to see predictions, and 'Stop Predicting' to end</div>
	<button type="button" id="startPredicting" onclick="startPredicting()" >Start Predicting</button>
	<button type="button" id="stopPredicting" onclick="stopPredicting()" >Stop Predicting</button>
	<div id="prediction"></div>
</body>

<script src="<?=ROOT?>assets/js/index.js"></script>
</html>
