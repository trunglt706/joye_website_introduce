<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="{{ asset('style2/library/menu/webslidemenu.js') }}"></script>
<script src="{{ asset('style2/js/myscript.js') }}"></script>
<script>
    const form_contact = $(".bl-form-contact form");
    if (form_contact) {
        const actionUrl = form_contact.attr("action");
        form_contact.submit(function(e) {
            e.preventDefault();
            form_contact
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
                success: function(rs) {
                    if (rs.status == 200) {
                        form_contact.closest('.bl-form-contact').html(rs?.data);
                    } else {
                        form_contact.find('button[type="submit"]').html('Đăng ký');
                        form_contact
                            .find('button[type="submit"]')
                            .removeAttr("disabled");
                        form_contact.find('.text-error').text(rs?.message);
                    }
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    var err = eval("(" + XMLHttpRequest.responseText + ")");
                    form_contact.find('button[type="submit"]').html('Đăng ký');
                    form_contact
                        .find('button[type="submit"]')
                        .removeAttr("disabled");
                    form_contact.find('.text-error').text("Lỗi đăng ký!");
                },
            });
        });
    }
</script>
