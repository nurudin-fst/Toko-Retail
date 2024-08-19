function numThousand(x) {
  return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}

let addCart = document.querySelector("#addCart");

cartsum();
// stok();

$(document).on("click", "#addCart", function (e) {
  e.preventDefault();

  var data = {
    'noFaktur': $('#noFaktur').val(),
    'barcode': $('#barcode').val(),
    'namaBarang': $('#namaBarang').val(),
    'hrgJual': $('#hrgJual').val(),
    'qty': $('#qty').val(),
    'status': $('#status').val(),
    'kdUser': $('#kdUser').val()
  }
  console.log(data);

  if (data.kdUser == '') {
    $('#message').html('');
    $('#message').append('<div class="mb-4 flex rounded-lg bg-red-100 p-4 text-sm text-red-700 dark:bg-red-200 dark:text-red-800" role="alert">\
            <svg aria-hidden="true" class="mr-3 inline h-5 w-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"\
                                                                                  xmlns="http://www.w3.org/2000/svg">\
            <path fill-rule="evenodd"\
            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"\
                                                                                      clip-rule="evenodd"></path>\
        </svg>\
        <span class="sr-only">Info</span>\
        <div>\
          <ul>\
            Login terlebih dahulu\
          </ul>\
        </div>\
        </div > ');
  }

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $.ajax({
    type: "POST",
    url: "{{ route('order.store') }}",
    data: data,
    dataType: "json",
    success: function (response) {
      cartsum();
      stok();
      if (response) {
        $('#success').html('');
        $('#success').append('<div id="alert-3" class="mb-4 flex rounded-lg bg-green-100 p-4 dark:bg-green-200" role="alert">\
                  <svg aria-hidden="true" class="h-5 w-5 flex-shrink-0 text-green-700 dark:text-green-800" fill="currentColor"\
                      viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">\
                      <path fill-rule="evenodd"\
                          d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"\
                          clip-rule="evenodd"></path>\
                  </svg>\
                  <span class="sr-only">Info</span>\
                  <div class="ml-3 text-sm font-medium text-green-700 dark:text-green-800">\
                      Barang berhasil ditambah ke keranjang\
                  </div>\
                  </div>')
      }
    }
  })

});

function cartsum() {
  $.ajax({
    type: "GET",
    url: "/cartsum",
    dataType: "json",
    success: function (response) {
      $('#cartsum').html('');
      $('#cartsum').append('<a href="/cart" class="flex">\
                                                <i class="fa-solid fa-cart-shopping"></i>\
                                                <span class="z-10 order-1 text-blue-600" id="cartsum">' +
        response
          .cartsum + '</span>\
                                            </a>')
    },
  })
}

function stok() {
  $.ajax({
    type: "GET",
    url: "/product/{product:slug}",
    dataType: "json",
    success: function (response) {
      $('#stok').html('');
      $('$stok').append('<p class="mb-3 text-sm text-slate-600">\
                                              Stok : <span>{{ $product->stok }}</span>\
                                              </p>')
    }
  })
}


}); //end document
