<div class="modal fade" id="create-page" tabindex="-1" role="dialog" aria-labelledby="Create Page">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Create Page</h4>
            </div>
            <?php echo $this->Form->Start('UserPage', array('location' => '/Settings/Create', 'attributes' => array('class' => 'ajax-form', 'link-target' => '/Settings/Create/')));?>
            <div class="modal-body">
                <div class="form-group">
                    <label>Page title</label>
                    <?php echo $this->Form->Input('PageTitle', array('attributes' => array('class' => 'form-control')));?>
                </div>
                <div class="form-group">
                    <label>Navigation title (link)</label>
                    <?php echo $this->Form->Input('NavigationName', array('attributes' => array('class' => 'form-control')));?>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <?php echo $this->Form->Submit('Create', array('attributes' => array('class' => 'see-also-link btn btn-md btn-primary')));?>
            </div>
            <?php echo $this->Form->End();?>
        </div>
    </div>
</div>