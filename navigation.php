<img src="images/plante.png" id="plante" alt="livingroom">
<main> </main>
<nav>
<a href="level1">
	<img alt="background" id="level" class="level one" src="images/level1.png">
</a>

<a href="level2">
	<img alt="background" class="level two" src="images/level2.png">
</a>

<a href="level3">
<img alt="background" class="level three" src="images/level3.png">
</a>

<a href="level4">
<img alt="background" class="level four" src="images/level4.png">
</a>

<a href="level5">
<img alt="background" class="level five" src="images/level5.png">
</a>

</nav>
<script>
$(".level").hover(
  function () {
    $(this).addClass('animated tada');
  }, 
  function () {
    $(this).removeClass('animated tada');
  }
  );
</script>
