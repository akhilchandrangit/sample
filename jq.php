<html>
  <head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <style>
    #css { background: #4CAF50; height: 100px; width: 100px; color: white; text-align: center}
  </style>
  <script type="text/javascript">
    $(function()
    {
      $("#btn").click(function() {
  	    $("#pp").text("Test");
        $("#css").animate ({
          height: '+=50px',
          width: '+=50px',
          background: '#4CAF50',
          color: '#fff',
          padding: '10px'
        });
      });
      $("#text").focus(function() {
        $(this).css({"background":"yellow", "padding":"5px"});
      });
      $("#text").blur(function() {
        $(this).css({"background": "white"});
      });
    });
  </script>
  </head>
  <body>
    <p id="pp">Paragraph 1</p>
    <p id="css">Paragraph 2</p>
    <input type="text" id="text"/>
    <p>Paragraph 3</p>
    <button id="btn"> Click here </button>
</body>
</html>