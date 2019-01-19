<template>
    <div class="container-fluid pt-4 bg-primary">
        <table id="contacts-table" class="display">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>BIRTH DATE</th>
                    <th>NAME</th>
                    <th>CITY</th>
                    <th>EMAIL</th>
                    <th>PHONE NUMBER</th>
                    <th>COMPANY</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
    </div>
</template>

<script>
export default {
    mounted() {
        Vue.nextTick( () => {
            $('#contacts-table').DataTable({
                "processing": true,
                "serverSide": true,
                "columns": [
                    {"data": "id"},
                    {"data": "birth_date"},
                    {"data": "name"},
                    {"data": "city"},
                    {"data": "email"},
                    {"data": "phone"},
                    {"data": "company"},
                    { 
                        "data": "id",
                        "render": function(data, type, row, meta){
                            return `
                                <a href="contacts/edit/${data}" class="btn btn-primary"><i class"fa fa-edit"></i>E</a>
                                <a href="contacts/delete/${data}" class="btn btn-primary"><i class"fa fa-trash"></i>D</a>
                                <a href="contacts/show/${data}" class="btn btn-primary"><i class"fa fa-trash"></i>S</a>
                            `;
                        }
                    } 
                ],
               
                "ajax": {
                    url:"/contacts/all/paginated",
                    dataSrc:"data",
                },
            });
        })
    },
}
</script>

<style>
    .dataTables_filter {
        color:#fff !important;
    }
    .dataTables_length{
        color:#fff !important;
    }
    thead {
        color:#fff !important;
    }
    .dataTables_info {
        color:#fff !important;
    }
</style>
