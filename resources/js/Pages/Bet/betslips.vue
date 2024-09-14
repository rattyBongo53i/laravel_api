<template>
       <div class="h-screen default-color-dark">
 
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    
    <Navbar />


    </div>
</template>

<script>
import Navbar from '@/Layouts/Navbar'

export default {
name : 'Betslips',
     components: {
            Navbar,
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