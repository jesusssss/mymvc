$(document).ready(function() {


    /**
     * Variable "State" descripes the current state of the timetracking mechanicsm
     * (State == 1) : Started new tracking
     * (State == 2) : Ended current tracking (Paused until submitted)
     * (State == 3) : If not ended, than continue
     * @type {number}
     */

    var $this = $(".startTracking");
    var state = 0;
    $this.submit(function(e) {
        e.preventDefault();

        if(state == 0) {
            startTimeTracking();
        } else if (state == 1) {
            endTimeTracking();
        } else if (state == 3) {
            continueTimeTracking();
        }

        console.log($(this).serialize());

    });

    function startTimeTracking() {
        $("#timer").countup();
    }

    function endTimeTracking() {

    }

    function continueTimeTracking() {

    }

});