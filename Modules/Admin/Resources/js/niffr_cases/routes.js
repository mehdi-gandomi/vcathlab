export default [
    {
        path: "admin/niffr_cases/print",
        name: "admin-niffr_cases-print",
        component: () => /* webpackPreload: true */ import("./Print.vue"),
        meta: {
            breadcrumb: [
                {
                    title: "Home",

                    url: "/"
                },
                {
                    title: "NiFFR Cases",

                    url: "/admin/niffr_cases"
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
        path: "admin/niffr_cases",
        name: "admin-niffr_cases-index",
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
        path: "admin/niffr_cases/:id",
        name: "admin-niffr_cases-detail",
        component: () => /* webpackPrefetch: true */ import("./Detail.vue"),
        meta: {
            breadcrumb: [
                {
                    title: "Home",

                    url: "/"
                },
                {
                    title: "NiFFR Cases",

                    url: "/admin/niffr_cases"
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
