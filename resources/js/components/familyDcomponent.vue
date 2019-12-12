<template>

    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
          
           
                  <div class="tile" >

                <div class='row tile-title'>
                   <h3 class="col-sm-10">Families Paid</h3>
                   <span class="pull-right col-sm-2"><button class="btn btn-success" data-toggle="modal"  data-target="#add" ><i class="fa fa-fw fa-lg fa-plus"></i></button></span>
                </div>

                <div class="row pb-3">
                   <div class="col-sm-4">Choose List Here</div>
                   <div class="col-sm-4">
                        <select  class="form-control " v-model="donation" @change="select()">
                            <option v-for="(mchango, index) in michango" :key="index" v-bind:value="mchango.id" >{{mchango.name}}</option>
                           
                        </select>
                   </div>
                   <div class="col-sm-4">
                      
                   </div>
                </div>

                <div v-if="!donation==''">
                    <div v-if="loading==true">
                        <center><DotLoader  color="green" class="custom-class" :loading="loading" :size="50" :sizeUnit="px"></DotLoader ></center>                           

                    </div>
                    <div v-else>
                        <div v-if="!records.length==0">
                             <table  class="table table-bordered table-hover"  style="width:100%">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Family Name</th>
                            <th>Amount</th>
                            <th>Paid</th>
                            
                            <th>Action</th>
                        </tr>

                        </thead>

                            
                        <tbody >
                            <span style="display:none">{{total=0}}</span>
                            <span style="display:none">{{remain=0}}</span>
                            <span style="display:none">{{excess=0}}</span>

                            <tr v-for="(rec, index) in records" :key="index" >
                                <td>{{index+1}} </td>
                                <td class="text-capitalize">{{rec.name}}</td>
                            
                                <td class="text-capitalize">{{record.amount|currency(configSymbol, configSeparator, configFractionCount,
              configFractionSeparator, configSymbolPosition, configSymbolSpacing)}}</td>
                                <td class="text-capitalize">{{rec.pivot.amount|currency(configSymbol, configSeparator, configFractionCount,
              configFractionSeparator, configSymbolPosition, configSymbolSpacing)}}</td>
                             
                              
                               
                                <td>
                                    <!-- <a data-toggle="modal" @click="showData(record.id)" data-target="#edit" class='text-success bs-popover-auto' title="click to edit"><span class="fa fa-pencil "></span></a> -->
                                    <a   class="text-danger bs-popover-auto" title="click to delete" @click="DeleteData(rec.id)"> <span class="fa fa-trash "></span></a>

                                </td>

                            </tr>
                           
                            
                        </tbody>
                        <!-- <tfoot class="table-dark">
                             <tr class="lead">
                               
                                <td colspan="3">TOTAL</td>
                                <td colspan="1">{{total}}/=</td>
                                <td colspan="1" >{{-remain}}/=</td>
                                <td colspan="2" >{{-excess}}/=</td>
                            </tr>

                        </tfoot> -->
                    </table>

                        </div>
                        <div v-else>
                            <div class="alert alert-info">There is no record at this time</div>

                        </div>

                    </div>

                </div>
                <div v-else>
                         <!-- picture -->
                        
                        <div class="col-sm-12">
                                    <blockquote class="blockquote text-center mt-5 ">
             <p >
                 <span class="fa fa-quote-left "></span>
                 <span class="">
                       Do not worry about anything, but in everything by prayer and supplication with thanksgiving let your requests be made known to God. And the peace of God, which surpasses all understanding, 
                 will guard your hearts and your minds in Christ Jesus. 
                 </span>
               
                 <span class="fa fa-quote-right"></span>
             </p>
             <div class="blockquote-footer">
                 <h4>  Philippians 4:6</h4>
                

             </div>
         </blockquote>

                        </div>
                        
                </div>
               
                   


                   
      
                   <!-- <pagination :data="records" :limit="1" v-if="loading==false" @pagination-change-page="getResults"></pagination> -->
               


            </div>
        </div>
<div class="col-md-1"></div>

 
    

        <div class="modal fade modal-lg" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
             <div class="modal-dialog" role="document">
                  <div class="modal-content">
                                <div class="modal-header">
      
                        ADD FAMILY RECORD<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                          </div>
        
                          <div class="modal-body ">
                              <div class="form-group row">
                                  <label class="control-label col-md-4">search</label>
                                  <div class="col-md-8 row no-gutters align-items-center">
                                       <div class="col-auto">
                                        <i class="fa fa-search" ></i>
                                    </div>
                                       <div class="col">
                                        <input class="form-control form-control form-control-borderless" type="text" placeholder="please write family name here" v-on:keyup="search_function_member()" v-model="search">
                                    </div>
                                  </div>
                              </div>


                                 <div class="form-group row">
                                  <label class="control-label col-md-4">Select Family</label>
                                  <div class="col-md-8">
                                          <select  class="form-control"  v-model="family_id"    id="description" >
                                    <option v-for="(m, index) in member" :key="index" v-bind:value="m.id">{{m.name}}: Jumuiya-{{m.jumuiya.name}}: Mtaa-{{m.jumuiya.mtaa.name}}</option>
                                    
                                </select>
                                  </div>
                              </div>
                        
                     <div class="form-group row">
                            <label class="control-label col-md-4">Select Donation</label>
                            <div class="col-md-8" >       
                                <select  class="form-control"  v-model="donation"    id="description" >
                                    <option v-for="(mchango, index) in michango" :key="index" v-bind:value="mchango.id" >{{mchango.name}}</option>
                                </select>
                            </div>
                        </div>
                      
                        <div class="form-group row" v-if="!message">
                            <label class="control-label col-md-4">Amount</label>
                            <div class="col-md-8">
                                <input  class="form-control" type="text" placeholder="Please ,Enter Amount" v-model="amount"  required>
                            </div>

                        </div>

                          </div>

                       <div class="modal-footer ">
                            <div class="row">
                                <div class="col-md-7 ">
                                    <button  @click="storeData()" class="btn btn-primary" v-if="!message"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save Record</button>
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
    export default {

        data(){

              return  { 
               donation: '',
               records:[],
               record:'',
               filter:'',
               mitaa:[],
               message:'',
               parokia_id:'',
               name:'',    
               show:[],
               page_current:'',
               per_page:'',


               loading: false,
               michango:[],
               member:[],
               search:'',
               amount:'',
               family_id:'',
               total:'',
               remain:''
               
  
              
               
               }

        },
       methods:{
          
          
            // saving datas
            storeData(){
                // alert(this.amount+ " "+this.donation+" "+this.member_id)
                   this.loading=true
                    axios.post('https://bugandoparish.org/api/family_donation',{
                        family_id:this.family_id,
                        donation:this.donation,
                        amount:this.amount
                    }).then(response=>{
                        if(response.data.status==200){
                             this.loading=false
                             this.select();
                            this.$swal("Good job!", response.data.message, "success");
                        }
                        else if(response.data.status==201) {
                              this.loading=false
                             this.$swal("Oops!", response.data.message, "error"
                             );
                        }
                        
                         
                    })

                   
            },
       
           select(){         
                 this.loading=true
                  axios.post('https://bugandoparish.org/api/familyList',{
                      id:this.donation
                  })
                   .then(response => {
                        this.loading=false
                                 
                       this.record=response.data.data;
                        this.records=response.data.data.families;
                        

                       
                   })
              
                },
                get_michango(){
                    	axios.get('https://bugandoparish.org/api/get_selection_family')
                             .then(response => { 
                                 this.michango = response.data.data;
                                         
                             });
                        
                },search_function_member(){
                    axios.post('https://bugandoparish.org/api/search_family',{
                          name:this.search
                    }).then(
                        response =>{
                             if(response.data.status==200){
                                    this.member=response.data.data;
          
                        }
                        else{
                            this.$swal("Oops!", response.data.message, "error")
                        }

                        });
                    // alert(this.search)
                },DeleteData(id){

                
                 
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

                                              axios.delete('https://bugandoparish.org/api/family_donation/'+id).then(
                                                 response=>{
                                                             if(response.data.status==200)
                                                                       {
                                                                         this.select()
                                                                         this.$swal("Poof! record has been deleted", response.data.message, "success");
                                                   
                                                                       }
                                                            }
                                                                                                              )
                                 
                                                      }
                                                      
                                                             }
                                             )
                },
       },
        mounted() {
                //  this.get_alldata();
                //  this.getResults();
                 this.get_michango();
              
                 
                             
        },
       
    }
</script>

<style modules>
.quotetext{
    color: black;
    font-size: 1.9rem
}
.quoter{
    color: darkgreen;
    font-size: 2.2rem
}
</style>

