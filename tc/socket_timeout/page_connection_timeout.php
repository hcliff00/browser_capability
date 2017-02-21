<html>

<head>
<title></title>
<link rel=stylesheet type="text/css" href="/css/style.css">
<script type="text/javascript" src="/js/prototype.js"></script>
<script type="text/javascript" src="/js/keycode.js"></script>
<script type="text/javascript" src="/js/focus.js"></script>

<script>
function start() {
    var d1 = new Date();
    var d1_time = d1.getTime();
    document.getElementById('result').innerHTML = d1 + ' ==> Start loading...<br>';

    var iframe = document.createElement('iframe');
    iframe.style.width = "100%";
    iframe.style.height = "300";
    iframe.style.border = 0;
    iframe.id = 'content_iframe';
    iframe.src = 'http://123.123.123.123/'; 
    //iframe.src = 'a.html'; 

    iframe.onload = function() { 
        var d2 = new Date();
        var d2_time = d2.getTime();
        var diff = d2 - d1;
        document.getElementById('result').innerHTML += d2 + ' ==> Load finished<br>';
        document.getElementById('result').innerHTML += 'Connection timeout is ' + diff;
    };
    document.body.appendChild(iframe);
}
</script>
</head>

<body>
    <h1>Page Connection Timeout Test</h1>
    <input type="button" value="Start" onclick="start();">
    <br><span style='font-size:15px;' id='result'></span>
</body>

</html>
