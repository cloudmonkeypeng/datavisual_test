<!DOCTYPE HTML>
<html>
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
	<title>Hello_World</title>
	<script src="<?php echo views_path().'/d3/d3.v3.min.js'?>"></script>	
	<script>
		
		d3.select("body")
			.append("h1")
			.text("Hello World");
		
		var data = [1,2,3,4];

		d3.select("body")
			.selectAll("p")
			.data(data)
			.enter()
			.append("p")
			.text(function(d){
				return "The number is " + d;
			})
			.style("color",function(d){
				if (d%2) {
					return "black";
				} else{
					return "yellow";
				}
			});
	</script>
</body>
</html>