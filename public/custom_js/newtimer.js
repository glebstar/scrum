/**
 * Created by gleb on 21.08.2016.
 */

function newtimer(obj, startTime) {
    var time = startTime;
    //var status = 1;
    var timerSelf = null;

    timerStart(obj);

    this.getTime = function() {
        return time;
    }

    this.stop = function(){
        //status = 0;
        clearInterval(timerSelf);
    }

    function timerStart(obj) {
        timerSelf = setInterval(function () {
            time++;
            obj.html(showTime())
        }, 1000)
    }

    function showTime () {
        var second = time % 60;
        var minute = Math.floor(time / 60) % 60;
        var hour = Math.floor(time / 3600) % 60;

        second = (second < 10) ? '0'+second : second;
        minute = (minute < 10) ? '0'+minute : minute;
        hour = (hour < 10) ? '0'+hour : hour;

        return hour + ':' + minute + ':' + second;
    }

    return this;
}
