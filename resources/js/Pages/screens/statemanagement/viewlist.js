// import { defineStore } from "pinia";
// import { ref } from 'vue';
// import { toast } from "@steveyuowo/vue-hot-toast";
// import axios from "axios";

// export const useList = defineStore('useList', () => {
//     const datacall = ref([]);
//     const general = ref('');
//     const paid = ref('');
//     const totalUsers = ref('');

//     const initFromProps = (first, second, third, forth) => {
    
//         datacall.value = first || [];
//         general.value = second || '';
//         paid.value = third || '';
//         totalUsers.value = forth || '';
//         console.log('Paid: ', paid);
//     }

//     const isVisible = ref(false);
//     const isLoading = ref(false);
//     const viewlists = ref([]);

//     const viewListData = async (item) => {
//         const payload = { itemvalue: item };
//         isVisible.value = true;
//         try {
//             const response = await axios.post('/viewuserslists', payload);
//             if (response.status === 200) {
//                 viewlists.value = response.data.message;
//                 console.log('View List', viewlists.value);
//             } else {
//                 toast.error('Not successful, please contact developer');
//                 console.log('Not successful');
//             }
//         } catch (e) {
//             console.log('Error', e);
//         }
//     };

//     const UnClickActive = () => {
//         isVisible.value = false;
//     };

//     return {
//         initFromProps,
//         viewListData,
//         UnClickActive,
//         isVisible,
//         viewlists,
//         datacall,
//         general,
//         paid,
//         totalUsers,
//     };
// });
