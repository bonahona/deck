var standardTitle = document.title;

$(document).ready(function(){

    setupHandleBars();
    startFeed();

    updateTitle();
});

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
    $('.notify').each(function(){
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
            if(data.success == 1){
                $(element).parent().find('.btn-success').removeClass('btn-success');
                $(element).removeClass('btn-primary');
                $(element).addClass('btn-success');
                $(element).prop('disabled', true);
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
            if(data.success == 1){
                $(element).parent().find('.btn-success').removeClass('btn-success');
                $(element).removeClass('btn-default');
                $(element).addClass('btn-success');
                $(element).prop('disabled', true);
            }
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
                $(element).parent().find('.btn-success').removeClass('btn-success');
                $(element).removeClass('btn-danger');
                $(element).addClass('btn-success');
                $(element).prop('disabled', true);
            }
        }
    );
}

function updatePendingEvents(events, template){
    events.forEach(function(element){
        var htmlElement = $.parseHTML(template(element));
        var elementPosition = findElementPosition($('#event-pending .event'), element.timestamp);
        if(elementPosition == null){
            $('#event-pending').append(htmlElement);
        }else {
            $(elementPosition).after(htmlElement);
        }
        setupNotSeenMouseOver(htmlElement);
        setupDismiss(htmlElement);
        setupResponseButtons(htmlElement);
    });
}

function updateComingEvents(events, template){
    events.forEach(function(element){
        var htmlElement = $.parseHTML(template(element));
        var elementPosition = findElementPosition($('#event-coming .event'), element.timestamp);
        if(elementPosition == null){
            $('#event-coming').append(htmlElement);
        }else {
            $(elementPosition).after(htmlElement);
        }
        setupNotSeenMouseOver(htmlElement);
        setupDismiss(htmlElement);
        setupResponseButtons(htmlElement);
    });
}

function findElementPosition(events, newEventDateTime){
    events.each(function(){
        var eventDateTime = $(this).attr('data-timestamp');
        if(newEventDateTime < eventDateTime){
            return this;
        }
    });

    return null;
}

function setupNotSeenMouseOver(element){
    $(element).find('.not-seen').on('mouseover', function(){
        seenEvent(this);
    });
}

function setupDismiss(element) {
    $(element).find('.event .btn-dismiss').on('click', function(){
        dissmissEvent(this);
    });
}

function setupResponseButtons(element){

    $(element).find('.event .attend').on('click', function(){
        setAttending(this);
    });

    $(element).find('.event .maybe').on('click', function(){
        setMaybe(this);
    });

    $(element).find('.event .decline').on('click', function(){
        setDecline(this);
    });

}