var scrW = 100;
var scrH = 100;


function random(max) {
    return  Math.floor(Math.random() * max);
}

var stringToColour = function (str) {
    var hash = 0;
    for (let i = 0; i < str.length; i++) {
        hash = str.charCodeAt(i) + ((hash << 5) - hash);
    }
    var colour = '#';
    for (let i = 0; i < 3; i++) {
        var value = (hash >> (i * 8)) & 0xFF;
        colour += ('00' + value.toString(16)).substr(-2);
    }
    return colour;
}

function darkenColr(col) {

    var usePound = false;
    var amt = -50;
    if (col[0] === "#") {
        col = col.slice(1);
        usePound = true;
    }

    var num = parseInt(col, 16);

    var r = (num >> 16) + amt;

    if (r > 255) r = 255;
    else if (r < 0) r = 0;

    var b = ((num >> 8) & 0x00FF) + amt;

    if (b > 255) b = 255;
    else if (b < 0) b = 0;

    var g = (num & 0x0000FF) + amt;

    if (g > 255) g = 255;
    else if (g < 0) g = 0;

    return (usePound ? "#" : "") + (g | (b << 8) | (r << 16)).toString(16);

}

function hexToRgb(hex) {
    var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
    return result ? {
        r: parseInt(result[1], 16),
        g: parseInt(result[2], 16),
        b: parseInt(result[3], 16)
    } : null;
}

var clearQ = 0;
function drawObj(payment, app, id) {
    var x = random(scrW);
    var y = random(scrH);
    var dimensions = 0.7;
    var multiplier = 100;
    var denomination = '';
    var shapeClass = '';
    var whaleAmount = 100000;
    var col = stringToColour(app); //[random(255), random(128), random(64)];
    var rgb = hexToRgb(darkenColr(col));
    var isWhale = false;
    //var col = [random(255), random(128), random(64)];
    if (!rgb) rgb = { r: 0, g: 0, b: 0 };
    var colString = ' rgb(' + rgb.r + ',' + rgb.g + ',' + rgb.b + ');';
    
    if (!isNaN(payment)) {
        dimensions = Math.max(Math.log(Math.sqrt(payment), 1));
        denomination = ' Kin';
        if (payment >= whaleAmount) isWhale = true;
        payment = parseFloat(payment).toLocaleString();
    } else {
        shapeClass = ' square';
    }

   

    setTimeout(() => {
        dimensions = dimensions * multiplier;
        var zindex = random(10);
        $('#balls').prepend('<div  class="balls' + shapeClass + '" id="' + id + '" style="z-index:' + zindex + '; top: ' + y + 'px; left: ' + x
            + 'px; background-color: ' + colString + ';">' +
            '<span class="amount">' + payment + denomination + '<span class="app">' + appCodeToName(app) + '</span></span>'
            + '</div>');
        var time = Math.log(dimensions) * 800;

        if (isWhale) {
            $('#' + id).addClass("ballwhale");
            whaleBg(true);// we got a big one
        }

        $('[id="' + id + '"]').animate({
            //$('#' + id).animate({
            width: dimensions,
            height: dimensions,
            top: (y - (dimensions / 2)),
            left: (x - (dimensions / 2)),
            opacity: 0.6
        }, time, function () {
            $('[id="' + id + '"]').animate({
                //$('#' + id).animate({
                opacity: 0,
                width: dimensions * 0.7,
                height: dimensions * 0.7,
            }, time * 0.1, function () {
                if ($(this).hasClass("ballwhale")) whaleBg(false);
                $(this).remove();
            });
        });

    }, clearQ >= 100 ? 0 : random(3)*1000);
    clearQ++;
    if (clearQ >= 100) clearQ = 0;
}

//todo: add links also so on click of bubbles you go there 
function appCodeToName(app) {
    var appArray = [];
    appArray['kit'] = 'Kinit';
    appArray['kik'] = 'Kik';
    appArray['p365'] = 'P365';
    appArray['8vlz'] = 'Nearby';
    appArray['l83h'] = 'Rave';  
    appArray['l68b'] = 'Vent';  
    appArray['lipz'] = 'MadLipz';  
    appArray['tapa'] = 'TapaTalk';  
    appArray['swel'] = 'Swelly';  
    appArray['rced'] = 'Kinny';  
    appArray['vefj'] = 'PlanetsNu';  
    appArray['jf1d'] = 'SpeedGenius';  
    appArray['xjv6'] = 'Kinpet';  
    appArray['xnxb'] = 'Peerbet';  
    appArray['aqv3'] = 'imgvue';  
    appArray['kfit'] = 'kinfit';  
    appArray['jdnn'] = 'SXLVE';  
    appArray['pgbv'] = 'Pause For';  
    appArray['lsff'] = 'Pop.in';  
    appArray['uhrz'] = 'Tiny Ted';  
    appArray['m8jd'] = 'TRK';  
    appArray['uvoj'] = 'Subway Sc';  
    appArray['mkme'] = 'MonkingMe';  
    appArray['mech'] = 'SuperMechs';  
    appArray['zmoq'] = 'Catpurse';  
    appArray['nbps'] = 'L&L Radio';  
    appArray['8onm'] = 'Kimeo';  
    appArray['g58b'] = 'Kinetik';  
    appArray['nm8e'] = 'Subti';  
    appArray['psip'] = 'PsiphonPro';  
    appArray['obpk'] = 'Dog Rescue';  
    appArray['trbl'] = 'Trebel';  


    

    
    appArray['mgsv'] = 'Migration Service';  
    
    

    if (typeof appArray[app.toLowerCase()] !== 'undefined') {
        return (appArray[app.toLowerCase()]);
    } else {
        return (app);//just return the original code
    }
}

function whaleBg(show) {
    if (show === true) {
        $('body').removeClass('normal');
        $('body').addClass('whale');
    } else {
        $('body').removeClass('whale');
        $('body').addClass('normal');
    }
}

$(document).ready(function () {
    scrW = $(window).width();
    scrH = $(window).height();
});