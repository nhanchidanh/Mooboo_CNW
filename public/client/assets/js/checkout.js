// let summoney = document.querySelector('.summoney');
let formPayment = document.querySelector('#form');
console.log(formPayment);

//vnpay

const vn_pay = document.querySelector('.vn_pay');
const form_vn_pay = document.querySelector('#submit_vnpay');
console.log(form_vn_pay)
vn_pay.addEventListener('click', function (e) {
    e.preventDefault();
    //goi ajax
    const pttt = 'Vnpay';
    const fullname = formPayment.querySelector('input[name="fullname"]').value;
    console.log(fullname);
    const email = formPayment.querySelector('input[name="email"]').value;
    console.log(email);
    const phone = formPayment.querySelector('input[name="phone"]').value;
    console.log(phone);
    const address = formPayment.querySelector('input[name="address"]').value;
    console.log(address);
    const note = formPayment.querySelector('#note').value;
    console.log(note);
    const total = formPayment.querySelector('input[name="total"]').value;
    console.log(total);
    // let redirect = formPayment.dataset.url;

    $.ajax({
        type: "POST",
        url: formPayment.getAttribute('action'),
        data: {
            method: pttt,
            fullname,
            email,
            phone,
            address,
            note,
            total,
            add_bill: 'add_bill'
        },
        dataType: "text",
        success: function (data) {
            form_vn_pay.submit();
            
            console.log(data);

        },
        error: function (e) {
            console.log(e);
        },
    });




})