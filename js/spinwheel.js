var doSomething;

if (window.location.href.match('level1')) {
  doSomething = ["10 sit ups", "Plank 25 seconds", "5 dips", "Crab walk for 20 seconds", "10 lounges", "5 inverted rows", "5 push ups", "5 jumping jacks"];
} else if (window.location.href.match('level2')) {
  doSomething = ["15 sit ups", "Plank 30 seconds", "10 dips", "Crab walk for 25 seconds", "15 lounges", "10 inverted rows", "10 push ups", "10 jumping jacks"];
} else if (window.location.href.match('level3')) {
  doSomething = ["20 sit ups", "Plank 35 seconds", "15 dips", "Crab walk for 30 seconds", "20 lounges", "15 inverted rows", "15 push ups", "15 jumping jacks"];
} else if (window.location.href.match('level4')) {
  doSomething = ["25 sit ups", "Plank 40 seconds", "10 Diamond push ups", "Hand stand 20 seconds", "25 lounges", "20 inverted rows", "20 push ups", "20 jumping jacks"];
} else if (window.location.href.match('level5')) {
  doSomething = ["30 sit ups", "Plank 45 seconds", "20 Diamond push ups", "Hand stand 40 seconds", "30 lounges", "25 inverted rows", "25 push ups", "25 jumping jacks"];
}

var options = ["ABS", "UPPERBODY", "ARMS", "SHOULDERS", "LEGS", "BACK", "CHEST", "FULLBODY"];


var startAngle = 0;
var arc = Math.PI / (options.length / 2);
var spinTimeout = null;

var spinArcStart = 10;
var spinTime = 0;
var spinTimeTotal = 0;

var ctx;

document.getElementById("spin").addEventListener("click", spin);

function byte2Hex(n) {
  var nybHexString = "0123456789ABCDEF";
  return String(nybHexString.substr((n >> 4) & 0x0F, 1)) + nybHexString.substr(n & 0x0F, 1);
}

function RGB2Color(r, g, b) {
  return "#00395e";
}

function getColor(item, maxitem) {
  var phase = 0;
  var center = 128;
  var width = 127;
  var frequency = Math.PI * 2 / maxitem;

  red = Math.sin(frequency * item + 2 + phase) * width + center;
  green = Math.sin(frequency * item + 0 + phase) * width + center;
  blue = Math.sin(frequency * item + 4 + phase) * width + center;

  return RGB2Color(red, green, blue);
}

function drawRouletteWheel() {
  var wheel = document.getElementById("wheel");
  if (wheel.getContext) {
    var outsideRadius = 140;
    var textRadius = 110;
    var insideRadius = 90;

    ctx = wheel.getContext("2d");
    ctx.clearRect(0, 0, 300, 400);

    // ctx.strokeStyle = "white";
    // ctx.lineWidth = 15;


    ctx.font = "14px Avenir";

    for (var i = 0; i < options.length; i++) {
      var angle = startAngle + i * arc;
      //ctx.fillStyle = colors[i];
      ctx.fillStyle = getColor(i, options.length);

      ctx.beginPath();
      ctx.arc(150, 200, outsideRadius, angle, angle + arc, false);
      ctx.arc(150, 200, insideRadius, angle + arc, angle, true);
      ctx.stroke();
      ctx.fill();

      ctx.save();
      ctx.fillStyle = "white";
      ctx.fontFamily = "Avenir";
      ctx.borderStyle = "solid";
      ctx.translate(150 + Math.cos(angle + arc / 2) * textRadius,
        200 + Math.sin(angle + arc / 2) * textRadius);
      ctx.rotate(angle + arc / 2 + Math.PI / 2);
      var text = options[i];
      ctx.fillText(text, -ctx.measureText(text).width / 2, 0);
      ctx.restore();
    }

    //Arrow
    ctx.fillStyle = "white";
    ctx.beginPath();
    ctx.moveTo(150 - 4, 200 - (outsideRadius + 5));
    ctx.lineTo(150 + 4, 200 - (outsideRadius + 5));
    ctx.lineTo(150 + 4, 200 - (outsideRadius - 5));
    ctx.lineTo(150 + 9, 200 - (outsideRadius - 5));
    ctx.lineTo(150 + 0, 200 - (outsideRadius - 13));
    ctx.lineTo(150 - 9, 200 - (outsideRadius - 5));
    ctx.lineTo(150 - 4, 200 - (outsideRadius - 5));
    ctx.lineTo(150 - 4, 200 - (outsideRadius + 5));
    ctx.fill();
  }
}

function spin() {
  spinAngleStart = Math.random() * 10 + 10;
  spinTime = 0;
  spinTimeTotal = Math.random() * 3 + 4 * 1000;
  rotateWheel();
}

function rotateWheel() {
  spinTime += 30;
  if (spinTime >= spinTimeTotal) {
    stopRotateWheel();
    return;
  }
  var spinAngle = spinAngleStart - easeOut(spinTime, 0, spinAngleStart, spinTimeTotal);
  startAngle += (spinAngle * Math.PI / 180);
  drawRouletteWheel();
  spinTimeout = setTimeout('rotateWheel()', 30);
}

function stopRotateWheel() {
  clearTimeout(spinTimeout);
  var degrees = startAngle * 180 / Math.PI + 90;
  var arcd = arc * 180 / Math.PI;
  var index = Math.floor((360 - degrees % 360) / arcd);
  ctx.save();
  ctx.fillStyle = "black";
  ctx.font = "25px 'Raleway', sans-serif";
  var text = doSomething[index];
  ctx.fillText(text, 150 - ctx.measureText(text).width / 2, 380);
  ctx.restore();
}

function easeOut(t, b, c, d) {
  var ts = (t /= d) * t;
  var tc = ts * t;
  return b + c * (tc + -2 * ts + 2 * t);
}

drawRouletteWheel();
