function setup() {
  var loading = createCanvas(300, 20);
  loading.parent('#sketch');
}

var ellipsele = {
  x: -10,
  y: 0,
  xspeed: 10
}

function draw() {
  ellipseleDisplay();
  ellipseleSpeed();
  bounceOnWallHit();
}


function ellipseleDisplay() {
  rect(ellipsele.x, ellipsele.y, 20, 20);
  fill(50, 50, 200);
  noStroke();
}

function bounceOnWallHit() {
  if (ellipsele.x > width || ellipsele.x < 0) {
    ellipsele.xspeed = ellipsele.xspeed * -1;
  }
}

function ellipseleSpeed() {
  ellipsele.x = ellipsele.x + ellipsele.xspeed;
}
