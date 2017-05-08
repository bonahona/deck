<?php if(!isset($Id)):?>
    <script id="empty-lane-template" type="text/x-handlebars-template">
        <div id="lane-{{id}}" class="droppable">
        </div>
    </script>
<?php else:?>
    <div id="lane-<?php echo $Id;?>" class="droppable"></div>
<?php endif;?>
