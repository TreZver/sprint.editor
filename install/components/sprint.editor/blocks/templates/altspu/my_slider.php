
<?
$width = 1000;
$images = Sprint\Editor\Blocks\Gallery::getImages(
    $block['slider'], [
    'width'  => $width ,
    'height' => $width * 0.6,
    'exact'  => 0,
]
);
$ID = uniqid();
?>

<script src="/bitrix/admin/sprint.editor/assets/my_slider/siema.min.js"></script>

<div
   class="container"
   style="
      overflow-y:hidden;
      overflow-x:hidden;
      max-height: 440px;
   "
   data-selector="<?=$ID?>"
>
<div class="content">
   <div
      style="
         max-height: 440px;
      "
   >
      <div class="TopSliderSlickNext">
                  <i class="fa fa-angle-right" aria-hidden="true"></i>
            </div>
            <div
            class="siema"
            style="margin:auto"
            <?if ( $block['OPTIONS']['max_width'] !=0):?>style="max-width:<?=$block['OPTIONS']['max_width']?>%"<?endif;?>>
               <?foreach ($images as $key => $value):?>
                     <div class="siema_wrapperBlock">
                        <img src="<?=$value['SRC']?>" alt="">
                        <?if($value['DESCRIPTION']):?>
                           <p class="block_info"><?=$value['DESCRIPTION']?></p>
                        <?endif;?>
                     </div>
               <?endforeach?>
            </div>
            <div class="TopSliderSlickPrev">
                  <i class="fa fa-angle-left" aria-hidden="true"></i>
      </div>
   </div>
   </div>
</div>





<script>
   document.addEventListener("DOMContentLoaded", ()=>{
      var box = document.querySelector("div[data-selector='<?=$ID?>']");
      var selector = box.querySelector(".siema");
      var $siema = new Siema({
            selector: selector,
            loop:1,
            duration: 500,
            onInit: ()=>{
               selector.style.overflow = "";
            }
      });
      box.querySelector(".TopSliderSlickNext").addEventListener("click", (e) => {
         $siema.next();
      });
      box.querySelector(".TopSliderSlickPrev").addEventListener("click", (e) => {
         $siema.prev();
      });;
   });
</script>
<style>
.TopSliderSlickPrev,
.TopSliderSlickNext {
	position: absolute;
	width: 100%;
	background: rgba(0, 0, 0, 0.6);
	height: 100%;
	z-index: 2;
	top: 0;
	transition: background 0.2s linear;
	-webkit-transition: background 0.2s linear;
	-moz-transition: background 0.2s linear;
	-ms-transition: background 0.2s linear;
	-o-transition: background 0.2s linear;
}

.TopSliderSlickPrev {
	left: -100%;
}

.TopSliderSlickPrev i,
.TopSliderSlickNext i {
	position: absolute;
	top: calc(50% - 25px);
	color: #9D9E9E;
	font-size: 69px;
	transition: opacity 0.7s linear;
	-webkit-transition: opacity 0.7s linear;
	-moz-transition: opacity 0.7s linear;
	-ms-transition: opacity 0.7s linear;
	-o-transition: opacity 0.7s linear;
}

.TopSliderSlickPrev i {
   right: 30px;
   animation: arrow_prev 4s linear 0s infinite normal;
   -webkit-animation: arrow_prev 4s linear 0s infinite normal;
}

.TopSliderSlickNext i {
   animation: arrow_next 4s linear 0s infinite normal;
   left: 30px;
   -webkit-animation: arrow_next 4s linear 0s infinite normal;
}

.TopSliderSlickPrev:hover,
.TopSliderSlickNext:hover {
	background: rgba(0, 0, 0, 0.7);
}

.TopSliderSlickNext {
	right: -100%;
}
@keyframes arrow_next{
   0%{
      left: 30px;
   }
   50%{
      left: 60px;
   }
   100%{
      left: 30px;
   }
}
@keyframes arrow_prev{
   0%{
      right: 30px;
   }
   50%{
      right: 60px;
   }
   100%{
      right: 30px;
   }
}
.siema img{
   width: 100%;
}
</style>