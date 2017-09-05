<style>
#wrapper {
  position:relative;
  height: 400px;
  width: 100%;
  text-align: center;
  margin-top: -50px;
}


.buttonWheel {
  width: 180px;
  height:180px;

  position: absolute;
  top:50%;
  left:50%;

  margin-left: -90px;
  margin-top: -90px;

  z-index: 5000;

  background-color:rgba(0,57,94,1);
  color:white;
  font-family: Avenir;
  font-size: 35px;
  font-style: bold;

  border-style: solid;
  border-color:white;
  border-width: 20px;
  border-radius: 50%;


  /*box-shadow: 0px 0px 30px yellow;*/

  transition: 1s;
  position: absolute;
}

.buttonWheel:hover {
  transform: scale(1.1,1.1);
}
  </style>

<div id="wrapper">
<input class="buttonWheel" type="button" value="SPIN" id='spin' />
  <canvas id="canvas" width="300" height="400"></canvas>
</div>

  <script>
    var options = ["ABS", "LOWERBODY", "ARMS", "SHOULDERS", "LEGS", "UPPERBODY", "CHEST", "FULLBODY"];

    var doSomething = ["20 SITUPS", "10 PUSHUPS", "20 SQUATS", "10 BENCHPRESS", "10 SHOULDERPRESS", "20 DIPS", "10 SOMETHING", "20 SOMETHING"]

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
      var canvas = document.getElementById("canvas");
      if (canvas.getContext) {
        var outsideRadius = 140;
        var textRadius = 110;
        var insideRadius = 90;

        ctx = canvas.getContext("2d");
        ctx.clearRect(0, 0, 300, 400);


        ctx.font = '12px Avenir';

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
      ctx.font = '17px Avenir';
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
  </script>
