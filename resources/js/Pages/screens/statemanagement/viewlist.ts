import { defineStore } from "pinia";
import { ref, computed } from 'vue';
import { toast } from "@steveyuowo/vue-hot-toast";
import axios from "axios";

export const useList = defineStore('useListbody', () => {
    const data = ref([]);
    const datacall = ref([]);
    const general = ref('');
    const paid = ref('');
    const totalUsers = ref('');

    const isVisible = ref(false);
    const viewlists = ref([]);


    const setData = (newData:any) => {
      data.value = newData || [];
    };
  

    const searchQuery = ref('');
    const rowsPerPage = ref(5);
    const currentPage = ref(1);
    const dropOption = ref([5, 20, 50, 100]);
    const isLoading = ref(false);

    

    const initFromProps = (first: never[], second: string, third: string, forth: string) => {
        datacall.value = first || [];
        general.value = second || '';
        paid.value = third || '';
        totalUsers.value = forth || '';
        console.log('Paid: ', paid);
    }


    const viewListData = async (item:any) => {
        const payload = { itemvalue: item };
        isVisible.value = true;
        try {
            const response = await axios.post('/viewuserslists', payload);
            if (response.status === 200) {
                viewlists.value = response.data.message;
                console.log('View List', viewlists.value);
            } else {
                toast.error('Not successful, please contact developer');
                console.log('Not successful');
            }
        } catch (e) {
            console.log('Error', e);
        }
    };

    const UnClickActive = () => {
        isVisible.value = false;
    };


    const filteredData = computed(() => {
      if (!data.value) return data.value;
      if (!searchQuery.value) return data.value;
      return data.value.filter((item) =>
        Object.values(item).some((val) =>
          String(val).toLowerCase().includes(searchQuery.value.toLowerCase())
        )
      );
    });
  
    const noResults = computed(() => filteredData.value.length === 0);
  
    const paginatedData = computed(() => {
      const start = (currentPage.value - 1) * rowsPerPage.value;
      const end = start + rowsPerPage.value;
      return filteredData.value.slice(start, end);
    });
  
    const totalPages = computed(() => {
      return Math.ceil(filteredData.value.length / rowsPerPage.value);
    });
  
    const nextPage = () => {
      if (currentPage.value < totalPages.value) currentPage.value++;
    };
  
    const prevPage = () => {
      if (currentPage.value > 1) currentPage.value--;
    };
  
    const changevaluestate = () => {
      currentPage.value = 1;
    };
  



    return {
        initFromProps,
        viewListData,
        UnClickActive,
        isVisible,
        viewlists,
        datacall,
        general,
        paid,
        totalUsers,
        data,
        setData,
        searchQuery,
        rowsPerPage,
        currentPage,
        dropOption,
        isLoading,
        noResults,
        prevPage,
        changevaluestate,
        nextPage,
        paginatedData,
    };
});


