<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Force-Directed Graph</title>
	<style>

	.nodetext {
    font: 12px sans-serif;
    -webkit-user-select:none;
    -moze-user-select:none;
    stroke-linejoin:bevel;
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


var artBoard = d3.select("body").append("div")
                  .attr("class","artBoard");


var width = 960,
    height = 500;

var svg = artBoard.append("svg")
    .attr("width", width)
    .attr("weight", height);

var force = d3.layout.force()
    .nodes(graph.nodes)
    .links(graph.links)
    .size([width, height])
    .charge(-1500)
    .on("tick", tick)
    .start();

 //添加箭头图标

svg.append("defs")
	.append("marker")
	.attr("id","idArrow")
	.attr("viewBox","0 0 20 20")
	.attr("refX","0")
	.attr("refY","10")
	.attr("markerUnits","strokeWidth")
	.attr("markerWidth","3")   //3
	.attr("markerHeight","10")	//10
	.attr("orient","auto")
	.append("path")
	.attr("d","M 0 0 L 20 10 L 0 20 z")
	.attr("fill","black")
	.attr("stroke","black");


var link = svg.selectAll(".link")
   .data(graph.links)
 .enter().append("line")
 	.attr("stroke","black")
 	.attr("stroke-width","2px")
 	.attr("marker-end","url(#idArrow)");

var g = svg.selectAll(".node")
   .data(graph.nodes)
 .enter().append("g")
 .call(force.drag);


var node = g.append("image")
 .attr("xlink:href","<?php echo views_path().'/icons/male.png'?>")
  .attr("width", "32px")
  .attr("height", "32px");

var text = g.append("text")
  		.attr("class","nodetext")
  		.text(function(d) {return "张某";});

var tempWidth,tempHeight,atan;

//todo   算法需改进   应该可以改进的！！！   必须可以改进！

function tick() {

	link.attr("x1", function(d) { 

		atan = Math.abs((d.source.y-d.target.y)/(d.source.x-d.target.x));

		if (atan>1){
			tempWidth = 20/atan;
		}else{
			tempWidth =20;
		}; 

		if (d.source.x>d.target.x) 
			return d.source.x - tempWidth;

		return d.source.x + tempWidth; 
	})
      .attr("y1", function(d) { 

      	atan = Math.abs((d.source.y-d.target.y)/(d.source.x-d.target.x));

		if (atan>1) 
		{
			tempHeight = 20;
		}else{
			tempHeight =20*atan;
		}; 

		if (d.source.y>d.target.y) 
			return d.source.y - tempHeight;

      	return d.source.y + tempHeight; 
      })
      .attr("x2", function(d) { 

		atan = Math.abs((d.source.y-d.target.y)/(d.source.x-d.target.x));

		if (atan>1) 
		{
			tempWidth = 20/atan;
		}else{
			tempWidth =20;
		}; 

		if (d.source.x>d.target.x) 
			return d.target.x + tempWidth;
      	return d.target.x - tempWidth; 
      })
      .attr("y2", function(d) { 

      	atan = Math.abs((d.source.y-d.target.y)/(d.source.x-d.target.x));

		if (atan>1) 
		{
			tempHeight = 20;
		}else{
			tempHeight =20*atan;
		}; 

		if (d.source.y>d.target.y) 
			return d.target.y + tempHeight;

      	return d.target.y - tempHeight; 

      });

    node.attr("x", function(d) { return d.x-16; })
      .attr("y", function(d) { return d.y-16; });

     text.attr("x", function(d) { return d.x-16; })
      .attr("y", function(d) { return d.y+32; });
}

</script>
</body>
</html>