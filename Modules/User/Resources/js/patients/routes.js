export default [
    {
        path: "user/patients/print",
        name: "user-patients-print",
        component: () => /* webpackPreload: true */ import("./Print.vue"),
        meta: {
            breadcrumb: [
                {
                    title: "Home",

                    url: "/"
                },
                {
                    title: "Patients",

                    url: "/user/patients"
                },
                {
                    title: "Print",

                    active: "1"
                }
            ],
            pageTitle: "Print patients"
        }
    },
    {
        path: "user/patients/create",
        name: "user-patients-create-form",
        component: () => /* webpackPreload: true */ import("./Create.vue"),
        meta: {
            breadcrumb: [
                {
                    title: "Home",

                    url: "/"
                },
                {
                    title: "Patients",

                    url: "/user/patients"
                },
                {
                    title: "Create Patient",

                    active: "1"
                }
            ],
            pageTitle: "Create Patient"
        }
    },
    {
        path: "user/patients",
        name: "user-patients-index",
        component: () => /* webpackPreload: true */ import("./Index.vue"),
        meta: {
            breadcrumb: [
                {
                    title: "Home",

                    url: "/"
                },
                {
                    title: "Patients",

                    active: "1"
                }
            ],
            pageTitle: "Patients"
        }
    },
    {
        path: "user/patients/:id/edit",
        name: "user-patients-update-form",
        component: () => /* webpackPreload: true */ import("./Update.vue"),
        meta: {
            breadcrumb: [
                {
                    title: "Home",

                    url: "/"
                },
                {
                    title: "Patients",

                    url: "/user/patients"
                },
                {
                    routeParam: "id",

                    resourceTitleField: "id",

                    active: "1"
                }
            ],
            pageTitle: "Update Patient"
        }
    },
    {
        path: "user/patients/:id",
        name: "user-patients-detail",
        component: () => /* webpackPreload: true */ import("./Detail.vue"),
        meta: {
            breadcrumb: [
                {
                    title: "Home",

                    url: "/"
                },
                {
                    title: "Patients",

                    url: "/user/patients"
                },
                {
                    routeParam: "id",

                    resourceTitleField: "id",

                    active: "1"
                }
            ],
            pageTitle: "Patient Details"
        }
    }
];
