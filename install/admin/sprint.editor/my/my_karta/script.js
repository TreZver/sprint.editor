sprint_editor.registerBlock('my_karta', function($, $el, data) {
   data = $.extend({
      link: ''
   }, data);
   this.getData = function() {
      return data;
   };
   this.collectData = function() {
      data.link = $el.find('input').val();
      return data;
   };
   this.afterRender = function() {
   };
})