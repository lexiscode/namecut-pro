const paymentForm = document.getElementById('paymentForm');
paymentForm.addEventListener("submit", payWithPaystack, false);

function payWithPaystack(e) {
  e.preventDefault();

  let handler = PaystackPop.setup({
      key: 'pk_test_0081bf76010634cfee737a880c232e38625f2c60', // {{ env('PAYSTACK_PUBLIC_KEY') }} your public key
      email: 'nwokoriealex20@gmail.com', // put the {{ auth()->user()->email  }}
      amount: 200000, // 2000 * 100 (default number)
      onClose: function () {
          alert("Window closed.");
      },
      callback: function (response) {
          //let message = "Payment complete! Reference: " + response.reference;
          //alert(message);
          window.location.href="/callback" + response.redirecturl; // "{{ route('callback') }}"
      },
  });

  handler.openIframe();
}
