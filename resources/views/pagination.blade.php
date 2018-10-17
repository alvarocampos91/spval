<nav>
    <ul class="pagination justify-content-center" ng-if="1 < pages.length || !autoHide">
        <li ng-if="boundaryLinks" class="page-item pagination-first" ng-class="{ 'disabled' : pagination.current == 1 }">
            <a ng-click="setCurrent(1)" class="page-link" href="#"></a>
        </li>
        <li ng-if="directionLinks" class="page-item pagination-prev" ng-class="{ 'disabled' : pagination.current == 1 }">
            <a ng-click="setCurrent(pagination.current - 1)" class="page-link" href="#"></a>
        </li>
        <li class="page-item" ng-repeat="pageNumber in pages track by tracker(pageNumber, $index)" ng-class="{ 'active' : pagination.current == pageNumber, 'disabled' : pageNumber == '...' }">
            <a ng-click="setCurrent(pageNumber)" class="page-link" href="#">
            @php
                echo "{{ pageNumber }}";
            @endphp
            </a>
        </li>
        <li ng-if="directionLinks" ng-class="{ 'disabled' : pagination.current == pagination.last }" class="page-item pagination-next">
            <a ng-click="setCurrent(pagination.current + 1)" class="page-link" href="#"></a>
        </li>
        <li ng-if="boundaryLinks" ng-class="{ 'disabled' : pagination.current == pagination.last }" class="page-item pagination-last">
            <a ng-click="setCurrent(pagination.last)" class="page-link" href="#"></a>
        </li>
    </ul>
</nav>