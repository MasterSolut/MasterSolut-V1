<?php

/**
 * @author marc
 * @copyright 2016
 */
?> 
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.scrollUp.js"></script>
    <script src="js/jquery.dataTables.js"></script>
    <script src="js/script.js"></script>

    <script type="text/javascript" src="js/jasny.bootstrap/extend/js/jasny-bootstrap.min.js"></script>
    
    <script src="js/alertify.min.js"></script>
    <!-- Custom JS -->
    <script src="js/menu.js"></script>
     
    <script type="text/javascript">
      //ScrollUp
      $(function () {
        $.scrollUp({
          scrollName: 'scrollUp', // Element ID
          topDistance: '300', // Distance from top before showing element (px)
          topSpeed: 300, // Speed back to top (ms)
          animation: 'fade', // Fade, slide, none
          animationInSpeed: 400, // Animation in speed (ms)
          animationOutSpeed: 400, // Animation out speed (ms)
          scrollText: 'Haut', // Text for element
          activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
        });
      });

      //Tooltip
      $('a').tooltip('hide');

      //Popover
      $('.popover-pop').popover('hide');

      //Dropdown
      $('.dropdown-toggle').dropdown();

      //Data Tables
      $(document).ready(function () {
        $('#data-table').dataTable({
          "sPaginationType": "full_numbers"
        });
      });
      
       $("confirm").onclick = function () {
        reset();
        alertify.confirm("Voulez vous effectu&eacute; cette op&earation de suppresssion?", function (e) {
          if (e) {
            alertify.success("Op&eacute;ration effectu&eacute; avec succes");
          } else {
            alertify.error("You've clicked Cancel");
          }
        });
        return false;
      };
    </script> 
  </body>  
</html>