
app.service('dataService', function() {

    var usersData = [];

    var addData = function(newObj) {
        usersData = newObj;
    }

    var getData = function(){
        return usersData;
    }

    return {
        addData: addData,
        getData: getData
    };

});