<template>
    <div class="login-inner-wrapper fs12">
        <form @submit.prevent="handleRegister()">
            <p class="mt-2 mb-4 text-center text-gray-600 fs11" >To remain anonymous, only your username<br /> will be visible to everyone</p>
            <div class="flex flex-col" style="position: relative">
                <input v-model="form.username" type="text" class="mb-3 p-2  border-2 rounded" placeholder="Username" />
                <has-error :form="form" field="username"></has-error>
            </div>
            <div class=" flex flex-col">
                <div class="input-group input-group-merge">
                    <input type="password" v-model="form.password" :type="type"  id="password" name="password" class="mb-3 p-2 border-2 rounded"  :class="{ 'is-invalid': form.errors.has('password') }" placeholder="Password" style="width:253px" >
                    <div class="input-group-append" data-password="false" id="password-eye-wrapper" style="height:38px;"  onclick="showPassword()">
                        <div class="input-group-text">
                            <span class="password-eye" ></span>
                        </div>
                    </div>
                </div>
                <has-error :form="form" field="password"></has-error>
            </div>

            <div class=" flex flex-col">
                <div class="input-group input-group-merge">
                    <input type="password" :type="type" v-model="form.password_confirmation"  id="confirmPassword" name="form.password_confirmation" class="mb-3 p-2 border-2 rounded"  :class="{ 'is-invalid': form.errors.has('password') }" placeholder="Password Confirmation" style="width:253px" >
                    <div class="input-group-append" data-password="false" id="confirm-password-eye-wrapper" style="height:38px;"  onclick="showPassword()">
                        <div class="input-group-text">
                            <span class="password-eye" ></span>
                        </div>
                    </div>
                </div>
                <has-error :form="form" field="password_confirmation"></has-error>
            </div>
            <div class="flex flex-col" style="position:relative">
                <input v-model="form.email" type="email" class="mb-3 p-2  border-2 rounded" placeholder="Email" />

                <div class="tooltip-main tooltip" data-toggle="tooltip" data-placement="top" title="“Why are you asking for my email?”: This is to be used only to verify that you are a real person. A verification will also be sent to this email. We will not be sending any spam. However, we might send notifications when required, such as changes to our privacy policy, terms and conditions etc" style="right: -110px; top: 7px; position:absolute">
                    <span class="tooltip-qm">?</span>
                </div>
                <has-error :form="form" field="email"></has-error>
            </div>
            <div class="flex flex-col" style="position:relative">
                <div>
                    <span>Birthday </span>
                    <input v-model="form.birthday" type="date" class="mb-3 p-2  border-2 rounded placedatepicker" style="width: 252px" />
                </div>

                <div class="tooltip-main tooltip" data-toggle="tooltip" data-placement="top" title="“Why are you asking for my birthday?” Use of the Bulong website/service is only for people age 18+ so we need this to verify your age" style="right: -110px; top: 7px; position:absolute">
                    <span class="tooltip-qm">?</span>
                </div>
                <has-error :form="form" field="birthday"></has-error>
            </div>
            <div style="text-align: left; display:flex">
                <label class="text-gray-800 ">Gender </label>
                <div class="tooltip-main tooltip " data-toggle="tooltip" data-placement="top" title="“Why are you asking for my gender?” This is for demographic purposes only. Feel free to select “Others/Prefer not to say” if you don’t want to share this information" style="margin-top:3px" >
                    <span class="tooltip-qm">?</span>
                </div>
            </div>
            <div class="">

                <div class="flex justify-between mt-2 ">
                    <div>
                        <input v-model="form.gender" type="radio" name="gender" value="M" />
                        <label>Male</label>
                    </div>
                    <div>
                        <input v-model="form.gender" type="radio" name="gender" value="F" />
                        <label>Female</label>
                    </div>
                    <div>
                        <input v-model="form.gender" type="radio" name="gender" value="O" />
                        <label>Others/Prefer not to say</label>
                    </div>
                    <has-error :form="form" field="gender"></has-error>
                </div>
            </div>
            <div class="mt-1 flex justify-between mb-3">
                <a href="/login" class="text-blue-600 pt-2 "><i class="fa fa-chevron-left"></i> Back to login </a>
                <button :disabled="form.busy" type="submit" class="py-2 px-4 bg-blue-600 text-white mt-1">
                    <i v-if="form.busy" class="fa fa-spinner fa-pulse fa-1x fa-fw"></i>
                    Create Account
                </button>
            </div>
        </form>
        <popover name="email" :width="280">
            “Why are you asking for my email?”: This is to be used only to verify that you are a real person. A verification will also be sent to this email. We will not be sending any spam. However, we might send notifications when required, such as changes to our privacy policy, terms and conditions etc
        </popover>
        <popover name="birthday" :width="280">
            “Why are you asking for my birthday?” Use of the Bulong website/service is only for people age 18+ so we need this to verify your age
        </popover>
        <popover name="gender" :width="280">
            “Why are you asking for my gender?” This is for demographic purposes only. Feel free to select “Others/Prefer not to say” if you don’t want to share this information
        </popover>
    </div>
</template>
<script>
import Popover from 'vue-js-popover'
Vue.use(Popover)
export default {
    data() {
        return {
            type: 'password',
            form: new Form({
                username: '',
                password: '',
                password_confirmation: '',
                email: '',
                birthday: '',
                month: '',
                day: '',
                year: '',
                gender: '',
                city_id: 1,
                terms_and_conditions: ''
            })
        }
    },

    methods: {
        handleRegister() {
            this.form.post('/register')
                .then(function (response) {
                    console.log(response);
                    if(response.data.message == "success"){
                        window.location.href = '/';
                    }
                })
                .catch(() => {
                    //
                })
        },

        showPassword() {
            if (this.type === 'password') {
                this.type = 'text';
            } else {
                this.type = 'password';
            }
        }
    },

    computed: {
        months() {
            const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

            return months;
        },

        days() {
            let days = [];
            for (let day = 1; day <= 31; day++) {
                days.push(day);
            }
            console.log(days);
            return days;
        },

        years() {
            const currentYear = new Date().getFullYear();
            const startYear = currentYear - 80;
            let years = [];

            for (let year = startYear; year <= currentYear; year++) {
                years.push(year);
            }

            return years;
        }
    }
}

</script>
<style>
.vue-popover {
    background: #444;
    color: #f9f9f9;
    font-size: 12px;
    line-height: 1.5;
    margin: 5px;
}

</style>
