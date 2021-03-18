sprint_editor.registerBlock('my_lists', function ($, $el, data, settings) {
   data = $.extend({
      elements: [{ text: '' }, { text: '' }]
   }, data);

   this.getData = function () {
      return data;
   };

   this.collectData = function () {
      var trimed = [];
      $el.find('.sp-item').each(function( index, element ){
         var text = $.trim($(element).find('.sp-item-text').val());
         var link = $.trim($(element).find('.sp-item-link').val());
         if (text) {
            trimed.push({
               text: text,
               link: link
            });
         }
      });
      data.elements = trimed;
      return data;
   };

   this.afterRender = function () {
      var $res = $el.find('.sp-lists-result');

      $res.sortable({
         items: ".sp-item",
         handle: ".sp-item-handle",
      });

      $res.html(
         sprint_editor.renderTemplate('my_lists-items', data)
      );

      $res.on('click', '.sp-item-del', function (e) {
         e.preventDefault();
         $(this).closest('.sp-item').remove();
      });

      $res.on('keypress', '.sp-item-text', function (e) {
         var keyCode = e.keyCode || e.which;
         if (keyCode === 13) {
            e.preventDefault();
            addItem(true);
         }
      });

      $el.on('click', '.sp-lists-add', function (e) {
         e.preventDefault();
         addItem(false);
      });

      function addItem(focus) {
         $res.append(
            sprint_editor.renderTemplate('my_lists-items', {
               elements: [
                  { text: '' }
               ]
            })
         );

         if (focus) {
            $res.find('.sp-item-text').last().focus();
         }
      }
   }
});
