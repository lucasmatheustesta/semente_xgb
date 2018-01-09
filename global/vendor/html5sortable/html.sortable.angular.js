/*
 * AngularJS integration with the HTML5 Sortable library
 * https://github.com/voidberg/html5sortable
 *
 * Copyright 2013, Alexandru Badiu <andu@ctrlz.ro>
 * jQuery-independent implementation by Nazar Mokrynskyi <nazar@mokrynskyi.com>
 *
 * Thanks to the following contributors: samantp.
 *
 * Released under the MIT license.
 */
;(function(angular) {
  'use strict';

  angular.module('htmlSortable', [])
    .directive('htmlSortable', [
      '$timeout', '$parse', function($timeout, $parse) {
        return {
          require: '?ngModel',
          // TODO: fix this, if you know angular
          link: function(scope, element, attrs, ngModel) { // jshint ignore:line
            var opts;
            var model;
            var scallback = angular.noop;
            var nativeElements = [].slice.call(element);

            if (attrs.htmlSortableCallback) {
              scallback = $parse(attrs.htmlSortableCallback);
            }

            opts = angular.extend({}, scope.$eval(attrs.htmlSortable));
            sortable(nativeElements, opts); // jshint ignore:line

            if (ngModel) {
              model = $parse(attrs.ngModel);

              ngModel.$render = function() {
                $timeout(function() {
                  sortable(nativeElements, 'reload'); // jshint ignore:line
                }, 50);
              };

              scope.$watch(model, function() {
                $timeout(function() {
                  sortable(nativeElements, 'reload'); // jshint ignore:line
                }, 50);
              }, true);

              nativeElements[0].addEventListener('sortupdate', function(e) {
                var data = e.detail;
                var $source = data.startparent.attr('ng-model') ||
                    data.startparent.attr('data-ng-model');
                var $dest   = data.endparent.attr('ng-model') ||
                    data.endparent.attr('data-ng-model');

                var $sourceModel = $parse($source);
                var $destModel = $parse($dest);

                var $start = data.oldindex;
                var $end   = data.item.index();

                scope.$apply(function() {
                  // TODO: fix this, if you know angular
                  //jscs:disable
                  if ($sourceModel(data.startparent.scope()) === $destModel(data.endparent.scope())) {
                    //jscs:enable
                    var $items = $sourceModel(data.startparent.scope());
                    $items.splice($end, 0, $items.splice($start, 1)[0]);
                    $sourceModel.assign(scope, $items);
                  } else {
                    var $item = $sourceModel(data.startparent.scope())[$start];
                    var $sourceItems = $sourceModel(data.startparent.scope());
                    var $destItems = $destModel(data.endparent.scope()) || [];

                    $sourceItems.splice($start, 1);
                    $destItems.splice($end, 0, $item);

                    $sourceModel.assign(scope, $sourceItems);
                    $destModel.assign(scope, $destItems);
                  }
                });

                scallback(scope, {
                  startModel: $sourceModel(data.startparent.scope()),
                  destModel: $destModel(data.endparent.scope()),
                  start: $start,
                  end: $end
                });
              });
            }
          }
        };
      }
    ]);
}(angular));
