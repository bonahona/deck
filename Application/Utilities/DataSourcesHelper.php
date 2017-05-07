<?php
const FACEBOOK_EVENTS_PENDING = 1;
const FACEBOOK_EVENTS_COMING = 2;

const FEEDS = array(
    FACEBOOK_EVENTS_PENDING => array(
        'Title' => 'Facebook pending events',
        'Description' => 'Any event you are invited to but no answer has been given.',
        'Icon' => 'fa fa-facebook-official',
        'TemplateName' => 'event-template',
        'TemplateVariableName' => 'eventTemplate',
        'TemplatePath' => 'Templates/Event',
        'LaneName' => 'event-pending',
        'LaneTitle' => 'Pending Events',
        'JavascriptFunctionName' => 'getPendingEvents',
        'DataSourceUrl' => '/events/pendingevents',
        'CallbackFunction' => 'updatePendingEvents'
    ),
    FACEBOOK_EVENTS_COMING => array(
        'Title' => 'Facebook coming events',
        'Description' => 'Any event you are interested in, going to or maybe going to.',
        'Icon' => 'fa fa-facebook-official',
        'TemplateName' => 'event-template',
        'TemplateVariableName' => 'eventTemplate',
        'TemplatePath' => 'Templates/Event',
        'LaneName' => 'event-coming',
        'LaneTitle' => 'Coming Events',
        'JavascriptFunctionName' => 'getComingEvents',
        'DataSourceUrl' => '/events/comingevents',
        'CallbackFunction' => 'updateComingEvents'
    ),
);
