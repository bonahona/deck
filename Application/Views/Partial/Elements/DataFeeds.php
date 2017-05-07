<div id="data-sources">
    <p class="light-grey
0">Drag these sources to the page's lanes.</p>
    <?php foreach($DataFeeds as $id => $feed):?>
        <div data-id="<?php echo $id;?>" class="panel panel-default draggable">
            <div class="panel-heading">
                <h2 class="panel-title">
                    <span class="<?php echo $feed['Icon'];?>"></span>
                    <b><?php echo $feed['Title'];?></b>
                </h2>
            </div>
            <div class="panel-body">
                <span>
                    <?php  echo $feed['Description'];?>
                </span>
            </div>
        </div>
    <?php endforeach;?>
</div>
