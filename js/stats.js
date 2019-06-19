$(document).ready(function () {
    setStats();
});


function setStats() {
    var percent = 0;
    $('.statbar').each(function () {
        $(this).find('.stats-bar').stop(true).animate({
            width: $(this).attr('data-percent')
        }, 6000);
        percent = Math.max(percent, parseFloat($(this).attr('data-percent')));
    });

}



function setMountains(totalSpends) {
    //first pad the array to make sure we alway shave values
    totalSpends['m1'] = 0;
    totalSpends['m2'] = 0;
    totalSpends['m3'] = 0;
    totalSpends['m4'] = 0;
    totalSpends['m5'] = 0;

    var sortedKeys = getSortedKeys(totalSpends).slice(0, 5);
    var m;
    var mText;
    var total = 0;
    var percent;
    var extra = '';// '<span class="m-explanation">#1 earn+spends+new acc</span>';

    for (let i = 0; i < sortedKeys.length; i++) {
        total += totalSpends[sortedKeys[i]];
    }

    for (let i = 0; i < sortedKeys.length; i++) {
        m = i + 1;
        percent = 0;
        if (total > 0) percent = parseInt((totalSpends[sortedKeys[i]] / total) * 100 / 2);
        mText = appCodeToName(sortedKeys[i]);
        if (mText === 'm1' || mText === 'm2' || mText === 'm3'
            || mText === 'm4' || mText === 'm5') mText = '';
        mText = mText + extra;
        $("#m" + m).html(mText);

        $(".mountain-" + m).animate({
            borderLeftWidth: percent * 15 + "px",
            borderRightWidth: percent * 15 + "px",
            borderBottomWidth: percent * 18 + "px"
        }, 16000, function () {

            });
        extra = "";
    }


}