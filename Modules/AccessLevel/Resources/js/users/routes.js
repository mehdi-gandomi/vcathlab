import acl from "@/middleware/acl.js";
export default [
  {
    path: "accesslevel/users/print",
    name: "access_level-users-print",
    component: () => import(/* webpackPrefetch: true */ "./Print.vue"),
    meta: {
      isCrud: "1",
      crudOperation: "Download",
      basePath: "/accesslevel/users",
      breadcrumb: [
        {
          title: "Home",

          url: "/",
        },
        {
          title: "Users",

          url: "/accesslevel/users",
        },
        {
          title: "Print",

          active: "1",
        },
      ],
      pageTitle: "Print users",
      middleware: [acl],
      menuId: "4",
    },
  },
  {
    path: "accesslevel/users/create",
    name: "access_level-users-create-form",
    component: () => import(/* webpackPrefetch: true */ "./Create.vue"),
    meta: {
      isCrud: "1",
      crudOperation: "Create",
      basePath: "/accesslevel/users",
      breadcrumb: [
        {
          title: "Home",

          url: "/",
        },
        {
          title: "Users",

          url: "/accesslevel/users",
        },
        {
          title: "Create User",

          active: "1",
        },
      ],
      pageTitle: "Create User",
      middleware: [acl],
      menuId: "4",
    },
  },
  {
    path: "accesslevel/users",
    name: "access_level-users-index",
    component: () => import(/* webpackPrefetch: true */ "./Index.vue"),
    meta: {
      isCrud: "1",
      crudOperation: "View",
      basePath: "/accesslevel/users",
      breadcrumb: [
        {
          title: "Home",

          url: "/",
        },
        {
          title: "Users",

          active: "1",
        },
      ],
      pageTitle: "Users",
      middleware: [acl],
      menuId: "4",
    },
  },
  {
    path: "accesslevel/users/:id/edit",
    name: "access_level-users-update-form",
    component: () => import(/* webpackPrefetch: true */ "./Update.vue"),
    meta: {
      isCrud: "1",
      crudOperation: "Update",
      basePath: "/accesslevel/users",
      breadcrumb: [
        {
          title: "Home",

          url: "/",
        },
        {
          title: "Users",

          url: "/accesslevel/users",
        },
        {
          routeParam: "id",

          resourceTitleField: "id",

          active: "1",
        },
      ],
      pageTitle: "Update User",
      middleware: [acl],
      menuId: "4",
    },
  },
  {
    path: "accesslevel/users/:id",
    name: "access_level-users-detail",
    component: () => import(/* webpackPrefetch: true */ "./Detail.vue"),
    meta: {
      isCrud: "1",
      crudOperation: "View",
      basePath: "/accesslevel/users",
      breadcrumb: [
        {
          title: "Home",

          url: "/",
        },
        {
          title: "Users",

          url: "/accesslevel/users",
        },
        {
          routeParam: "id",

          resourceTitleField: "id",

          active: "1",
        },
      ],
      pageTitle: "User Details",
      middleware: [acl],
      menuId: "4",
    },
  },
];
