<div class="row">
    <div class="col-md5 col-md-offset-7 col-lg5 col-lg-offset-7">
        <nav>
            <ul class="pagination" ng-if="1 < pages.length || !autoHide">
                <li ng-if="boundaryLinks" ng-class="{ 'disabled' : pagination.current == 1 }">
                    <a ng-click="setCurrent(1)" class="waves-effect">
                        <i class="material-icons">first_page</i>
                    </a>
                </li>
                <li ng-if="directionLinks" ng-class="{ 'disabled' : pagination.current == 1 }">
                    <a ng-click="setCurrent(pagination.current - 1)" class="waves-effect">
                        <i class="material-icons">chevron_left</i>
                    </a>
                </li>
                <li ng-repeat="pageNumber in pages track by tracker(pageNumber, $index)" ng-class="{ 'active' : pagination.current == pageNumber, 'disabled' : pageNumber == '...' }">
                    <a ng-click="setCurrent(pageNumber)">{{ pageNumber }}</a>
                </li>
                <li ng-if="directionLinks" ng-class="{ 'disabled' : pagination.current == pagination.last }">
                    <a ng-click="setCurrent(pagination.current + 1)" class="waves-effect">
                        <i class="material-icons">chevron_right</i>
                    </a>
                </li>
                <li ng-if="boundaryLinks" ng-class="{ 'disabled' : pagination.current == pagination.last }">
                    <a ng-click="setCurrent(pagination.last)">
                        <i class="material-icons">last_page</i>
                    </a>
                </li>
            </ul>
        </nav>        
    </div>
</div>