<template>
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Management</li>
                <li class="breadcrumb-item">Users</li>
                <li class="breadcrumb-item active" aria-current="page">Create</li>
            </ol>
        </nav>
        <div class="card">
            <div class="card-header">Create New User</div>

            <div class="card-body">
                <form @submit.prevent="storeUser">

                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">First Name</label>
                        <div class="col-md-6">
                            <input v-model="form.first_name"
                                v-bind:class="errors.first_name !== undefined && errors.first_name.length > 0 ? 'is-invalid' : ''"
                                id="first_name" type="text" class="form-control" required autocomplete="off">
                            <span v-if="errors.first_name !== undefined && errors.first_name.length > 0"
                                class="invalid-feedback" role="alert">
                                <strong>{{ errors.first_name[0] }}</strong>
                            </span>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="last_name" class="col-md-4 col-form-label text-md-end">Last Name</label>
                        <div class="col-md-6">
                            <input v-model="form.last_name"
                                v-bind:class="errors.last_name !== undefined && errors.last_name.length > 0 ? 'is-invalid' : ''"
                                id="last_name" type="text" class="form-control" required autocomplete="off">
                            <span v-if="errors.last_name !== undefined && errors.last_name.length > 0"
                                class="invalid-feedback" role="alert">
                                <strong>{{ errors.last_name[0] }}</strong>
                            </span>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="email" class="col-md-4 col-form-label text-md-end">Email Address</label>
                        <div class="col-md-6">
                            <input v-model="form.email"
                                v-bind:class="errors.email !== undefined && errors.email.length > 0 ? 'is-invalid' : ''"
                                id="email" type="email" class="form-control" required autocomplete="new-email">
                            <span v-if="errors.email !== undefined && errors.email.length > 0" class="invalid-feedback"
                                role="alert">
                                <strong>{{ errors.email[0] }}</strong>
                            </span>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password" class="col-md-4 col-form-label text-md-end">Password</label>
                        <div class="col-md-6">
                            <input v-model="form.password"
                                v-bind:class="errors.password !== undefined && errors.password.length > 0 ? 'is-invalid' : ''"
                                id="password" type="text" class="form-control" required autocomplete="new-password">
                            <span v-if="errors.password !== undefined && errors.password.length > 0"
                                class="invalid-feedback" role="alert">
                                <strong>{{ errors.password[0] }}</strong>
                            </span>
                            <button type="button" class="btn btn-success mt-2"
                                @click="generatePassword">Generate</button>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="access" class="col-md-4 col-form-label text-md-end">Access</label>

                        <div class="col-md-6">
                            <div class="form-check form-check-inline">
                                <input v-model="form.m_access" class="form-check-input" type="checkbox" id="m_access"
                                    value="1">
                                <label class="form-check-label" for="m_access">Management</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input v-model="form.bp_access" class="form-check-input" type="checkbox" id="bp_access"
                                    value="1">
                                <label class="form-check-label" for="bp_access">Budget Plan</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input v-model="form.mf_access" class="form-check-input" type="checkbox" id="mf_access"
                                    value="1">
                                <label class="form-check-label" for="mf_access">Manage Funds</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input v-model="form.cf_access" class="form-check-input" type="checkbox" id="cf_access"
                                    value="1">
                                <label class="form-check-label" for="cf_access">Cash Flow</label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">Create</button>
                            <router-link :to="{ name: 'ManagementUsersIndex' }" class="btn btn-link">Cancel
                            </router-link>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios'
export default {
    data() {
        return {
            form: {
                first_name: '',
                last_name: '',
                email: '',
                password: '',
                m_access: 0,
                bp_access: 1,
                mf_access: 1,
                cf_access: 1
            },
            errors: {}
        }
    },
    methods: {
        storeUser() {
            axios.post('/api/management/users', this.form)
                .then(res => {
                    this.$router.push({ name: 'ManagementUsersIndex' });
                })
                .catch(err => {
                    this.errors = err.response.data.errors;
                });
        },
        generatePassword() {
            let result = '',
                characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789',
                charactersLength = characters.length;
            for (let i = 0; i < 20; i++) {
                result += characters.charAt(Math.floor(Math.random() * charactersLength));
            }
            this.form.password = result;
        }
    }
}
</script>