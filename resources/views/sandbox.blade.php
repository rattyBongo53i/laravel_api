<div>
    <nav className="flex w-full h-10 py-2 px-2 items-center mx-auto default-color rounded">
    <div className="flex justify-between items-center p-2 mx-auto w-full">
        <div className="ml-10" onClick={()=> toggleSidebar()}">
            <!-- right -->
            <span className="material-icons-outlined text-white cursor-pointer">menu</span>
            </div>
            
            <!-- left -->
              <div>

              </div>
    </div>
</nav>
<div>
<aside className="this-sidebar transition ease-in duration-300 sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 default-color-dark " id="sidenav-main" style="top: -1rem;">
<div className="sidenav-header">
<i className="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
<a className="navbar-brand text-center mx-auto " href="#" @click="toggleSidebar()" id="close-sidebar">
  <div className="flex justify-between">
      <img src="assets/img/favicon-light.png" width="40" className="navbar-brand-img  rounded-3xl" alt="main_logo">
  <span className="ms-1 font-weight-bold text-white material-icons-outlined">  close </span>
</div> 
</a>
</div>
<div className="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
  <ul className="navbar-nav">

    <li className="nav-item">
    <a href="#" className="nav-link flex items-center ">
     <jet-nav-link :href="route('bet.index')" :active="route().current('bet.index')" className="w-full flex justify-between items-center text-white">
      <div className="text-white text-center me-2 d-flex align-items-center justify-content-center">
          <i className="material-icons opacity-10">analytics</i></div>
      <div><span className="nav-link-text ms-1 text-white">Analytics</span></div>
     </jet-nav-link>
    </a>
    </li>
    <li className="nav-item">
    <a href="#" className="nav-link flex items-center ">
     <jet-nav-link :href="route('bet.stake')" :active="route().current('bet.stake')" className="w-full flex justify-between items-center text-white">
      <div className="text-white text-center me-2 d-flex align-items-center justify-content-center">
          <i className="material-icons opacity-10">money</i></div>
      <div><span className="nav-link-text ms-1 text-white">Place New Bet</span></div>
     </jet-nav-link>
    </a>
    </li>
    <li className="nav-item">
    <a href="#" className="nav-link flex items-center ">
     <jet-nav-link :href="route('bet.slips')" :active="route().current('bet.slips')" className="w-full flex justify-between items-center text-white">
      <div className="text-white text-center me-2 d-flex align-items-center justify-content-center">
          <i className="material-icons opacity-10">edit</i></div>
      <div><span className="nav-link-text ms-1 text-white">Edit Betslip</span></div>
     </jet-nav-link>
    </a>
    </li>
    <li className="nav-item">
    <a href="#" className="nav-link flex items-center ">
     <jet-nav-link :href="route('bet.slips')" :active="route().current('bet.slips')" className="w-full flex justify-between items-center text-white">
      <div className="text-white text-center me-2 d-flex align-items-center justify-content-center">
          <i className="material-icons opacity-10">visibility</i></div>
      <div><span className="nav-link-text ms-1 text-white">All Bets</span></div>
     </jet-nav-link>
    </a>
    </li>
  
  </ul>
</div>
<!-- sign out -->
  <div className="sidenav-footer position-absolute w-full bottom-4 " >
    <form method="POST" @submit.prevent="logout">
    <div className="mx-3">
 <jet-responsive-nav-link as="button" className="-mt-2 cursor-pointe bg-green-500 rounded-2xl">
        Log Out
  </jet-responsive-nav-link>
</div>
</form>
</div>
</aside>
</div>


</div>

<script>
         toggleSidebar(){
            console.log("toggle sidebar")
            const sidebar = document.querySelector(".this-sidebar");
              sidebar.classList.toggle("sidebar-slide-in");
        },
</script>