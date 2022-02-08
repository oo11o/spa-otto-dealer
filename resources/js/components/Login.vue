<template>
    <div>
        <div class="container mt-5">
            <div class="row d-flex justify-content-center">

                <div class="col-md-6">

                    <h2 class="text-center">Кабинет Отто-Посылторг</h2>
                    <div class="card px-5 py-5" id="form1">
                        <div class="form-data" v-if="!submitted">
                            <div class="forms-inputs mb-4"> <span>Email</span>
                                <input autocomplete="off" type="text"
                                       v-model="email"
                                       v-bind:class="{'form-control':true, 'is-invalid' : !validEmail(email) && emailBlured}"
                                       v-on:blur="emailBlured = true" >
                                <div class="invalid-feedback">Введите корректный Email!</div>
                            </div>
                            <div class="forms-inputs mb-4"> <span>Пароль</span>
                                <input autocomplete="off" type="password">
    <!--                                   v-model="password"-->
    <!--                                   v-bind:class="{'form-control':true, 'is-invalid' : !validPassword(password) && passwordBlured}"-->
    <!--                                   v-on:blur="passwordBlured = true"-->

                                <div class="invalid-feedback">Password must be 8 character!</div>
                            </div>
                            <div class="mb-3"> <button v-on:click.stop.prevent="submit" class="btn btn-dark w-100">Войти</button> </div>
                        </div>
                        <div class="success-data" v-else>
                            <div class="text-center d-flex flex-column"> <i class='bx bxs-badge-check'></i> <span class="text-center fs-1">You have been logged in <br> Successfully</span> </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mt-5">
                <div class="col-md-6 text-center">
                    <img src="/img/logo.png" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Login",
    data: function () {
        return {
            email : "",
            emailBlured : false,
            valid : false,
            submitted : false,
            password:"",
            passwordBlured:false
        }
    },
    methods:{

        validate : function(){
            this.emailBlured = true;
            this.passwordBlured = true;
            if( this.validEmail(this.email) && this.validPassword(this.password)){
                this.valid = true;
            }
        },

        validEmail : function(email) {
            const re = /(.+)@(.+){1,}\.(.+){2,}/;
            if(re.test(email.toLowerCase())){
                return true;
            }

        },

        submit : function(){
            this.validate();
            if(this.valid){
                this.submitted = true;
            }
        }
    }
}


</script>

<style scoped>

</style>
