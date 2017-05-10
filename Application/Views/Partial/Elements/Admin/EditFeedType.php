<?php echo $this->Form->Hidden('Id');?>
<div class="row form-group form-inline">
    <label class="col-lg-2">Title</label>
    <?php echo $this->Form->Input('Title', array('attributes' => array('class' => 'col-lg-12 form-control', 'required' => 'true')));?>
</div>
<div class="row form-group form-inline">
    <label class="col-lg-2">Description</label>
    <?php echo $this->Form->Input('Description', array('attributes' => array('class' => 'col-lg-10 form-control', 'required' => 'true')));?>
</div>
<div class="row form-group form-inline">
    <label class="col-lg-2">Icon</label>
    <?php echo $this->Form->Input('Icon', array('attributes' => array('class' => 'col-lg-10 form-control', 'required' => 'true')));?>
</div>
<div class="row form-group form-inline">
    <label class="col-lg-2">TemplateName</label>
    <?php echo $this->Form->Input('TemplateName', array('attributes' => array('class' => 'col-lg-10 form-control', 'required' => 'true')));?>
</div>

<div class="row form-group form-inline">
    <label class="col-lg-2">TemplateVariableName</label>
    <?php echo $this->Form->Input('TemplateVariableName', array('attributes' => array('class' => 'col-lg-10 form-control', 'required' => 'true')));?>
</div>
<div class="row form-group form-inline">
    <label class="col-lg-2">TemplatePath</label>
    <?php echo $this->Form->Input('TemplatePath', array('attributes' => array('class' => 'col-lg-10 form-control', 'required' => 'true')));?>
</div>
<div class="row form-group form-inline">
    <label class="col-lg-2">LaneName</label>
    <?php echo $this->Form->Input('LaneName', array('attributes' => array('class' => 'col-lg-10 form-control', 'required' => 'true')));?>
</div>
<div class="row form-group form-inline">
    <label class="col-lg-2">LaneTitle</label>
    <?php echo $this->Form->Input('LaneTitle', array('attributes' => array('class' => 'col-lg-10 form-control', 'required' => 'true')));?>
</div>
<div class="row form-group form-inline">
    <label class="col-lg-2">JavascriptFunctionName</label>
    <?php echo $this->Form->Input('JavascriptFunctionName', array('attributes' => array('class' => 'col-lg-10 form-control', 'required' => 'true')));?>
</div>
<div class="row form-group form-inline">
    <label class="col-lg-2">DataSourceUrl</label>
    <?php echo $this->Form->Input('DataSourceUrl', array('attributes' => array('class' => 'col-lg-10 form-control', 'required' => 'true')));?>
</div>
<div class="row form-group form-inline">
    <label class="col-lg-2">CallbackFunction</label>
    <?php echo $this->Form->Input('CallbackFunction', array('attributes' => array('class' => 'col-lg-10 form-control', 'required' => 'true')));?>
</div>
<div class="row form-group form-inline">
    <label class="col-lg-2">IsUnique</label>
    <?php echo $this->Form->Bool('IsUnique', array('attributes' => array('class' => 'col-lg-10 form-control')));?>
</div>
<div class="row">
    <div class="col-lg-12">
        <button class="btn btn-primary btn-md" type="submit">Save</button>
        <a href="/admin/viewfeedtypes" class="btn btn-md btn-default">Back</a>
    </div>
</div>