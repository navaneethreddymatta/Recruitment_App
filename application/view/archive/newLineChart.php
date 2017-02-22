	<link rel=stylesheet href="http://fortawesome.github.io/Font-Awesome/assets/font-awesome/css/font-awesome.css">
    <script type="text/javascript" src="http://mbostock.github.com/d3/d3.js?2.4.5"></script>
	<script type="text/javascript">
	var lineData = [{x: 0,y: 50,w:0,r:0},
	{x: 1,y: 10,w:30,r:10},
	{x: 2,y: 4,w:3,r:3},
	{x: 3,y: 3,w:2,r:1},
	{x: 4,y: 2,w:1,r:0},
	{x: 5,y: 0,w:0,r:0},
	{x: 6,y: 0,w:0,r:0},
	{x: 7,y: 0,w:0,r:0}];
	</script>

	<svg id="visualisation" width="1000" height="500"></svg>
	<style>
	.grid .tick {
    stroke: lightgrey;
    stroke-opacity: 0.7;
    shape-rendering: crispEdges;
}
path { 
    stroke: steelblue;
    stroke-width: 2;
    fill: none;
}
	</style>
     <script>
	 var vis = d3.select('#visualisation'),
    WIDTH = 500,
    HEIGHT = 200,
    MARGINS = {
      top: 20,
      right: 20,
      bottom: 20,
      left: 50
    },
    /*xRange = d3.scale.linear().range([MARGINS.left, WIDTH - MARGINS.right]).domain([d3.min(lineData, function(d) {
      return d.x;
    }), d3.max(lineData, function(d) {
      return d.x;
    })]),*/
	xRange = d3.scale.linear().range([MARGINS.left, WIDTH - MARGINS.right]).domain([0,8]),
    yRange = d3.scale.linear().range([HEIGHT - MARGINS.top, MARGINS.bottom]).domain([d3.min(lineData, function(d) {
      return d.y;
    }), d3.max(lineData, function(d) {
      return d.y;
    })]),
    xAxis = d3.svg.axis()
      .scale(xRange)
	  .tickFormat(function(d,i) { if(i==0){return i;}else if(i==1){ return "WT";}else{return "R"+(i-1);} })
      .tickSize(1)
      .tickSubdivide(false),
    yAxis = d3.svg.axis()
      .scale(yRange)
      .tickSize(1)
      .orient('left')
      .tickSubdivide(true);
 
vis.append('svg:g')
  .attr('class', 'x axis')
  .attr('transform', 'translate(0,' + (HEIGHT - MARGINS.bottom) + ')')
  .call(xAxis);
 
vis.append('svg:g')
  .attr('class', 'y axis')
  .attr('transform', 'translate(' + (MARGINS.left) + ',0)')
  .call(yAxis);
  vis.append("g")            
        .attr("class", "grid")
		.attr('transform', 'translate(0,' + (HEIGHT - MARGINS.bottom) + ')')
        .call(xAxis
            .tickSize(-HEIGHT+40, 0, 0)
            .tickFormat("")
        );
	vis.append("g")            
        .attr("class", "grid")
		.attr('transform', 'translate(' + (MARGINS.left) + ',0)')
        .call(yAxis
            .tickSize(-WIDTH+70, 0, 0)
            .tickFormat("")
        );
  var lineFunc = d3.svg.line()
  .x(function(d) {
    return xRange(d.x);
  })
  .y(function(d) {if(d.y>0){
    return yRange(d.y);}
  })
  .interpolate('linear');
  vis.append('svg:path')
  .attr('d', lineFunc(lineData))
  .attr('stroke', 'steelblue')
  .attr('stroke-width', 1.5)
  .attr('fill', 'none');
  vis.selectAll("circle.line2")
        .data(lineData)
        .enter().append("svg:circle")
        .attr("class", "line")
        .style("fill", "none")
		.style("stroke", "steelblue")
		.style("stroke-width", 2.5)
        .attr("cx", lineFunc.x())
        .attr("cy", lineFunc.y())
        .attr("r", 0.1);
	var circles = vis.selectAll(".line");
	circles.each(function(d,i){if(i>0 && d.y>0){var xa=d3.select(this).attr("cx");var ya=d3.select(this).attr("cy");
	vis.append('foreignObject').attr('x', xa-30).attr('y', ya-50).attr('width', 150).attr('height', 100).append("xhtml:body")
                        .html('<div style="width: 150px;"><i class="fa fa-spinner"></i><strong>'+d.w+'</strong><i class="fa fa-times-circle"></i><strong>'+d.r+'</strong></div>');
	}
	});
</script>	 
