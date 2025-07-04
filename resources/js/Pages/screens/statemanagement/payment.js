import { defineStore } from 'pinia';
import { ref } from 'vue';
import {toast} from '@steveyuowo/vue-hot-toast';

export const usePaymentMethod = defineStore('usePayment', () => {
  const isLoading = ref(false);


  const StandardPayment = async (id, csrf) => {
    try{

      isLoading.value = true;
        const payload = {
            amount: 2500,
            id: id,
        }
       const response = await axios.post('/initpayment', payload,{
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN' : csrf,
        }
       });
        if(response.status == 200){
            if(response.data.status == "success"){
                console.log('Successful', response.data.message);
                window.location.href = response.data.message;
            }
            else{
                toast.success(response.data.message);
                console.log('Failed', response.data.message);
            }
        }else{
            console.log('Error', response.data.message);
            toast.error('Couldn\'t send parameters');
        }

    }finally{
        isLoading.value = false;
    }

  }


//   Test Public Key: FLWPUBK_TEST-c6b3823fcf70bce240ac6b417d539c01-X
// Test Secret Key: FLWSECK_TEST-68eba459acbc42009bc6bd7ea35e188d-X
// Test Encryption Key: FLWSECK_TESTf5c5ee4e1084

  function makePayment() {
    try {
      isLoading.value = true;
      window.FlutterwaveCheckout({
        public_key: 'FLWPUBK_TEST-c6b3823fcf70bce240ac6b417d539c01-X',
        tx_ref: `titanic-${Date.now()}`,
        amount: 2500,
        currency: 'NGN',
        payment_options: 'card, mobilemoneyghana, ussd',
        redirect_url: 'https://launch.payafricaforart.com/',
        meta: {
          consumer_id: 23,
          consumer_mac: '92a3-912ba-1192a',
        },
        customer: {
          email: 'rose@unsinkableship.com',
          phone_number: '08102909304',
          name: 'Rose DeWitt Bukater',
        },
        customizations: {
          title: 'Safe Africa Foundation',
          description: 'Payment for an awesome cruise',
          logo: 'https://www.logolynx.com/images/logolynx/22/2239ca38f5505fbfce7e55bbc0604386.jpeg',
        },
        callback: function (response) {
          console.log("Payment Response:", response);
          // TODO: You can send response.tx_ref or response.transaction_id to your backend to verify payment
        },
        onclose: function () {
          console.log("Payment modal closed");
        },
      });
    } catch (error) {
      console.error("Flutterwave Init Error:", error);
    } finally {
      isLoading.value = false;
    }
  }

  return {
    makePayment,
    isLoading,
    StandardPayment,
  };
});
