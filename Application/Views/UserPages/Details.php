<h1 class="title"><?php echo $UserPage->PageTitle;?></h1>

<div class="row">
    <?php foreach($UserFeeds as $userFeed):?>
        <div class="col-lg-<?php echo $userFeed['width'];?> col-md-<?php echo $userFeed['width'] * 2;?>">
            <?php if($userFeed['feed'] != null):?>
                <h2 class="title"><?php echo $userFeed['feed']->Feed['LaneTitle'];?></h2>
            <?php endif;?>
        </div>
    <?php endforeach;?>
</div>
<div class="row">
    <?php foreach($UserFeeds as $userFeed):?>
        <?php if($userFeed['feed'] != null):?>
            <div id="<?php echo $userFeed['feed']->Feed['LaneName'];?>" class="lane col-lg-<?php echo $userFeed['width'];?> col-md-<?php echo $userFeed['width'] * 2;?>">
            </div>
        <?php else:?>
            <div class="dummy col-lg-<?php echo $userFeed['width'];?>">
            </div>
        <?php endif;?>
    <?php endforeach;?>
</div>