var createAccPerSecond = 0;
var paymentsPerSecond = 0;
var accounts = 0;
var payments = 0;
var maxAccounts = 0;
var maxPayments = 0;
var interval = 10000;
var denominator = 1;
var totalTransactions = [];

var server = new KinSdk.Server('https://horizon-block-explorer.kininfrastructure.com');

/*setMountain(m1Width, m2Width, m3Width,
    m1Height, m2Height, m3Height,
    m1Text, m2Text, m3Text)*/


//parse incoming transactions
var txHandler = function (txResponse) {
    const transaction = new KinSdk.Transaction(txResponse.envelope_xdr);
    var txType = null;
    var memo = '1-anon-random';
    var app = 'anon';
    var id = 'r' + random(10000);
    try {
        txType = transaction.operations[0].type;
    } catch (e) {
        console.log(e);
    }

    if (typeof txResponse.memo === 'string') memo = txResponse.memo;

    if (memo.split('-')[1]) app = memo.split('-')[1];
    if (memo.split('-')[2]) id = memo.split('-')[2] + id;//make sure id is random

    if (typeof totalTransactions[app] === 'undefined') totalTransactions[app] = 0;//initialize

    switch (txType) {
        case "payment":
            payments++;
            totalTransactions[app]++;//+= parseFloat(transaction.operations[0].amount);
            drawObj(transaction.operations[0].amount, app, id);
            break;
        case "createAccount":
            accounts++;
            totalTransactions[app]++;
            drawObj('New account', app, id);
            break;
    }
};

function getSortedKeys(obj) {
    var keys = keys = Object.keys(obj);
    return keys.sort(function (a, b) { return obj[b] - obj[a] });
}


//listen for transactions
var es = server.transactions()
    .cursor('now')
    .stream({
        onmessage: txHandler
    });

$(document).ready(function () {
    setTimeout(initStats, interval * 2);
});

function initStats() {
    maxAccounts = Math.round(accounts / 2);
    maxPayments = Math.round(payments / 2);
    denominator = Math.max(maxAccounts, maxPayments);
    setPercents(0, 0);
    resetCounts();
    setInterval(updateStats, interval); //start monitoring stats
    $('#sidebar').removeClass('visible');


}

function setPerSecond() {
    paymentsPerSecond = Math.round((payments / interval) * 1000);
    createAccPerSecond = Math.round((accounts / interval) * 1000);
}

var intervalMultiple = 0;
function updateStats() {
    setPerSecond();
    spendPercent = Math.round((paymentsPerSecond / denominator) * 100);
    accPercent = Math.round((createAccPerSecond / denominator) * 100);
    setPercents(spendPercent, accPercent);
    if (intervalMultiple % 4 === 0) {
        setMountains(totalTransactions);
        totalTransactions = [];
    }

    resetCounts();
    intervalMultiple++;
}

function resetCounts() {
    accounts = 0;
    payments = 0;
}

function setPercents(spendPercent, accPercent) {
    $("#spends").attr("data-percent", spendPercent + '%');
    $("#accounts").attr("data-percent", accPercent + '%');

    $("#spends_percent").html(paymentsPerSecond + ' / sec');
    $("#accounts_percent").html(createAccPerSecond + ' / sec');
    setStats();
}