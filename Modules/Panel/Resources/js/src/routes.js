import other_routes from '@modules.js'
export default [
    {
      path: '',
      component: () => /* webpackPreload: true */ import('./layouts/main/Main.vue'),
      children: [
        {
            path: '/',
            redirect: '/dashboard/analytics',
          },
          {
            path: '/dashboard/analytics',
            name: 'dashboard-analytics',
            component: () => /* webpackPreload: true */ import('./views/DashboardAnalytics.vue'),
            meta: {
              authRequired: '1',
            },
          },
          {
            path: '/profile/:id',
            name: 'profile-details-page',
            component: () => /* webpackPreload: true */ import('./views/pages/UserView'),
          },
          {
            path: '/profile',
            name: 'profile-page',
            component: () => /* webpackPreload: true */ import('./views/pages/profile/Profile'),
          },
          ...other_routes
        ],

    },
    {
      path: '',
      component: () => import('@/layouts/full-page/FullPage.vue'),
      children: [
        {
          path: '/callback',
          name: 'auth-callback',
          component: () => /* webpackPreload: true */ import('@/views/Callback.vue'),
          meta: {},
        },

        {
          path: '/register',
          name: 'page-register',
          component: () => /* webpackPreload: true */ import('@/views/pages/register/Register.vue'),
          meta: {},
        },
        {
          path: '/forget-password',
          name: 'page-forgot-password',
          component: () => /* webpackPreload: true */ import('@/views/pages/ForgotPassword.vue'),
          meta: {},
        },
        {
          path: '/reset-password',
          name: 'page-reset-password',
          component: () => /* webpackPreload: true */ import('@/views/pages/ResetPassword.vue'),
          meta: {},
        },
        {
          path: '/lock-screen',
          name: 'page-lock-screen',
          component: () => /* webpackPreload: true */ import('@/views/pages/LockScreen.vue'),
          meta: {},
        },
        {
          path: '/comingsoon',
          name: 'page-coming-soon',
          component: () => /* webpackPreload: true */ import('@/views/pages/ComingSoon.vue'),
          meta: {},
        },
        {
          path: '/error-404',
          name: 'page-error-404',
          component: () => /* webpackPreload: true */ import('@/views/pages/Error404.vue'),
          meta: {},
        },
        {
          path: '/error-500',
          name: 'page-error-500',
          component: () => /* webpackPreload: true */ import('@/views/pages/Error500.vue'),
          meta: {},
        },
        {
          path: '/not-authorized',
          name: 'page-not-authorized',
          component: () => /* webpackPreload: true */ import('@/views/pages/NotAuthorized.vue'),
          meta: {},
        },
        {
          path: '/maintenance',
          name: 'page-maintenance',
          component: () => /* webpackPreload: true */ import('@/views/pages/Maintenance.vue'),
          meta: {},
        },
      ],
      meta: {},
    },
    {
      path: '*',
      redirect: '/error-404',
    },
  ];
