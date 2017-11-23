function PrintTicker(oData){
    const CHARTIMEOUT = 50; // скорость печатания
    const STORYTIMEOUT = 2000; // время ожидания перед переключением

    var massiveItemCount,
        CurrentStory,
        CurrentLength,
        StorySummary;
    var linksArr,
        element;

    function init(data){
        linksArr = data.linksArr;
        element = data.element;

        massiveItemCount = Number(linksArr.length);
        CurrentStory = -1;
        CurrentLength = 0;
        StorySummary = "";
    }

    function runTicker(){
        var myTimeout;

        if(CurrentLength == 0){
            CurrentStory++;
            CurrentStory      = CurrentStory % massiveItemCount;
            StorySummary      = linksArr[CurrentStory].text;
            element.href = linksArr[CurrentStory].link;

        }
        element.innerHTML = StorySummary.substring(0,CurrentLength);
        if(CurrentLength != StorySummary.length){
            CurrentLength++;
            myTimeout = CHARTIMEOUT;
        } else {
            CurrentLength = 0;
            myTimeout = STORYTIMEOUT;
        }

        setTimeout(function(){
            runTicker();
        }, myTimeout);
    }

    init(oData);
    runTicker();
}

$(document).ready(function() {

    console.log("printingText is loaded");

    var allNews = document.getElementsByClassName('news__data');

    var links = [];
    for (var i = 0; i < allNews.length; i++) {
        links[i] = {};
        links[i].link = allNews[i].dataset.link;
        links[i].text = allNews[i].dataset.text;
    }

    if (links.length > 0) {
        var ticker = new PrintTicker({
            element: document.getElementById("news__link"),
            linksArr: links
        });
    }
});