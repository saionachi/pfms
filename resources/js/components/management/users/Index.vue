<template>
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Management</li>
                <li class="breadcrumb-item active" aria-current="page">Users</li>
            </ol>
        </nav>
        <div class="row">
            <div class="col-sm-12 text-end">
                <router-link :to="{ name: 'ManagementUsersCreate' }" class="btn btn-sm btn-primary">Create New
                </router-link>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <table class="table table-sm table-hover mt-2">
                    <thead>
                        <th>Name</th>
                        <th>Email</th>
                        <th class="text-center">Management</th>
                        <th class="text-center">Budget Plan</th>
                        <th class="text-center">Manage Funds</th>
                        <th class="text-center">Cash Flow</th>
                        <th class="text-center">Status</th>
                        <th class="fit"></th>
                    </thead>
                    <tbody>
                        <tr v-for="user in users" :key="user.id">
                            <td>{{ user.first_name }} {{ user.last_name }}</td>
                            <td>{{ user.email }}</td>
                            <td class="text-center">
                                <i v-if="user.m_access" class="fa-solid fa-check text-success"></i>
                                <i v-else class="fa-solid fa-x text-danger"></i>
                            </td>
                            <td class="text-center">
                                <i v-if="user.bp_access" class="fa-solid fa-check text-success"></i>
                                <i v-else class="fa-solid fa-x text-danger"></i>
                            </td>
                            <td class="text-center">
                                <i v-if="user.mf_access" class="fa-solid fa-check text-success"></i>
                                <i v-else class="fa-solid fa-x text-danger"></i>
                            </td>
                            <td class="text-center">
                                <i v-if="user.cf_access" class="fa-solid fa-check text-success"></i>
                                <i v-else class="fa-solid fa-x text-danger"></i>
                            </td>
                            <td class="text-center">
                                <span v-if="user.is_active" class="badge badge-success">Active</span>
                                <span v-else class="badge badge-danger">Inactive</span>
                            </td>
                            <td class="fit text-end">
                                <router-link :to="{ name: 'ManagementUsersEdit', params: { id: user.id } }"
                                    class="btn btn-sm btn-info">Edit</router-link>
                                <router-link :to="{ name: 'ManagementUsersChangePassword', params: { id: user.id } }"
                                    class="btn btn-sm btn-warning">Change Password</router-link>
                                <button v-if="user.is_active" @click="changeUserStatus(user.id, 0)" class="btn btn-sm btn-danger">Deactivate</button>
                                <button v-else @click="changeUserStatus(user.id, 1)" class="btn btn-sm btn-success">Activate</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios'

export default {
    data() {
        return {
            users: [],
        }
    },
    created() {
        this.getUsers();
    },
    methods: {
        getUsers() {
            axios.get('/api/management/users')
                .then(res => {
                    this.users = res.data.data;
                })
                .catch(err => {
                    console.log(err);
                });
        },
        changeUserStatus(id, status) {
            axios.post('/api/management/users/change-status', {
                id: id,
                is_active: status
            })
            .then(res => {
                this.getUsers();
            })
            .catch(err => {
                console.log(err);
            });
        }
    }
}
</script>