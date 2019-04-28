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
                                                    <a class="parent-item" href="">Home</a>
                                                    <i class="fa fa-angle-right"></i>
                                                </li>
                                                <li class="active">
                                                    Categories
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
                                                <button type="button"  data-toggle="modal" data-target="#exampleModal4" data-whatever="@mdo" class="btn btn-success pull-right">Add User</button>
                                                </div>
                                                <div class="modal fade" id="exampleModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel4" aria-hidden="true" style="display: none;">
                                                    <div class="modal-dialog" role="document">
                                                      <div class="modal-content">
                                                        <div class="modal-header">
                                                          <h5 class="modal-title" id="exampleModalLabel4">Categories</h5>
                                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                          </button>
                                                        </div>
                                                        <div class="modal-body">
                                                          <div id="msg"></div>
                                                          <hr>
                                                          <form>
                                                            <div class="form-group">
                                                              <label for="recipient-name" class="col-form-label">Category Name </label>
                                                              <input type="text" class="form-control" id="recipient-name" name="username" v-model="username">
                                                            </div>

                                                          </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                          <button type="button" class="btn btn-success" v-on:click="registerCategory()" id="btn_submit">Submit</button>
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


                                                            <th>Name</th>

                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr v-for="category in categories" :key="user['id']">


                                                            <td>{{user.username}}</td>

                                                            <td></td>
                                                        </tr>
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th>Name</th>

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

              name       : "",
              categories : {},

      };
  },
  mounted() {
        this.getUser();
  },
  methods: {
      getUser(){
          axios.get("/setup/categories/list").then(response => {
                this.users = response.data;

         });
      },
      registerCategory() {
          $('#btn_submit').html('<i class="fa fa-spin fa-spinner"><i>') ;
           axios.post('/setup/categories/add',
                          {
                            'name'  : this.name,

                           }
                 ).then(response => {
                      if(response.data.type =='success') {

                            this.$notify.success(response.data.message);
                            $('#msg').html('<span class="text-success">'+response.data.message+'</span>');

                            this.name     = "" ;


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

  }

}
</script>
