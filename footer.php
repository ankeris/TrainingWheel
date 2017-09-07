<footer style="position: absolute; bottom: 0; left: 0;">
<a href="extraPage.php"><img src="images/questionMark.png" alt="info" id="question"></a>
</footer>
</body>
<script src="javascript.js"></script>
<script>
$("#question").hover(
  function () {
    $(this).addClass('animated swing');
  },
  function () {
    $(this).removeClass('animated swing');
  }
  );
</script>
</html>
