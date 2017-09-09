angular.module('app')
.controller('BlogListController', function($scope, $http){
	$scope.field = 'title';
	$scope.isReverse = false;
	$scope.records = [];
	$scope.current_page = 1;
	$scope.per_page = 4;
	$scope.total = 0;
	$scope.from = 1;
	$scope.to = 1;
	$scope.total_pages = 1;
	$scope.paginateArray = [];

	$scope.order = function(field){
		console.log('order set: ', field);
		$scope.field = field;
		$scope.isReverse = !$scope.isReverse;
	};

	$scope.paginate = function(){
		console.log('computing...');
		$scope.paginateArray = [];
		$scope.total_pages = Math.ceil($scope.total / $scope.per_page);
		for(var i=1; i <= $scope.total_pages; i++){
			$scope.paginateArray.push({'value': i});
		}
	}

	$scope.loadData = function(page){
		console.log('loading data...');
		$http.get('/api/all-blogs?page='+page+'&limit='+$scope.per_page).then(function(res){
			$scope.records = res.data.data;
			$scope.current_page = res.data.current_page;
			$scope.per_page = res.data.per_page;
			$scope.total = res.data.total;
			$scope.from = res.data.from;
			$scope.to = res.data.to;
			$scope.paginate();
			console.log('result: ', res.data);
		});
	}

	$scope.page = function(page){
		console.log('page: ', page);
		if(page > 0 && page <= $scope.total_pages){
			$scope.loadData(page);
		}
	};

	$scope.open = function (size, parentSelector) {
	    var parentElem = parentSelector ? 
	      angular.element($document[0].querySelector('.modal' + parentSelector)) : undefined;
	    var modalInstance = $uibModal.open({
	      animation: $ctrl.animationsEnabled,
	      ariaLabelledBy: 'modal-title',
	      ariaDescribedBy: 'modal-body',
	      template: 'sample template',
	      controller: 'ModalInstanceCtrl',
	      size: size,
	      appendTo: parentElem,
	      resolve: {
	        items: function () {
	          return $ctrl.items;
	        }
	      }
	    });

    modalInstance.result.then(function (selectedItem) {
      $ctrl.selected = selectedItem;
    }, function () {
      $log.info('Modal dismissed at: ' + new Date());
    });
  };

	$scope.loadData();

	$scope.$watch('per_page', function(n, o){
		//console.log('new: ', n);
		//console.log('old: ', o);
		$scope.paginate();
		$scope.loadData(1);
	});
});