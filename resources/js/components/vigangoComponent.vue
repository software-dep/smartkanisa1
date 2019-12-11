
<template>

    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">


                  <div class="tile" >

                <div class='row tile-title'>
                   <h3 class="col-md-6">All Outstation</h3>


                   <span class="pull-right col-md-2"><button class="btn btn-success" data-toggle="modal"  data-target="#add" >
                       <i class="fa fa-fw fa-lg fa-plus"></i>
                       </button>
                       </span>


                  <div class="col-md-5">
                        <!-- {{selected}} -->

                               <!-- <div class=" row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <i class="fa fa-search"></i>
                                    </div>
                                    -->
                                     <!--end of col-->
                                    <div class="col-auto">
                                             
                                             <select  class="form-control form-control-borderless" v-model="selected">
                                                 
                                             <!-- <option v-bind:value="1" aria-placeholder="enter kingango "></option> -->
                                           </select>
                                    </div>
                                    <!--end of col-->
                                    <!--end of col-->
                                    <div class="col-md-12 col-md-10 pull-center" >
                                        
                                        <!-- <input class="form-control form-control form-control-borderless" type="text" placeholder="Search Here" v-on:keyup="search_function()" v-model="query"> -->
                                        
                                        <div v-on:keyup="search_function()">
                                                   <vue-bootstrap-typeahead
                                                    v-model="query"
                                                    :data="search_data"
                                                      :serializer="s => s.name"
                                                      placeholder="search for vigango"
                                                    @hit="get_family_id($event)" />
                                                    

                                        </div>

                                    <div class="col-auto">
                                        <b-alert
                                        :show="showAlert"
                                        dismissible
                                        variant="danger"
                                        
                                        >
                                          Data not Found
                                        </b-alert>
                                      
                                    </div>
                                      
                                    </div>
                                   
                                

                                </div>
                </div>

                        <!--end of col-->

                                  


                   <div>
                    <table  class="table table-bordered table-hover" v-if="search == false">
                        <thead>
                        <tr>


                               <th  v-column-sortable:id>Id </th>
                                <th v-column-sortable:name>Name</th>
                                <th>Action</th>
                        </tr>

                        </thead>

                             <span v-if="loading==true">
                                <center class="mt-4"><RingLoader color="red" class="custom-class" :loading="loading" :size="50" :sizeUnit="px"></RingLoader></center>
                             </span>


                        <tbody v-if="loading==false">

                            <tr v-for="(kigango,index) in  vigango.data" :key="index">
                                <td>{{(index+1)+((current_page-1)*per_page)}}  </td>
                                <td class="text-capitalize">{{kigango.name}}</td>


                                <td>
                                    <a data-toggle="modal" @click="showData(kigango.id)" data-target="#edit" class='text-success bs-popover-auto' title="click to edit"><span class="fa fa-pencil "></span></a>&nbsp;&nbsp; &nbsp;
                                    <a v-if="user_info.user_type=='paroko'" data-toggle="modal"  data-target="#delete"  @click="get_id(kigango.id)" class="text-danger bs-popover-auto" title="click to delete"> <span class="fa fa-trash "></span></a>

                                </td>

                            </tr>

                        </tbody>

                    </table>
                  </div>
                   <div v-if="search==true">
                          <div v-if="family_signal==true">
                             <div class="table-responsive-sm table-responsive-md">
                                   <table class="table table-bordered">
                                <thead>
                                  <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    
                                  </tr>
                                </thead>
                                <tbody>
                                   <tr v-for="(me,index) in  fam_member" :key="index" >
                                    <td>{{index+1}}</td>
                                    <td>{{me.name}}</td>
                                   
                                  </tr>
                                </tbody>

                              </table>
                          </div>
                          </div>
                          <div v-if="member_signal==true">
 <div class="table-responsive-sm table-responsive-md">
                      <table  class="table table-bordered">
                     <thead class="table-active">
                        <tr>
                            <th>No.</th>
                            <th>Name</th>
                             <th>Action</th>
                           

                        </tr>
                        </thead>




                            <tbody >
                            <tr v-for="(m,index) in search_member" :key="index" >
                                <td>{{(index+1)}}.</td>
                                <td class="text-capitalize">{{m.name}}</td>
                                

                                <!-- <td class="text-capitalize"><a data-toggle="modal" @click ='more_details(member.id)'  data-target="#more">More</a>
                                </td> -->
                                  <!-- <td class="text-capitalize"><span v-if='member.status==1' class="badge badge-success">active</span><span v-else class="badge badge-warning">Diactive</span></td> -->
                               <td>
                                    <a data-toggle="modal" @click="showData(kigango.id)" data-target="#edit" class='text-success bs-popover-auto' title="click to edit"><span class="fa fa-pencil "></span></a>&nbsp;&nbsp; &nbsp;
                                    <a v-if="user_info.user_type=='paroko'" data-toggle="modal"  data-target="#delete"  @click="get_id(kigango.id)" class="text-danger bs-popover-auto" title="click to delete"> <span class="fa fa-trash "></span></a>

                                </td>
                            </tr>
                        </tbody>





                    </table>

                          </div>
                    </div>
                    </div>
                   <pagination :data="vigango" :limit="1" v-if="loading==false" @pagination-change-page="getResults"></pagination>



            </div>
        </div>
<div class="col-md-1"></div>
                  <!-- DELETE FUNCTIONALITY -->
                           <div class="modal fade modal-lg" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">RECORD</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body d-flex mx-auto justify-content-center row">
                                            <div class="col-md-12" style="color: black"><h4>Are sure you want to delete?</h4></div>


                                        </div>

                                        <div class="modal-footer mx-auto">
                                            <button type="button" class="btn btn-secondary mx-auto" data-dismiss="modal">Cancel</button>

                                            <button class="btn btn-danger"  @click="deleteData()" data-dismiss="modal"><span class="fa fa-trash"></span> Delete</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
<!-- END OF DELETE FUNCTIONALITY -->

        <!-- EDIT MODEL -->
           <div class="modal fade modal-lg" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                         <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                      EDIT OUTSTATION   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                </div>

                                           <div class="modal-body ">
                                    <input type="hidden" v-model="show.parokis_id">
                                    <input type="hidden" v-model="show.id">

                                     <div class="form-group row">
                            <label class="control-label col-md-4">kigango name</label>
                            <div class="col-md-8">
                                <input id="section_name" class="form-control" type="text" placeholder="Enter kigango Name" name="name"  v-model='show.name' required>
                            </div>

                               </div>
                   





                                </div>

                                         <div class="modal-footer mx-auto">


                        <div class="row">
                                <div class="col-md-7 col-md-offset-3">
                                    <button data-dismiss="modal" @click="updateData(show.id,show.parokis_id,show.name)" class="btn btn-primary"  v-if="!message"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update kigango</button>
                                </div>

                                <div class="col-md-4">
                                     <button type="button" class="btn btn-secondary mx-auto" data-dismiss="modal">Cancel</button>
                                </div>

                            </div>
                                </div>
                                </div>
                                </div>
                               </div>
        <!-- END OF EDIT MODEL -->

        <div class="modal fade modal-lg" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
             <div class="modal-dialog" role="document">
                  <div class="modal-content">
                                <div class="modal-header">

                        ADD OUTSTATION<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                          </div>

                          <div class="modal-body ">

                     <div class="form-group row">
                            <label class="control-label col-md-4">Choose Parish</label>
                            <div class="col-md-8" >
                                <select  class="form-control" name="parokia_id" v-model="selected" @change="check()"   id="description" >
                                    <option v-for="(choice, index) in choices" :key="index" v-bind:value="choice.id" >{{choice.name}}</option>
                                </select>

                            </div>

                        </div>


                        <div class="form-group row" v-if="!message">
                            <label class="control-label col-md-4">kigango</label>
                            <div class="col-md-8">
                                <input id="section_name" class="form-control" type="text" placeholder="weka jina la kigango" v-model="name"  required>
                            </div>
                        </div>






                          </div>

                       <div class="modal-footer ">
                            <div class="row">
                                <div class="col-md-7 ">
                                    <button  @click="storeData()" class="btn btn-primary" v-if="!message"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save kigango</button>
                                </div>

                                <div class="col-md-4">

                                   <button type="button" class="btn btn-secondary mx-auto" @click="cancel()" data-dismiss="modal">Cancel</button>
                                </div>

                            </div>


                        </div>

                    <!-- </form> -->

                </div>
                </div>
        </div>

    </div>
</template>

<script>
import columnSortable from 'vue-column-sortable'
    export default {
       props: ['user_info'],

        data(){

              return  {
                selected: '',
                choices:[],
                filter:'',
                mitaa:[],
                search_status:false,
                search:'',
                search_data:[],
                search_member:[],
                search:false,
                message:'',
                fam_member:[],
                parokia_id:'',
                member_signal:false,
                family_signal:false,
                query:'',
                name:'',
                vigango:[],
                show:[],
                page_current:'',
                per_page:'',
                id:'',
                loading: false,
                


               }

        },
       methods:{

             check(){
                      axios.get('https://bugandoparish.org/api/parokia')
                         .then(response =>this.choices = response.data.data);

            },
         orderBy(fn) {
      this.vigango.data.sort(fn);
    },

            // pagination
            getResults(page = 1) {
                 this.loading=true
			axios.get('https://bugandoparish.org/api/vigango?page=' + page)
				.then(response => {
                     this.loading=false
                    this.current_page=response.data.data.current_page
                    this.per_page=response.data.data.per_page
					this.vigango = response.data.data;
				});},
            // saving datas
            storeData(){
                   this.loading=true
                    axios.post('https://bugandoparish.org/api/vigango',{
                        name:this.name,
                        parokia_id:this.selected

                    }).then(response=>{
                        if(response.data.status==200){
                             this.loading=false
                            this.get_alldata();
                            this.$swal("Good job!", response.data.message, "success");
                        }
                        else if(response.data.status==201) {
                              this.loading=false
                             this.$swal("Oops!", response.data.message, "error"
                             );
                        }


                    })


            },
            get_alldata(){
                this.loading=true
                  axios.get('https://bugandoparish.org/api/vigango')
                   .then(response => {
                        this.loading=false
                     this.current_page=response.data.data.current_page
                       this.per_page=response.data.data.per_page
                       this.vigango=response.data.data;


                   })


            },
            search_function(){
                      axios.post('https://bugandoparish.org/api/kigango_search',{
                        data:this.query
                      }).then(response=>{
                        if(response.data.status == 200){

                                this.search_data=response.data.data;
                                this.showAlert = false;
                                
                        }
                        else{
                       //this.$swal("Oops!", "no vigango with that name", "error")
                          this.showAlert = true;                          
                        }
                      })
                    

            },



            deleteData(){
                axios.delete('https://bugandoparish.org/api/vigango/'+this.id).then(
                    response=>{
                        if(response.data.status==200){

                            this.$swal("Poof! record has been deleted", response.data.message, "success");
                             this.get_alldata();
                        }
                    }
                )

                },showData(id){

                     axios.get('https://bugandoparish.org/api/vigango/'+id).then(
                    response=>{
                        if(response.data.status==200){
                    this.show = response.data.data

                        }
                    }
                )
                },
                updateData(id,parokia,kigango){
                   var data ={
                       id:id,
                       parokia_id:parokia,
                       name:kigango

                   }

                   console.log(data);


                      axios.put('https://bugandoparish.org/api/kigango_search',data).then(
                    response=>{
                        if(response.data.status==200){
                             this.$swal("Good job!", response.data.message, "success");
                                 this.get_alldata();

                        }
                        else{
                            this.$swal("Oops!", response.data.message, "error")
                        }

                    });



                },
                cancel(){
                    this.loading = false;
                },
                
                closebtn(){
                    this.get_alldata();
                    this.search = false;
                    this.member_signal =false;
                    this.family_signal =false;
                    this.fam_member=[];
                    this.query = '';
                },

                get_family_id(name){
                  if(this.selected==1){
                       axios.post('https://bugandoparish.org/api/kigango_search',{
                          id:name.id
                  })
                  .then(response=>{
                   if(response.data.status==200){
                      this.search=true;
                     this.kigango_member = response.data.data;
                      this.member_signal=false;
                         this.family_signal=true;

                   }else{
                     this.$swal("Oops!", "That family has no member", "error")
                   }

                  });


                  }else{

                        //this.loading=true
                      axios.post('https://bugandoparish.org/api/kigango_search',{
                        data:name.name
                      }).then(response=>{
                        if(response.data.status == 200){
                           this.search=true;
                           this.member_signal =true;
                           this.family_signal =false;
                           this.search_member=response.data.data;

                        //  alert(this.family_signal)
                        }
                      })

                  }

                },get_id(id){
                  this.id=id

                }
       },
       directives: {
    columnSortable,
  },
        mounted() {
                 this.get_alldata();
                 this.getResults();
                 this.check();
                  //console.dir(this.user_type)
                //  axios.get('https://bugandoparish.org/api/filter')
                //          .then(response =>this.choices = response.data.data)


        },

    }
</script>

