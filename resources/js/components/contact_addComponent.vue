<template>
   
    
<div class="row ">
<div class="col-md-1"></div>
<div class=" col-md-10 ">

  <div class="card">
    <div class="card-header card-header-success">
        <h4 class="card-title">LEADERS INFORMATIONS </h4>
        <p class="card-category">click card to add informations  </p>
    </div>
    <div class="card-body table-responsive">

      <div class="row m-3 pt-4">
              
                                 <div class="col-md-3  tile  text-center" >
                                     <a><span class="fa fa-building fa-5x a"></span><br></a>
                                     <span class="h3 ">Parokia</span>
                                 </div>


                                   <div class="col-md-3  tile text-center" data-toggle="modal"  data-target="#kigango">
                                     <span class="fa fa-building fa-5x b"></span><br>
                                     <span class="h3 ">Kigango</span>
                                 </div>

                                   <div class="col-md-3  tile text-center" >
                                     <span class="fa fa-home fa-5x c"></span><br>
                                     <span class="h3 ">Mtaa</span>
                                 </div>

                                   <div class="col-md-3  tile text-center">
                                     <span class="fa fa-home fa-5x d"></span><br>
                                     <span class="h3 ">Jumuiya</span>
                                 </div>
                                                    
         </div> 
       
    </div>
</div>
 
 <!-- ADD VIGANGO -->
     <div class="modal fade modal-lg" id="kigango" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
             <div class="modal-dialog" role="document">
                  <div class="modal-content">
                                <div class="modal-header">
      
                        Add Kigango Details<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                          </div>
        
                          <div class="modal-body ">
                        
                     <div class="form-group row">
                            <label class="control-label col-md-4">Choose Kigango</label>
                            <div class="col-md-8" >
                                <select  class="form-control" name="mitaa_id" v-model="selected" @change="check()"   id="description" >
                                    <!-- <option v-for="(choice, index) in choices" :key="index" v-bind:value="choice.id" >{{choice.name}}</option>
                                    <option v-for="(choice, index) in choices" :key="index" v-bind:value="choice.id" >{{choice.name}}</option> -->
                                    <option>kigango</option>
                                    <option>kigango 2</option>
                                    <option>kigango 3</option>
                                </select>

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
 <!-- END VIGANGO -->
               </div>    


</div>



<!-- </div> -->
           
              
   
</template>

<script>
    export default {

        data(){

              return  { 
             
           
                    loading:false,
                    vigango:[],
                    
                    mtaa:[],
                  

  
              
               
               }

        },
       methods:{
            
         
            get_alldata(){
                   this.loading=true
                  axios.get('https://bugandoparish.org/api/contacts')
                   .then(response => {
                          if(response.data.status==200){
                              this.loading=false
                          this.vigango=response.data.data;
                          
                          }
                       
                   })
              
              
            },getJumuiya(mtaa){
              axios.post('https://bugandoparish.org/api/mtaa_jumuiyas',{
                id:mtaa
              }).then(response=>{
                if(response.data.status==200){
                  //  this.jumuiya=response.data.data.jumuiya;
                   this.mtaa=response.data.data;
                    this.info =true;

                   
                }else{
                        // alert("we have no data")
                         this.info =false;
                }
              })
            }
       },
        mounted() {
                
                
                       this.get_alldata();
               


                        
        },
       
    }
</script>

<style modules>

.a{color:#FDB0FD;}
.b{color:#76dfc8}
.c{color:#cf6b6b}
.d{color:rgb(114, 182, 93)}

/* .department.dep-a span{ background: #FFD600; color: black}
.sections.dep-a li span{ background: #FFD600; }

.department.dep-b span{ background: #AAD4E7; color: black}
.sections.dep-b li span{ background: #AAD4E7; }

.department.dep-c span{ background: #FDB0FD; color: black}
.sections.dep-c li span{ background: #FDB0FD; }

.department.dep-d span{ background: #A3A2A2; color: black}
.sections.dep-d li span{ background: #A3A2A2; }


.department.dep-e span{ background: #f0f0f0; color: black}
.sections.dep-e li span{ background: #f0f0f0; }

.department.dep-f span{ background: #76dfc8; color: black}
.sections.dep-f li span{ background: #76dfc8; }

.department.dep-g span{ background: #cf6b6b; color: black}
.sections.dep-g li span{ background: #cf6b6b; } */



</style>
