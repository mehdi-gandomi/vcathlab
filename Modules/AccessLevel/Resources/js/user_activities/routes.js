export default [
  {
    path: 'accesslevel/user_activities/create',
    name: 'access_level-user_activities-create-form',
    component: () => import('./Create.vue'),
    meta: {
      breadcrumb: [
        {
          title: 'Home',

          url: '/',
        },
        {
          title: 'Useractivities',

          url: '/accesslevel/user_activities',
        },
        {
          title: 'Create Useractivity',

          active: '1',
        },
      ],
      pageTitle: 'Create Useractivity',
    },
  },
  {
    path: 'accesslevel/user_activities',
    name: 'access_level-user_activities-index',
    component: () => import('./Index.vue'),
    meta: {
      breadcrumb: [
        {
          title: 'Home',

          url: '/',
        },
        {
          title: 'Useractivities',

          active: '1',
        },
      ],
      pageTitle: 'Useractivities',
    },
  },
  {
    path: 'accesslevel/user_activities/:id/edit',
    name: 'access_level-user_activities-update-form',
    component: () => import('./Update.vue'),
    meta: {
      breadcrumb: [
        {
          title: 'Home',

          url: '/',
        },
        {
          title: 'Useractivities',

          url: '/accesslevel/user_activities',
        },
        {
          routeParam: 'id',

          resourceTitleField: 'description',

          active: '1',
        },
      ],
      pageTitle: 'Update Useractivity',
    },
  },
  {
    path: 'accesslevel/user_activities/:id',
    name: 'access_level-user_activities-detail',
    component: () => import('./Detail.vue'),
    meta: {
      breadcrumb: [
        {
          title: 'Home',

          url: '/',
        },
        {
          title: 'Useractivities',

          url: '/accesslevel/user_activities',
        },
        {
          routeParam: 'id',

          resourceTitleField: 'description',

          active: '1',
        },
      ],
      pageTitle: 'Useractivity Details',
    },
  },
];
