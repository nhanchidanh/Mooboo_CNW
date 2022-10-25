$.validator.setDefaults({
    submitHandler: function () {
        document.querySelector('#form').submit();
    }
});
$(document).ready(function () {
    $("#form").validate({
        rules: {
            firstname: "required",
            lastname: "required",
            username: {
                required: true,
                minlength: 2
            },
            password: {
                required: true,
                minlength: 5
            },
            confirm_password: {
                required: true,
                minlength: 5,
                equalTo: "#password"
            },
            email: {
                required: true,
                email: true
            },
            agree: "required"
        },
        messages: {
            firstname: "Vui lòng nhập họ của bạn",
            lastname: "Vui lòng nhập tên của bạn",
            username: {
                required: "Vui lòng nhập tên đăng nhập",
                minlength: "Tên đăng nhập phải có ít nhất 2 ký tự"
            },
            password: {
                required: "Vui lòng nhập mật khẩu",
                minlength: "Mật khẩu phải có ít nhất 5 ký tự"
            },
            confirm_password: {
                required: "Vui lòng nhập lại mật khẩu",
                minlength: "Mật khẩu phải có ít nhất 5 ký tự",
                equalTo: "Mật khẩu không khớp với mật khẩu đã nhập"
            },
            email: {
                required: "Vui lòng nhập email",
                email: "Email không đúng định dạng"
            },
            agree: "Vui lòng đồng ý với các điều khoản của chúng tôi"
        },
        errorElement: "div",
        errorPlacement: function (error, element) {
            error.addClass("invalid-feedback");
            if (element.prop('type') === "checkbox") {
                error.insertAfter(element.siblings("label"));
            } else {
                error.insertAfter(element);
            }
        },
        hightline: function (element, errorClass, validClass) {
            $(element).addClass("is-invalid".removeClass("is-valid"));
        },
        unhightline: function (element, errorClass, validClass) {
            $(element).addClass("is-valid").removeClass("is-invalid");
        },
        
    });
});
