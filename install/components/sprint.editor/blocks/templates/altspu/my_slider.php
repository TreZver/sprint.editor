
<?
$width = 1000;
$images = Sprint\Editor\Blocks\Gallery::getImages(
    $block['slider'], [
    'width'  => $width,
    'height'  => $width,
    'exact'  => 90,
]
);
$ID = uniqid();
?>

<script src="/bitrix/admin/sprint.editor/assets/my_slider/siema.min.js"></script>

<div
   class="container"
   data-selector="<?=$ID?>"
>
            <div
            class="owl-carousel"
            style="margin:auto"
            <?if ( $block['OPTIONS']['max_width'] !=0):?>style="max-width:<?=$block['OPTIONS']['max_width']?>%"<?endif;?>>
               <?foreach ($images as $key => $value):?>
                     <div class="siema_wrapperBlock">
                        <a href="<?=$value['SRC']?>" data-fancybox="sp-image-slider">
                           <img style="max-height:200px;width:auto" src="<?=$value['SRC']?>" alt="">
                        </a>
                        <?if($value['DESCRIPTION']):?>
                           <p class="block_info"><?=$value['DESCRIPTION']?></p>
                        <?endif;?>
                     </div>
               <?endforeach?>
            </div>

</div>


<script>
   document.addEventListener("DOMContentLoaded", ()=>{
      var box = $("div[data-selector='<?=$ID?>']");
      var selector = box.find(".owl-carousel");
      selector.owlCarousel({
         loop:true,
         margin:10,
         autoWidth:true,
         nav:false,
         responsive:{
            0:{
                  items:1
            },
            600:{
                  items:2
            },
            1000:{
                  items:3
            }
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
