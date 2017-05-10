<div class="row">
    <div class="col-lg-2">
        <?php echo $this->PartialView('Elements/Admin/SideBar');?>
    </div>
    <div class="col-lg-10">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="title">Create Feed Type</h1>
                <?php echo $this->Form->Start('FeedType');?>
                    <?php echo $this->PartialView('Elements/Admin/EditFeedType', array('FeedType' => $FeedType));?>
                <?php echo $this->Form->End();?>
            </div>
        </div>
    </div>
</div>