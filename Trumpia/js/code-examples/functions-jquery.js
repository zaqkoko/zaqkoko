// show/hide more info
$('#show-info').click(function () {
    $('#more-info').show();
    $('#show-info').hide();
});

$('#hide-info').click(function () {
    $('#more-info').hide();
    $('#show-info').show();
});

// collapse/expand all widgets
$(".widget .header").click(function () {
    var widget = $(this).parent();
    if (widget.hasClass('collapsed')) {
        widget.removeClass('collapsed');
    } else {
        widget.addClass('collapsed');
    }
});

// actions for top links
$("#top-menu a").click(function () {
    $("#breadcrumb").text(this.innerHTML + " : " + this.title);
});

