<template>
    <div class="login-inner-wrapper fs12">
        <form @submit.prevent="handleLogin()" v-if="activeForm == 'login'">
            <div class="flex flex-col">
                <input v-model="form.username" type="text" class="mb-3 p-2  border-2 rounded" :class="{ 'is-invalid': form.errors.has('username') }" placeholder="Username" />
                <has-error :form="form" field="username"></has-error>
            </div>
            <div class=" flex flex-col">
                <div class="input-group input-group-merge">
                    <input type="password" v-model="form.password" :type="type"  id="password" name="password" class="mb-3 p-2 border-2 rounded"  :class="{ 'is-invalid': form.errors.has('password') }" placeholder="Password" style="width:253px" >
                    <div class="input-group-append" data-password="false" id="password-eye-wrapper" style="height:38px;" @click.prevent="showPassword()">
                        <div class="input-group-text">
                            <span class="password-eye" ></span>
                        </div>
                    </div>
                </div>
                <has-error :form="form" field="password"></has-error>
            </div>
            <div class="mt-1 flex justify-between">
                <div class="flex items-center">
                    <input v-model="form.rememberMe" type="checkbox" id="remember" />
                    <label class="text-gray-800 ml-2 cursor-pointer " for="remember">Remember Me</label>
                </div>
                <button :disabled="form.busy" type="submit" class="px-8 py-2 text-white text-center bg-blue-600 rounded">
                    <i v-if="form.busy" class="fa fa-spinner fa-pulse fa-1x fa-fw"></i>
                    Log in
                </button>
            </div>
            <div class="flex justify-between mb-3 text-blue-500 ">
                <a href="#" @click.prevent="showPasswordResetForm()">Forgot Password?</a>
            </div>
            <div class="flex jccenter  mb-3">
                Don’t have an account? <a href="/signup" class="text-blue-500 font-bold"> &nbsp;  Sign Up</a>
            </div>
        </form>
        <form v-if="activeForm == 'passwordReset'" @submit.prevent="handlePasswordReset()">
            <div v-if="sentResetLink" class="flex items-center bg-teal-500 text-white text-sm font-bold px-4 py-3 mb-4" role="alert">
                <i class="fa fa-check-circle-o text-2xl"></i>
                <p class="ml-3">We have e-mailed your password reset link.</p>
            </div>
            <div class="flex flex-col">
                <label class="ml-3 mb-2 text-gray-800" for="email">E-Mail Address</label>
                <input v-model="form.email" type="text" class="mb-3 p-2  border-2 rounded" :class="{ 'is-invalid': form.errors.has('email') }" placeholder="Email" />
                <has-error :form="form" field="email"></has-error>
            </div>
            <div class="flex justify-between mb-3">
                <button :disabled="form.busy" type="submit" class="px-8 py-2 text-white text-center w-full bg-blue-600 rounded">
                    <i v-if="form.busy" class="fa fa-spinner fa-pulse fa-1x fa-fw"></i>
                    Send Password Reset Link
                </button>
            </div>
            <div class="flex justify-between mb-3">
                <a href="#" @click.prevent="showLoginForm()" class="text-blue-500 ">Login</a>
                <a href="/signup" class="text-blue-500">Signup</a>
            </div>
        </form>
    </div>

</template>
<script>
export default {
    data() {
        return {
            type: "password",
            activeForm: 'login',
            sentResetLink: false,
            form: new Form({
                username: '',
                password: '',
                rememberMe: '',
                email: '',
            })
        }
    },

    methods: {
        handleLogin() {
            this.form.post('/login')
                .then(() => {
                    // Vue.$toast.open('Success! Redirecting...');
                    setTimeout(function() {
                        window.location.href = '/';
                    }, 1000)
                })
                .catch(() => {
                    //
                })
        },
        showPassword() {
            if (this.type === 'password') {
                this.type = 'text';
                $("#password-eye-wrapper").addClass("show-password");
            } else {
                this.type = 'password';
                $("#password-eye-wrapper").removeClass("show-password");
            }
        },

        showLoginForm() {
            this.activeForm = 'login'
        },

        showPasswordResetForm() {
            this.activeForm = 'passwordReset'
        },

        handlePasswordReset() {
            this.form.post('/password/email', {
                    email: this.form.email
                })
                .then(() => {
                    this.sentResetLink = true
                    this.form.reset()
                })
        }
    }
}

</script>
