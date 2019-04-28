<template>

  <main class="content_wrapper">
    <div class="page-heading">
                            <div class="container-fluid">
                                <div class="row d-flex align-items-center">
                                    <div class="col-12 justify-content-md-end d-flex">
                                        <div class="breadcrumb_nav">
                                            <ol class="breadcrumb">
                                                <li>
                                                    <i class="fa fa-home"></i>
                                                    <a class="parent-item" href="dashboard">Home</a>
                                                    <i class="fa fa-angle-right"></i>
                                                </li>
                                                <li class="active">
                                                    Users
                                                </li>
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                            </div>
              </div>

              <div class="container-fluid">
                                <!-- state start-->
                                <div class="row">
                                    <div class=" col-12">
                                        <div class="card card-shadow mb-4">
                                            <div class="card-header">
                                                <div class="card-title">
                                                <a href="/setup/users/create" class="btn btn-success pull-right">Add User</a>
                                                </div>
                                                <div class="modal fade" id="exampleModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel4" aria-hidden="true" style="display: none;">
                                                    <div class="modal-dialog" role="document">
                                                      <div class="modal-content">
                                                        <div class="modal-header">
                                                          <h5 class="modal-title" id="exampleModalLabel4">New User</h5>
                                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                          </button>
                                                        </div>
                                                        <div class="modal-body">
                                                          <div id="msg"></div>
                                                          <hr>
                                                          <form>
                                                            <div class="form-group">
                                                              <input type="hidden" v-model='id'>
                                                              <label for="recipient-name" class="col-form-label">Username </label>
                                                              <input type="text" class="form-control" id="recipient-name" name="username" v-model="username">
                                                            </div>
                                                            <div class="form-group">
                                                              <label for="recipient-name" class="col-form-label">Email </label>
                                                              <input type="email" class="form-control" id="recipient-name" name="email" v-model="email">
                                                            </div>
                                                            <div class="form-group">
                                                              <label for="recipient-name" class="col-form-label">Fulllname </label>
                                                              <input type="text" class="form-control" id="recipient-name" name="name" v-model="name">
                                                            </div>
                                                            <div class="form-group">
                                                              <label for="message-text" class="col-form-label">User Type :</label>
                                                              <select class="form-control" name="user_type" v-model="user_type">
                                                                <option value="management">Management Staff</option>
                                                                <option value="supervisor">Supervisor</option>
                                                                <option value="team lead">Team Lead</option>
                                                                <option value="worker">Worker</option>
                                                                <option value="client">Client</option>
                                                              </select>
                                                            </div>
                                                          </form>
                                                        </div>
                                                        <div class="modal-footer">

                                                          <button v-if="is_reg=='true'" type="button" class="btn btn-success" v-on:click="registerUser()" id="btn_submit">Submit</button>
                                                          <button v-if="is_reg=='false'" type="button" class="btn btn-success" v-on:click="updateUser()" id="btn_submit">Update</button>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                            </div>
                                            <div class="card-body">
                                                <div id="msg"></div>
                                                <table id="bs4-table" class="table table-bordered table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th></th>
                                                            <th>Username</th>
                                                            <th>Name</th>
                                                            <th>User Type</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr v-for="user in users" :key="user['id']">
                                                            <td>
                                                              <div class="user_image">
                                                              <img v-bind:src="'/'+ user.user_pic" class="img-circle mCS_img_loaded" >
                                                            </div>
                                                					  </td>
                                                            <td>{{user.username}}</td>
                                                            <td>{{user.name}}</td>
                                                            <td>{{user.user_type}}</td>
                                                            <td>
                                                                <button class="btn btn-sm btn-success" v-on:click="getInfo(user.id)"><i class="fa fa-edit"></i></button>
                                                                <button class="btn btn-sm btn-warning"><i class="fa fa-lock"></i></button>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th></th>
                                                            <th>Username</th>
                                                            <th>Name</th>
                                                            <th>User Type</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- state end-->
                            </div>

</main>
</template>

<script>

export default {

  data: function() {
      return {
              username   : "" ,
              name       : "",
              email      : "",
              user_type  : "",
              users      : {},
              user       : "",
              user_img   : "",
              message    : "" ,
              default_   : "about-1.jpg",
              is_reg     : "true",
              id         : ""
      };
  },
  mounted() {
        this.getUser();
  },
  methods: {
      getUser(){
          axios.get("/setup/users/list").then(response => {
                this.users = response.data;

         });
      },
      setStatus(){
          this.is_reg = "true";
      },
      registerUser() {
          $('#btn_submit').html('<i class="fa fa-spin fa-spinner"><i>') ;
           axios.post('/setup/users/add',
                          {
                            'username'  : this.username,
                            'email'     : this.email,
                            'name'      : this.name ,
                            'user_type' : this.user_type ,
                           }
                 ).then(response => {
                      if(response.data.type =='success') {

                            this.$notify.success(response.data.message);
                            $('#msg').html('<span class="text-success">'+response.data.message+'</span>');
                            this.username = "" ;
                            this.name     = "" ;
                            this.email    = "" ;

                      }
                      else {
                            this.$notify.error(response.data.message);
                            $('#msg').html('<span class="text-danger">'+response.data.message+'</span>');

                      }
                      $('#btn_submit').html('Submit') ;
                      this.getUser()
               },error => {

                   this.$notify.error('Something went wrong ! Please dont leave fields blank');
                   $('#btn_submit').html('Submit') ;
                });
      },
      getInfo(id) {
          this.is_reg = "false";
        $('#exampleModal4').modal('show');
        axios.post('/setup/users/getinfo',
                       {
                         'id'  : id,
                        }
              ).then(response => {
                          this.name       = response.data[0].name;
                          this.username   = response.data[0].username;
                          this.email      = response.data[0].email;
                          this.user_type  = response.data[0].user_type;
            },error => {

                this.$notify.error('Something went wrong ! Please dont leave fields blank');
                $('#btn_submit').html('Update') ;
             });
      }

  }

}
</script>
