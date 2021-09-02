function $_datepicker(clsname) {
    clsname = (clsname == null) ? ".datepicker" : clsname;
    $.each($(clsname), function(i, e) {
        if($(e).hasClass("hasDatepicker"))
            $(e).datetimepicker("destroy");
        else
            $(e).addClass("hasDatepicker");
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
            format: 'DD-MM-YYYY'
        });
    });
}

function $_datetimepicker(clsname) {
    clsname = (clsname == null) ? ".datetimepicker" : clsname;
    $.each($(clsname), function(i, e) {
        if($(e).hasClass("hasDatepicker"))
            $(e).datetimepicker("destroy");
        else
            $(e).addClass("hasDatepicker");
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
            format: 'DD-MM-YYYY HH:mm:ss' //use moment.js format
        });
    });
}

function date_format(dateInput) {
    var d = new Date(dateInput);
    var dd = d.getDate() < 10 ? "0" + d.getDate() : d.getDate();
    var mm = d.getMonth() + 1;
    mm = (parseInt(mm) < 10) ? ("0" + mm) : mm;
    var yy = d.getFullYear();

    return dd + "-" + mm + "-" + yy;
}

function datetime_format(dateInput) {
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