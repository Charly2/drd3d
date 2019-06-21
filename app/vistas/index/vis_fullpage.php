<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>fullPage.js A simple Demo</title>
    <meta name="author" content="Alvaro Trigo Lopez" />
    <meta name="description" content="fullPage very simple demo." />
    <meta name="keywords"  content="fullpage,jquery,demo,simple" />
    <meta name="Resource-type" content="Document" />

    <link rel="stylesheet" type="text/css" href="<?=URL_ASSETS?>assets/css/fullpage.css" />
    <link rel="stylesheet" type="text/css" href="examples.css" />
</head>
<body>



<div id="fullpage">
    <div class="section active" id="section0"><h1>fullPage.js</h1></div>
    <div class="section" id="section1">
        <div class="slide "><h1>Simple Demo</h1></div>
        <div class="slide active"><h1>Only text</h1></div>
        <div class="slide"><h1>And text</h1></div>
        <div class="slide"><h1>And more text</h1></div>
    </div>
    <div class="section" id="section2"><h1>No wraps, no extra markup</h1></div>
    <div class="section" id="section3"><h1>Just the simplest demo ever</h1></div>
</div>



<script type="text/javascript" src="<?=URL_ASSETS?>assets/js/fullpage.js"></script>
<script type="text/javascript">
    var myFullpage = new fullpage('#fullpage', {
        sectionsColor: ['#f2f2f2', '#4BBFC3', '#7BAABE', 'whitesmoke', '#ccddff']
    });
</script>
</body>
</html>