<template>
    <div class="container-fluid pt-3 pb-5 bg-primary">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Contact Informations
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="email">Email Address</label>
                                <input v-model="form.email" type="email" name="email" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="first_name">First Name</label>
                                <input v-model="form.first_name" type="text" name="first_name" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="last_name">Last Name</label>
                                <input v-model="form.last_name" type="text" name="last_name" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="birth_date">Birth Date</label>
                                <input v-model="form.birth_date" name="birth_date" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="function">Function</label>
                                <input v-model="form.function" name="function" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="city">City</label>
                                <input v-model="form.city" type="text" name="city" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="phone">Phone Number</label>
                                <input v-model="form.phone" type="text" name="phone" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <dir class="col-md-6">
                                <input type="checkbox" checked>
                                <label for="">Terms Of Services</label>
                            </dir>
                            <div class="col-md-6">
                                <button class="btn btn-primary btn-block" v-html="updating ? 'Update' : 'Save'"></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Contact Company
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="email">Company Name</label>
                                <input v-model="form.company" type="text" name="company" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="address">Address</label>
                                <input v-model="form.address" type="text" name="address" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props:["contact", "updating"],
    data() {
        return {
            form: {
                id          : '',
                email       : '',
                first_name  : '',
                last_name   : '',
                birth_date  : '',
                function    : '',
                city        : '',
                phone       : '',
                company     : '',
                address     : '',
            }
        }
    },
    mounted(){
        this.checkPropsData()
    },
    methods:{
        checkPropsData(){
            if (this.updating) {
                this.form = this.contact
            }
        }
    }
}
</script>