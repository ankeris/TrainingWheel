<?php include 'head.php'; ?>

<main id="selectcontainer">
<h2 class="title middle">Choose level</h2>

<a href="level1.php">
  <section class="levelcontainer">
    <img src="images/level1.png" alt="level" id="level1">
  	 <p class="leveltext">Level one, the kid version, a good start.</p>
  </section>
</a>

<figure class="seperator"></figure>

<a href="level2.php">
  <section class="levelcontainer">
  <img src="images/level2.png" alt="level" id="level2">
  	<p class="leveltext">Level two, the right above beginner.</p>
  </section>
</a>

<figure class="seperator"></figure>

<a href="level3.php">
  <section class="levelcontainer">
  <img src="images/level3.png" alt="level" id="level3">
  	<p class="leveltext">Level three, the middle guy.</p>
  </section>
</a>

<figure class="seperator"></figure>

<a href="level4.php">
  <section class="levelcontainer">
  <img src="images/level4.png" alt="level" id="level4">
  	<p class="leveltext">Level four, if your strong, but not the strongest.</p>
  </section>
</a>

<figure class="seperator"></figure>

<a href="level5.php">
  <section class="levelcontainer">
  <img src="images/level5.png" alt="level" id="level5">
  	<p class="leveltext">Level five, hulk version, take it to the extreme!</p>
  </section>
</a>

</main>
<script>
$(".levelcontainer").hover(
  function () {
    $(this).addClass('animated rubberBand .leveltexthover');
  }, 
  function () {
    $(this).removeClass('animated rubberBand .leveltexthover');
  }
  );
</script>