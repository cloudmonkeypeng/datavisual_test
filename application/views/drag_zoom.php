<!DOCTYPE HTML>
<html>
<head>
	<meat charset="utf-8">
	<title>drag_zoom</title>
	<style>
	.dot circle {
		fill: lightsteelblue;
		stroke: steelblue;
		stroke-width: 1.5px;
	}

	.dot circle.dragging {
		fill: red;
		stroke: brown;
	}

	.axis line {
		fill: none;
		stroke: #ddd;
		shape-rendering: crispEdges;
		vector-effect: non-scaling-stroke;
	}

	.artBoard {
		border: 1px solid black; 
		margin: 0 auto;
   		width: 960px;
    	height: 500px;
	}

	</style>
</head>
<body>
<script src="<?php echo views_path().'/d3/d3.v3.min.js'?>"></script>
<script>

var data = [
	{x:100,y:80},
	{x:80,y:69},
	{x:130,y:75},
	{x:90,y:88},
	{x:110,y:83},
	{x:140,y:99},
	{x:60,y:72},
	{x:40,y:42},
	{x:120,y:108},
	{x:70,y:48},
	{x:50,y:56}
];


var margin = {top: -5, right: -5, bottom: -5, left: -5},
    width = 960 - margin.left - margin.right,
    height = 500 - margin.top - margin.bottom;

var zoom = d3.behavior.zoom()
    .scaleExtent([1, 10])
    .on("zoom", zoomed);

var drag = d3.behavior.drag()
    .origin(function(d) { return d; })
    .on("dragstart", dragstarted)
    .on("drag", dragged)
    .on("dragend", dragended);

var svg = d3.select("body").append("div")
	.attr("class","artBoard").append("svg")
    .attr("width", width + margin.left + margin.right)
    .attr("height", height + margin.top + margin.bottom)
    .append("g")
    .attr("transform", "translate(" + margin.left + "," + margin.right + ")")
    .call(zoom);

var rect = svg.append("rect")
    .attr("width", width)
    .attr("height", height)
    .style("fill", "none")
    .style("pointer-events", "all");

var container = svg.append("g");

container.append("g")
    .attr("class", "x axis")
  .selectAll("line")
    .data(d3.range(0, width, 10))
  .enter().append("line")
    .attr("x1", function(d) { return d; })
    .attr("y1", 0)
    .attr("x2", function(d) { return d; })
    .attr("y2", height);

container.append("g")
    .attr("class", "y axis")
  .selectAll("line")
    .data(d3.range(0, height, 10))
  .enter().append("line")
    .attr("x1", 0)
    .attr("y1", function(d) { return d; })
    .attr("x2", width)
    .attr("y2", function(d) { return d; });


/*dot = container.append("g")
      .attr("class", "dot")
    .selectAll("circle")
      .data(data)
    .enter().append("circle")
      .attr("r", 5)
      .attr("cx", function(d) { return d.x; })
      .attr("cy", function(d) { return d.y; })
      .call(drag);*/

dot =container.append("g")
	.selectAll("image")
	.data(data).enter()
	.append("image")
	.attr("xlink:href","<?php echo views_path().'/icons/male.png'?>")
  	.attr("width", "32px")
  	.attr("height", "32px")
  	.attr("x",function(d){ return d.x; })
  	.attr("y",function(d){ return d.y; })
  	.call(drag);


function dottype(d) {
  d.x = +d.x;
  d.y = +d.y;
  return d;
}

function zoomed() {
  container.attr("transform", "translate(" + d3.event.translate + ")scale(" + d3.event.scale + ")");
}

function dragstarted(d) {
  d3.event.sourceEvent.stopPropagation();
  d3.select(this).classed("dragging", true);
}

function dragged(d) {
  d3.select(this).attr("x", d.x = d3.event.x).attr("y", d.y = d3.event.y);
}

function dragended(d) {
  d3.select(this).classed("dragging", false);
}

</script>
</body>
</html>