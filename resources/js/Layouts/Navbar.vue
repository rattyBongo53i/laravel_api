<template>
<div>
        <nav class="flex w-full h-10 py-2 px-2 items-center mx-auto default-color rounded">
        <div class="flex justify-between items-center p-2 mx-auto w-full">
            <div class="ml-10" @click="toggleSidebar()">
                <!-- right -->
                <span class="material-icons-outlined text-white cursor-pointer">menu</span>
                </div>
                
                <!-- left -->
                  <div>

                  </div>
        </div>
    </nav>
    <div>
   <aside class="this-sidebar transition ease-in duration-300 sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 default-color-dark " id="sidenav-main" style="top: -1rem;">
   <div class="sidenav-header">
    <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
    <a class="navbar-brand text-center mx-auto " href="#" @click="toggleSidebar()" id="close-sidebar">
      <div class="flex justify-between">
          <img src="assets/img/favicon-light.png" width="40" class="navbar-brand-img  rounded-3xl" alt="main_logo">
      <span class="ms-1 font-weight-bold text-white material-icons-outlined">  close </span>
    </div> 
  </a>
  </div>
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
      <ul class="navbar-nav">
 
        <li class="nav-item">
        <a href="#" class="nav-link flex items-center ">
         <jet-nav-link :href="route('bet.index')" :active="route().current('bet.index')" class="w-full flex justify-between items-center text-white">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">analytics</i></div>
          <div><span class="nav-link-text ms-1 text-white">Analytics</span></div>
         </jet-nav-link>
        </a>
        </li>
        <li class="nav-item">
        <a href="#" class="nav-link flex items-center ">
         <jet-nav-link :href="route('bet.stake')" :active="route().current('bet.stake')" class="w-full flex justify-between items-center text-white">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">money</i></div>
          <div><span class="nav-link-text ms-1 text-white">Place New Bet</span></div>
         </jet-nav-link>
        </a>
        </li>
        <li class="nav-item">
        <a href="#" class="nav-link flex items-center ">
         <jet-nav-link :href="route('bet.slips')" :active="route().current('bet.slips')" class="w-full flex justify-between items-center text-white">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">edit</i></div>
          <div><span class="nav-link-text ms-1 text-white">Edit Betslip</span></div>
         </jet-nav-link>
        </a>
        </li>
        <li class="nav-item">
        <a href="#" class="nav-link flex items-center ">
         <jet-nav-link :href="route('bet.slips')" :active="route().current('bet.slips')" class="w-full flex justify-between items-center text-white">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">visibility</i></div>
          <div><span class="nav-link-text ms-1 text-white">All Bets</span></div>
         </jet-nav-link>
        </a>
        </li>
      
      </ul>
    </div>
    <!-- sign out -->
      <div class="sidenav-footer position-absolute w-full bottom-4 " >
        <form method="POST" @submit.prevent="logout">
        <div class="mx-3">
     <jet-responsive-nav-link as="button" class="-mt-2 cursor-pointe bg-green-500 rounded-2xl">
            Log Out
      </jet-responsive-nav-link>
    </div>
    </form>
    </div>
</aside>
</div>


</div>
</template>

<script>
import JetNavLink from '@/Jetstream/NavLink.vue'
import JetResponsiveNavLink from '@/Jetstream/ResponsiveNavLink.vue'
import { Head, Link } from '@inertiajs/inertia-vue3';



export default {
name: 'Navbar',
      components: {
            JetNavLink,
            JetResponsiveNavLink,
            Link,
        },

        data() {
            return {
                showingNavigationDropdown: false,
            }
        },
 
      methods: {
        toggleSidebar(){
            console.log("toggle sidebar")
            const sidebar = document.querySelector(".this-sidebar");
              sidebar.classList.toggle("sidebar-slide-in");
        },
          toggleSidebarOut(){
              console.log("toggle sidebar out")
              const sidebar = document.querySelector(".this-sidebar");
                  sidebar.classList.remove("-x-translate-full");
                  sidebar.classList.toggle("sidebar-slide-out");
          },
     
          logout() {
                      this.$inertia.post(route('logout'));
                  },

 }


}
</script>

<style >
.main-logout-btn{
  color:black; background-image: linear-gradient(120deg,  #d1ba80, #bc9945);
  width: 100%;
}


</style>