
angular.module('PumpkinApp',['ngMaterial', 'ngMessages', 'material.svgAssetsCache'])

.config(function($mdThemingProvider){
	$mdThemingProvider.theme('docs-dark','default')
		.primaryPalette('yellow')
		.dark();
})

.controller('AppCtrl', function($scope,$http, $mdToast) {


	$scope.user = {
      last_name: '',
      first_name: '',
      email: '',
      skill: '',
      suggestion: ''
    };

    $scope.sendSuggestion = function(){
      
      $http.get("suggestion/"+$scope.user.suggestion)
            .success(function(data) {
                  if(data==1){
                        $scope.showSimpleToast("Merci pour votre suggestion.");
                        $scope.user.suggestion = "";
                  }else{      
                        $scope.showSimpleToast("Votre suggestion n'est pas valide. Réessayez");
                  }     
            })
            .error(function(){
                   $scope.showSimpleToast("Votre suggestion n'est pas valide. Vous pouvez réessayer");
            });
      };

      var last = {
            bottom: true,
            top: false,
            left: true,
            right: false
      };
      
      $scope.toastPosition = angular.extend({},last);

      $scope.getToastPosition = function() {
            sanitizePosition();
            
            return Object.keys($scope.toastPosition)
                  .filter(function(pos) { return $scope.toastPosition[pos]; })
                  .join(' ');
      };

      function sanitizePosition() {
            var current = $scope.toastPosition;
            if ( current.bottom && last.top ) current.top = false;
            if ( current.top && last.bottom ) current.bottom = false;
            if ( current.right && last.left ) current.left = false;
            if ( current.left && last.right ) current.right = false;
            last = angular.extend({},current);
      }

      $scope.showSimpleToast = function(message) {
            var pinTo = $scope.getToastPosition();
                  $mdToast.show(
                  $mdToast.simple()
                        .textContent(message)
                        .position(pinTo )
                        .hideDelay(3000)
            );
      };

      $scope.registerUser = function(e){

            e.preventDefault();

            var data = {
                  '_token'          : $('input[name=_token]').val(),
                  'last_name'       : $scope.user.last_name,
                  'first_name'      : $scope.user.first_name,
                  'email'           : $scope.user.email,
                  'skill'           : $scope.user.skill
            };

         

            $http.post("user/create",data)
                  .success(function(data,status,headers,config){
                        if(data==1){

                              $scope.user.last_name = "";
                              $scope.user.first_name = "";
                              $scope.user.email = "";
                              $scope.user.skill = "";
                              $('.registration-form').fadeOut(function(){
                                    $('.registration-complete').fadeIn();
                              });
                        }
                  })
                  .error(function(data,status,headers,config){
                        if(data.email=="The email has already been taken."){
                              $scope.showSimpleToast("Cette email a déjà était enregistré.");
                        }else{
                              $scope.showSimpleToast("Il y a eu un problème. Veuillez vérifier que vos données sont correctes. Merci");      
                        }
                        
                  });
      };
});
