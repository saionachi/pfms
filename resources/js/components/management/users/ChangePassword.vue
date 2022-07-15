<template>
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Management</li>
                <li class="breadcrumb-item">Users</li>
                <li class="breadcrumb-item active" aria-current="page">Change Password</li>
            </ol>
        </nav>
        <div v-if="success" class="alert alert-success alert-dismissible fade show" role="alert">
            Successfully changed password!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <div class="card">
            <div class="card-header">Change Password</div>

            <div class="card-body">
                <form @submit.prevent="changePassword">

                    <div class="row mb-3">
                        <label for="password" class="col-md-4 col-form-label text-md-end">Password</label>
                        <div class="col-md-6">
                            <input v-model="form.id" type="hidden">
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

                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <router-link :to="{ name: 'ManagementUsersIndex' }" class="btn btn-link">Back
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
            success: false,
            form: {
                id: this.$route.params.id,
                password: ''
            },
            errors: {}
        }
    },
    methods: {
        changePassword() {
            axios.post('/api/management/users/change-pw', this.form)
                .then(res => {
                    this.success = true;
                    this.form.password = '';
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