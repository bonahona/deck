<div class="col-lg-3">
    <div class="row">
        <div class="col-lg-12">
            <h2>Pending</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 lane" id="pending_events">
        </div>
    </div>
</div>
<div class="col-lg-3">
    <div class="row">
        <div class="col-lg-12">
            <h2>Coming</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 lane" id="coming_events">
        </div>
    </div>
</div>

<?php echo $this->PartialView('EventTemplate');?>