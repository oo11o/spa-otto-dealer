<template>
    {{ data_now }}
    <div v-if="!auth">
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
                                <input autocomplete="off" type="password"  v-model="password">
    <!--                                  -->
    <!--                                   v-bind:class="{'form-control':true, 'is-invalid' : !validPassword(password) && passwordBlured}"-->
    <!--                                   v-on:blur="passwordBlured = true"-->
                                <div v-if="this.auth === false" class="invalid-feedback" style="display: block" >Логин и пароль не совпадают!</div>

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
    <index v-if="auth" :auth="auth[0]" :email="auth[0].email" :saldo="auth[0].saldo" :id="auth[0].id" :id_tetra="auth[0].id_tetra" ></index>
</template>

<script>

import Index from "./Index";

export default {
    name: "Login",
    data: function () {
        return {
            email : "",
            emailBlured : false,

            password:"",
            passwordBlured:false,

            valid : false,
            submitted : false,

            auth: '',


            data_now: ''
        }
    },
    methods:{
        validate : function(){
            this.emailBlured = true;
            this.passwordBlured = true;
            if( this.validEmail(this.email)){
                console.log('check user')
                this.checkUser();
            }else{
                console.log('not valid')
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
               // this.submitted = true;
                this.$router.push('/index')
            }
        },

        checkUser(){
            axios.post('/api/auth',{
                    login: this.email,
                    pass: this.password,
                })
                .then(response => {
                     this.auth = response.data.data[0] ? response.data.data : false
                })
                .catch((err) => {
                        console.log(err);
                })
            }
    },

    components: {
        Index
    }
}


</script>

<style scoped>

</style>
