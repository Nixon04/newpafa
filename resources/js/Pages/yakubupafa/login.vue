<script setup>
    import NavbarBody from '../assets/components/dash/header.vue';
    import ViewModal from '../assets/components/viewModal.vue';
    import {useTable} from '../screens/statemanagement/table.js';
    import {useList} from '../screens/statemanagement/viewlist.js';
    import { usePage } from '@inertiajs/inertia-vue3';
    import { storeToRefs } from 'pinia';
    import { onMounted } from 'vue';
    const { props } = usePage();
    
    const useTableState = useTable();
    const {
    data,
    searchQuery ,
    rowsPerPage,
    currentPage ,
    dropOption,
    isLoading,
    paginatedData,
    noResults,
    } = storeToRefs(useTableState);
    
    const {
    prevPage,
    changevaluestate,
    } = useTableState;

    useTableState.setData(props.data);
    
    
    const useViewState = useList();
    
    const {
        isVisible,
        viewlists,
        datacall,
        general,
        paid,
        totalUsers,
    } =  storeToRefs(useViewState);
    
    const {
        viewListData,
        UnClickActive,
    } = useViewState;



 // ✅ Use props.value
onMounted(() => {
  if (
    props.value?.datacall &&
    props.value?.general &&
    props.value?.paid &&
    props.value?.totalUsers
  ) {
    initFromProps(
      props.value.datacall,
      props.value.general,
      props.value.paid,
      props.value.totalUsers
    );
    console.log('Initialized from props', props.value);
  } else {
    console.warn('Props are missing or undefined:', props.value);
  }
});
    
    </script>
    
    <template>
        <div>
            <ViewModal v-if="isVisible" :UnClickActive="UnClickActive" :viewlists="viewlists" :questionsChart="questionsChart"/>
            <NavbarBody/>
            <div class="dash-main">
                <div class="dash-header">
                  <h1>Hey Yakubu </h1>
                </div>
    
    
                <div class="row gy-1 gx-1">
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="dash-card">
    
                            <div class="dash-icons-flex mb-3">
                               <div class="bash-circle">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><!-- Icon from Solar by 480 Design - https://creativecommons.org/licenses/by/4.0/ --><path fill="currentColor" fill-rule="evenodd" d="M3.955 4.061C3 5.375 3 7.251 3 11v2c0 3.75 0 5.625.955 6.939a5 5 0 0 0 1.106 1.106C6.375 22 8.251 22 12 22s5.625 0 6.939-.955a5 5 0 0 0 1.106-1.106C21 18.625 21 16.749 21 13v-2c0-3.75 0-5.625-.955-6.939a5 5 0 0 0-1.106-1.106C17.625 2 15.749 2 12 2s-5.625 0-6.939.955A5 5 0 0 0 3.955 4.06M7 8.25a.75.75 0 0 0 0 1.5h10a.75.75 0 0 0 0-1.5zm5.586 5.219a.75.75 0 0 0-1.172-.937l-2 2.5A.75.75 0 0 0 10 16.25h2.44l-1.026 1.282a.75.75 0 1 0 1.172.936l2-2.5A.75.75 0 0 0 14 14.75h-2.44z" clip-rule="evenodd"/></svg>
                              </div>
                            </div>
    
                            <div class="dashhead-card mb-2">
                                <span>Total Revenue</span>
                            </div>
                            <div class="dashhead-value">
                                <span class="bash-f1">{{paid ? paid : '0'}}</span>
                            </div>
                        </div>
                    </div>
    
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="dash-card">
    
                            <div class="dash-icons-flex mb-3">
                               <div class="bash-circle">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><!-- Icon from Solar by 480 Design - https://creativecommons.org/licenses/by/4.0/ --><path fill="currentColor" fill-rule="evenodd" d="M3.955 4.061C3 5.375 3 7.251 3 11v2c0 3.75 0 5.625.955 6.939a5 5 0 0 0 1.106 1.106C6.375 22 8.251 22 12 22s5.625 0 6.939-.955a5 5 0 0 0 1.106-1.106C21 18.625 21 16.749 21 13v-2c0-3.75 0-5.625-.955-6.939a5 5 0 0 0-1.106-1.106C17.625 2 15.749 2 12 2s-5.625 0-6.939.955A5 5 0 0 0 3.955 4.06M7 8.25a.75.75 0 0 0 0 1.5h10a.75.75 0 0 0 0-1.5zm5.586 5.219a.75.75 0 0 0-1.172-.937l-2 2.5A.75.75 0 0 0 10 16.25h2.44l-1.026 1.282a.75.75 0 1 0 1.172.936l2-2.5A.75.75 0 0 0 14 14.75h-2.44z" clip-rule="evenodd"/></svg>
                              </div>
                            </div>
    
                            <div class="dashhead-card mb-2">
                                <span>Total Users</span>
                            </div>
                            <div class="dashhead-value">
                                <span class="bash-f1">{{totalUsers}}</span>
                            </div>
                        </div>
                    </div>
    
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="dash-card">
    
                            <div class="dash-icons-flex mb-3">
                               <div class="bash-circle">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><!-- Icon from Solar by 480 Design - https://creativecommons.org/licenses/by/4.0/ --><path fill="currentColor" fill-rule="evenodd" d="M3.955 4.061C3 5.375 3 7.251 3 11v2c0 3.75 0 5.625.955 6.939a5 5 0 0 0 1.106 1.106C6.375 22 8.251 22 12 22s5.625 0 6.939-.955a5 5 0 0 0 1.106-1.106C21 18.625 21 16.749 21 13v-2c0-3.75 0-5.625-.955-6.939a5 5 0 0 0-1.106-1.106C17.625 2 15.749 2 12 2s-5.625 0-6.939.955A5 5 0 0 0 3.955 4.06M7 8.25a.75.75 0 0 0 0 1.5h10a.75.75 0 0 0 0-1.5zm5.586 5.219a.75.75 0 0 0-1.172-.937l-2 2.5A.75.75 0 0 0 10 16.25h2.44l-1.026 1.282a.75.75 0 1 0 1.172.936l2-2.5A.75.75 0 0 0 14 14.75h-2.44z" clip-rule="evenodd"/></svg>
                              </div>
                            </div>
    
                            <div class="dashhead-card mb-2">
                                <span>Paid</span>
                            </div>
                            <div class="dashhead-value">
                                <span class="bash-f1">{{paid ? '' : '0'}}</span>
                            </div>
                        </div>
                    </div>
    
    
                </div>
    
                <div class="d-flex justify-content-between px-6">
                    <div class="d-flex">
                        <div class="form-input">
                            <input type="text" class="form-control py-2" v-model="searchQuery"  placeholder="Search...">
                        </div>
                    </div>
           
                    <div class="d-flex gap-4">
                        <div class="form-input">
                            <select v-model="rowsPerPage"  class="form-select py-2" @change="changevaluestate" >
                                <option v-for="option in dropOption" :key="option" :value="option">{{ option }}</option>
                            </select>
                        </div>
                        <div class="meal-form-button">
                            <button @click="ShowCenterModel(item)" class="togglebutton btn bg-button-submit py-3 text-sm">Message</button>
                        </div>
                    </div>
                </div>
    
                <!-- table -->
          
    
                <div class="table-responsive text-nowrap">
                    <table class="table">
                     <thead>
                        <tr>
                        <th>Category Name</th>
                        <th>Phone Contact</th>
                        <th>Email Address</th>
                        <th>Members </th>
                        <th>Issued_date </th>
                        <th>Status</th>
                        <th>Action </th>
    
                        </tr>
                    </thead>
                    <tbody>
    
    
                        <tr v-if="noResults" class="text-center">
                          <td colspan="9 fw-bold">Sorry Pafa Couldn't find any values in respect to your data</td>
                        </tr>
                        <tr v-for="(item, index) in paginatedData" :key="index.id">
                         <td v-if="noResults">No data found  </td>
                          <td>  <span class="fw-medium">{{item.fullname}}</span></td>
                          <td>  <span class="fw-medium">{{item.contact}}</span></td>
                          <td>  <span class="fw-medium">{{item.email}}</span></td>
                          <td>  <span class="fw-medium">{{item.members == 0 ? 'No' : item.members}} Member(s)</span></td>
                          <td>  <span class="fw-medium">{{item.reg_date}}</span></td>
    
                          <td>  <span :class="{
                            'bg-rx-success rounded-md p-2 bg-success-text' : item.paid == '1',
                            'bg-rx-pending rounded-md p-2': item.paid  == '0'
                          }">{{item.paid == "1" ? "Paid" : "Unpaid"}}</span></td>
    
                          <td>
                            <a @click="viewListData(item)" class="cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><!-- Icon from Solar by 480 Design - https://creativecommons.org/licenses/by/4.0/ --><g fill="none" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" d="M22 10.5V12c0 4.714 0 7.071-1.465 8.535C19.072 22 16.714 22 12 22s-7.071 0-8.536-1.465C2 19.072 2 16.714 2 12s0-7.071 1.464-8.536C4.93 2 7.286 2 12 2h1.5"/><path d="m16.652 3.455l.649-.649A2.753 2.753 0 0 1 21.194 6.7l-.65.649m-3.892-3.893s.081 1.379 1.298 2.595c1.216 1.217 2.595 1.298 2.595 1.298m-3.893-3.893L10.687 9.42c-.404.404-.606.606-.78.829q-.308.395-.524.848c-.121.255-.211.526-.392 1.068L8.412 13.9m12.133-6.552l-5.965 5.965c-.404.404-.606.606-.829.78a4.6 4.6 0 0 1-.848.524c-.255.121-.526.211-1.068.392l-1.735.579m0 0l-1.123.374a.742.742 0 0 1-.939-.94l.374-1.122m1.688 1.688L8.412 13.9"/></g></svg>
                            </a>
                          </td>
                  </tr>
           </tbody>
        </table>
    </div>
    
    
    
            </div>
        </div>
    </template>