export default [

    {
        path: "computation_center/assesment",
        name: "user-computation_center-assesment-form",
        component: () => import(/* webpackPrefetch: true */ "./New.vue"),
        meta: {
            isCrud: "1",
            crudOperation: "Create",
            basePath: "/computation_center",
            breadcrumb: [
                {
                    title: "Home",

                    url: "/"
                },
                {
                    title: "Computation Center",

                    url: "/computation_center"
                },
                {
                    title: "Functional Assesment",

                    active: "1"
                }
            ],
            pageTitle: "Computation Center"
        }
    },
    {
        path: "computation_center/list",
        name: "user-computation_center-index",
        component: () => import(/* webpackPrefetch: true */ "./List.vue"),
        meta: {
            isCrud: "1",
            crudOperation: "View",
            basePath: "/user/computation_center",
            breadcrumb: [
                {
                    title: "Home",

                    url: "/"
                },
                {
                    title: "Computation Center",

                    active: "1"
                }
            ],
            pageTitle: "Computation Center"
        }
    }
];
