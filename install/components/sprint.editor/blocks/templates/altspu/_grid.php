<? /**
 * @var $this   SprintEditorBlocksComponent
 * @var $layout array
 *
 */ ?>
<? if (count($layout['columns']) == 1 && empty($layout['columns'][0]['css'])): ?>
    <? $this->includeLayoutBlocks(0) ?>
<? else: ?>
    <div class="ov-h">
            <? foreach ($layout['columns'] as $columnIndex => $column): ?>
                <div<? if (!empty($column['css'])): ?> class="col col-md-12 <?= $column['css'] ?> mb10"<? endif ?>><? $this->includeLayoutBlocks($columnIndex) ?></div>
            <? endforeach; ?>
    </div>
<? endif ?>
