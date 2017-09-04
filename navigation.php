<?php include 'head.php'; ?>
<nav>
<section class="levelB"><img alt="background" id="level" class="level one" src="images/level1.png"></section>
<section class="levelB"><img alt="background" class="level two" src="images/level2.png"></section>
<section class="levelB"><img alt="background" class="level three" src="images/level3.png"></section>
<section class="levelB"><img alt="background" class="level four" src="images/level4.png"></section>
<section class="levelB"><img alt="background" class="level five" src="images/level5.png"></section>
</nav>
<script>
$(".level").hover(
  function () {
    $(this).addClass('animated jello');
  }, 
  function () {
    $(this).removeClass('animated jello');
  }
  );
</script>
