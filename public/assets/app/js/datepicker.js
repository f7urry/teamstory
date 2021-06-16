function $_datepicker(clsname) {
    clsname = (clsname == null) ? ".datepicker" : clsname;
    $(clsname).off();
    $.each($(clsname), function(i, e) {
        $(e).datetimepicker({
            icons: {
                time: 'fa fa-clock',
                date: 'fa fa-calendar',
                up: 'fa fa-chevron-up',
                down: 'fa fa-chevron-down',
                previous: 'fa fa-chevron-left',
                next: 'fa fa-chevron-right',
                today: 'fa fa-crosshairs',
                clear: 'fa fa-trash',
                close: 'fa fa-times'
            },
            format: 'YYYY-MM-DD'
        });
    });
}

function $_datetimepicker(clsname) {
    clsname = (clsname == null) ? ".datetimepicker" : clsname;
    $(clsname).off();
    $.each($(clsname), function(i, e) {
        $(e).off();
        $(e).datetimepicker({
            icons: {
                time: 'fa fa-clock',
                date: 'fa fa-calendar',
                up: 'fa fa-chevron-up',
                down: 'fa fa-chevron-down',
                previous: 'fa fa-chevron-left',
                next: 'fa fa-chevron-right',
                today: 'fa fa-crosshairs',
                clear: 'fa fa-trash',
                close: 'fa fa-times'
            },
        });
    });
}

function formatDate(dateInput) {
    var d = new Date(dateInput);
    var dd = d.getDate() < 10 ? "0" + d.getDate() : d.getDate();
    var mm = d.getMonth() + 1;
    mm = (parseInt(mm) < 10) ? ("0" + mm) : mm;
    var yy = d.getFullYear();

    return dd + "-" + mm + "-" + yy;
}

function formatDatetime(dateInput) {
    var d = new Date(dateInput);
    var dd = d.getDate() < 10 ? "0" + d.getDate() : d.getDate();
    var mm = d.getMonth() + 1;
    mm = (parseInt(mm) < 10) ? ("0" + mm) : mm;
    var yy = d.getFullYear();
    var HH = d.getHours();
    var ii = d.getMinutes();
    var ss = d.getSeconds();


    return dd + "-" + mm + "-" + yy + " " + HH + ":" + ii + ":" + ss;
}