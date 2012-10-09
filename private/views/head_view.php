<!DOCTYPE HTML>
<html xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
    <title><?= $this->title; ?></title>
    <meta http-equiv="imagetoolbar" content="false" />
    <meta name="description" content="Jesse Markowitz - Music Management & Consulting">
    <meta name="author" content="Jesse Markowitz">
    <!--
    <meta property="og:title" content="Goldenage" />
    <meta property="og:url" content="http://thegoldenage.ca/" />
    <meta property="og:description" content="Jesse Markowitz - Music Management & Consulting" />
    <meta property="og:image" content="http://thegoldenage.ca/images/thumb.jpg" />

-->
    <? if ($this->meta): ?>
        <!-- include meta tags -->
        <? foreach ($this->meta as $meta): ?>
            <? echo '<meta ' . $meta . '/>' . "\n"; ?>
        <? endforeach; ?>
    <? endif; ?>
    
    <? if ($this->css): ?>
        <!-- include css -->
        <? foreach ($this->css as $css): ?>
            <link rel="stylesheet" type="text/css" href="<?= $css; ?>" />
        <? endforeach; ?>
    <? endif; ?>
    
    <? if ($this->js): ?>
        <!-- include js -->
        <? foreach ($this->js as $js): ?>
            <script type="text/javascript" src="<?= $js; ?>"></script>
        <? endforeach; ?>
    <? endif; ?>

</head>
<body>