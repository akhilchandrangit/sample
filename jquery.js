

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
      });
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
    // K = Key
    // S = Selector
// V = Variable / Value

var K_ID	= "id";
var S_HEADER_CLASS = ".comment";
var S_CONTENT_CLASS = ".post";
var V_TIME  = 500;

function Switch()
{
	var id = $(this).data(K_ID);
	$(S_HEADER_CLASS).each(function()
	{
		if($(this).data(K_ID) != id)
		{
			$(this).parent().find(S_CONTENT_CLASS).slideUp(V_TIME);
		}
		else
		{
			$(this).parent().find(S_CONTENT_CLASS).slideDown(V_TIME);
		}
	});
}

$(document).ready(function()
{
	$(S_HEADER_CLASS).each(function(i)
	{
		$(this).data(K_ID, i).click(Switch).parent().find(S_CONTENT_CLASS).slideUp(V_TIME);
	});
});
});