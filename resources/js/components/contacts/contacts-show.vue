<template>
    <div class="row bg-primary vh-100 pt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Personal Informations
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <td>Email Address</td>
                            <td>{{ contactObject.email }}</td>
                        </tr>
                        <tr>
                            <td>First Name</td>
                            <td>{{ contactObject.first_name }}</td>
                        </tr>
                        <tr>
                            <td>Last Name</td>
                            <td>{{ contactObject.last_name }}</td>
                        </tr>
                        <tr>
                            <td>Birth Date</td>
                            <td>{{ contactObject.birth_date }}</td>
                        </tr>
                        <tr>
                            <td>Function</td>
                            <td>{{ contactObject.function }}</td>
                        </tr>
                        <tr>
                            <td>City</td>
                            <td>{{ contactObject.city }}</td>
                        </tr>
                        <tr>
                            <td>Phone Number</td>
                            <td>{{ contactObject.phone }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Company
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <td>Name</td>
                            <td>{{ contactObject.company }}</td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>{{ contactObject.address }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props:['contact'],
    computed:{
        contactObject(){
            return JSON.parse(this.contact);
        }
    }
}
</script>