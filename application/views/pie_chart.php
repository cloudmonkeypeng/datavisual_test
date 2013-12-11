<!DOCTYPE HTML>
<meta charset="utf-8">
<style>

body{
	font: 10px sans-serif;
}

.arc path{
	stroke:#fff;
}
</style>
<body>
<script src="<?php echo views_path().'/d3/d3.v3.min.js'?>"></script>
<script>
var data = [<?php echo $data_array?>];

var width = 500,
    height = 500,
    radius = Math.min(width, height) / 2;

var color = d3.scale.ordinal()
    .range([ "#7b6888", "#6b486b", "#a05d56", "#d0743c","#98abc5", "#8a89a6","#ff8c00"]);

var arc = d3.svg.arc()
    .outerRadius(radius - 10)
    .innerRadius(0);

var pie = d3.layout.pie()
    .sort(null)
    .value(function(d) { return d.amount; });

var svg = d3.select("body").append("svg")
	.attr("width", width)
    .attr("height", height)
  .append("g")
    .attr("transform", "translate(" + width / 2 + "," + height / 2 + ")");

data.forEach(function(d) {
    d.amount = +d.amount;
  });

  var g = svg.selectAll(".arc")
      .data(pie(data))
    .enter().append("g")
      .attr("class", "arc");

  g.append("path")
      .attr("d", arc)
      .style("fill", function(d) { return color(d.data.client_name); });

 /*	 输出文字使用
 */g.append("text")
      .attr("transform", function(d) { return "translate(" + arc.centroid(d) + ")"; })
      .attr("dy", ".35em")
      .style("text-anchor", "middle")
      .text(function(d) { return d.data.client_name; });

</script>
</body>