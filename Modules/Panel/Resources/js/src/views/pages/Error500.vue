<!-- =========================================================================================
    File Name: Error500.vue
    Description: 500 Page
    ----------------------------------------------------------------------------------------
    Item Name: Vuexy - Vuejs, HTML & Laravel Admin Dashboard Template
      Author: Pixinvent
    Author URL: http://www.themeforest.net/user/pixinvent
========================================================================================== -->


<template>
    <div class="h-screen flex w-full bg-img">
        <div class="vx-col flex items-center justify-center flex-col sm:w-1/2 md:w-3/5 lg:w-3/4 xl:w-1/2 mx-auto text-center">
            <img src="@assets/images/pages/500.png" alt="graphic-500" class="mx-auto mb-4">
            <h1 class="sm:mx-0 mx-4 mb-4 sm:mb-12 text-5xl d-theme-heading-color">{{__("Internal Server Error!")}}</h1>
            <!-- <p class="sm:mx-0 mx-4 mb-4 sm:mb-16 d-theme-text-inverse">susceptive nonturbinated indoctrination formulary dyskinetic deafforest Strumella frolicsomeness encrustment portia myelination lachrymatory bestain hoople piscator pyramidoidal parter clipt.</p> -->
            <vs-button size="large" to="/">{{__("Back to Home")}}</vs-button>
        </div>
    </div>
</template>
