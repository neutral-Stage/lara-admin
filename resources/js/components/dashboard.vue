
<template>
    <div class="container">
        <div class="row mt-5" v-if="$gate.isAdminOrAuthor()">
          <div class="col-md-6 mx-auto mb-5 mt-5">
              <button @click="newModal" class="btn btn-block btn-info text-white">Create Event <i class="fas fa-plus fa-fw"></i></button>
          </div>
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Running Events</h3>
              </div>
              
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover" >
                  <tbody >
                    <tr >
                      <th>ID</th>
                      <th>Creator</th>
                      <th>Expired Date</th>
                      <th>About Event</th>
                      <th>Participate</th>
                      <th>Modify</th>
                    </tr>
                    <tr  v-for="event in events.data" :key="event.id">
                      <td>{{ event.user.id}} </td>
                     
                      
                      <td>{{event.user.name }}</td>

                      <td >{{ event.id}}</td>
                     
                     
                      <td >{{ event.problem[0].problem}}</td>

                     
                      <td>
                          <div v-if="event.problem.find(p => p.user_id == users.id)">
                            <button class="btn btn-sm btn-outline-success" type="button" @click="participet(event)" :disabled="true"><i class="fa fa-smile" style="font-size:35px;"></i>Already Joined</button>
                          </div>
                          <div v-else>
                            <button class="btn btn-sm btn-outline-success" type="button" @click="participet(event)" :disabled="false"><i class="fa fa-smile" style="font-size:35px;"></i>Join</button>
                          </div>
                      </td>
                      <td> <a href="#" @click="editModal(event)">
                           
                            <i class="fa fa-edit blue"></i>
                        </a>
                        /
                        <a href="#" @click="deleteUser(event.id)">
                            <i class="fa fa-trash red"></i>
                        </a>
                      </td>
                    
                      </tr>
                  
                  </tbody>

                  
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>

         <div v-if="!$gate.isAdminOrAuthor()">
            <not-found></not-found>
        </div>
        <!-- Modal -->
          <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addNewTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" v-show="!editmode" id="addNewLabel">Add New Event</h5>
                  <h5 class="modal-title" v-show="editmode" id="addNewLabel">Update Created Event</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form @submit.prevent="editmode ? updateUser() : createUser()">
                  <div class="modal-body">
                  <div class="form-group">
                    <input v-model="form.expired_date" type="date" name="expired_date	" 
                        class="form-control" :class="{ 'is-invalid': form.errors.has('expired_date') }">
                    <has-error :form="form" field="expired_date	"></has-error>
                  </div>
                  <div class="form-group">
                    <input v-model="form.comment" type="text" name="comment	" placeholder="Write Comment" 
                        class="form-control" :class="{ 'is-invalid': form.errors.has('comment') }">
                    <has-error :form="form" field="comment	"></has-error>
                  </div>

                  </div>
                
                  <div class="modal-footer">
                    <button type="button" class="btn  btn-danger" data-dismiss="modal">Close</button>
                    <button v-show="editmode" type="submit" class="btn btn-success">Update</button>
                    <button v-show="!editmode" type="submit" class="btn btn-primary">Create</button>
                  </div>
                </form>
                </div>
              </div>
          </div>


          <div class="modal fade" id="problem" tabindex="-1" role="dialog" aria-labelledby="problemTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" v-show="!editmode" id="problemLabel">Add New</h5>
                  <h5 class="modal-title" v-show="editmode" id="problemLabel">Say Your Problem Shamelessly !!!  </h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form @submit.prevent="editmode ? updateProblem() : createUser()">
                  <div class="modal-body">
                  <div class="form-group">
                    <input v-model="form_2.problem" type="text" name="problem" placeholder="Write Your Problem"
                        class="form-control" :class="{ 'is-invalid': form_2.errors.has('problem') }">
                    <has-error :form="form_2" field="problem"></has-error>
                  </div>
                  <div class="form-group">
                    <input v-model="form_2.id" type="text" name="event_id" 
                        class="form-control" :class="{ 'is-invalid': form_2.errors.has('event_id') }" >
                    <has-error :form="form_2" field="event_id	"></has-error>
                  </div>
                  </div>
                
                  <div class="modal-footer">
                    <button type="button" class="btn  btn-danger" data-dismiss="modal">Close</button>
                    <button v-show="editmode" type="submit" class="btn btn-success">Update</button>
                    <button v-show="!editmode" type="submit" class="btn btn-primary">Create</button>
                  </div>
                </form>
                </div>
              </div>
          </div>
    </div>

                  
                  
</template>

                            

                             
                            
                            
                          
                      

                      
                      

                     
                 

<script>
    export default {

        data () {
    return {
      
      editmode: false,
      events: {},
      problems:{},
      users:{},
      // Create a new form instance
      form: new Form({
          id:'',
          expired_date : '',
          comment: ''
          
      }),
      form_2: new Form({
          id: '',
          problem : '',
          
          
      }),
      form_3: new Form({
          id:'',
          name : '',
          email: '',
          password: '',
          type: '',
          bio: '',
          photo: ''
          
          
      }),
      
    }
  },
        

        methods:{
          IsDisable(prouser) {

            for(let i=0;i<12;i++){
              if(prouser[i].user_id==this.users.id){
                return true;
              }
              else{
                return false;
              }
            }
            
         console.log(values(prouser));
      //  return false;
        },
          updateUser(){
                this.$Progress.start();
                // console.log('Editing data');
                this.form.put('api/event'+this.form.id)
                .then(() => {
                    // success
                    $('#addNew').modal('hide');
                     Swal.fire(
                        'Updated!',
                        'Information has been updated.',
                        'success'
                     )
                        this.$Progress.finish();
                         Fire.$emit('AfterCreated');
                })
                .catch(() => {
                    this.$Progress.fail();
                });
            },
          editModal(event){
                this.editmode = true;
                this.form.reset();
                $('#addNew').modal('show');
                this.form.fill(event);
            },
          participet(event){
                this.editmode = true;
                this.form.reset();
                $('#problem').modal('show');
                this.form_2.fill(event);
            },
            updateProblem(){
                this.$Progress.start();
                // console.log('Editing data');
                this.form_2.post('api/problem'+this.form.id)
                .then(() => {
                    // success
                    $('#problem').modal('hide');
                    Fire.$emit('AfterCreated');
                     Swal.fire(
                        'Congratulation!',
                        'Your has been added.',
                        'success'
                     )
                        this.$Progress.finish();
                         //Fire.$emit('AfterCreated');
                })
                .catch(() => {
                    this.$Progress.fail();
                });
            },
            newModal(){
                this.editmode = false;
                this.form.reset();
                $('#addNew').modal('show');
            },
          deleteUser(id){
              Swal.fire({
                  title: 'Are you sure?',
                  text: "You won't be able to revert this!",
                  type: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, delete it!'
                  }).then((result) => {
                  
                  if (result.value) {
                                this.form.delete('api/event/'+id).then(()=>{
                                        Swal.fire(
                                        'Deleted!',
                                        'Your file has been deleted.',
                                        'success'
                                        )
                                    Fire.$emit('AfterCreated');
                                }).catch(()=> {
                                    Swal.fire("Failed!", "There was something wronge.", "warning");
                                });
                         }
                    
                  })
            },

          loadUsers(){
                if(this.$gate.isAdminOrAuthor()){
                    axios.get("api/event").then(({ data }) => (this.events = data));
                }
            },
          

          createUser(){
            this.$Progress.start();

            this.form.post('api/event')

            .then(()=>{
                    Fire.$emit('AfterCreated');
                    $('#addNew').modal('hide')
                    Toast.fire({
                        type: 'success',
                        title: 'User Created in successfully'
                        })
                    this.$Progress.finish();
                })
                .catch(()=>{
                })
          }
        },
        
        
        created() {

           this.loadUsers();
           
           Fire.$on('AfterCreated',() => {
               this.loadUsers();
               
           });
           axios.get("api/profile")
            .then(({ data }) => (this.users = data));
          // setInterval(() => this.loadUsers(), 3000);s
        }
        
      
  
    }
    
    
</script>
