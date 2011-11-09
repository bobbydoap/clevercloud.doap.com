<html>
<head>

</head>
<body>
<?php
$hello = time();
$bye = "19 October 2008";
?>
<?php
echo date('Y-m-d H:i:s', $hello);
echo strtotime($bye);
?>
</body>
</html>
