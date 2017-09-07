<?php include 'head.php'; ?>
<section onclick="goBack()" class="back">
	<figure id="stick2"></figure>
	<figure id="stick1"></figure>
</section>
<section class="information" style="
    max-width: 500px;
    display: block;
    text-align: left;
    padding: 5%;
    margin: auto;">
    
    <h1 class="title middle">Information</h1>
    <h3 class="smalltitle">Introduction</h3>
    <p>The Training Wheel is a web application made to help people get some extra exercises in a fun and random way.</p>
    <h3 class="smalltitle">FAQ</h3>
    <p>How does it work?</p>
    <p>- You spin the wheel and you get an exercise task.</p>
    <h3 class="smalltitle">Help</h3>
    <p>Have you tried turning it on and off?</p>
    <h3 class="smalltitle">Contact</h3>
    <p>You can contact us at ...@...</p>
    <img src="../TrainingWheel/images/pushupexample.png">
</section>

<script>
function goBack() {
    window.history.back();
}
</script>



<?php include 'footer.php'; ?>