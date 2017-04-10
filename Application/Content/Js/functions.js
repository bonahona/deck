var standardTitle = document.title;

// Handlebars-template
var eventTemplate = null;

$(document).ready(function(){

    setupHandlebarTemplates();

    $('.event .btn-dissmiss').on('click', function(){
        dissmissEvent(this);
    });

    $('.event .attend').on('click', function(){
        setAttending(this);
    });

    $('.event .maybe').on('click', function(){
        setMaybe(this);
    });

    $('.event .decline').on('click', function(){
        setDecline(this);
    });

    $('.expand').on('click', function() {
        /*
        $(this).closest('.lane').animate({
            scrollTop: $(this).closest('.anchor').position().top - 65
        }, 250);
        //$(window).scrollTop($(this).closest('.anchor').offset().top - 65);
        */
    });

    getAllEvents();
    updateTitle();

    //setInterval(checkEvents, 10000);
});

function setupHandlebarTemplates(){
    var source = $('#event-template').html();
    eventTemplate = Handlebars.compile(source);
}

function updateTitle() {
    var notificationCount = getNotificationCount();

    if(notificationCount > 0) {
        document.title = standardTitle + '(' + notificationCount + ')';
    }else{
        document.title = standardTitle;
    }
}

function getNotificationCount() {
    var totalCount = 0;
    $('.event').each(function(){
        if($(this).hasClass('not-seen')){
            totalCount++;
        }
    });

    return totalCount;
}

function dissmissEvent(element) {
    var id = $(element).closest('.event').attr('data-id');

    $.post(
        '/Events/DismissEvent',
        {
            "eventId": id
        },
        function(data){
            if(data.success == 1){
                $(element).closest('.event').fadeOut();
                updateTitle();
            }
        }
    );
}

function seenEvent(element){
    var id = $(element).attr('data-id');

    $.post(
        '/Events/SeenEvent/',
        {
            "eventId": id
        },
        function(data){
            if(data.success == 1){
                // Set the event to be seen
                $(element).removeClass('not-seen');
                $(element).removeClass('panel-primary');
                $(element).addClass('panel-default');

                updateTitle();
            }
        }
    );
}

function setAttending(element) {
    var id = $(element).closest('.event').attr('data-id');
    $.post(
        '/Events/Attend',
        {
            "eventId": id
        },
        function(data){
            alert(JSON.stringify(data));
            if(data.success == 1){
                $(this).removeClass('.btn-primary');
                $(this).addClass('.btn-success');
                $(this).prop('disabled', true);
            }
        }
    );
}

function setMaybe(element) {
    var id = $(element).closest('.event').attr('data-id');
    $.post(
        '/Events/Maybe',
        {
            "eventId": id
        },
        function(data){

        }
    );
}

function setDecline(element) {
    var id = $(element).closest('.event').attr('data-id');
    $.post(
        '/Events/Decline',
        {
            "eventId": id
        },
        function(data){
            if(data.success == 1){

            }
        }
    );
}

function getAllEvents() {
    $.get(
        '/Events/GetAllEvents/',
        {},
        function(data){
            if(data.success == 1){
                updatePendingEvents(data.data.pending);
                updateComingEvents(data.data.coming);
            }
        }
    )
}

function checkEvents() {
    $.get(
        '/Events/CheckEvents/',
        {},
        function(data){
            if(data.success == 1){
                updatePendingEvents(data.data.pending);
                updateComingEvents(data.data.coming);
            }
        }
    )
}

function updatePendingEvents(events){
    events.forEach(function(element){
        var htmlElement = eventTemplate(element);
        $('#pending_events').prepend(htmlElement);
        setupNotSeenMouseOver(htmlElement);
    });
}

function updateComingEvents(events){
    events.forEach(function(element){
        var htmlElement = eventTemplate(element);
        $('#coming_events').prepend(htmlElement);
        setupNotSeenMouseOver(htmlElement);
    });
}

function setupNotSeenMouseOver(element){
    $('.not-seen').on('mouseover', function(){
        seenEvent(this);
    });
}