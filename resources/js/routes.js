// Management > Users
import ManagementUsersIndex from './components/management/users/Index';
import ManagementUsersCreate from './components/management/users/Create';
import ManagementUsersEdit from './components/management/users/Edit';
import ManagementUsersChangePassword from './components/management/users/ChangePassword';

export const routes = [
    {
        path: '/management/users',
        name: 'ManagementUsersIndex',
        component: ManagementUsersIndex
    },
    {
        path: '/management/users/create',
        name: 'ManagementUsersCreate',
        component: ManagementUsersCreate
    },
    {
        path: '/management/users/edit/:id',
        name: 'ManagementUsersEdit',
        component: ManagementUsersEdit
    },
    {
        path: '/management/users/change-pw/:id',
        name: 'ManagementUsersChangePassword',
        component: ManagementUsersChangePassword
    },
];