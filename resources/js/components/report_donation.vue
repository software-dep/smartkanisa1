<template>

    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
          
<!--            ;dfksd;lfk;sd -->
  <div v-if="!donation==''">
                    <div v-if="loading==true">

                    </div>
                    <div v-else>
                        <div v-if="records.length==0">

                        </div>
                        <div v-else>

                        </div>

                    </div>

                </div>
                <div v-else>
                         <!-- picture -->
                          <div class="col-sm-1"></div>
                        <div class="col-sm-10"><img :src="'http://bugandoparish.org/images/apple.jpg'" style="width:100%"></div>
                        <div class="col-sm-1"></div>
                </div>

        </div>
<div class="col-md-1"></div>

 
    

     
           
    </div>
</template>

<script>
    export default {

        data(){

              return  { 
              
             
               
  
              
               
               }

        },
       methods:{
             check(){
                     
                       
                               
            },
          
            
     
       },
        mounted() {
              alert('hellow')
              
                 
                             
        },
       
    }
</script>

