<!DOCTYPE HTML>
<head>
	<meta charset="utf-8">
	<style type="text/css">

	h1 {
		color: #444;
		background-color: transparent;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	</style>
</head>
<body>
	<title>D3测试_1</title>
	<script src="<?php echo views_path().'/d3/d3.v3.min.js'?>"></script>	
	<script>
		d3.select("body")
			.append("h1")
			.text("Hello World");
	</script>
</body>