<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<title>条形图</title>
	<script src="<?php echo views_path().'/d3/d3.v3.min.js'?>"></script>
	<style type="text/css">
		div.bar{
			display: inline-block;
			width: 20px;
			margin-right: 2px;
			background-color: black;
		}
	</style>
</head>
<body>
	<script type="text/javascript">

		var data = [];

		for (var i = 25; i >= 0; i--) 
			data =data.concat(Math.round(Math.random()*20));
					
		d3.select("body")
			.append("h1")
			.text("条形图未使用SVG");

		d3.select("body")
			.selectAll("div")
			.data(data)
			.enter()
			.append("div")
			.attr("class","bar")
			.style("height",function(d){
				var barHeight = d*5;
				return barHeight + "px";
			});
///////////////////////
		d3.select("body")
			.append("h1")
			.text("条形图使用SVG");

		//弄成彩虹色
			var w = 570;  
            var h = 100;  
            var barPadding = 2;  
              
            //Create SVG element  
            var svg = d3.select("body")  
                        .append("svg")  
                        .attr("width", w)  
                        .attr("height", h);  
  
            svg.selectAll("rect")  
               .data(data)  
               .enter()  
               .append("rect")  
               .attr("x", function(d, i) {  
                    return i * (w / data.length);  
               })  
               .attr("y", function(d) {  
                    return h - (d * 4);  
               })  
               .attr("width", w / data.length - barPadding)  
               .attr("height", function(d) {  
                    return d * 5;  
               })  
               .attr("fill", function(d) {  
                    return "black";  
               });  
  
            svg.selectAll("text")  
               .data(data)  
               .enter()  
               .append("text")  
               .text(function(d) {  
                    return d;  
               })  
               .attr("text-anchor", "middle")  
               .attr("x", function(d, i) {  
                    return i * (w / data.length) + (w / data.length - barPadding) / 2;  
               })  
               .attr("y", function(d) {  
                    return h - (d * 4) + 14;  
               })  
               .attr("font-family", "sans-serif")  
               .attr("font-size", "11px")  
               .attr("fill", "yellow");

	</script>
</body>
</html>