<nav>
<a href="level1.php">
	<section href="level1.php" class="levelB"><img alt="background" id="level" class="level one" src="images/level1.png"></section>
</a>

<a href="level2.php">
	<section class="levelB"><img alt="background" class="level two" src="images/level2.png"></section>
</a>

<a href="level3.php">
<section class="levelB"><img alt="background" class="level three" src="images/level3.png"></section>
</a>

<a href="level4.php">
<section class="levelB"><img alt="background" class="level four" src="images/level4.png"></section>
</a>

<a href="level5.php">
<section class="levelB"><img alt="background" class="level five" src="images/level5.png"></section>
</a>

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
