<template>
    <div class="container mt-5">
<div class="card">

    <div class="card-header">
            <h4>Students
                <RouterLink to="/students/create" class="btn btn-primary float-end">Add student</RouterLink>
            </h4>
    </div>

    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Course</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody v-if="this.students.length>0">
                <tr v-for="(student,index) in this.students" :key="index">
                     <td>{{ student.id }}</td>
                     <td>{{ student.name }}</td>
                     <td>{{ student.course }}</td>
                     <td>{{ student.email }}</td>
                     <td>{{ student.phone }}</td>
                     <td>{{ student.created_at }}</td>
                     <td>
                        <RouterLink :to="{path:'/students/'+student.id+'/edit'}" class="btn btn-success mx-2">Edit</RouterLink>
                        <button class="btn btn-danger mx-2" @click="deleteStudent(student.id)" type="button">Delete</button>
                    </td>

                </tr>
            </tbody>
            <tbody v-else>
                <tr>
                    <td colspan="7">Loading.....</td>
                    </tr>
            </tbody>
        </table>
    </div>
</div> 
</div>
 </template>
  
  <script>
  import  axios  from "axios";
  export default{
    name:'students',
    data(){
        return {
            students:[]
        }
    },
    mounted(){
        this.getStudents();
        // console.log('i am here!')
    },
    methods:{
        deleteStudent(studentId){
if(confirm('Are you sure to delete?')){
// console.log(studentId);
axios.delete(`http://127.0.0.1:8000/api/students/${studentId}/delete`).then(res=>{
    alert(res.data.message);
    this.getStudents();
}).catch(function (error) {
                    if (error.response) {
                        if(error.response.status==404){
                             alert(error.response.data.message);
                        }
                        // console.log(error.response.data);
                        // console.log(error.response.status);
                        // console.log(error.response.headers);
                        //                     } 
                    else if (error.request) {
                         console.log(error.request);
                                            } 
                    else {
                        console.log('Error', error.message);
                        }
  }});;

}
        }
        ,
        getStudents(){
            axios.get('http://127.0.0.1:8000/api/students').then((res)=>{
                this.students=res.data.students;
                    console.log( this.students)
            })
        }
    }
  }
</script>
  <style> 
  </style>
  