$('.item-select').on('click', function(){
    if($(this).hasClass('bg-red-400')){
        $('.total_price').html(`Layanan sedang tidak aktf`)
    } else {
        $('#product').val($(this).data('name'))
        $('#code').val($(this).data('code'))
        $('#price').val($(this).data('price'))
        const price = $(this).data('price')
        const numb = price
        const format = numb.toString().split('').reverse().join('');
        const convert = format.match(/\d{1,3}/g);
        const rupiah = convert.join('.').split('').reverse().join('')
        $('.total_price').html(`Rp. ${rupiah}`)
    }
})

$('.payment-select').on('click', function(){
    $('#payment').val($(this).data('payment'))
    $('#payment').data('name', $(this).data('name'))
})

$('#open-bar').on('click', function(){
    $('#main-navbar').removeClass('items-center')
    $('#open-bar').addClass('hidden')
    $('#list').removeClass('hidden')
})

$('#close-bar').on('click', function(){
    $('#main-navbar').addClass('items-center')
    $('#open-bar').removeClass('hidden')
    $('#list').addClass('hidden')
})

$('#check_form').on('click', function(){
    const first = $('#first').val()
    const item = $('#product').val()
    const price = $('#price').val()
    const payment = $('#payment').data('name')
    let sec = $('#second').val()
    if(sec == undefined){
        sec = ' '
    }

    if(first == '' || sec == '' || item == '' || payment == ''){
        Swal.fire({
            icon: 'error',
            text: 'Form tidak lengkap',
          })
    } else {
        Swal.fire({
            title: 'Periksa data anda',
            html: `
                <div class="text-left">
                    <span class="block text-left">Nomor Pelanggan : ${first} ${sec}</span>
                    <span class="block text-left">Data : ${item}</span>
                    <span class="block text-left">Harga : ${price}</span>
                    <span class="block text-left">Metode Pembayaran : ${payment}</span>
                    <span class="block text-left">Note : Harga di atas belum termasuk biaya admin</span>
                </div>
            `,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Submit'
          }).then((result) => {
            if (result.isConfirmed) {
              $('#form_order').submit()
            }
        })
    }

})


