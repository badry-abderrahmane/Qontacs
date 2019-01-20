<template>
    <div class="row bg-primary vh-100 pt-3">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Delete contact
                </div>
                <div class="card-body">
                    <div>You are about to delete one of the contacts :</div>
                    <div class="alert alert-danger">
                        <ul>
                            <li v-for="(value, key) in contactObject" :key="key">
                                {{ key }} : {{ value }}
                            </li>
                        </ul>
                    </div>   
                </div>
                <div class="card-footer">
                    <a href="/contacts" class="btn btn-default col-5">Cancel</a>
                    <button @click="destroyContact()" class="btn btn-danger col-6">Delete</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props:["contact"],
    computed:{
        contactObject(){
            return JSON.parse(this.contact);
        }
    },
    methods:{
        destroyContact(){
            window.axios.delete('/contacts/destroy/'+this.contactObject.id)
            .then((response) => {
                alert('Contact Well Deleted!')
                window.location.replace("/contacts");
            })
            .catch((error) => {
                alert('Can\'t Delete Contact :(')
            });
        }
    }
}
</script>
