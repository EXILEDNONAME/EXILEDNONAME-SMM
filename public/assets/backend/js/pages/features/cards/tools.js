"use strict";

var KTCardTools = function () {
  // Toastr
  var initToastr = function() {
    toastr.options.showDuration = 1000;
  }

  // EXILEDNONAME CARD
  var exilednoname = function() {
    var card = new KTCard('exilednoname_card');
  }

  // EXILEDNONAME ACTIVITIES
  var exilednoname_activities = function() {
    var card = new KTCard('exilednoname_activities');
  }

  // EXILEDNONAME CHARTS
  var exilednoname_charts = function() {
    var card = new KTCard('exilednoname_charts');
  }

  return {
    //main function to initiate the module
    init: function () {
      initToastr();

      // init demos
      exilednoname();
      exilednoname_activities();
      exilednoname_charts();
    }
  };
}();

jQuery(document).ready(function() {
  KTCardTools.init();
});
