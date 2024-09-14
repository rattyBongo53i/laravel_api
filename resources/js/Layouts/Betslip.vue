<template>
    <div class="bet-slip-sidenav  text-center mx-auto  default-color mb-5 p-2 rounded-2xl">
         <div class="flex-col justify-end items-center  rounded-2xl">
         <div class="flex justify-between text-white text-lg bg-black mb-0 py-2 rounded-t-2xl">
        <span class="ml-4">Matches  </span>
             <span class="text-center  mx-auto rounded-full w-12 bg-yellow-400 text-white">
            4
            </span> 
        </div>
        <div class="flex justify-between py-2 default-color">
            <span class="ml-4">View betslip </span>
            <span class="flex items-center  text-green-400 ">
                <a href="#take_me_to-betslip">
                <i class="material-icons opacity-10">visibility</i>
            </a>
        </span>
        </div>
                  <!-- for loop here to loop through current predictions -->
        <div class="flex-col text-white text-sm default-color mt-2 py-2 px-1">
            <div class="flex items-center mx-auto ">
                <div class="flex-col items-center text-sm  w-full  text-white text-fond">
                        <div class="flex justify-between items-center mx-auto">
                            <span class="mr-2 ">home win</span>  
                            <span class="mr-2">3.0</span>
                        </div>
                        <div class="flex-col items-center text-white text-sm ">
                        <div class="flex justify-between text-xs">
                            <span class="mr-2"> man u </span>
                            <span class="ml-2"> vs </span>
                            <span class=""> chelsea </span>
                        </div>
                     </div>
                        <div class="flex justify-between items-center text-white text-sm mt-1">
                            <div class="text-white  mr-2 ">Bet Type: </div>
                        <div class="flex ">home win</div>
                     </div>
                    <div class="px-1 py-2  flex justify-between items-center">
                        <div class=" form-check form-switch text-xs  mr-4 ">
                            <input class="form-check-input text-xs" type="checkbox" id="flexSwitchCheckDefault2" checked>
                        </div>
                     
                       <div class="">
                        <form action="#" method="POST">
                            <input class="hidden btn btn-sm btn-outline-danger" type="submit" value="Delete" />

                            <i class="material-icons mr-1 cursor-pointer text-red-500 flex  justify-end delete-item">delete</i>
                        </form>
                       </div>
                      
                    </div> 
                    
           
                   </div>
            </div>
        </div>
        <!-- end for loop -->

                <div class="flex-col slip rounded-2xl shadow-2xl">
             <div class="flex items-center  w-full text-sm text-white text-fond px-2 mx-auto  mt-2"> 
                <div class="  flex  items-center mx-auto py-2">
                    <div class="input-group input-group-outline">
                      <label class="form-label">Wager amount...</label>
                      <input type="text" class="form-control" id="wagerAmount">
                    </div>
                  </div>
             </div> 
        
           
                <div class=" text-center mx-auto mt-2">
            
                <a href="#" type="buttom" class=" btn btn-block btn-success  text-white">Submit</a>
                </div>
            </div>
    </div>
    </div>
</template>

<script>
export default {
name: 'Betslip',

}

</script>

<style>

.bet-slip-sidenav{
    top: 20;
    /* bottom:0; */
    right: .8rem;
    position:fixed;
    overflow-y:scroll;
    overflow-x:hidden;
    margin-left: 10px;
    width: 15rem;
    /* color: black;
    background-image: linear-gradient(120deg,  #d1ba80, #bc9945); */
}
</style>