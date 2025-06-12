// import { defineStore } from "pinia";
// import { ref, computed } from "vue";

// export const useTable = defineStore('useTable', () => {
//   const data = ref([]);

//   const setData = (newData) => {
//     data.value = newData || [];
//   };

//   const searchQuery = ref('');
//   const rowsPerPage = ref(5);
//   const currentPage = ref(1);
//   const dropOption = ref([5, 20, 50, 100]);
//   const isLoading = ref(false);

//   const filteredData = computed(() => {
//     if (!data.value) return data.value;
//     if (!searchQuery.value) return data.value;
//     return data.value.filter((item) =>
//       Object.values(item).some((val) =>
//         String(val).toLowerCase().includes(searchQuery.value.toLowerCase())
//       )
//     );
//   });

//   const noResults = computed(() => filteredData.value.length === 0);

//   const paginatedData = computed(() => {
//     const start = (currentPage.value - 1) * rowsPerPage.value;
//     const end = start + rowsPerPage.value;
//     return filteredData.value.slice(start, end);
//   });

//   const totalPages = computed(() => {
//     return Math.ceil(filteredData.value.length / rowsPerPage.value);
//   });

//   const nextPage = () => {
//     if (currentPage.value < totalPages.value) currentPage.value++;
//   };

//   const prevPage = () => {
//     if (currentPage.value > 1) currentPage.value--;
//   };

//   const changevaluestate = () => {
//     currentPage.value = 1;
//   };

//   return {
//     data,
//     setData,
//     searchQuery,
//     rowsPerPage,
//     currentPage,
//     dropOption,
//     isLoading,
//     noResults,
//     prevPage,
//     changevaluestate,
//     nextPage,
//     paginatedData,
//   };
// });
