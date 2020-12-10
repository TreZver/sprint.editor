<? /** @var $block array */ ?><?

$text = Sprint\Editor\Blocks\Text::getValue($block['text']);
$image = Sprint\Editor\Blocks\Image::getImage(
    $block['image'], [
    'width'  => 320,
/*     'height' => 240, */
    'exact'  => 0,
]
);
?>

<div class="sp-image-text ov-h">
   <? if ($image): ?>
      <a href="<?=$image['ORIGIN_SRC']?>" data-fancybox="sp-complex_image_text">
         <img class="col-ld-4 col-dt-5 col-12 col-mb-12" alt="<?= $image['DESCRIPTION'] ?>" src="<?= $image['SRC'] ?>">
      </a>
   <? endif; ?>
   <div class="text">
   <?= $text ?>
   </div>
</div>
