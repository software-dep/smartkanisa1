<template>

    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">


             <div class="tile" >
                <div class='row tile-title'>
                   <h3 class="col-sm-5">All Community</h3>
                   <div class='col-sm-4'>
                         <div v-on:keyup="search_function()">
                                                   <vue-bootstrap-typeahead
                                                    v-model="search"
                                                    :data="search_data"
                                                      :serializer="s => s.name"
                                                    @hit="search_community()" />

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
                    <span class="fa fa-times col-sm-1 search_btn" v-if="!search ==''" @click='closebtn()'  aria-hidden="true"></span>
                   <span class="pull-right col-sm-2"><button class="btn btn-success" data-toggle="modal"  data-target="#add" ><i class="fa fa-fw fa-lg fa-plus"></i></button></span>
                </div>

                    <table  class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th v-column-sortable:id>No.</th>
                            <th v-column-sortable:name>Jumuiya</th>
                            <th v-column-sortable:id>Mtaa</th>
                            <th v-column-sortable:id>Kigango</th>




                            <th>Action</th>
                        </tr>

                        </thead>

                              <center v-if="loading==true" >
                                <center class="mt-4"><RingLoader color="red" class="custom-class" :loading="loading" :size="50" :sizeUnit="px"></RingLoader></center>
                             </center>


                        <tbody v-if="search ==''">
                            <tr v-for="(community,index) in  communities.data" :key="index">
                                <td>{{(index+1)+((current_page-1)*per_page)}}  </td>
                                 <td class="text-capitalize">{{community.name}}</td>
                                  <td class="text-capitalize">{{community.mtaa.name}}</td>
                                <td class="text-capitalize">{{community.mtaa.kigango.name}}</td>



                                <td>
                                    <a data-toggle="modal" @click="showData(community.id)" data-target="#edit" class='text-success bs-popover-auto' title="click to edit"><span class="fa fa-pencil "></span></a>&nbsp;&nbsp; &nbsp;
                                    <a  data-toggle="modal"  data-target="#delete" @click="deleteData(community.id)"  class="text-danger bs-popover-auto" title="click to delete"> <span class="fa fa-trash "></span></a>
                                </td>

                            </tr>

                        </tbody>


                         <tbody >
                            <tr v-for="(community,index) in   search_data" :key="index">
                                <td>{{(index+1)+((current_page-1)*per_page)}}  </td>
                                                <td class="text-capitalize">{{community.name}}</td>
                                                <td class="text-capitalize">{{community.mtaa.name}}</td>
                                <td class="text-capitalize">{{community.mtaa.kigango.name}}</td>
                                
                

                                <td>

                                    <a data-toggle="modal"  data-target="#edit"    @click="showData(community.id)" class='text-success bs-popover-auto' title="click to edit"><span class="fa fa-pencil "></span></a>&nbsp;&nbsp; &nbsp;
                                    <a v-if="user_info.user_type=='paroko'" data-toggle="modal"  data-target="#delete" @click="deleteData(community.id)"  class="text-danger bs-popover-auto" title="click to delete"> <span class="fa fa-trash "></span></a>
                                </td>
                            </tr>
                        </tbody>


                    </table>

                   <pagination :data="communities" :limit="1" v-if="search ==''" @pagination-change-page="getResults"></pagination>



            </div>
        </div>
<div class="col-md-1"></div>


        <!-- EDIT MODEL -->
           <div class="modal fade modal-lg" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                         <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                      EDIT COMMUNITY   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                </div>

                                           <div class="modal-body  ">
                                    <input type="hidden" v-model="show.mtaa_id">
                                    <input type="hidden" v-model="show.id">

                                     <div class="form-group row">
                            <label class="control-label col-md-4">Community name&nbsp;<strong style="color:red;">*</strong></label>
                            <div class="col-md-8">
                                <input id="section_name" class="form-control" type="text" placeholder="Enter Community Name" name="name"  v-model='show.name' required>
                            </div>

                               </div>




                                </div>
                                         <div class="modal-footer">
                        <div class="row">
                                <div class="col-md-7 col-md-offset-3">
                                    <button data-dismiss="modal" @click="updateData(show.id,show.mtaa_id,show.name)" class="btn btn-primary"  v-if="!message"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Community</button>
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

                        Add Community<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                          </div>

                          <div class="modal-body ">

                     <div class="form-group row">
                            <label class="control-label col-md-4">Choose Kigango</label>
                            <div class="col-md-8" >
                                <select  class="form-control" name="mitaa_id" v-model="selected" @change="check()"   id="description" >
                                    <option v-for="(choice, index) in choices" :key="index" v-bind:value="choice.id" >{{choice.name}}</option>
                                </select>

                            </div>

                        </div>

                        <div class="form-group row" >
                            <label class="control-label col-md-4">Select Street</label>
                            <div class="col-md-8">
                                <select  class="form-control" name="mitaa_id" v-model="mitaa_id" v-if="!message">

                                    <option  v-for="(mtaa, index) in mitaa" :key="index" v-bind:value="mtaa.id">{{mtaa.name}}</option>
                                </select>

                                <div class="col-md-8" v-else>
                                <span class="lead">No record found!</span>
                                  </div>

                            </div>

                        </div>
                        <div class="form-group row" v-if="!message">
                            <label class="control-label col-md-4">Community</label>
                            <div class="col-md-8">
                                <input id="section_name" class="form-control" type="text" placeholder="weka jina la jumuiya" v-model="name"  required>
                            </div>
                        </div>









                          </div>

                       <div class="modal-footer ">
                            <div class="row">
                                <div class="col-md-7 ">
                                    <button  @click="storeData()" class="btn btn-primary" v-if="!message"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save Community</button>
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
        props:['user_info'],

        data(){

              return  {
               selected: '',
               choices:[],
               filter:'',
               mitaa:[],
               search_data:[],
               message:'',
               mitaa_id:'',
               search:'',
               name:'',
               communities:[],
               show:[],
               page_current:'',
               per_page:'',
               id:'',
               loading: false,
                  
                    search_status:false,
                    search_member:[],
      search:false,
     
      member_signal:false,
      family_signal:false,





               }

        },
       methods:{
             check(){

                        axios.post('http://localhost:8000/api/get_mitaa',{
                           data:this.selected

                        }).then(response => {
                            if(response.data.status == 404){
                                this.message =  "no data";

                            }else{

                                this.message ='';
                               this.mitaa =  response.data.data;

                            }

                        })


            },
            orderBy(fn) {
      this.communities.data.sort(fn);
    },
            // pagination
            getResults(page = 1) {
                 this.loading=true
			axios.get('http://localhost:8000/api/jumuiya_retreive?page=' + page)
				.then(response => {
                     this.loading=false
                    this.current_page=response.data.data.current_page
                    this.per_page=response.data.data.per_page
					this.communities = response.data.data;
				});},
            // saving datas
            storeData(){
                   this.loading=true
                    axios.post('http://localhost:8000/api/jumuiya_insert',{
                        name:this.name,
                        mtaa_id:this.mitaa_id
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
                  axios.get('http://localhost:8000/api/jumuiya_retreive')
                   .then(response => {
                        this.loading=false
                     this.current_page=response.data.data.current_page
                       this.per_page=response.data.data.per_page

                       this.communities=response.data.data;


                   })


            },deleteData(id){



                        this.$swal.fire({
                               title: 'Are you sure?',
                               text: "You won't be able to revert this!",
                               type: 'warning',
                               showCancelButton: true,
                               confirmButtonColor: '#3085d6',
                               cancelButtonColor: '#d33',
                               confirmButtonText: 'Yes, delete it!'
                                      }).then((result) => {
                                     if (result.value) {

                                              axios.delete('http://localhost:8000/api/jumuiya_delete/'+id).then(
                                                 response=>{
                                                             if(response.data.status==200)
                                                                       {
                                                                        this.get_alldata();
                                                                         this.$swal("Poof! record has been deleted", response.data.message, "success");

                                                                       }
                                                            }
                                                                                                              )

                                                      }

                                                             }
                                             )

                },showData(id){

                     axios.get('http://localhost:8000/api/jumuiya_show/'+id).then(
                    response=>{
                        if(response.data.status==200){
                    this.show = response.data.data

                        }
                    }
                )
                },
                updateData(id,mtaa,jumuiya){
                   var data ={
                       id:id,
                       mtaa_id:mtaa,
                       name:jumuiya

                   }


                      axios.put('http://localhost:8000/api/jumuiya_update',data).then(
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
                search_community(){
                // this.loading=true
                    axios.post('http://localhost:8000/api/jumuiya_search',{
                    name:this.search  
                        

                    }).then(response=>{
                        if(response.data.status==200){
                              this.loading=false;
                              this.search_data = response.data.data

                        }
                        else {
                              this.loading=false
                             this.$swal("Oops!", response.data.message, "error");
                        }


                    })

            },
// 
             search_function(){   
                  // this.loading=true 
                      axios.post('http://localhost:8000/api/jumuiya_search',{
                        name:this.search
                      }).then(response=>{
                        if(response.data.status == 200){
                                this.loading=false
                                this.search_data=response.data.data;
                               this.showAlert = false;

                              
                        } 
                       else  {
                              this.showAlert = true;
                          
                        }
                      })
                    

            },
                cancel(){
                    this.loading = false;
                },closebtn(){
                    this.get_alldata();
                    this.search ='';
                    this.search_data=[];
                },get_id(id){
                     this.id=id;

                }
       },
        directives: {
    columnSortable,
  },
        mounted() {
                 this.get_alldata();
                 this.getResults();
                 axios.get('http://localhost:8000/api/filter')
                         .then(response =>this.choices = response.data.data);



        },

    }
</script>
