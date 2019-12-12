<template>

    <div class="row" id="app">
        <div class="col-md-1"></div>
        <div class="col-md-10" >
                  <div class="tile">


                <div class='row tile-title' >
                   <h3 class="col-sm-5">All Family</h3>
                   <div class="col-sm-4" >
                       <div v-on:keyup="search_function()" >
                                                   <vue-bootstrap-typeahead
                                                    v-model="search" 
                                                    :data="search_data"
                                                      :serializer="s => s.name"
                                                    @hit="search_family()" />
                                                   

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
                 
                          <!-- <input id="section_name" class="form-control" type="text" placeholder="search family name here"
                           @keyup="search_family()"
                            v-model="search"  > -->
                            
               

                   </div>
                    
                    <span class="fa fa-times col-sm-1 search_btn" v-if="!search ==''" @click='closebtn()'  aria-hidden="true"></span>

                   <span class="pull-right col-sm-2"><button class="btn btn-success" data-toggle="modal"  data-target="#add" ><i class="fa fa-fw fa-lg fa-plus"></i></button></span>
               
                </div>


                    <table  class="table table-bordered table-hover">
                        <thead>
                        <tr>

                            <th v-column-sortable:id>No</th>
                            <th v-column-sortable:id>Familia</th>
                            <th v-column-sortable:id>Jumuiya</th>
                            <th v-column-sortable:id>mtaa</th>
                            <th v-column-sortable:id>kigango</th>
                            <th>Action</th>
                        </tr>

                        </thead>

                            <span v-if="loading==true">
                                <center class="mt-4"><RingLoader color="red" class="custom-class" :loading="loading" :size="50" :sizeUnit="px"></RingLoader></center>
                             </span>



                            <tbody v-if="search =='' ">
                            <tr v-for="(family,index) in  families.data" :key="index" >
                                <td>{{(index+1)+((current_page-1)*per_page)}}.</td>

                                  <td class="text-capitalize">{{family.name}}</td>
                                   <td class="text-capitalize">{{family.jumuiya.name}}</td>
                                    <td class="text-capitalize">{{family.jumuiya.mtaa.name}}</td>
                                <td class="text-capitalize">{{family.jumuiya.mtaa.kigango.name}}</td>



                                <td>
                                    <a data-toggle="modal" @click="showData(family.id)" data-target="#edit" class='text-success bs-popover-auto' title="click to edit"><span class="fa fa-pencil "></span></a> &nbsp;&nbsp; &nbsp;
                                    <a v-if="user_info.user_type=='paroko'" data-toggle="modal"  data-target="#delete" @click="get_id(family.id)" class="text-danger bs-popover-auto" title="click to delete"> <span class="fa fa-trash "></span></a>
                                </td>
                            </tr>
                        </tbody>

                        <tbody >
                            <tr v-for="(family,index) in  search_data" :key="index" >
                                <td>{{(index+1)+((current_page-1)*per_page)}}.</td>
                                <td class="text-capitalize">{{family.name}}</td>
                                <td class="text-capitalize">{{family.jumuiya.name}}</td>
                                 <td class="text-capitalize">{{family.jumuiya.mtaa.name}}</td>

                             <td class="text-capitalize">{{family.jumuiya.mtaa.kigango.name}}</td>

                                <td class="">
                                    <a data-toggle="modal"  data-target="#edit" @click="showData(family.id)" class='text-success bs-popover-auto' title="click to edit"><span class="fa fa-pencil "></span></a> &nbsp;&nbsp; &nbsp;
                                    <a data-toggle="modal"  data-target="#delete" @click="get_id(family.id)" class="text-danger bs-popover-auto" title="click to delete"> <span class="fa fa-trash "></span></a>
                                </td>
                            </tr>
                        </tbody>

                    </table>

                   <pagination :data="families"  :limit="1" @pagination-change-page="getResults" v-if="search ==''"></pagination>
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
                                      EDIT FAMILY   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                </div>

                         <div class="modal-body">
                                    <input type="hidden" v-model="show.jumuiya_id">
                                    <input type="hidden" v-model="show.id">

                                     <div class="form-group row">
                                      <label class="control-label col-md-3">family name1</label>
                                       <div class="col-md-9">
                                         <input id="section_name" class="form-control" type="text"   v-model='show.name' required>
                                       </div>

                               </div>


                                </div>

                                         <div class="modal-footer ">


                        <div class="row">
                                <div class="col-md-7 col-md-offset-3">
                                    <button data-dismiss="modal" @click="updateData(show.id,show.jumuiya_id,show.name)" class="btn btn-primary"  v-if="!message"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update family</button>
                                </div>

                                <div class="col-md-4">
                                     <button type="button" class="btn btn-secondary mx-auto" data-dismiss="modal">Cancel</button>
                                </div>

                            </div>
                                </div>
                                </div>
               selected: '',
                                </div>
                               </div>
        <!-- END OF EDIT MODEL -->

        <div class="modal fade modal-lg" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                         <div class="modal-dialog" role="document">
                               <div class="modal-content">
                                     <div class="modal-header">

                         Add Family<button type="button" class="close" data-dismiss="modal" aria-label="Close">
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


<div v-if="!message1">
                        <div class="form-group row" >
                            <label class="control-label col-md-4">Select Street</label>
                            <div class="col-md-8">
                                <select  class="form-control" name="mitaa_id" v-model="selected_j" @change="check_j()" >
                                    <option >--street list--</option>
                                    <option  v-for="(mtaa, index) in mitaa" :key="index" v-bind:value="mtaa.id">{{mtaa.name}}</option>
                                </select>
                            </div>
                        </div>

<div v-if="!message2">
                            <div class="form-group row" >
                            <label class="control-label col-md-4">Select Community</label>
                            <div class="col-md-8">
                                <select  class="form-control" name="mitaa_id" v-model="jumuiya_id" >
                                    <option >--street list--</option>
                                    <option  v-for="(jumuiya, index) in jumuiyas" :key="index" v-bind:value="jumuiya.id">{{jumuiya.name}}</option>
                                </select>



                            </div>

                        </div>
                        <div class="form-group row" >
                            <label class="control-label col-md-4">family</label>
                            <div class="col-md-8">
                                <input id="section_name" class="form-control" type="text" placeholder="please type family name" v-model="name"  required>
                            </div>

                        </div>
                        </div>
                         <div class="form-group row " v-else>
                                <label class="control-label col-md-4"></label>
                                <label class="lead col-md-8">there is no any community!</label>
                                  </div>
                        </div>


                            <div class="form-group row " v-else>
                                <label class="control-label col-md-4"></label>
                                <label class="lead col-md-8">there is no any street!</label>
                                  </div>
                                       <div class="modal-footer mx-auto">
                        <div class="tile-footer">
                            <div class="row">
                                <div class="col-md-7 col-md-offset-3">
                                    <button  @click="storeData()" class="btn btn-primary"   ><i class="fa fa-fw fa-lg fa-check-circle"></i>Save family</button>
                                </div>

                                <div class="col-md-4">
                                    <button type="button" class="btn btn-secondary mx-auto" data-dismiss="modal">Cancel</button>
                                </div>

                            </div>


                        </div>
                        </div>
                        </div>




                </div>
                </div>
        </div >



    </div>
</template>

<script>
import columnSortable from 'vue-column-sortable'
    export default {
      
         props: ['user_info'],
         
     

        data(){

              return  {
               display_vigango:'',
               selected: '',
               selected_j: '',
               choices:[],
               filter:'',
               search:'',
               search_data:[],
               query:'',
               mitaa:[],
               jumuiyas:[],
               message1:'',
               message2:'',
               mitaa_id:'',
               jumuiya_id:'',
               name:'',
               families:[],
               show:[],
               id:'',
               page_current:'',
               per_page:'',
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
                                this.message1 =  "no data";
                            }else{

                                this.message1 ='';
                               this.mitaa =  response.data.data;
                               console.log(response.data.data)

                            }

                        })

            },
                  orderBy(fn) {
      this.families.data.sort(fn);
    },
                 check_j(){

                        axios.post('http://localhost:8000/api/get_jumuiya',{

                           data:this.selected_j

                        }).then(response => {
                            if(response.data.status == 404){
                                this.message2 =  "no data";
                            }else{

                                this.message2 ='';
                                this.jumuiyas =  response.data.data;

                            }

                        })


            },arrange(){
                  this.loading=true
                 axios.post('http://localhost:8000/api/arrange',{

                           rule:this.display_vigango

                        }).then(response => {
                           this.loading=false
                           this.families=response.data.data;

                           this.display_vigango ='';

                        })

                // alert(this.display_vigango)

            },
            // pagination
            getResults(page = 1) {
			axios.get('http://localhost:8000/api/family_retreive?page=' + page)
				.then(response => {
                       this.current_page=response.data.data.current_page
                       this.per_page=response.data.data.per_page
					    this.families = response.data.data;
				});},

            storeData(){
                  this.loading=true
                    axios.post('http://localhost:8000/api/family_insert',{
                        name:this.name,
                        jumuiya_id:this.jumuiya_id
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
            search_family(){
                this.loading=true
                    axios.post('http://localhost:8000/api/family_search',{
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
                  this.loading=true 
                      axios.post('http://localhost:8000/api/family_search',{
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
            get_alldata(){
                  this.loading=true
                  axios.get('http://localhost:8000/api/family_retreive')
                   .then(response => {
                      
                          this.loading=false
                          this.current_page=response.data.data.current_page
                          this.per_page=response.data.data.per_page
                          this.families=response.data.data;

                   })


            },deleteData(){

                 this.loading=true
                axios.delete('http://localhost:8000/api/family_delete/'+this.id).then(
                    response=>{
                        if(response.data.status==200){
                              this.loading=false

                            this.$swal("Poof! record has been deleted", response.data.message, "success");
                             this.get_alldata();
                        }
                    }
                )

                },showData(id){
                      this.loading=true
                     axios.get('http://localhost:8000/api/family_show/'+id).then(
                    response=>{
                        if(response.data.status==200){
                              this.loading=false
                    this.show = response.data.data

                        }
                    }
                )
                },
                
                updateData(id,jumuiya,family){
                   var data ={
                       id:id,
                       jumuiya_id:jumuiya,
                       name:family
                   }
                     this.loading=true

                      axios.put('http://localhost:8000/api/family_update',data).then(
                       response=>{
                        if(response.data.status==200){
                              this.loading=false
                             this.$swal("Good job!", response.data.message, "success");
                                 this.get_alldata();

                        }
                        else{
                              this.loading=false
                            this.$swal("Oops!", response.data.message, "error")
                        }

                    });



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
 computed: {
    getPlayers() {
     
      var show = this.show.filter((player) => {
          return player.name.toLowerCase().includes(this.search.toLowerCase());
        });
      
  
        return show;
      
      
    }
  }
    }
</script>
