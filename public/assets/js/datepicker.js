function $_datepicker(clsname) {

    clsname = (clsname == null) ? ".datepicker" : clsname;
    $.each($(clsname), function(i, e) {
        $(e).datepicker({
            format: "yyyy-mm-dd",
            uiLibrary: 'bootstrap4',
            footer: true
        });
    });
}

function $_datetimepicker(clsname) {
    clsname = (clsname == null) ? ".datetimepicker" : clsname;
    $.each($(clsname), function(i, e) {
        $(e).datetimepicker({
            format: "yyyy-mm-dd HH:MM",
            uiLibrary: 'bootstrap4',
            footer: true
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