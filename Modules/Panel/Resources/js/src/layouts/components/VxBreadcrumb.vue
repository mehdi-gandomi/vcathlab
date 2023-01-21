<!-- =========================================================================================
    File Name: VxBreadcrumb.vue
    Description: Breadcrumb component
    Component Name: VxBreadcrumb
    ----------------------------------------------------------------------------------------
    Item Name: Vuexy - Vuejs, HTML & Laravel Admin Dashboard Template
      Author: Pixinvent
    Author URL: http://www.themeforest.net/user/pixinvent
========================================================================================== -->


<template >
    <div class="vx-breadcrumb" >
        <ul class="flex flex-wrap items-center">
            <li class="inline-flex items-end">
                <router-link to="/">
                    <feather-icon icon="HomeIcon" svgClasses="h-5 w-5 mb-1 stroke-current text-primary" />
                </router-link>
                <span class="breadcrumb-separator mx-2"><feather-icon :icon="$vs.rtl ? 'ChevronsLeftIcon' : 'ChevronsRightIcon'" svgClasses="w-4 h-4" /></span>
            </li>
            <li v-for="(link, index) in route.meta.breadcrumb.slice(1,-1)" :key="index" class="inline-flex items-center">
                <router-link :to="link.url" v-if="link.url">{{ getRouteTitle(link) }}</router-link>
                <span class="text-primary cursor-default" v-else>{{getRouteTitle(link) }}</span>
                <span class="breadcrumb-separator mx-2 flex items-start"><feather-icon :icon="$vs.rtl ? 'ChevronsLeftIcon' : 'ChevronsRightIcon'" svgClasses="w-4 h-4" /></span>
            </li>
            <li class="inline-flex">
                <span v-if="route.meta.breadcrumb.slice(-1)[0].active" class="cursor-default">{{ getActiveRouteTitle(route) }}</span>
            </li>
        </ul>
    </div>
</template>

<script>
export default{
    name: 'vx-breadcrumb',
    props: {
        route: Object,
    },
    methods: {
        getActiveRouteTitle(route){
            const routeMeta=route.meta.breadcrumb.slice(-1)[0];
            if(routeMeta.resourceTitleField && this.$store.state.currentResource[routeMeta.resourceTitleField]){
                return this.$store.state.currentResource[routeMeta.resourceTitleField];
            }
            return (routeMeta.routeParam && !routeMeta.title) ? this.$route.params[routeMeta.routeParam] : this.__(routeMeta.title);
        },
        getRouteTitle(link){
            return (link.routeParam && !link.title) ? $route.params[link.routeParam]: this.__(link.title);
        }
    },
}
</script>
