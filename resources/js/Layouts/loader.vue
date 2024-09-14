<div class="hidden spinner-container ">
    <div class="spinner"></div>
</div>

<style>

    .spinner-container{
        justify-content: center;
        align-items: center;
        margin: auto;
        width: 50%;
        height: 60vh;
        transition: ease all 2s;
        
    }

    .spinner {
  height: 60px;
  width: 60px;
  margin: auto;
  display: flex;
  position: absolute;
  -webkit-animation: rotation .6s infinite linear;
  -moz-animation: rotation .6s infinite linear;
  -o-animation: rotation .6s infinite linear;
  animation: rotation .6s infinite linear;
  border-left: 6px solid rgba(56, 239, 0, 0.15);
  border-right: 6px solid rgba(40, 239, 0, 0.15);
  border-bottom: 6px solid rgba(20, 239, 0, 0.15);
  border-top: 6px solid rgba(0, 239, 32, 0.8);
  border-radius: 100%;
}

@keyframes rotation {
  from {
    -webkit-transform: rotate(0deg);
  }
  to {
    -webkit-transform: rotate(359deg);
  }
}

@-moz-keyframes rotation {
  from {
    -moz-transform: rotate(0deg);
  }
  to {
    -moz-transform: rotate(359deg);
  }
}
</style>