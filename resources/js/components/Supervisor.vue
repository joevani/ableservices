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
                                                    <a class="parent-item" href="index.html">Home</a>
                                                    <i class="fa fa-angle-right"></i>
                                                </li>
                                                <li class="active">
                                                    Supervisor Assignment
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
                                                <button type="button"  data-toggle="modal" data-target="#exampleModal4" data-whatever="@mdo" class="btn btn-success pull-right">New Assignment</button>
                                                </div>
                                                <div class="modal fade" id="exampleModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel4" aria-hidden="true" style="display: none;">
                                                    <div class="modal-dialog" role="document">
                                                      <div class="modal-content">
                                                        <div class="modal-header">
                                                          <h5 class="modal-title" id="exampleModalLabel4">Assign</h5>
                                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                          </button>
                                                        </div>
                                                        <div class="modal-body">
                                                          <div id="msg"></div>
                                                          <hr>
                                                          <form>
                                                            <div class="form-group">
                                                              <label for="recipient-name" class="col-form-label">Supervisor Name </label>
                                                              <select class="form-control" v-model="supervisor_id" >
                                                                  <option v-for="supervisr in supervisors" v-bind:value="supervisr.id" >{{supervisr.name}}</option>

                                                              </select>
                                                            </div>
                                                            <div class="form-group">
                                                              <label for="recipient-name" class="col-form-label">Team Leader  </label>
                                                              <select class="form-control" v-model="teamlead_id">
                                                                    <option v-for="teamleaders in teamleaders" v-bind:value="teamleaders.id" >{{teamleaders.name}}</option>

                                                              </select>
                                                            </div>

                                                          </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                          <button type="button" class="btn btn-success" v-on:click="assign()" id="btn_submit">Assign</button>
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
                                                            <th>Position</th>
                                                            <th>No. Team Leaders </th>
                                                            <th>Team Leaders</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr v-for="supervisor in supervisors" :key="supervisor['id']">
                                                            <td>{{supervisor.name}}</td>
                                                            <td>{{supervisor.user_type}}</td>
                                                            <td>{{no_of_leaders(supervisor.id)}}</td>
                                                            <td><button class="btn btn-info btn-sm" v-on:click="members(supervisor.id)"> <i class="fa fa-folder-open-o"></i></button></td>
                                                        </tr>
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                          <th>Name</th>
                                                          <th>Position</th>
                                                          <th>No. Team Leaders </th>
                                                          <th>Team Leaders</th>
                                                        </tr>
                                                    </tfoot>
                                                </table>

                                                <div class="modal fade" id="teamleaders" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel4" aria-hidden="true" style="display: none;">
                                                    <div class="modal-dialog" role="document">
                                                      <div class="modal-content">
                                                        <div class="modal-header">
                                                          <h5 class="modal-title" id="exampleModalLabel4">Team Leaders</h5>
                                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                          </button>
                                                        </div>
                                                        <div class="modal-body">
                                                          <div id="msg"></div>
                                                          <table id="bs5-table" class="table table-bordered table-striped">
                                                              <thead>
                                                                  <tr>
                                                                      <th>Name</th>
                                                                      <th>Position</th>
                                                                      <th></th>

                                                                  </tr>
                                                              </thead>
                                                              <tbody>
                                                                  <tr v-for="member in supervisor_member" :key="member['id']">
                                                                      <td>{{member.name}}</td>
                                                                      <td>{{member.user_type}}</td>
                                                                      <td><button class="btn btn-sm btn-danger" v-on:click="remove(member.id)"><i class="fa fa-trash"></i></button></td>
                                                                  </tr>
                                                              </tbody>
                                                              <tfoot>
                                                                  <tr>
                                                                    <th>Name</th>
                                                                    <th>Position</th>
                                                                    <th></th>
                                                                  </tr>
                                                              </tfoot>
                                                          </table>
                                                        </div>
                                                        <div class="modal-footer">
                                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
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
              supervisors      : {},
              teamleaders      : {},
              user       : "",
              user_img   : "",
              message    : "" ,
              default_   : "about-1.jpg",
              is_reg     : "true",
              id         : "",
              supervisor_id : "",
              teamlead_id : "",
              supervisor_member : {},
      };
  },
  mounted() {
        this.getUser();
        this.team();
  },
  methods: {
      getUser(){
          axios.get("/setup/supervisors/list").then(response => {
                this.supervisors = response.data;

         });
      },
      team(){
          axios.get("/setup/teamleaders/list").then(response => {
                this.teamleaders = response.data;

         });
      },
      setStatus(){
          this.is_reg = "true";
      },
      no_of_leaders(id){
        var count = 0
        axios.post('/setup/supervisors/teamcount',
                       {
                         'id'  : id,
                        }
              ).then(response => {

                    count= response.data;



            },error => {


             });

          return count;

      },
      members(id){
          $('#teamleaders').modal('show');
        axios.post('/setup/supervisors/members',
                       {
                         'id'  : id,
                        }
              ).then(response => {
                    this.supervisor_member= response.data;
            },error => {

             });

      },
      assign() {
          $('#btn_submit').html('<i class="fa fa-spin fa-spinner"><i>') ;
           axios.post('/setup/supervisors/assign',
                          {
                            'supervisor_userid'  : this.supervisor_id,
                            'teamlead_userid'     : this.teamlead_id,
                           }
                 ).then(response => {
                      if(response.data.type =='success') {


                            $('#msg').html('<span class="text-success">'+response.data.message+'</span>');


                      }
                      else {

                            $('#msg').html('<span class="text-danger">'+response.data.message+'</span>');

                      }
                      $('#btn_submit').html('Submit') ;
                      this.getUser()
               },error => {


                        $('#btn_submit').html('Submit') ;
                });
      },
      remove(id) {

           axios.post('/setup/supervisors/removemember',
                          {
                            'id'  : id,

                           }
                 ).then(response => {
                      if(response.data.type =='success') {

                            $('#msg').html('<span class="text-success">'+response.data.message+'</span>');


                      }
                      else {

                            $('#msg').html('<span class="text-danger">'+response.data.message+'</span>');

                      }
                      $('#btn_submit').html('Submit') ;
                        this.members(id);

               },error => {


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

                $('#btn_submit').html('Update') ;
             });
      }

  }

}
</script>
