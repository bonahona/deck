<script id="event-template" type="text/x-handlebars-template">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel {{panel_type}} event anchor" data-id="<?php echo $event['id'];?>">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-lg-1">
                            <div class="row">
                                <div class="col-lg-12">
                                    <span class="rsvp_status glyphicon {{glyphicon_type}}"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="row">
                                <div class="col-lg-12">
                                    <a href="{{event_link}}" target="_blank">
                                        <h3 class="panel-title">{{name}}</h3>
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <span class="owner">{{owner.name}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <button type="button" class="btn btn-sm btn-danger btn-dissmiss">
                                <span class="glyphicon glyphicon-remove"></span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-2">
                                    <img src="<?php echo $event['picture']['data']['url'];?>"/>
                                </div>
                                <div class="col-lg-8">
                                    <dl>
                                        <dt>Place:</dt>
                                        <dd>
                                            <?php if(isset($event['place'])):?>
                                                <?php echo $event['place']['name'];?>
                                            <?php else:?>
                                                &nbsp;
                                            <?php endif;?>
                                        </dd>
                                        <dt>Time</dt>
                                        <dd><?php echo $event['display_start_time'];?></dd>
                                    </dl>
                                </div>
                                <div class="col-lg-1">
                                    <button class="btn btn-md btn-default expand" type="button" data-toggle="collapse" data-target="#event_desc_<?php echo $event['id'];?>">
                                        <span class="glyphicon glyphicon-chevron-down"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row collapse" id="event_desc_<?php echo $event['id'];?>">
                        <div class="col-lg-12">
                            <div class="row margin-top">
                                <div class="col-lg-4 buttons">
                                    <?php if($event['rsvp_status'] == 'attending'):?>
                                        <a href="#" class="btn btn-md btn-success col-lg-12 attend" disabled="true"><span class="glyphicon glyphicon-ok-sign"></span> Attend</a>
                                    <?php else:?>
                                        <a href="#" class="btn btn-md btn-primary col-lg-12 attend"><span class="glyphicon glyphicon-ok-sign"></span> Attend</a>
                                    <?php endif;?>
                                </div>
                                <div class="col-lg-4">
                                    <?php if($event['rsvp_status'] == 'unsure'):?>
                                        <button type="button" class="btn btn-md btn-success col-lg-12 maybe" disabled="true"><span class="glyphicon glyphicon-question-sign"></span> Maybe</button>
                                    <?php else:?>
                                        <button type="button" class="btn btn-md btn-default col-lg-12 maybe"><span class="glyphicon glyphicon-question-sign"></span> Maybe</button>
                                    <?php endif;?>
                                </div>
                                <div class="col-lg-4">
                                    <button type="button" class="btn btn-md btn-danger col-lg-12 decline"><span class="glyphicon glyphicon-remove-sign"></span> Decline</button>
                                </div>
                            </div>
                            <div class="row margin-top">
                                <div class="col-lg-12">
                                    <?php echo $event['description'];?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</script>