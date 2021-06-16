var DModal = function() {};
DModal.prototype = {
    constructor: DModal,
    id: Math.floor(Math.random() * 9867654321 * 999),
    width: "100%",
    modal: '',
    createModal: function(opt) {
        if (opt.id != null)
            this.id = opt.id;
        let modal = `<div class='modal' id='${this.id}' role='dialog'`;
        if (opt.extra != null) {
            for (const [key, value] of Object.entries(opt.extra))
                modal += `data-${key}='${value}'`;
        }
        modal += "></div>";

        let dialog = `<div class='modal-dialog ${(opt.dialogClass != null ? opt.dialogClass : "")}' id='${this.id}-dialog'></div>`;
        let content = `<div class='modal-content ${(opt.contentClass != null ? opt.contentClass : '')}'></div>`;
        let header = `<div class='modal-header ${(opt.headerClass != null ? opt.headerClass : '')}'>`;
        let body = `<div class='modal-body ${(opt.bodyClass != null ? opt.bodyClass : '')}' id='${this.id}-body'></div>`;
        let footer = `<div class='modal-footer ${(opt.footerClass != null ? opt.footerClass : '')}' style='text-align:center !important;'></div>`;
        header += (opt.header != "" && opt.header != null) ? `<div class='modal-title text-white'><h5>${opt.header}</h5></div>` : '';
        header += `<button type='button' class='close' data-dismiss='modal'>&times;</button></div>`;

        content = $(content).append(header);
        content = $(content).append(body);
        content = $(content).append(footer);
        dialog = $(dialog).append(content);

        this.modal = $(modal).append(dialog);
        $(this.modal).modal({ show: false }).on('hidden.bs.modal', function() {
            $(this).remove();
        });
    },
    createButton: function(text, callback, cssClass, appendOrder) {
        if (cssClass == null)
            cssClass = "btn btn-default";
        let modalId = this.modal
        let $button = $("<button/>", {
            type: "button",
            class: cssClass,
            click: function() {
                if (callback != null)
                    callback();
                $(modalId).modal("hide");
            }
        });
        $button.html(text);
        if (appendOrder == null || appendOrder)
            $(this.modal).find('.modal-footer').append($button);
        else
            $(this.modal).find('.modal-footer').prepend($button);
    },
    load: function(url, callback) {
        this.modal.find('.modal-body').load(url, function() {
            callback();
        });
    },
    html: function(html) {
        this.modal.find('.modal-body').html(html);
    },
    show: function() {
        this.modal.modal('show');

        var mbd = $(".modal-backdrop").length;
        var zix = parseInt($(`#${this.id}`).prev().css("z-index")) + parseInt(10 * mbd);
        $(`#${this.id}`).prev().css("z-index", zix);
        $(`#${this.id}`).css("z-index", zix + 1);

    }
};

function openWindow(url) {
    if (url) {
        var x = (screen.height - 550) / 2;
        var y = (screen.width - 650) / 2;
        panel = 'width=650,height=550,status=no,resizable=no,scrollBars=yes,top=' + x + ',left=' + y;
        window.open(url, "pagelist", panel);
    }
}

function _popup_click(opt) {
    $(`#${opt.opener} option`).remove();
    $(`#${opt.opener}`).append(`<option value='${opt.value}'>${opt.text}</option>`);
    $(`div[data-opener='${opt.opener}']`).modal('hide');
}
/**
 * Override this function for custom popup function
 */
function popup_click(opt) {
    _popup_click(opt);
}

function popup_new(opt) {
    $(`#${opt.opener} option`).removeAttr("selected");
    $(`#${opt.opener}`).append(`<option value='${opt.value}' selected>${opt.text}</option>`);
    $(`div[data-opener='${opt.opener}']`).modal('hide');
}

function $_popupForm(popupid) {
    $.each($(".form-popup"), function(i, e) {
        $(e).ajaxForm({
            beforeSubmit: function(a) {
                $(".preloader").show();
            },
            success: function(cb) {
                if (cb.data) {
                    popup_click({
                        opener: $(`#${popupid}`).data("opener"),
                        value: cb.data.id,
                        text: cb.data.text
                    });
                } else if (cb.new) {
                    popup_new({
                        opener: $(`#${popupid}`).data("opener"),
                        value: cb.new.id,
                        text: cb.new.text
                    });
                    if (cb.message)
                        alert(cb.message);
                } else if (cb.message) {
                    let opener = $(`#${popupid}`).data("opener");
                    $(`div[data-opener='${opener}']`).modal('hide');
                    alert(cb.message);
                }
                $(".preloader").fadeOut();
            },
            error: function(data) {
                alert(data.responseJSON.message);
                $(".preloader").fadeOut();
            }
        });
    });
}

function openPopup(opener, url, id, title) {
    if (title == null)
        title = "";
    if (id == null)
        id = "popup" + Math.floor(Math.random() * 9867654321 * 999);
    var modl = new DModal();
    modl.createModal({
        id: id,
        header: title,
        headerClass: "d-none",
        dialogClass: "modal-lg",
        contentClass: "fill-height-screen",
        footerClass: "d-none",
        extra: {
            "opener": opener
        }
    });
    modl.load(url + "&popupid=" + id, () => {
        var pa = $(`#${id} ul.pagination li a`);
        for (var i = 0; i < pa.length; i++) {
            var e = pa[i];
            var href = $(e).attr("href");
            $(e).attr("href", `javascript:openPopup("${opener}","${href}","${id}")`);
        }
        $(`#${id}`).on("click", ".popup-picker", function() {
            var val = $(this).data("value");
            var text = $(this).data("text");
            popup_click({
                opener: opener,
                value: val,
                text: text
            });
            $(`#${id}`).modal("destroy");
            $("#preloader").hide();
        });
    });
    modl.show();
}

function confirmDialog(opt) {
    opt.header = "Confirmation";
    if (opt.id == null || opt.id == "")
        opt.id = "confirm-dialog";
    var modl = new DModal();
    if (opt.content.indexOf("delete") > 0) {
        opt.header = "Delete " + opt.header;
        opt.headerClass = "bg-danger text-white";
    }
    if (opt.headerClass == null)
        opt.headerClass = "bg-warning text-white";
    opt.dialogClass = "modal modal-dialog-centered";
    modl.createModal(opt);
    modl.createButton("Yes", opt.yes, "btn btn-warning text-white");
    modl.createButton("No", opt.no);
    modl.html(opt.content);
    modl.show();
    return modl;
}

function alert(msg) {
    var modl = new DModal();
    modl.createModal({
        id: "alert-dlg",
        headerClass: "d-none",
        footerClass: "d-none",
        dialogClass: "h-25 modal-dialog-centered",
        bodyClass: "d-flex justify-content-center"
    });
    modl.html(msg);
    modl.show();
    return modl;
}

function deleteDialog(url, message) {
    var form = `<form action='${url}' method='post' name='dlgDelete'>`;
    form += `<input type='hidden' name='_method' value='delete'/>`;
    form += `<input type='hidden' name='_token' value='${csrf_token()}'/>`;
    if (message == null)
        message = `Do you want to delete data?`;
    form += `${message}</form>`;
    var modl = confirmDialog({
        content: form,
        yes: function() {
            $("form[name=dlgDelete]").submit();
        }
    });
    return modl;
}