export default [
  {
    path: "admin/plans/print",
    name: "admin-plans-print",
    component: () => /* webpackPrefetch: true */ import("./Print.vue"),
    meta: {
      breadcrumb: [
        {
          title: "Home",

          url: "/",
        },
        {
          title: "Plans",

          url: "/admin/plans",
        },
        {
          title: "Print",

          active: "1",
        },
      ],
      pageTitle: "Print plans",
    },
  },
  {
    path: "admin/plans/create",
    name: "admin-plans-create-form",
    component: () => /* webpackPrefetch: true */ import("./Create.vue"),
    meta: {
      breadcrumb: [
        {
          title: "Home",

          url: "/",
        },
        {
          title: "Plans",

          url: "/admin/plans",
        },
        {
          title: "Create Plan",

          active: "1",
        },
      ],
      pageTitle: "Create Plan",
    },
  },
  {
    path: "admin/plans",
    name: "admin-plans-index",
    component: () => /* webpackPrefetch: true */ import("./Index.vue"),
    meta: {
      breadcrumb: [
        {
          title: "Home",

          url: "/",
        },
        {
          title: "Plans",

          active: "1",
        },
      ],
      pageTitle: "Plans",
    },
  },
  {
    path: "admin/plans/:id/edit",
    name: "admin-plans-update-form",
    component: () => /* webpackPrefetch: true */ import("./Update.vue"),
    meta: {
      breadcrumb: [
        {
          title: "Home",

          url: "/",
        },
        {
          title: "Plans",

          url: "/admin/plans",
        },
        {
          routeParam: "id",

          resourceTitleField: "name",

          active: "1",
        },
      ],
      pageTitle: "Update Plan",
    },
  },
  {
    path: "admin/plans/:id",
    name: "admin-plans-detail",
    component: () => /* webpackPrefetch: true */ import("./Detail.vue"),
    meta: {
      breadcrumb: [
        {
          title: "Home",

          url: "/",
        },
        {
          title: "Plans",

          url: "/admin/plans",
        },
        {
          routeParam: "id",

          resourceTitleField: "name",

          active: "1",
        },
      ],
      pageTitle: "Plan Details",
    },
  },
];
