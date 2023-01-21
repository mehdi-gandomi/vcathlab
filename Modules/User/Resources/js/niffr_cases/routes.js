export default [
    {
        path: "user/niffr_cases/print",
        name: "user-niffr_cases-print",
        component: () => /* webpackPreload: true */ import("./Print.vue"),
        meta: {
            breadcrumb: [
                {
                    title: "Home",

                    url: "/"
                },
                {
                    title: "NiFFR Cases",

                    url: "/user/niffr_cases"
                },
                {
                    title: "Print",

                    active: "1"
                }
            ],
            pageTitle: "Print niffr_cases"
        }
    },
    {
        path: "user/niffr_cases/create",
        name: "user-niffr_cases-create-form",
        component: () => /* webpackPreload: true */ import("./Create.vue"),
        meta: {
            breadcrumb: [
                {
                    title: "Home",

                    url: "/"
                },
                {
                    title: "NiFFR Cases",

                    url: "/user/niffr_cases"
                },
                {
                    title: "Create NiFFR Case",

                    active: "1"
                }
            ],
            // topActionButtons:[
            //     {
            //             text() {
            //                 return this.__('Calculate');
            //             },
            //             async callback() {
            //                 window.Iracode.$emit("saveNiFFR")
            //             },
            //             color: "success",
            //             // icon: "share",
            //     },
            // ],
            pageTitle: "Create NiFFR Case"
        }
    },
    {
        path: "user/niffr_cases",
        name: "user-niffr_cases-index",
        component: () => /* webpackPreload: true */ import("./Index.vue"),
        meta: {
            breadcrumb: [
                {
                    title: "Home",

                    url: "/"
                },
                {
                    title: "NiFFR Cases",

                    active: "1"
                }
            ],
            pageTitle: "NiFFR Cases"
        }
    },
    {
        path: "user/niffr_cases/:id/edit",
        name: "user-niffr_cases-update-form",
        component: () => /* webpackPreload: true */ import("./Update.vue"),
        meta: {
            breadcrumb: [
                {
                    title: "Home",

                    url: "/"
                },
                {
                    title: "NiFFR Cases",

                    url: "/user/niffr_cases"
                },
                {
                    routeParam: "id",

                    resourceTitleField: "id",

                    active: "1"
                }
            ],
            pageTitle: "Update NiFFR Case"
        }
    },
    {
        path: "user/niffr_cases/:id",
        name: "user-niffr_cases-detail",
        component: () => /* webpackPrefetch: true */ import("./Detail.vue"),
        meta: {
            breadcrumb: [
                {
                    title: "Home",

                    url: "/"
                },
                {
                    title: "NiFFR Cases",

                    url: "/user/niffr_cases"
                },
                {
                    routeParam: "id",

                    resourceTitleField: "id",

                    active: "1"
                }
            ],
            pageTitle: "NiFFR Case Details"
        }
    }
];
