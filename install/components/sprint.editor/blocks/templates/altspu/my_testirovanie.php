<?
$this->registerCss('/bitrix/components/sprint.editor/blocks/templates/altspu/css/jQuizler.css');
$this->registerJs('/bitrix/components/sprint.editor/blocks/templates/altspu/js/jQuizler.js');
?>

<div id="jQuizler" class="main-quiz-holder my_testirovanie">
   <h3>Тест</h3>
   <button class="btn btn-large">Старт</button>
</div>
<script>
   var mass = <?print($block[questions])?>;
   $("document").ready(function(){
      $("#jQuizler").jQuizler(mass);
   });
</script>