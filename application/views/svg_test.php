<!DOCTYPE HTML>
<html>
<head>
	<meta charset="uft-8">
	<title>SVG test</title>
<head>
<body>
<!--	<svg>
		<g>
			<image xlink:href="<?php echo views_path().'/icons/male.png'?>"
	  width="32px" height="32px"  x="32px" y="32px"></image>
			<text x="32"  y="32">123</text>
		</g>
	</image>
	</svg>  -->
<svg>
	<defs>
	<marker id="idArrow"
         viewBox="0 0 20 20" refX="0" refY="10" 
         markerUnits="strokeWidth" markerWidth="3" markerHeight="10"
         orient="auto">
    <path d="M 0 0 L 20 10 L 0 20 z" fill="purple" stroke="black"/>
	</marker>
	</defs>
  <path d="M 50 450 l 0 -350"  stroke="blue"  stroke-width="3" fill="none" d="M 50 450 H 700" marker-end="url(#idArrow)" />
  <path stroke="purple" stroke-width="3" fill="none" d="M 50 450 H 700" marker-end="url(#idArrow)"  />
</svg>

</body>
</html>