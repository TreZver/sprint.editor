sprint_editor.registerBlock('my_testirovanie', function ($, $el, data, settings) {
   /*
   @todo Добавить сортировку вопросов и ответов
   @todo Добавить возможность большего колличества ответов
   */
   var questions = [];
   var INDEX;
   this.getData = function () {
      if (data.questions != undefined)
         data.questions = $.parseJSON(data.questions);
      return data;
   };
   this.collectData = function () {
      data.questions = JSON.stringify(questions);
      return data;
   };
   this.afterRender = function () {
      $el.prepend(sprint_editor.renderTemplate('my_box-yurgen_title', data));
      if (data.questions != undefined){
         questions = data.questions;
      }
      /* Добавить вопрос */
      addquestion();
      /* Сортировка */
      //sortable();
      /* Выбор элемента */
      selectQuestion();
      /* change sp-edit--question */
      change_question();
      /* radio */
      $el.on('change', 'input[type=radio]', function () {
         questions[INDEX].correct[0] = $(this).val();
      });
      /* sp-item-del */
      $el.on('click', '.sp-item-del', function () {
         delete questions[INDEX];
         $el.find('.sp-item.sp-active').remove();
         closeedit();
      });
      $el.on('change', '.answer-text', function () {
         var index = $(this).data('answer')-1;
         questions[INDEX].answers[index] = $(this).val();
      });
   }
   function sortable(){
      $el.find('.sp-result').sortable({
         placeholder: "ui-state-highlight"
      });
   }
   function addquestion() {
      $el.on('click', '.add', function(e){
         e.preventDefault();
         if($el.find('.my_testirovanie-question').val() != ''){
            var index = questions.push({
               type: "choose",
               question: $el.find('.my_testirovanie-question').val(),
               answers: [],
               correct: []
            });
            --index;
            $el.find('.my_testirovanie-question').val('');
            $el.find('.sp-result').append('<div class="sp-item" data-index="' + (index) + '">' + questions[index].question +'</div>');
         };
      });
   }
   function selectQuestion(){
      $el.on('click', '.sp-item', function(){
         $el.find('.sp-item').removeClass('sp-active');
         $(this).addClass('sp-active');
         showedit();
         INDEX = $(this).data('index');
         generateForm();
      });
   }
   function generateForm(index) {
      /* reset input */
      var div_form = $el.find('.sp-edit--form');
      div_form.find('input[type=text]').val('');
      div_form.find('input[type=radio]').prop('checked', false);
      var item = questions[INDEX];
      $el.find('.sp-edit--question').val(item.question);
      if (item.correct[0] != undefined){
         $el.find('.sp-edit--radio').eq(item.correct[0]-1).prop('checked', true);
      }
      $el.find('.answer-text').each(function( index,item ) {
         $(item).val(questions[INDEX].answers[index]);
      });
   }
   function change_question() {
      $el.on('change', '.sp-edit--question', function(e){
         var element = $el.find('.sp-item.sp-active');
         element.text($(this).val());
         questions[INDEX].question = $(this).val();
      });
   }
   function showedit() {
      $el.find('.sp-edit').show(200);
   }
   function closeedit() {
      $el.find('.sp-edit').hide(200);
   }
});