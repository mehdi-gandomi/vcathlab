export default [
    {
        path: "admin/ct_cases/print",
        name: "admin-ct_cases-print",
        component: () => /* webpackPrefetch: true */ import("./Print.vue"),
        meta: {
            breadcrumb: [
                {
                    title: "Home",

                    url: "/"
                },
                {
                    title: "Ctcases",

                    url: "/admin/ct_cases"
                },
                {
                    title: "Print",

                    active: "1"
                }
            ],
            pageTitle: "Print ct_cases"
        }
    },
    {
        path: "admin/ct_cases",
        name: "admin-ct_cases-index",
        component: () => /* webpackPrefetch: true */ import("./Index.vue"),
        meta: {
            breadcrumb: [
                {
                    title: "Home",

                    url: "/"
                },
                {
                    title: "Ctcases",

                    active: "1"
                }
            ],
            pageTitle: "Ctcases"
        }
    },
    {
        path: "admin/ct_cases/:id",
        name: "admin-ct_cases-detail",
        component: () => /* webpackPrefetch: true */ import("./Detail.vue"),
        meta: {
            breadcrumb: [
                {
                    title: "Home",

                    url: "/"
                },
                {
                    title: "Ctcases",

                    url: "/admin/ct_cases"
                },
                {
                    routeParam: "id",

                    resourceTitleField: "id",

                    active: "1"
                }
            ],
            pageTitle: "Ctcase Details"
        }
    }
];
