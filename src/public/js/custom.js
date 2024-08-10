$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

function formatNumber(number, currency = "") {
    let _value = 0;
    if (number) {
        _value = Math.round(number, 2);
        _value = _value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }
    if (currency != "") {
        _value += " " + currency;
    }
    return _value;
}

// event confirm logout system
function confirmLogout() {
    if (confirm("Xác nhận thoát khỏi hệ thống?")) {
        location.href = urlLogout;
    }
    return;
}

// function show sniper from class element
function showSniper(elementClass) {
    var html =
        '<div class="text-center sniper-content"> <div class="spinner-border" role="status"></div> </div>';
    $(elementClass).append(html);
}

// function hide sniper from class element
function hideSniper(elementClass) {
    $(elementClass).find(".sniper-content").remove();
}

// function load data table
function loadTable(
    uri = "",
    currentPage = 1,
    tableElement = "#load-table",
    formElement = "#form-filter",
    otherFunction
) {
    uri = uri != "" ? uri : routeList;
    showSniper(".table-loading");
    var data = $(formElement).serialize();
    const url = uri + "?page=" + currentPage + "&" + data;
    $.get(url, function (rs) {
        hideSniper(".table-loading");
        // $(formElement + ' button[type="submit"]').removeAttr("disabled");
        $(formElement + ' button[type="submit"]').html(`
            <svg class="icon icon-lg">
                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-reload"></use>
            </svg>
            Tải lại
        `);
        if (rs.status == 200) {
            $(tableElement).html(rs.data);
            $(".total-item").html(`(${formatNumber(rs?.total)})`);
            if (otherFunction) {
                otherFunction(rs);
            }
        }
    });
}

// function delete data table
function deleteData(
    id,
    url,
    title = "Xác nhận xóa dữ liệu này?",
    filterTableBank = ""
) {
    if (confirm(title)) {
        showSniper(".table-loading");
        $.ajax({
            url: url,
            data: { id },
            success: function (rs) {
                hideSniper(".table-loading");
                if (rs.status == 200) {
                    filterTableBank ? filterTableBank() : filterTable();
                }
                Toast.fire({
                    icon: rs?.type,
                    title: rs.message,
                });
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                var err = eval("(" + XMLHttpRequest.responseText + ")");
                hideSniper(".table-loading");
                Toast.fire({
                    icon: "error",
                    title: err?.message
                        ? err?.message.split("!")[0]
                        : "Xóa dữ liệu lỗi!",
                });
            },
        });
    }
    return;
}

function randomColor(count) {
    // Bảng màu Set1 từ ColorBrewer
    var set1Colors = [
        "#e41a1c",
        "#4daf4a",
        "#ff7f00",
        "#ffff33",
        "#377eb8",
        "#f781bf",
        "#984ea3",
        "#a65628",
        "#999999",
    ];

    // Trả về một mảng con của bảng màu dựa trên số lượng màu cần
    return set1Colors[count];
}

const formatDate = (option_date) => {
    if (option_date) {
        var date = new Date(option_date);
        return (
            date.getDate() +
            "/" +
            (date.getMonth() + 1) +
            "/" +
            date.getFullYear()
        );
    }
};

function generateUUID(length = 16) {
    return "xxxxxxxx-xxxxxxxx".replace(/[xy]/g, function (c) {
        const r = (Math.random() * length) | 0;
        const v = c === "x" ? r : (r & 0x3) | 0x8;
        return v.toString(length);
    });
}

$(document).ready(function () {
    $(".select-picker").each(function () {
        const modal = $(this).data("modal") ?? "";
        if (modal) {
            $(this).select2({
                dropdownParent: $(modal),
            });
        } else {
            $(this).select2();
        }
    });
    $(".input-code").on("input", function () {
        var inputValue = $(this).val();
        var uppercasedValue = changeToSlug(inputValue);
        $(this).val(uppercasedValue);
    });

    $(".input-number").on("input", function () {
        var inputValue = $(this).val();
        var newValue = inputValue.replace(/[^\d]/g, "");
        $(this).val(newValue);
    });

    $(".input-money").on("input", function () {
        var inputValue = $(this).val();
        var newValue = inputValue.replace(/[^\d]/g, "");
        $(this).val(formatNumber(newValue));
    });

    const changeToSlug = (str) => {
        var slug = "";
        if (str) {
            //Đổi chữ hoa thành chữ thường
            slug = str.toLowerCase();

            //Đổi ký tự có dấu thành không dấu
            slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, "a");
            slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, "e");
            slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, "i");
            slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, "o");
            slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, "u");
            slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, "y");
            slug = slug.replace(/đ/gi, "d");
            //Xóa các ký tự đặt biệt
            slug = slug.replace(
                /\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|/gi,
                ""
            );
            //Đổi khoảng trắng thành ký tự gạch ngang
            slug = slug.replace(/ /gi, "-");
            //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
            //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
            slug = slug.replace(/\-\-\-\-\-/gi, "-");
            slug = slug.replace(/\-\-\-\-/gi, "-");
            slug = slug.replace(/\-\-\-/gi, "-");
            slug = slug.replace(/\-\-/gi, "-");
        }
        return slug.toUpperCase();
    };

    $("form").submit(function () {
        const btn_submit = $(this).find('button[type="submit"]');
        const type = btn_submit.data("type") ?? "submit";
        if (type == "filter") {
            btn_submit.html(
                `<span class="spinner-border spinner-border-sm" aria-hidden="true"></span>`
            );
        } else {
            btn_submit.html(
                `<span class="spinner-border spinner-border-sm" aria-hidden="true"></span><span role="status"> Loading...</span>`
            );
        }
        // btn_submit.attr("disabled", true);
    });
    $(document).on("click", ".pagination a", function (event) {
        event.preventDefault();
        page = $(this).attr("href").split("page=")[1];
        filterTable(page);
    });

    $(".form-filter").on("change", function () {
        filterTable();
    });
    $("#form-filter").submit(function (e) {
        // $('button[type="submit"]').attr("disabled", true);
        e.preventDefault();
        loadTable();
    });
    $(document).on("click", ".btn-reload", function () {
        $(this).html(
            `<span class="spinner-border spinner-border-sm" aria-hidden="true"></span>`
        );
    });
    $(document).on("click", ".btn-loading", function () {
        $(this).html(
            `<span class="spinner-border spinner-border-sm" aria-hidden="true"></span><span role="status"> Loading...</span>`
        );
    });
    // event click to button update data
    $(document).on("click", ".btn-update", function (e) {
        e.preventDefault();
        if (confirm("Xác nhận cập nhật dữ liệu?")) {
            $(this).html(
                `<span class="spinner-border spinner-border-sm" aria-hidden="true"></span><span role="status"> Loading...</span>`
            );
            $('button[type="submit"]').trigger("click");
            showSniper(".card-main");
            return true;
        }
        return false;
    });
});

// event update status of data table
function changeStatus(id) {
    $.post(
        routeUpdate,
        {
            id,
        },
        function (rs) {
            Toast.fire({
                icon: rs?.type,
                title: rs.message,
            });
        }
    );
}

// event create new data
const form_create = $("form#form-create");
if (form_create) {
    const actionUrl = form_create.attr("action");
    form_create.submit(function (e) {
        e.preventDefault();
        form_create
            .find('button[type="submit"]')
            .html(
                `<span class="spinner-border spinner-border-sm" aria-hidden="true"></span><span role="status"> Loading...</span>`
            );
        const data = new FormData($(this)[0]);
        $.ajax({
            url: actionUrl,
            data: data,
            processData: false,
            contentType: false,
            type: "POST",
            success: function (rs) {
                form_create.find('button[type="submit"]').html(
                    `<svg class="icon">
                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-save"></use>
                    </svg>
                    Tạo mới`
                );
                form_create
                    .find('button[type="submit"]')
                    .removeAttr("disabled");
                if (rs.status == 200) {
                    $("#addModal .btn-exist").click();
                    form_create[0].reset();
                    if (typeof routeList !== "undefined" && routeList != "") {
                        loadTable();
                    }
                }
                Toast.fire({
                    icon: rs?.type,
                    title: rs.message,
                });
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                var err = eval("(" + XMLHttpRequest.responseText + ")");
                form_create.find('button[type="submit"]').html(
                    `<svg class="icon">
                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-save"></use>
                    </svg>
                    Tạo mới`
                );
                form_create
                    .find('button[type="submit"]')
                    .removeAttr("disabled");
                Toast.fire({
                    icon: "error",
                    title: err?.message
                        ? err?.message.split("!")[0]
                        : "Tạo mới lỗi!",
                });
            },
        });
    });
}

// event update form data table
const form_update = $("form.form-update");
if (form_update) {
    form_update.submit(function (e) {
        e.preventDefault();
        const actionUrl = $(this).attr("action");
        const data = new FormData($(this)[0]);
        $.ajax({
            url: actionUrl,
            data: data,
            processData: false,
            contentType: false,
            type: "POST",
            success: function (rs) {
                form_update.find('button[type="submit"]').html(
                    `<svg class="icon icon-lg">
                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-save"></use>
                    </svg>
                    Cập nhật`
                );
                form_update
                    .find('button[type="submit"]')
                    .removeAttr("disabled");
                Toast.fire({
                    icon: rs?.type,
                    title: rs.message,
                });
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                var err = eval("(" + XMLHttpRequest.responseText + ")");
                form_update.find('button[type="submit"]').html(
                    `<svg class="icon icon-lg">
                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-save"></use>
                    </svg>
                    Cập nhật`
                );
                form_update
                    .find('button[type="submit"]')
                    .removeAttr("disabled");
                Toast.fire({
                    icon: "error",
                    title: err?.message
                        ? err?.message.split("!")[0]
                        : "Cập nhật lỗi!",
                });
            },
        });
    });
}

function initSelect2(
    element,
    placeholder,
    table,
    dropdownParent = "",
    where,
    lstCol = ["id", "name"]
) {
    var $where =
        typeof userId != "undefined"
            ? { status: "active", brand_id: brandId }
            : { status: "active" };
    $where = where ? where : $where;
    return $(element).select2({
        dropdownParent: dropdownParent,
        placeholder: placeholder,
        allowClear: true,
        ajax: {
            delay: 500,
            type: "POST",
            dataType: "json",
            url: routeSelect,
            processResults: function (data) {
                return {
                    results: $.map(data, function (obj) {
                        return {
                            id: obj.id,
                            text: `${obj.name}`,
                        };
                    }),
                };
            },
            data: function (params) {
                var query = {
                    search: params.term,
                    table: table,
                    lstCol: lstCol,
                    where: $where,
                };
                return query;
            },
        },
    });
}

$(".datepicker").flatpickr({
    dateFormat: "d-m-Y",
});

$(".datepicker").on("change", function () {
    $("#form-filter").submit();
});

$(document).on("click", ".show-secret-data", function (e) {
    e.preventDefault();
    const showData = $(this).closest("div").find(".show-data");
    const table = $(this).data("table");
    const id = $(this).data("id");
    const column = $(this).data("column");
    const thisClass = $(this).data("class");
    const currentElement = $(this);
    if (table && id && column) {
        $.post(
            routeGetSecretData,
            {
                id,
                table,
                column,
            },
            function (data) {
                var $temp = $("<input>");
                $("body").append($temp);
                $temp.val(data).select();
                document.execCommand("copy");
                $temp.remove();
                showData.removeClass("d-none");
                showData.text(data);
                if (thisClass != "d-none") {
                    currentElement.html(
                        `<i class="fas fa-check text-success"></i>`
                    );
                }
                currentElement.addClass(thisClass);
            }
        );
    }
});
