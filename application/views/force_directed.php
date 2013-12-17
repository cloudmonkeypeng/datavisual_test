<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Force-Directed Graph</title>
	<style>
	.link {
	  stroke: #000;
	}

	.nodetext {
    font: 12px sans-serif;
    -webkit-user-select:none;
    -moze-user-select:none;
    stroke-linejoin:bevel;
    }

	</style>
</head>
<body>
<script src="<?php echo views_path().'/d3/d3.v3.min.js'?>"></script>
<script>

var graph = {
  nodes: d3.range(13).map(Object),    //返回一个从0开始的 13位等差数列
  links: [
    {source:  0, target:  1},
    {source:  1, target:  2},
    {source:  2, target:  0},
    {source:  1, target:  3},
    {source:  3, target:  2},
    {source:  3, target:  4},
    {source:  4, target:  5},
    {source:  5, target:  6},
    {source:  5, target:  7},
    {source:  6, target:  7},
    {source:  6, target:  8},
    {source:  7, target:  8},
    {source:  9, target:  4},
    {source:  9, target: 11},
    {source:  9, target: 10},
    {source: 10, target: 11},
    {source: 11, target: 12},
    {source: 12, target: 10}
  ]
};

var width = 960,
    height = 500;

var svg = d3.select("body").append("svg")
    .attr("width", width)
    .attr("weight", height);

var force = d3.layout.force()
    .nodes(graph.nodes)
    .links(graph.links)
    .size([width, height])
    .charge(-800)
    .on("tick", tick)
    .start();

var link = svg.selectAll(".link")
   .data(graph.links)
 .enter().append("line")
   .attr("class", "link");

var g = svg.selectAll(".node")
   .data(graph.nodes)
 .enter().append("g");


 var node = g.append("image")
 .attr("xlink:href","<?php echo views_path().'/icons/male.png'?>")
  .attr("width", "32px")
  .attr("height", "32px");

  var text = g.append("text")
  		.attr("class","nodetext")
  		.text(function(d) {return "张某";});



 /*append("circle")
   .attr("class", "node") 
   .attr("r", 4.5);

/* var pic = svg.append('image')
 			.attr("href","http://ww2.sinaimg.cn/large/412e82dbjw1dsbny7igx2j.jpg")
 			.attr("x", "-32px")
      .attr("y", "-32px")
      .attr("width", "64px")
      .attr("height", "64px");*/

 /*var g = svg.selectAll("g")
 		.data(graph.nodes)
 		.enter()
 		.attr("class","node");

/* g.append("svg:image")
 .attr("class","circle")
 .attr("href","http://ww2.sinaimg.cn/large/412e82dbjw1dsbny7igx2j.jpg")
 .attr("x", "-32px")
 .attr("y", "-32px")
 .attr("width", "64px")
 .attr("height", "64px");*/

function tick() {
  link.attr("x1", function(d) { return d.source.x; })
      .attr("y1", function(d) { return d.source.y; })
      .attr("x2", function(d) { return d.target.x; })
      .attr("y2", function(d) { return d.target.y; });

  node.attr("x", function(d) { return d.x-16; })
      .attr("y", function(d) { return d.y-16; });

  text.attr("x", function(d) { return d.x-16; })
      .attr("y", function(d) { return d.y+32; });

   //g.attr("transform",function(d) { return "translate(" + d.x + "," + d.y + ")";});
}

</script>
</body>
</html>