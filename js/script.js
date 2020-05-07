// scrolled header
$(document).ready(function() {
    $(window).scroll(function() {    
        var scroll = $(window).scrollTop();
    
        if (scroll >= 200) {
            $("#top").addClass("scrolled");
        } else {
            $("#top").removeClass("scrolled");
        }
    });
});

// timer
function get_timer_631(string_was_631,string_sec_631) {var date_new_was_631 = new Date(string_was_631); var date_new_sec_631 = string_sec_631; var date_631 = new Date();var razn_631,left_631,left_n_631,vraz_631,ost_631;razn_631 = date_631 - date_new_was_631;left_631 = date_new_sec_631 - razn_631;if(left_631>0){left_n_631 = left_631;} else {if(Math.abs(left_631)>date_new_sec_631){vraz_631 = (Math.abs(left_631))/date_new_sec_631;vraz_631 = vraz_631.toString().split(".");left_n_631 = Math.abs(left_631) - (vraz_631[0])*date_new_sec_631;left_n_631 = date_new_sec_631 - left_n_631;} else {left_n_631 = date_new_sec_631 - Math.abs(left_631);}}ost_631 = left_n_631;var day_631 = parseInt(ost_631/(60*60*1000*24));if(day_631 < 10) {day_631 = "0" + day_631;}day_631 = day_631.toString();var hour_631 = parseInt(ost_631/(60*60*1000))%24;if(hour_631 < 10) {hour_631 = "0" + hour_631;}hour_631 = hour_631.toString();var min_631 = parseInt(ost_631/(1000*60))%60;if(min_631 < 10) {min_631 = "0" + min_631;}min_631 = min_631.toString();var sec_631 = parseInt(ost_631/1000)%60;if(sec_631 < 10) {sec_631 = "0" + sec_631;}sec_631 = sec_631.toString(); timethis_631 = day_631 + " : " + hour_631 + " : " + min_631 + " : " + sec_631;$(".timerhello_631 p.result .result-day").text(day_631);$(".timerhello_631 p.result .result-hour").text(hour_631);$(".timerhello_631 p.result .result-minute").text(min_631);$(".timerhello_631 p.result .result-second").text(sec_631);}function getfrominputs_631(){string_was_631 = "Thu May 07 2020 14:18:05 GMT+0300 (Восточная Европа, летнее время)"; string_sec_631 = "1080900"; get_timer_631(string_was_631,string_sec_631);setInterval(function(){get_timer_631(string_was_631,string_sec_631);},1000);}$(document).ready(function(){ getfrominputs_631();});