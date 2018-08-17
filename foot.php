  <footer>
      <center>
        Test Site For Virtual Host
      </center>
  </footer>
  <script>
    $(function() {
        
        var contact = $('#contact');
        // contact form animations
        $('#contact').click(function() {
          
          $('#contactForm').fadeToggle("slow");
          contact.css({"background": "#4CAF50", "color": "white"});
        })
        $(document).mouseup(function (e) {
          var container = $("#contactForm");
      
          if (!container.is(e.target) // if the target of the click isn't the container...
              && container.has(e.target).length === 0) // ... nor a descendant of the container
          {
              container.fadeOut("slow");
              contact.css({"background": "#f3f3f3", "color": "#666"});
             
          }
          $("#close").mouseup(function() {
            container.fadeOut("slow");
            contact.css({"background": "#f3f3f3", "color": "#666"});
          });black
        });
        $('[id="comment"]').click(function() {
          $('[id="post"]').fadeIn();
          $('[id="comment"]').attr("style","font-size: 13px; background: #e2e2e2; padding: 5px; display: none");
        });
        $(document).mouseup(function (e) {
          var container = $('[id="post"]');
      
          if (!container.is(e.target) // if the target of the click isn't the container...
              && container.has(e.target).length === 0) // ... nor a descendant of the container
          {
              container.fadeOut("fast");
              $('[id="comment"]').attr("style","font-size: 13px; background: #e2e2e2; padding: 5px;");
             
          }
        });
        //search
        $("#search-bar").autocomplete({
        source: "search.php",
        minLength: 1
        }); 
        
      });
    </script>
  <script src="https://mymusiq.in/js/jquery.nicescroll.js" defer></script>
  <script src="https://mymusiq.in/js/script.min.js" defer></script>
  <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
  <script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>
  </body>
</html>