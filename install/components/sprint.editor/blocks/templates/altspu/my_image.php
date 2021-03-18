<? /** @var $block array */ ?><?
$image = Sprint\Editor\Blocks\Image::getImage(
    $block, [
    'width'  => 800,
    'exact'  => 0,
    //'jpg_quality' => 75
]
);
?>
<? if ($image): ?>
   <div class="sp-image pl0  col col-<?=$block['settings']['width']?> ">
      <a href="<?=$image['ORIGIN_SRC']?>" data-fancybox="sp-image">
         <img alt="<?= $image['DESCRIPTION'] ?>" src="<?= $image['SRC'] ?>">
      </a>
   </div>
<? endif; ?>
