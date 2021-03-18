<? /** @var $block array */ ?>

<?
$settings = !empty($block['settings']) ? $block['settings'] : [];
$tag = !empty($settings['type']) ? $settings['type'] : 'ul';
?>
<div class="ov-h">
   <<?= $tag ?> class="big-list">
      <? foreach ($block['elements'] as $item): ?>
         <li>
            <?if ($item['link'] != ''):?>
               <a href="<?=$item['link']?>" target="blank"><?=$item['text']?></a>
            <?else:?>
               <?=$item['text']?>
            <?endif?>
         </li>
      <? endforeach; ?>
   </<?= $tag ?>>
</div>

