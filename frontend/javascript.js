var c = document.getElementById("myCanvas");
var ctx = c.getContext("2d");

//console.log(c.width, c.height);



ctx.fillStyle = "#FFFFFF";
ctx.fillRect(0, 0, c.width, c.height);

ctx.beginPath();
/* ctx.arc(x, y, radius, startAngle, endAngle[, counterclockwise] */
ctx.arc(c.width/2, c.height/2, 50, 0, 2*Math.PI)

ctx.fillStyle = "#6dF79e";
ctx.fill();
ctx.stroke();  
	

function cornerTriangles(triSize=50, color="#6dF79e") {
	ctx.putImageData(imageData, 0, 0);
	ctx.fillStyle = color;

	ctx.beginPath();
    ctx.moveTo(0,0);
    ctx.lineTo(triSize,0);
    ctx.lineTo(0,triSize);
    ctx.lineTo(0,0);
    ctx.fill();
    ctx.stroke();  

    ctx.beginPath();
    ctx.moveTo(c.width,0);
    ctx.lineTo(c.width-triSize,0);
    ctx.lineTo(c.width,triSize);
    ctx.lineTo(c.width,0);
    ctx.fill();
    ctx.stroke();  

    ctx.beginPath();
    ctx.moveTo(0,c.height);
    ctx.lineTo(triSize,c.height);
    ctx.lineTo(0,c.height-triSize);
    ctx.lineTo(0,c.height);
    ctx.fill();
    ctx.stroke();  

    ctx.beginPath();
    ctx.moveTo(c.width,c.height);
    ctx.lineTo(c.width-triSize,c.height);
    ctx.lineTo(c.width,c.height-triSize);
    ctx.lineTo(c.width,c.height);
    ctx.fill();
    ctx.stroke(); 
}

var imageData = ctx.getImageData(0,0,c.width,c.height);

var timer = setInterval(myTimer, 1000);
var t = 0;
function myTimer() {
	console.log(t);
	t++;
	var knapp = document.getElementById("val"+t);
	cornerTriangles(knapp.getAttribute("data-size"), "#5e2ea9");
	if (t==5) {
		t=0;
	}

}

var valButtons = document.getElementsByClassName("val");

for (var i = 0; i < valButtons.length; i++) {
	
	valButtons[i].addEventListener("click", function(e){
		
		console.log();
		cornerTriangles(this.getAttribute("data-size"), "#5e2ea9");
		if (this.getAttribute("id")== "reset") {
			clearInterval(timer);
		}
	});

}



/*document.getElementById("val1").addEventListener("click", function(){
	cornerTriangles(100, "#5e2ea9");
});
document.getElementById("val2").addEventListener("click", function(){
	cornerTriangles(100, "#5ebbbb");
});
document.getElementById("val3").addEventListener("click", function(){
	cornerTriangles(100, "#ff2ea9");
});
document.getElementById("val4").addEventListener("click", function(){
	cornerTriangles(100, "#5e7ba9");
});
	 */
//ctx.fillStyle = "#FF0000";
//ctx.fillRect(20, 20, 150, 100);