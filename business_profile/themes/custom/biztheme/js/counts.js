(function($){


    $(document).ready(function() {

        var counters = document.getElementsByClassName("field--name-field-count");
        var countersQuantity = counters.length;
        var counter = [];
      
        for (i = 0; i < countersQuantity; i++) {
          counter[i] = parseInt(counters[i].innerText);
        }
      
        var count = function(start, value, id) {
          var localStart = start;
          setInterval(function() {
            if (localStart < value) {
              localStart++;
              counters[id].innerText = localStart;
            }
          }, 40);
        }
      
        for (j = 0; j < countersQuantity; j++) {
          count(0, counter[j], j);
        }
      });

}(jQuery));



















