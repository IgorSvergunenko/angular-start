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

app.factory('User', function ($http) {

    return {
        create: function(dataToSave) {
            return $http.post('backend/save.php', dataToSave);
        }
    }
});

app.controller('saveController', function($scope, User) {

    $scope.signup = {email:'',password:'',name:''};
    $scope.result = '';

    $scope.submit = function() {

        $scope.signup.name = this.name;
        $scope.signup.email = this.email;
        $scope.signup.password = this.password;

        User.create($scope.signup).then(function (results) {
            $scope.result = results.data;


        });

        //dataService.addData($scope.list);
        //window.location.href= "#success";
    };
});