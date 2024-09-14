<template>
<div class="h-screen default-color-dark">
 
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    
    <Navbar />
    <Betslip />
       
    <div class="text-center mx-auto border-radius-lg  rounded-3xl px-1 default-color-dark p-4" style="height:94vh ; width:55%">
        <div class="w-full flex-col items-center mx-auto">
        <div class="col flex-col items-center">
        <div class="flex items-center  mt-4 mb-2">
        <div class="input-group mb-3">
        <!-- <input type="text" @keyup.enter="getMatchOdds()" v-model="matchUrl"  class="form-control text-gray-900 bg-white" placeholder="enter match url"> -->
        </div>
        <!-- <a href="#" type="button" @click="getMatchOdds()"  class="ml-2 btn btn-outline-success">enter</a> -->
        </div>
     

        <div class="hidden spinner-container ">
            <div class="spinner"></div>
        </div>
        <div class="hidden h-10 w-full ">
        <p class="flex justify-start items-start text-white text-lg ml-2 font-bold -mb-1 "> Match (1x2) </p>
        </div>
        <div class="transition ease-in duration-600 makeBet hidden justify-around  items-center w-full  ">
            <div class="w-1/3 h-10 bg-green-400 hover:bg-green-600 text-white rounded mr-2">
            <!-- <a href="#" @click="SendToBet(match.home, match.away)" class="flex justify-between px-2 "> -->
            <span class="text-white">Man United</span>
            <span class="text-white">2.30</span>
            <!-- </a> -->
            </div>
            <div class="h-10 w-1/3 bg-green-400 hover:bg-green-600 text-white rounded  mr-2">
            <a href="#" class="flex justify-between px-2 ">
                <span class="text-white">Draw</span>
                <span class="text-white">3.30</span>
            </a>
            </div>
            <div class="h-10 rounded w-1/3 bg-green-400 hover:bg-green-600 text-white ">
            <a href="#" class="flex justify-between px-2">
            <span class="text-white">Chelsea</span>
            <span class="text-white">1.30</span>
            </a>
        </div>
        </div>
        </div>

               <div class="makeBet hidden transition ease-in duration-600 col flex-col items-center">
        <div class="h-10 w-full ">
        <p class="flex justify-start items-start text-white text-lg ml-2 font-bold -mb-1 "> Double Chance </p>
        </div>
        <div class="flex justify-around  items-center w-full  ">
            <div class="w-1/3 h-10 bg-green-400 hover:bg-green-600 text-white rounded mr-2">
            <a href="#" class="flex justify-between px-2 ">
            <span class="text-white">Man United</span>
            <span class="text-white">2.30</span>
            </a>
            </div>
            <div class="h-10 w-1/3 bg-green-400 hover:bg-green-600 text-white rounded  mr-2">
            <a href="#" class="flex justify-between px-2 ">
                <span class="text-white">Draw</span>
                <span class="text-white">3.30</span>
            </a>
            </div>
            <div class="h-10 rounded w-1/3 bg-green-400 hover:bg-green-600 text-white ">
            <a href="#" class="flex justify-between px-2">
            <span class="text-white">Chelsea</span>
            <span class="text-white">1.30</span>
            </a>
        </div>
        </div>
        </div>

        </div>
    </div>

</div>

</template>

<script>
import Navbar from '@/Layouts/Navbar'
import Betslip from '@/Layouts/Betslip'

export default {
name : 'App',
     components: {
            Navbar,
            Betslip,
     },

    data() {
        return {
                match: {
                match_id: '',
                home: '',
                away: '',
                league: '',
                start_time: '',
                odds: [],
               
                },
                 matchUrl: '',
        }
    },
    methods: {
        /*
        getMatchData(match_id) {
             console.log("retrieving  matchData...!")
                        axios.post('api/game', {
                            match_id : match_id,
                        })
                        .then(response => {
                          console.log(response);
                        }).catch(error => {
                         console.log(error);
                        })
        },
        bet() {
            axios.post('/api/bet', this.match)
            .then(response => {
                console.log(response);
            })
            .catch(error => {
                console.log(error);
            })
        },
        SendToBet(home, away) {
            console.log("sending to betslip cors")
            console.log(home, away)
            /*
            axios.get('http://localhost:8888/api/odds/')
            .then((response) =>{
                    console.log(response.data)
                    this.match.home = response.data.matches.home;
                    this.match.away = response.data.matches.away;
                    console.log(this.match.home)
                    console.log("vs")
                    console.log(this.match.away)
        
                })
                .catch((err) => {
                    console.log(err)
                            })
                            *
                },
             loader(){
                    const spinner = document.querySelector('.spinner-container');
                    spinner.classList.remove('flex');
                    spinner.classList.add('hidden');

                    const matchGame = document.querySelectorAll('.makeBet');
                    //remove hidden class all
                    matchGame.forEach(function(item){
                        item.classList.remove('hidden');
                        item.classList.add('flex');
                    })
                   
                },

            getMatchOdds(){
                //  alert(this.matchUrl)
                const matchGame = document.querySelectorAll('.makeBet');
            //remove hidden class all
                        matchGame.forEach(function(item){
                        item.classList.add('hidden');
                        item.classList.remove('flex');
                 })
                const spinner = document.querySelector('.spinner-container');
                spinner.classList.remove('hidden');
                spinner.classList.add('flex');
                

               if ( this.matchUrl == '' ){
                console.log("enter site url")
                 return 
               }
               console.log("getting match data ....!")
               axios.post('https://game-odds-prediction.herokuapp.com/api/match-data', {
                 'url':  this.matchUrl
                 }).then(response => {
                         this.loader();
                          console.log(response.data)
                        //   this.match.home = response.data.home;
                        //     this.match.away = response.data.away;
                        //     console.log(this.match.home)
                         this.sendMatchData(response.data);

                    }).catch(error => {
                        console.log(error)
                     })
                },

            sendMatchData(matchData){
                    console.log("sending matchData...!")
           
                 
                        axios.post('api/gameOdds', {
                            match_id : matchData.match_id,
                            home : matchData.home,
                            away : matchData.away,
                            league : matchData.league,
                            start_time : matchData.start_time,
                            odds : matchData.odds
                        })
                        .then(response => {
                          console.log(response);
                           this.getMatchData(matchData.match_id);
                        }).catch(error => {
                         console.log(error);
                        })
                    
                },
                */
          
    },

    created() {

    console.log('app created');
    // this.fetchMatchOdds();
    // this.test();
    },
}

</script>

<style>
    .default-color{
    background-color:  #201f1f67;
    color: white;
    }
    .default-color-dark{
        background-color: #0a0a0ae8;
        color: white;
    }
</style>