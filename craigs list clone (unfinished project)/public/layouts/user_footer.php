 </div>
    <div id="footer">Copyright <?php echo date("Y", time()); ?>, Pixai </div>
  </body>
</html>
<?php if(isset($database)) { $database->close_connection(); } ?>