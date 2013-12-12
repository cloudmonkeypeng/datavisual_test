<!DOCYTPE HTML>
<html>
<head>
	<meta charset="uft-8">
	<title>圆形测试</title>
	<script src="<?php echo views_path().'/d3/d3.v3.min.js'?>"></script>
</head>
<body>
	<script >
	var width = 500;
	var height =100;

	var data = [5,10,15,20,25];

	var svg = d3.select("body")
				.append("svg")
				.attr("width",width)
				.attr("height",height);

	var circle = svg.selectAll("circle")
					.data(data)
					.enter()
					.append("circle");

	circle.attr("cx",function(d,i){
				return (i+1)*50
			})
			.attr("cy",height/2)
			.attr("r",function(d){
				return d-d/4;
			})
			.attr("fill","yellow")
			.attr("stroke","black")
			.attr("stroke-width",function(d){
				return d/6;
			});
	</script>
</body>
</html>
