import {defineStore} from 'pinia';
import {ref} from 'vue';

export const useChangeState = defineStore('usechange', () => {
 const isfilltap = ref("");


 const changeStatePolicy = (item) => {
    isfilltap.value = item;
    console.log('Changestate', isfilltap);
 }

 return {
    changeStatePolicy,
    isfilltap,
 }
});