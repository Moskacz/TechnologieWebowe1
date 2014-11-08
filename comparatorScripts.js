/**
 * Created by michalmoskala on 08/11/14.
 */

function saveSelectionAndShowComparison(firstProductID,secondProductID) {
    saveSelection(firstProductID, secondProductID);
    redirectToNextPage();
}

function skipToNextComparison() {
    redirectToNextPage();
}

function redirectToNextPage() {
    var queryDict = {};
    location.search.substr(1).split("&").forEach(function(item) {queryDict[item.split("=")[0]] = item.split("=")[1]});
    var nextPageIndex = parseInt(queryDict['page']) + 1;
    var newURL = "comparator.php?page=" + nextPageIndex;
    window.location.href = newURL;
}

function saveSelection(firstProductID, secondProductID) {
    var queryDict = {};
    location.search.substr(1).split("&").forEach(function(item) {queryDict[item.split("=")[0]] = item.split("=")[1]});
    var userName = queryDict['userName'];

    $.ajax({
        url: "saveSelection.php?userName=" + userName + "&firstProductID=" + firstProductID + "&secondProductID=" + secondProductID + "&comparisonValue=0",
        type: 'GET'
    });

}