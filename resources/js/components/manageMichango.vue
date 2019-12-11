<template>

    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">


                  <div class="tile" >

                <div class='row tile-title'>
                   <h3 class="col-sm-10">All Donations</h3>
                   <span class="pull-right col-sm-2"><button class="btn btn-success" data-toggle="modal"  data-target="#add" ><i class="fa fa-fw fa-lg fa-plus"></i></button></span>
                </div>

                    <table  class="table table-hover">
                        <thead>
                        <tr>
                             <th v-column-sortable:id>No<i class="fas fa-coffee fa-xs"></i></th>
                             <th v-column-sortable:name>Title</th>
                             <th v-column-sortable:donation_type>Type</th>


                            <th>Amount</th>
                            <th>Action</th>
                        </tr>

                        </thead>

                               <tr v-if="loading==true">
                                   <th></th>
                                   <th> <center><RingLoader color="red" class="custom-class" :loading="loading" :size="50" :sizeUnit="px"></RingLoader></center></th>
                                   <th></th>
                                </tr>
                        <tbody v-if="loading==false">

                            <tr v-for="(donation,index) in  donations.data" :key="index">
                                <td>{{(index+1)+((current_page-1)*per_page)}}  </td>
                                <td class="text-capitalize">{{donation.name}}</td>
                                <td class="text-capitalize">{{donation.donation_type}}</td>
                                <td class="text-capitalize">{{donation.amount|currency(configSymbol, configSeparator, configFractionCount,
              configFractionSeparator, configSymbolPosition, configSymbolSpacing)}}</td>

                                <td>
                                    <a data-toggle="modal" @click="showData(donation.id)" data-target="#edit" class='text-success bs-popover-auto' title="click to edit"><span class="fa fa-pencil "></span></a>
                                    <a data-toggle="modal" data-target="#delete" @click="get_id(donation.id)" class="text-danger bs-popover-auto" title="click to delete"> <span class="fa fa-trash "></span></a>

                                </td>

                            </tr>

                        </tbody>

                    </table>

                   <pagination :data="donations" :limit="1" v-if="loading==false" @pagination-change-page="getResults"></pagination>



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
                                      EDIT DONATION   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                </div>

                                           <div class="modal-body ">
                                                 <div class="form-group row">
                                            <label class="control-label col-md-3">Name</label>
                                         <div class="col-md-8">
                                             <input id="section_name" class="form-control" type="text" placeholder="Enter  Amount" name="name"  v-model='show.name' required>
                                          </div>

                                           </div>
                                           <input type="hidden" v-model="show.id">


                                     <div class="form-group row">
                                            <label class="control-label col-md-3">donation type</label>
                                         <div class="col-md-8">
                                               <select  class="form-control"  v-model="show.donation_type">
                                    <option   v-bind:value="show.donation_type" >{{show.donation_type}}-Donation</option>
                                    <option   value="Member" >Member-Donation</option>
                                    <option   value="Family" >Family-Donation</option>
                                    <option   value="Jumuiya" >Jumuiya-Donation</option>
                                    <option   value="Mtaa" >Mtaa-Donation</option>
                                    <option   value="Kigango" >Kigango-Donation</option>
                                </select>
                                          </div>

                                    </div>


                                      <div class="form-group row">
                                            <label class="control-label col-md-3">amount</label>
                                         <div class="col-md-8">
                                             <input id="section_name" class="form-control" type="text" placeholder="Enter  Amount" name="name"  v-model='show.amount' required>
                                          </div>

                                    </div>


                                </div>

                                         <div class="modal-footer mx-auto">


                        <div class="row">
                                <div class="col-md-7 col-md-offset-3">
                                    <button data-dismiss="modal" @click="updateData(show.id,show.donation_type,show.amount,show.name)" class="btn btn-primary"  ><i class="fa fa-fw fa-lg fa-check-circle"></i>Update donation</button>
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

                        ADD DONATION<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                          </div>

                          <div class="modal-body ">


                               <div class="form-group row" >
                            <label class="control-label col-md-4"> Donation Name</label>
                            <div class="col-md-8">
                                <input id="section_name" class="form-control" type="text" placeholder="please enter donation name" v-model="name"  required>
                            </div>

                        </div>

                     <div class="form-group row">
                            <label class="control-label col-md-4">Choose Donation</label>
                            <div class="col-md-8" >
                                <select  class="form-control"  v-model="donation_type"     >
                                    <option   value="Member" >Member-Donation</option>
                                    <option   value="Family" >Family-Donation</option>
                                    <option   value="Jumuiya" >Jumuiya-Donation</option>
                                    <option   value="Mtaa" >Mtaa-Donation</option>
                                    <option   value="Kigango" >Kigango-Donation</option>
                                </select>

                            </div>

                        </div>


                        <div class="form-group row" >
                            <label class="control-label col-md-4">Amount</label>
                            <div class="col-md-8">
                                <input id="section_name" class="form-control" type="text" placeholder="please enter amount" v-model="amount"  required>
                            </div>

                        </div>

                          </div>

                       <div class="modal-footer ">
                            <div class="row">
                                <div class="col-md-7 ">
                                    <button  @click="storeData()" class="btn btn-primary" ><i class="fa fa-fw fa-lg fa-check-circle"></i>Save </button>
                                </div>

                                <div class="col-md-4">

                                   <button type="button" class="btn btn-secondary mx-auto" @click="cancel()" data-dismiss="modal">Cancel</button>
                                </div>

                            </div>


                        </div>


                </div>
                </div>
        </div>

    </div>
</template>

<script>
import columnSortable from 'vue-column-sortable'
    export default {

        data(){

              return  {
                //input data
                donation_type: '',
                name:'',
                amount:'',

               choices:[],
               filter:'',
               mitaa:[],

               parokia_id:'',

               donations:[],
               show:[],
               page_current:'',
               per_page:'',
               id:'',


               loading: false



               }

        },

       methods:{

            // pagination
            getResults(page = 1) {
                 this.loading=true
			axios.get('https://bugandoparish.org/api/donations?page=' + page)
				.then(response => {
                     this.loading=false
                    this.current_page=response.data.data.current_page
                    this.per_page=response.data.data.per_page
					this.donations = response.data.data;
                });},

            orderBy(fn) {
                this.donations.data.sort(fn);
                },


            // saving datas
            storeData(){
                // alert(this.donation_type +""+this.amount+""+this.name)
                //    this.loading=true
                    axios.post('https://bugandoparish.org/api/donations',{
                        name:this.name,
                        donation_type:this.donation_type,
                        amount:this.amount
                    }).then(response=>{
                        if(response.data.status==200){
                              this.$swal("Good job!", response.data.message, "success");
                               this.get_alldata();
                        }
                        else if(response.data.status==201) {

                             this.$swal("Oops!", response.data.message, "error"
                             );
                        }

                        else{
                            this.$swal("Oops!", response.data.message, "error")
                        }


                    })


            },
            get_alldata(){
                this.loading=true
                  axios.get('https://bugandoparish.org/api/donations')
                   .then(response => {
                        this.loading=false
                     this.current_page=response.data.data.current_page
                       this.per_page=response.data.data.per_page
                       this.donations=response.data.data;


                   })


            },deleteData(){


                axios.delete('https://bugandoparish.org/api/donations/'+this.id).then(
                    response=>{
                        if(response.data.status==200){

                            this.$swal("Poof! record has been deleted", response.data.message, "success");
                             this.get_alldata();
                        }
                    }
                )

                },showData(id){

                     axios.get('https://bugandoparish.org/api/donations/'+id).then(
                    response=>{
                        if(response.data.status==200){
                    this.show = response.data.data

                        }
                    }
                )
                },
                updateData(id,donation_type,amount,name){

                   var data ={
                       id:id,
                        donation_type:donation_type,
                         amount:amount,
                        name:name,


                   }

                //    console.log(data);



                      axios.put('https://bugandoparish.org/api/update_donations',data).then(
                    response=>{
                        if(response.data.status==200){
                             this.get_alldata();
                             this.$swal("Good job!", response.data.message, "success");


                        }
                        else{
                            this.$swal("Oops!", response.data.message, "error")
                        }

                    });



                },
                cancel(){
                    this.loading = false;
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




        },

    }
</script>
