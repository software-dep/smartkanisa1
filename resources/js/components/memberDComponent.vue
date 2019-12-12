<template>

    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
          
           
                  <div class="tile" >

                <div class='row tile-title'>
                   <h3 class="col-sm-10">Member Paid</h3>
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
              <center> <DotLoader color="green" class="custom-class" :loading="loading" :size="70" :sizeUnit="px"></DotLoader></center> 
</div>
<div v-else>
    <div v-if="!records.length==0">
         <div class="table-responsive-sm table-responsive-md" >
            <table  class="table table-bordered table-hover"  style="width:100%">
                        <thead>
                        <tr >
                            <th>No.</th>
                            <th>Name</th>
                            <th>Number</th>
                            <th>Donation</th>
                            <th>Amount</th>
                            <th>Paid</th>
                            <!-- <th>Remained</th>
                            <th>Excess</th> -->
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
                                <td class="text-capitalize">{{rec.number}}</td>
                                <td class="text-capitalize">{{record.name}}</td>
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
                        <!-- <tfoot  class="table-dark">
                             <tr class="lead">
                               
                                <td colspan="5">TOTAL</td>
                                <td colspan="1">{{total}}/=</td>
                                <td colspan="1" >{{-remain}}/=</td>
                                <td colspan="2" >{{-excess}}/=</td>
                            </tr>

                        </tfoot> -->
                    </table>

    </div>
    </div>
    <div v-else>
        <div class="alert alert-info">There is no any Member Record. </div>
    </div>

</div>

</div>
<div v-else>
                                  
                        <div class="col-sm-12">
                                    <blockquote class="blockquote text-center mt-5 ">
             <p >
                 <span class="fa fa-quote-left "></span>
                 <span class="">
                   Praise the Lord! Happy are those who fear the Lord. They are not afraid of evil tidings; their hearts are firm, secure in the Lord. Their hearts are steady, they will not be afraid.
                 </span>
               
                 <span class="fa fa-quote-right "></span>
             </p>
             <div class="blockquote-footer">
                 <h4>  Psalm 112: 1, 7-8 </h4>
                

             </div>
         </blockquote>

                        </div>
     
</div>

                   
                

                
                   
      
                 
               


            </div>
        </div>
<div class="col-md-1"></div>

 
    

        <div class="modal fade modal-lg" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
             <div class="modal-dialog" role="document">
                  <div class="modal-content">
                                <div class="modal-header">
      
                        ADD MEMBER RECORD<button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                                        <input class="form-control form-control form-control-borderless" type="text" placeholder="please ,write member number here" v-on:keyup="search_function_member()" v-model="search">
                                    </div>
                                  </div>
                              </div>


                                 <div class="form-group row">
                                  <label class="control-label col-md-4">Choose Member</label>
                                  <div class="col-md-8">
                                          <select  class="form-control"  v-model="member_id"    id="description" >
                                    <option v-for="(m, index) in member" :key="index" v-bind:value="m.id">{{m.number}}:{{m.name}}</option>
                                    
                                </select>
                                  </div>
                              </div>
                        
                     <div class="form-group row">
                            <label class="control-label col-md-4">Choose Donation</label>
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
               member_id:'',
               total:'',
               remain:''
               
  
              
               
               }

        },
       methods:{
         
        
            // saving datas
            storeData(){
                // alert(this.amount+ " "+this.donation+" "+this.member_id)
                   this.loading=true
                    axios.post('https://bugandoparish.org/api/member_donation',{
                        member_id:this.member_id,
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
                    //  alert('m here')
                  axios.post('https://bugandoparish.org/api/memberList',{
                      id:this.donation
                  })
                   .then(response => {
                       if(response.data.status==200){
                           this.loading=false             
                           this.record=response.data.data;
                           this.records=response.data.data.members;
                            //alert(this.records)

                       }else{
                           this.$swal("Oops!", response.data.message, "error")
                       }
                        
                       

                       
                   })
                },
                get_michango(){
                    	axios.get('https://bugandoparish.org/api/get_selection')
                             .then(response => { 
                                 this.michango = response.data.data;
                                         
                             });
                        
                },search_function_member(){
                    axios.post('https://bugandoparish.org/api/search_member',{
                          number:this.search
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

                                              axios.delete('https://bugandoparish.org/api/member_donation/'+id).then(
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
               
                 this.get_michango();
              
                 
                             
        },
       
    }
</script>

<style modules>
.quotetext{
    color: black;
    font-size: 1.8rem
}
.quoter{
    color: darkgreen;
    font-size: 2.1rem
}
</style>
