window.addEventListener('load', function () {
    // let summoney = document.querySelector('.summoney');
    let formPayment = document.querySelector('#form');
    console.log(formPayment);

    //vnpay

    const vn_pay = document.querySelector('.vn_pay');
    const form_vn_pay = document.querySelector('#submit_vnpay');
    console.log(form_vn_pay)
    vn_pay?.addEventListener('click', function (e) {
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

        if (!fullname || !phone || !email || !address || !total) {
            alert("Thông tin chưa hợp lệ!!!")
        } else {
            const data_payment = {
                method: "Vn_pay",
                fullname,
                email,
                phone,
                address,
                note,
                total,
                add_bill: 'add_bill'
            }
            localStorage.setItem('data_payment', JSON.stringify(data_payment));

            localStorage.setItem('url_payment', JSON.stringify(formPayment.getAttribute('action')));
            form_vn_pay.submit();


        }
        // $.ajax({
        //     type: "POST",
        //     url: formPayment.getAttribute('action'),
        //     data: {
        //         method: pttt,
        //         fullname,
        //         email,
        //         phone,
        //         address,
        //         note,
        //         total,
        //         add_bill: 'add_bill'
        //     },
        //     dataType: "text",
        //     success: function (data) {
        //         form_vn_pay.submit();

        //         console.log(data);

        //     },
        //     error: function (e) {
        //         console.log(e);
        //     },
        // });




    })
    const success_vnpay = document.querySelector('.success_vnpay');
    if (success_vnpay) {
        const data_payment = JSON.parse(localStorage.getItem('data_payment'));
        const url = JSON.parse(localStorage.getItem('url_payment'));
        if (data_payment && url) {
            $.ajax({
                type: "POST",
                url: url,
                data: data_payment,
                dataType: "text",
                success: function (data) {
                    localStorage.removeItem('.data_payment');
                    localStorage.removeItem('.url_payment');

                    console.log('thanh cong');

                },
                error: function (e) {
                    console.log(e);
                },
            });
        }
    }
})
