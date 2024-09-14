<template>
<div class="h-screen default-color-dark">
 
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    
    <Navbar />
    <Betslip />
    <div class="mt-4 m-2 p-2 text-center mx-auto" style="width:70vw; height:70vh">
        <div class="text-center mx-auto default-color">
            <div class="text-center mx-auto p-2 flex justify-between items-center " style="width: 60vw;">
            <div class="w-1/3 h-10 bg-green-400 hover:bg-green-600 text-white rounded mr-2">
            <a href="#"  class="flex justify-between px-2 ">
            <span class="text-white">Get Game Data</span>
            <span class="text-white">2.30</span>
            </a>
            </div>
            <div class="h-10 w-1/3 bg-green-400 hover:bg-green-600 text-white rounded  mr-2">
            <a href="#" class="flex justify-between px-2 ">
                <span class="text-white">test api</span>
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
                match_id: 1,
                slip_id: 2,
                home: '',
                away: '',
                betType: '',
                },
                GameUrl: '',

                matchData: [],
        }
    },
    methods: {
    /*
        getMatchOdds : async () => {
            alert('await matchData')
            try{
                let response = await axios.post('http://localhost:4000/api/match-data', {
                url : 'https://www.betway.com.gh/sport/soccer/int/uefa_nations_league/england-v-germany/0?datefilter=202209261845',
            })
            const GameData = await response.json()
            console.log('awaiting matchData')
            console.log(GameData)


            }catch(err ){
                console.log(err)
            }

         },

         testMatchApi : async () => {
            try{
                alert('test api')
                let res = await axios.post('/api/match/test', {
                    url : "missing url here"
                })
                const result = res.json()
                console.log(result)
                }catch(err ){
                console.log(err)
            }
         },

        getGamaData(){
            alert("Game")
            const url = 'http://localhost:4000/api/match-data';
            // let matchUrl = 'https://www.betway.com.gh/sport/soccer/int/uefa_nations_league/england-v-germany/0?datefilter=202209261845';
              let matchUrl = this.GameUrl
            axios.post(url, 
                {url : matchUrl}).then(response => console.log( response)).catch(err => console.log(err))

        },
        bet() {
                console.log('bet');
                let config = {
                        headers: {
                            Accept: 'application/json, text/plain, */
                            /*
                            *',  
                            /*
                            'X-Requested-With': 'XMLHttpRequest',
                            'Connection': 'keep-alive',
                            'User-Agent': 'axios/0.21.1',
                            'Access-Control-Allow-Origin' : '*',
                            'Access-Control-Allow-Methods' : 'GET, POST, PUT, DELETE, PATCH, OPTIONS',
                            'Access-Control-Allow-Headers' : 'Content-Type, Authorization, Content-Length, X-Requested-With, X-HTTP-Method-Override',
                            'Accept-Encoding': 'gzip, deflate, sdch',
                            'Accept-Language': 'en-US,en;q=0.8,zh-CN;q=0.6,zh;q=0.4',
                            'X-Auth-Token':  process.env.API_TOKEN
                             }
                        }
                // var url = "http://api.football-data.org/v1/fixtures/today?timeFrame=next&api_key=f84633c3b5bc464aa9716fb35c16d398";
                const url = "http://api.football-data.org/v2/competitions/";
                axios.get(url, config)
                    .then(function (response) {
                        console.log(response);
                        this.result = response.result;
                        this.homeTeam = response.homeTeam;
                        this.awayTeam = response.awayTeam;
                        this.time = response.time;
                        this.date = response.date;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            */
  

    created() {

    console.log('app created');
    // this.fetchMatchOdds();
    // this.test();
    this.GameUrl = 'https://www.betway.com.gh/sport/soccer/int/uefa_nations_league/england-v-germany/0?datefilter=202209261845';
    },
    }
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