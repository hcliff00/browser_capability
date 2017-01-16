<html>

<head>
<title></title>
<link rel=stylesheet type="text/css" href="/css/style.css"> 
<script type="text/javascript" src="/js/prototype.js" ></script>
<script type="text/javascript" src="/js/focus.js" ></script>

<script>
function do_ajax() {

	try {
		var req = new XMLHttpRequest();
		req.open('GET', 'slow_gif.php', true);

		var params = "value=7890";

		req.onreadystatechange = function() {
			if (req.readyState == 4) {
				document.getElementById('result').value = req.responseText;	
				document.getElementById('result_length').innerHTML = 'received data length: ' + req.responseText.length + ' bytes';
				document.getElementById('result').value += document.cookie;
			}
		}
		req.send(params);
	}
	catch(e)
	{
        alert("Exception: " + e);
	}

}

do_ajax();
</script>

</head>

<body>

<h1>XHR Test</h1>

<br><span style='font-size:15px;' id='result_length'></span>
<br><textarea style='top:10; font-size:10px; overflow:auto;' id='result' rows='40' cols='140'>
</textarea>

</body>


</body>

</html>
