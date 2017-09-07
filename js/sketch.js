function setup() {
var canvas = createCanvas(300,20);
canvas.parent('sketch');
}

var ellipsele = {
	x: 0,
	y: 10,
	xspeed: 6
}
function draw() {
	background('rgba(200,200,250, 0.2)');
	ellipseleDisplay();
	ellipseleSpeed();
	bounceOnWallHit();
}


function ellipseleDisplay(){
	ellipse(ellipsele.x,ellipsele.y,20,20);
	fill(50,50,200);
	stroke(100,100,230);
	strokeWeight(3);
}
function bounceOnWallHit() {
		if (ellipsele.x > width - 10 || ellipsele.x < 0) {
		ellipsele.xspeed = ellipsele.xspeed * -1;
	}
}
function ellipseleSpeed() {
	ellipsele.x = ellipsele.x + ellipsele.xspeed;
}