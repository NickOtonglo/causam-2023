<template>
    <div id="div-login-form" class="card card-form">
        <form @submit.prevent="submitPasswordForm(secret)" ref="form">
            <div class="form-control">
                <input v-model="secret.password_old" type="password" name="password_old" placeholder="Current password">
                <div v-for="message in validationErrors?.password_old" class="txt-alert txt-danger">
                    <p>{{ message }}</p>
                </div>
            </div>
            <div class="form-control">
                <input v-model="secret.password" type="password" name="password" placeholder="New password">
                <div v-for="message in validationErrors?.password" class="txt-alert txt-danger">
                    <p>{{ message }}</p>
                </div>
            </div>
            <div class="form-control">
                <input v-model="secret.password_confirmation" type="password" name="password_confirmation" placeholder="Confirm new password">
                <div v-for="message in validationErrors?.password_confirmation" class="txt-alert txt-danger">
                    <p>{{ message }}</p>
                </div>
            </div>
            <button :disabled="isLoading" type="submit" class="btn-primary btn-medium">
                <div v-show="isLoading" class="lds-dual-ring"></div>
                <span v-if="isLoading">Processing...</span>
                <span v-else>Update password</span>
            </button>
        </form>
    </div>
</template>

<script>
import { useRouter } from 'vue-router'
import { inject, reactive } from 'vue'

export default {
    name: 'Account',
    data() {
        return {
            secret: reactive({
                password_old: '',
                password: '',
                password_confirmation: '',
            }),
            router: useRouter(),
            isLoading: false,
            validationErrors: '',
            swal: inject('$swal'),
        }
    },
    mounted() {
        // console.log(this.isLoggedIn)
    },
    methods: {
        submitPasswordForm(secret) {
            if (this.isLoading) {return}
            this.isLoading = true
            this.validationErrors = {}

            axios.post('/api/account/secret', secret)
                .then(response => {
                    this.swal({
                        icon: 'success',
                        title: 'Password updated',
                        didClose: () => {
                            this.router.go(0)
                        },
                    })
                })
                .catch(error => {
                    if (error.response?.data) {
                        this.validationErrors = error.response.data.errors
                    }
                    if (error.response?.data.errors.password) {
                        this.swal({
                            icon: 'error',
                            title: error.response.data.errors.password,
                            text: error.response.data.message,
                        })
                    }
                })
                .finally(() => this.isLoading = false)
        },
    },
    computed: {
        isLoggedIn() {
            return !!window.localStorage.getItem('loggedIn')
        }
    }
}
</script>

<style scoped>
#div-login-form.card-form {
    min-width: 220px;
    max-width: 400px;
    margin: 10px auto;
}

#remember {
    margin-right: 5px;
}
</style>
