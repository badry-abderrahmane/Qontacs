<template>
    <div class="container-fluid pt-3 pb-5 bg-primary">
        <div class="row">
            <div class="col-md-12">
                <div v-if="showError" class="alert alert-danger">
                    Please fill the form correctly :<br>
                    > Email must be valid email address<br>
                    > First Name and Last Name Are required
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Contact Informations
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="email">Email Address *</label>
                                <input v-model="form.email" type="email" name="email" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="first_name">First Name *</label>
                                <input v-model="form.first_name" type="text" name="first_name" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="last_name">Last Name *</label>
                                <input v-model="form.last_name" type="text" name="last_name" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="birth_date">Birth Date</label>
                                <input v-model="form.birth_date" id="datepicker" name="birth_date" type="date" class="form-control">
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
                                <button @click="submitForm()" class="btn btn-primary btn-block" v-html="updating ? 'Update' : 'Save'"></button>
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
            },
            showError: false
        }
    },
    mounted(){
        /**
         * Check Props Values
         */
        this.checkPropsData()
        /**
         * Init Jquery datepicker
         */
        $( "#datepicker" ).datepicker({ dateFormat: "yy-mm-dd" });
    },
    methods:{
        checkPropsData(){
            /**
             * If Updating set form values
             */
            if (this.updating) {
                this.form = this.contact
                this.setDate()
            }
        },
        submitForm(){
            this.showError = false
            /**
             * Get Jquery Date Picker Value
             */
            this.getDate()
            /**
             * Set Name To Title Case
             */
            this.form.first_name = this.toTitleCase(this.form.first_name)
            this.form.last_name  = this.toTitleCase(this.form.last_name)
            /**
             * Check if form required elements
             * Are filled else show err
             */
            if (this.validForm()) {
                /**
                 * Check If Updating 
                 * Purpose : PUT | POST Request
                 */
                if (this.updating) {
                    this.updateContact()
                }else{
                    this.createContact()
                }    
            }else{
                /**
                 * Show Error Div
                 * Inputs Required
                 */
                this.showError = true
                $("html, body").animate({ scrollTop: 0 }, "slow");
            }
        },
        updateContact(){
            /**
             * Send Axios Put Request
             * @param Form 
             */
            window.axios.put('/contacts/update', 
                this.form
            )
            .then((response) => {
                alert('Contact Well Updated!')
            })
            .catch((error) => {
                alert('Can\'t Update Contact :(')
            });
        },
        createContact(){
            /**
             * Send Axios post Request
             * @param Form 
             */
            window.axios.post('/contacts/store', 
                this.form
            )
            .then((response) => {
                alert('Contact Well Inserted!')
            })
            .catch((error) => {
                alert('Can\'t Insert Contact :(')
            });
        },
        validForm(){
            /**
             * Check Form Required Inputs
             */
            if (this.validateEmail(this.form.email) && this.form.first_name && this.form.last_name) {
                return true;
            }
            return false;
        },
        validateEmail(email) {
            /**
             * Validate Email Adrees RegX
             */
            var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(email);
        },
        setDate(){
            /**
             * Set Jquery Date Picker Date
             */
            $( "#datepicker" ).datepicker( "setDate", this.form.birth_date );
        },
        getDate(){
            /**
             * Get Jquery Datepicker Value
             */
            this.form.birth_date = $( "#datepicker" ).val();
        },
        toTitleCase(str) {
            /**
             * Return String Title Case 
             * Formatted.
             */
            return str.replace(
                /\w\S*/g,
                function(txt) {
                    return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
                }
            );
        }
    }
}
</script>