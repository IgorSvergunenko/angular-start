// create the controller and inject Angular's $scope
app.controller('mainController', function($scope) {
    // create a message to display in our view
    $scope.message = 'Everyone come and see how good I look!';
});

app.controller('aboutController', function($scope) {
    $scope.message = 'Look! I am an about page.';
});

app.controller('contactController', function($scope) {
    $scope.message = 'Contact us! JK. This is just a demo.';
});

app.controller('successController', function($scope, dataService) {

    $scope.username = dataService.getData();
    $scope.message = 'Look! I am a success page.';
});

app.controller('saveController', function($scope, dataService) {
    $scope.list = [];
    $scope.text = 'hello';

    $scope.submit = function() {

        if ($scope.text) {
            $scope.list.push(this.text);
            $scope.text = '';
        }

        dataService.addData($scope.list);
        window.location.href= "#success";
    };
});