<template>
  <vs-button
    :class="{
      'vue-loading-button': true,
      'default-styles': styled,
      'btn-loading': loading,
    }"
    @click="$emit('click')"
    :disabled="loading"
    v-bind="$attrs"
  >
    <slot>Submit</slot>
   <svg v-if="loading"  class="btn-loader" width="25" height="25" viewBox="0 0 38 38" xmlns="http://www.w3.org/2000/svg">
    <defs>
        <linearGradient x1="8.042%" y1="0%" x2="65.682%" y2="23.865%" id="a">
            <stop stop-color="#fff" stop-opacity="0" offset="0%"/>
            <stop stop-color="#fff" stop-opacity=".631" offset="63.146%"/>
            <stop stop-color="#fff" offset="100%"/>
        </linearGradient>
    </defs>
    <g fill="none" fill-rule="evenodd">
        <g transform="translate(1 1)">
            <path d="M36 18c0-9.94-8.06-18-18-18" id="Oval-2" stroke="url(#a)" stroke-width="2">
                <animateTransform
                    attributeName="transform"
                    type="rotate"
                    from="0 18 18"
                    to="360 18 18"
                    dur="0.9s"
                    repeatCount="indefinite" />
            </path>
            <circle fill="#fff" cx="36" cy="18" r="1">
                <animateTransform
                    attributeName="transform"
                    type="rotate"
                    from="0 18 18"
                    to="360 18 18"
                    dur="0.9s"
                    repeatCount="indefinite" />
            </circle>
        </g>
    </g>
</svg>

  </vs-button>
</template>

<script>
export default {
  name: "VueLoadingButton",
  props: {
    loading: {
      type: Boolean,
      required: false,
      default: false
    },
    styled: {
      type: Boolean,
      required: false,
      default: false
    }
  }
};
</script>

<style scoped>

/* loading styles */
button {
  position: relative;
  -webkit-transition: all 0.2s;
  transition: all 0.2s;
  transition-timing-function: ease-in;
}
.btn-loader{
        position: absolute;
    left: -30px;
    top: -5px;
}
.loader {
  font-size: 10px;
  margin: 50px auto;
  text-indent: -9999em;
  width: 11em;
  height: 11em;
  border-radius: 50%;
  background: #888;
  background: -moz-linear-gradient(left, #888 10%, rgba(255, 255, 255, 0) 42%);
  background: -webkit-linear-gradient(left, #888 10%, rgba(255, 255, 255, 0) 42%);
  background: -o-linear-gradient(left, #888 10%, rgba(255, 255, 255, 0) 42%);
  background: -ms-linear-gradient(left, #888 10%, rgba(255, 255, 255, 0) 42%);
  background: linear-gradient(to right, #888 10%, rgba(255, 255, 255, 0) 42%);
  position: relative;
  -webkit-animation: load3 1.4s infinite linear;
  animation: load3 1.4s infinite linear;
  -webkit-transform: translateZ(0);
  -ms-transform: translateZ(0);
  transform: translateZ(0);
}
.loader:before {
  width: 50%;
  height: 50%;
  background: #888;
  border-radius: 100% 0 0 0;
  position: absolute;
  top: 0;
  left: 0;
  content: '';
}
.loader:after {
  background: #0dc5c1;
  width: 75%;
  height: 75%;
  border-radius: 50%;
  content: '';
  margin: auto;
  position: absolute;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
}
@-webkit-keyframes load3 {
  0% {
    -webkit-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@keyframes load3 {
  0% {
    -webkit-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
.btn-loading {
  padding-left: 3rem !important;
}
.btn-loading .spinner {
  opacity: 1;
}
.btn-loading .spinner span {
  opacity: 1;
}
button:not(:disabled) {
  transition-delay: 0.2s;
}
button:not(:disabled) .spinner span {
  box-shadow: 0 0 0 0.2rem #888 inset;
  border: 7.4px solid transparent;
  -webkit-transition: all 0.4s;
  transition: all 0.4s;
}
button:not(:disabled) .spinner span:nth-child(1) {
  transform: rotate(0deg) !important;
}
button:not(:disabled) .spinner span:nth-child(2) {
  transform: rotate(90deg) !important;
}
button:not(:disabled) .spinner span:nth-child(3) {
  transform: rotate(180deg) !important;
}
button:not(:disabled) .spinner span:nth-child(4) {
  transform: rotate(270deg) !important;
}
@keyframes spinner {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}

/* optional styles
.default-styles {
  color: white;
  background-color: blue;
  border: solid 1px transparent;
  border-radius: 4px;
  cursor: pointer;
  padding: 8px 16.5px 8px 16px;
  line-height: 1.9rem;
}
.default-styles:disabled {
  pointer-events: stroke;
  cursor: not-allowed;
}
.default-styles:focus {
  outline: none;
  box-shadow: 0 0 0 3px lightblue, 0 0 0 1.5px lightblue;
}
.default-styles .spinner span {
  top: 0rem;
  width: 1.2rem;
  height: 1.2rem;
  border: 3.4px solid #fff;
  border-color: #fff transparent transparent transparent;
}
.default-styles:not(:disabled) .spinner span {
  border: 8.4px solid transparent;
  box-shadow: 0 0 0 0.1rem #fff inset;
} */
</style>
