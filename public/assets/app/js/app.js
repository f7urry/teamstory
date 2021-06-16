$(function() {
    $_ui();
});

function $_ui() {
    $__plugin();
    $__app();
    $(".preloader").fadeOut();
}

function $__plugin() {
    $(".lightbox-image").on("click", function(e) {
        e.preventDefault();
        $(this).ekkoLightbox();
    });
    $("input.number").number(true);
}

function $__app() {
    $(".datepicker").off();
    $_datepicker(".datepicker");

    $(".datetimepicker").off();
    $_datetimepicker(".datetimepicker");

    $(".btn-submit").off();
    $(".btn-submit").on("click", function(e) {
        e.preventDefault();
        var form = $(this).data("form");
        var action = $(this).data("action");
        if (form == null)
            alert("No form defined");
        else {
            if ($(form).length > 0) {
                if (action != null) {
                    $("#preloader").show();
                    $(form).attr("action", action);
                    $(form).trigger("submit");
                }
            } else {
                alert(form + " Not Found");
            }
        }
    });

    $(".btn-save").off();
    $(".btn-save").on("click", function(e) {
        e.preventDefault();
        var form = $(this).data("form");
        var action = $(this).data("action");
        var message = $(this).data("message");
        var $confirm = $(this).data("confirm");
        if (form == null)
            alert("No form defined");
        else {
            if ($(form).length > 0) {
                if (action != null)
                    $(form).attr("action", action);
                if ($confirm != null && !$confirm) {
                    $(".preloader").show();
                    var submit = $(form).trigger("submit");
                    if (submit)
                        $(".preloader").hide();
                } else {
                    confirmDialog({
                        content: (message == null) ? "Are you sure to save data?" : message,
                        yes: function() {
                            $(".preloader").show();
                            var submit = $(form).trigger("submit");
                            if (submit)
                                $(".preloader").hide();
                        }
                    });
                }
            } else {
                alert(form + " Not Found");
            }
        }
    });

    $(".btn-remove-row").off();
    $(".btn-remove-row").on("click", function(e) {
        e.preventDefault();
        var target = $(this).attr("data-target");
        if (target != null)
            $(target).remove();
        else {
            var parent = $(this).parent().parent();
            parent.remove();
        }
    });

    $(".btn-delete").off();
    $(".btn-delete").on("click", function(e) {
        e.preventDefault();
        var link = $(this).data("href");
        if (link == null)
            link = $(this).attr("href");
        var msg = $(this).data("message");
        deleteDialog(link, msg);
    });

    $(".alert").off();
    $(".alert").on("click", function() {
        $(this).hide();
    });
}

function $_select(id, url, cb) {
    $(id).select2({
        placeholder: '',
        allowClear: true,
        delay: 5000,
        theme: 'bootstrap4',
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        ajax: {
            url: url,
            dataType: 'json',
        }
    });
    if (cb != null)
        $(id).on("select2:select", cb);
}