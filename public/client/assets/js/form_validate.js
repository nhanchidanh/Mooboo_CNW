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
            fullname: "required",
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
            address: "required",
            phone: "required",
            agree: "required"
        },
        messages: {
            firstname: "Please enter a firstname",
            lastname: "Please enter a lastname",
            fullname: "Please enter a fullname",
            username: {
                required: "Please enter a username",
                minlength: "Username must have at least 2 characters"
            },
            password: {
                required: "Please enter a password",
                minlength: "Password must have at least 2 characters"
            },
            email: {
                required: "Please enter a email address",
                email: "Invalid email format"
            },
            address: "Vui lòng nhập đầy đủ địa chỉ",
            phone: "Vui lòng nhập SĐT",
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
