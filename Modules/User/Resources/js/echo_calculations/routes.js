export default [
    {
        path: "user/echo_calculations/print",
        name: "user-echo_calculations-print",
        component: () => import(/* webpackPrefetch: true */ "./Print.vue"),
        meta: {
            isCrud: "1",
            crudOperation: "Download",
            basePath: "/user/echo_calculations",
            breadcrumb: [
                {
                    title: "Home",

                    url: "/"
                },
                {
                    title: "Echo",

                    url: "/user/echo_calculations"
                },
                {
                    title: "Print",

                    active: "1"
                }
            ],
            pageTitle: "Print echo_calculations"
        }
    },
    {
        path: "user/echo_calculations",
        name: "user-echo_calculations-index",
        component: () => import(/* webpackPrefetch: true */ "./Index.vue"),
        meta: {
            isCrud: "1",
            crudOperation: "View",
            basePath: "/user/echo_calculations",
            breadcrumb: [
                {
                    title: "Home",

                    url: "/"
                },
                {
                    title: "Echo",

                    active: "1"
                }
            ],
            pageTitle: "Echo"
        }
    },
    {
        path: "user/echo_calculations/:id",
        name: "user-echo_calculations-detail",
        component: () => import(/* webpackPrefetch: true */ "./Detail.vue"),
        meta: {
            isCrud: "1",
            crudOperation: "View",
            basePath: "/user/echo_calculations",
            breadcrumb: [
                {
                    title: "Home",

                    url: "/"
                },
                {
                    title: "Echo",

                    url: "/user/echo_calculations"
                },
                {
                    routeParam: "id",

                    resourceTitleField: "id",

                    active: "1"
                }
            ],
            pageTitle: "Echo Details"
        }
    }
];
