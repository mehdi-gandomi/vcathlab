export default [
    {
        path: "user/ct_cases/print",
        name: "user-ct_cases-print",
        component: () => /* webpackPreload: true */ import("./Print.vue"),
        meta: {
            breadcrumb: [
                {
                    title: "Home",

                    url: "/"
                },
                {
                    title: "FFR CT Cases",

                    url: "/user/ct_cases"
                },
                {
                    title: "Print",

                    active: "1"
                }
            ],
            pageTitle: "Print CT Case"
        }
    },
    {
        path: "user/ct_cases",
        name: "user-ct_cases-index",
        component: () => /* webpackPreload: true */ import("./Index.vue"),
        meta: {
            breadcrumb: [
                {
                    title: "Home",

                    url: "/"
                },
                {
                    title: "FFR CT Cases",

                    active: "1"
                }
            ],
            pageTitle: "FFR CT Cases"
        }
    },
    {
        path: "user/ct_cases/create2",
        name: "user-ct_cases-create-form",
        component: () => /* webpackPreload: true */ import("./Create.vue"),
        meta: {
            breadcrumb: [
                {
                    title: "Home",

                    url: "/"
                },
                {
                    title: "NiFFR Cases",

                    url: "/user/ct_cases"
                },
                {
                    title: "Create ct_cases",

                    active: "1"
                }
            ],
            // topActionButtons:[
            //     {
            //             text() {
            //                 return this.__('Calculate');
            //             },
            //             async callback() {
            //                 window.Iracode.$emit("saveNiffr")
            //             },
            //             color: "success",
            //             // icon: "share",
            //     },
            // ],
            pageTitle: "Create NiFFR Case"
        }
    },
    {
        path: "user/ct_cases/:id",
        name: "user-ct_cases-detail",
        component: () => /* webpackPreload: true */ import("./Detail.vue"),
        meta: {
            breadcrumb: [
                {
                    title: "Home",

                    url: "/"
                },
                {
                    title: "FFR CT Cases",

                    url: "/user/ct_cases"
                },
                {
                    routeParam: "id",

                    resourceTitleField: "id",

                    active: "1"
                }
            ],
            pageTitle: "FFR CT Case Details"
        }
    }
];
