<html>

<head>
<title></title>
<link rel=stylesheet type="text/css" href="/css/style.css">
<script type="text/javascript" src="/js/prototype.js"></script>
<script type="text/javascript" src="/js/keycode.js"></script>
<script type="text/javascript" src="/js/focus.js"></script>

<script>
function start() {

    try {
        var req = new XMLHttpRequest();
        var url = 'http://123.123.123.123/';

        req.open('GET', url, true);

        var d1 = new Date();
        var d1_time = d1.getTime();
        document.getElementById('result').innerHTML = d1 + ' ==> XMLHttpRequest.open(' + url + ')<br>';

        req.onreadystatechange = function() {
            var d3 = new Date();
            var d3_time = d3.getTime();
            var time_diff = d3_time - d2_time;

            document.getElementById('result').innerHTML += d3 + ' ==> XMLHttpRequest.readyState: ' 
                + req.readyState + ' (Timeout ' + time_diff/1000 + ' sec)<br>';
            document.getElementById('result').innerHTML += req.responseText;
        }

        var d2 = new Date();
        var d2_time = d2.getTime();
        document.getElementById('result').innerHTML += d2 + ' ==> XMLHttpRequest.send() ...<br>';
        req.send();
    }
    catch(e)
    {
        alert("Exception: " + e);
    }

}
</script>
</head>

<body>
    <h1>XHR Connection Timeout Test</h1>
    <input type="button" value="Start" onclick="start();">
    <br><span style='font-size:15px;' id='result'></span>
</body>

</html>
