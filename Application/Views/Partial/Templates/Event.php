<script id="event-template" type="text/x-handlebars-template">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="panel {{panel_type}} event anchor" data-id="{{id}}" data-timestamp="{{timestamp}}">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <span class="rsvp_status glyphicon {{glyphicon_type}}"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <a href="{{event_link}}" target="_blank">
                                        <h3 class="panel-title">{{name}}</h3>
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <span class="owner">{{owner.name}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                            <button type="button" class="btn btn-sm btn-danger btn-dismiss">
                                <span class="glyphicon glyphicon-remove"></span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="row">
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                    <img src="{{picture.data.url}}"/>
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                    <dl>
                                        <dt>Place:</dt>
                                        <dd>{{place.name}}&nbsp;</dd>
                                        <dt>Time:</dt>
                                        <dd>{{display_start_time}}</dd>
                                    </dl>
                                </div>
                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                                    <button class="btn btn-md btn-default expand" type="button" data-toggle="collapse" data-target="#event_desc_{{id}}">
                                        <span class="glyphicon glyphicon-chevron-down"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row collapse" id="event_desc_{{id}}">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="row margin-top buttons">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    <button type="button" class="btn btn-md btn-primary col-lg-12 attend"><span class="glyphicon glyphicon-ok-sign"></span> Attend</button>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    <button type="button" class="btn btn-md btn-default col-lg-12 maybe"><span class="glyphicon glyphicon-question-sign"></span> Maybe</button>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    <button type="button" class="btn btn-md btn-danger col-lg-12 decline"><span class="glyphicon glyphicon-remove-sign"></span> Decline</button>
                                </div>
                            </div>
                            <div class="row margin-top">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    {{{description}}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</script>