# Readme

- [demo](https://example.com/)
- [main-api](https://footballdata-api.netlify.app/)

## betting-api.com

- betting-api.com auth_token_key=7f9a059ef13b4b39a86e6b2c2791daaa839ff4a4d5f6428da21f9da432678c3d
- AUTH_TOKEN=7f9a059ef13b4b39a86e6b2c2791daaa839ff4a4d5f6428da21f9da432678c3d
- [docs](https://docs.betting-api.com/betway/index.html#api-Football-FootballLineById)

<https://api.betting-api.com/1xbet/football/live/>
[js lib](https://github.com/BettingApi/js-rest-client/tree/master/packages/1xbet#readme)

## main notes

- the prediction id is used to identify matches on the same bet slip
  
- predictions
  id | slip_id home team | away team | bet_type | odds | start match | end match

- match
  id | home_team_id | away_team_id|start match | end match

- odds
- id | match id | bet_type_id | market_id | home_team_id | away_team_id
  
  bet slip
  id | stake amount | return cash |  first match start time | last match end

## database schema

- bet_type table
   id | bet_type |
- market table
   id, market_id, match_id, bet_type_id,  value
- live match table
    id | match_id | odd_id | prediction_id |
- home_team
    id | home_team_id | league_id | name | match_id
- away_team
    id | away_team_id | league_id | name | match_id

   get live odds
   select from matches where status is $live, select from live matches where live match_id $foo, select values from odd value table match_id is $foo
   select from home_team where Id is $var
  
   #HomeTeamWinOver2_5Odds = #select from market where homeTeam_id is $var and bet_type_id is $foo
   #AwayTeamWinOver2_5Odds = #select from market where awayTeam_id is $var and bet_type_id is $foo

   market
  
   home_team_score, away_team_score, homeWinOdd, awayWinOdd, drawOdd

   get pregame Odds
   select from pregame odds

## I won bet today march 8 2022

- uploaded 210 to the account and won 225
- first play random bet with three separate random bets with 5 ghc, 2, 2 and 1 each
- the goal was to cast the net with some risky upsets games paired with down-sets wins as in games with odds between 1.20 to 1.70 and mostly home wins too
- then while the games begin i wait to till which looks promising the I spend about 200 to 300 ghc to counter so that I win the initial risky bet with returns from 1100 ghc upwards or maintain my 200 to 300ghc deposited initially by the end of the game
  this works each time I take such risks, I don't always get the highest returns but I barely loose all my deposits
- so every 5 out of 8 of such bets usually yields results, this is experience acquired over time
- the rule of the game is risk, if you fear risk you loose even the lil you deposited, to win is to risk it all, to him that hath more shall be given

- I first had this idea in 2017 and since then I have done this about 4 or 5 times "sober" that is to say "I was'nt under the influence of drugs or anxiety or fear and each time I won

- ```so the idea is to train a bot to do the same thing, play risky games randomly and select the promising ones and counter them thoroughly```

- I have believed this idea for so long but I haven't had the skill to code such a bot or even the money to train the bot to begin with. But I am the only one who believes in this idea. It is the driving force that keeps me going, everyday feels closer, "if only I could build this bot, "I say to myself". I could be sleeping and my money will be making money for me" on my terms and conditions

- I am going to dedicated the next three months into this idea, so i will be working on simple mobile apps to get money for food while I code this bot, I will loose weight and
  and probably fall sick many times for lack of sleep and healthy living but i won't die

- i also have to stay sober because this kind of work requires a clear mind and sleep and a good shower clear the head for the work, weed never makes me sharp on the job, it intoxicates my senses and keep my body at bay but my mind is foggy at best. I need a clear head to code such a bot

- this is a screenshot of the original bet I had to counter

  <br>
  <img src="orignal_bet_march_8_2022.png">

- this is a screenshot of the bet I won today
  <img src="betway_8_march_2022.png" >
  <br>
- this is the counter approach I used
  
  ```
    under 2.5   under 2.5  draw       
    draw        home       away
    130.00      105.00     575.00
  won

    over  2.5     over 2.5     home    
    draw          home         away
    140.00        110.00       270

  ```

- I played all 30ghc and the ones with the lower returns I added two extra matches with straight win and over 1.5 odd, I also played those ones 35 each
- i played another counter for the two extra matches but only 10 ghc each so I spent 215 ghc in total and won 225 ghc which was one of the lowest returns, it was a safe bet not a risky upset

## Youtube links to watch when you have airtime ready to expire

## burnout symptoms
<https://www.youtube.com/watch?v=MLuJ249WnkE>

## inspiration for portfolio
<https://www.monae.me/>

## teenage bank heist youtube movie
<https://www.youtube.com/watch?v=41KimZRIMCI>

## kristen stewart fan mail
<https://www.youtube.com/watch?v=z1nRU9kW4lM>

## the equalizer movie shortens/recap
<https://www.youtube.com/watch?v=RrViA91j_VU>

<https://www.youtube.com/watch?v=ESwGjkxToiU>

## kristen stewart net worth, home and flashy live style
<https://www.youtube.com/watch?v=c5-AY4cn32s>

## movie every hour is 10 years
<https://www.youtube.com/watch?v=Ras4gOLxxQ8&lc=z231yvc5zyjszrvwc04t1aokgty4sj2btho2doijti5drk0h00410>

generate javascript code with with football matches on a betting slip with a button that if clicked creates several different slips with the same matches but different options for each slip

## betway api

[betafrica](betwayafrica.com)
[betway](https://docs.betting-api.com/betway/index.html#api-Football-FootballLineLeagueMatches)

<https://docs.betting-api.com/betway/index.html#api-Football-FootballLineLeagueMatches>

<https://github.com/BettingApi/docs#readme>

<https://betting-api.com/docs>

<https://www.youtube.com/watch?v=gI4p0UjIUuc>

<https://www.youtube.com/shorts/iyqbeBJ9008>

## marcus rashord apartment

<https://www.youtube.com/watch?v=_OMXzZ9seMw>
