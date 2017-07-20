    <!-- Rodapé -->
    </div>
    <footer class="footer">
      <div class="container">
        <p class="text-muted">jonasthomaz@gmail.com</p>
      </div>
    </footer>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo APP_URI;  ?>public/js/bootstrap.min.js"></script>

    <script src="<?php echo APP_URI;  ?>public/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
    <script src="<?php echo APP_URI;  ?>public/bootstrap-tagsinput/dist/bootstrap-tagsinput-angular.min.js"></script>
    <script>
      $('form').on('keyup keypress', function(e) {
        var keyCode = e.keyCode || e.which;
        if (keyCode === 13) { 
          e.preventDefault();
          return false;
        }
      });  

    </script>
    
  </body>
</html>