<? /** @var $block array */ ?><?
$image = Sprint\Editor\Blocks\Image::getImage(
    $block[image], [
    'width'  => 500,
    'exact'  => 0,
    //'jpg_quality' => 75
]
);
?>

<a target="<?=$block[button][target]?>" href="<?=$block[button][url]?>" class="my_image_button__box p-r">
   <img src="<?=$image['SRC']?>" >
</a>