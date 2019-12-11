<template>
    <div class="tile">
      

           <div class="tile">
              <div class="tile" style="background-color:rgba(0, 0, 0, 0.09);"><center> <h5>personal information</h5></center></div>
<!-- search family -->
               <div class="row">
                   <!-- <lable class="col-md-2">Search Family Name</lable> -->
                   <div class="form-group col-md-6">
                          <label >Search Family Name</label>
                       <input type="text" class="form-control" v-model="search" @keyup="search_family()" placeholder="please write name of family">
                    
                   </div>
                   <div class="form-group col-md-6">
                                <label >Family name<span style="color:red">*</span></label>
                                <select  class="form-control" name="familia_id" v-if="!familia_id==''" id='familia_id' style="border-color:black" v-model="familia_id">
                                        <option  >--chagua--</option> 
                                        <option v-for="(family, index) in families" :key="index"  v-bind:value="family.id">{{family.name}} :jumuiya - {{family.jumuiya.name}} :mtaa - {{family.jumuiya.mtaa.name}}</option>                                          
                                 </select>

                                  <select  class="form-control" name="familia_id" v-if="familia_id==''" id="familia_id" v-model="familia_id">
                                        <option  >--chagua--</option> 
                                        <option v-for="(family, index) in families" :key="index"  v-bind:value="family.id">{{family.name}} :jumuiya - {{family.jumuiya.name}} :mtaa - {{family.jumuiya.mtaa.name}}</option>                                          
                                 </select>
                                
                               
              </div>
               </div>

 <!--END  search family -->

 <div class="form-row">
              
               <div class="form-group col-md-4">
                                <label >Full Name<span style="color:red">*</span></label>
                                 <input  class="form-control" type="text" id="name" v-model="name" v-if="!name==''" style="border-color:black" placeholder="eg geofrey boniphace bundala">                                                                                    
                                 <input  class="form-control" type="text" id=name v-model="name" v-if="name==''"  placeholder="eg geofrey boniphace bundala">                                                                                    
              </div>

               <div class="form-group col-md-4">
                                <label > Father Full Name<span style="color:red">*</span></label>
                                 <input  class="form-control" type="text" v-model="baba" id="baba" v-if="!baba==''" style="border-color:black" placeholder="eg.boniphace mabula bundala">                                                                                    
                                 <input  class="form-control" type="text" v-model="baba" id="baba" v-if="baba==''" placeholder="eg.boniphace mabula bundala">                                                                                    
              </div>

              <div class="form-group col-md-4">
                                <label > Mother Full Name<span style="color:red">*</span></label>
                                 <input  class="form-control" type="text" v-model="mama" id="mama" v-if="!mama==''" style="border-color:black" placeholder="eg.monica lucas">                                                                                    
                                 <input  class="form-control" type="text" v-model="mama" id="mama" v-if="mama==''"  placeholder="eg.monica lucas">                                                                                    
              </div>

 </div>


 <div class="form-row">
              <div class="form-group col-md-4">
                          
                     

      <legend class="col-form-label col-sm-2 pt-0">Gender<span style="color:red">*</span></legend>
      <div class="col-sm-10">
        <div class="form-check">
          <input class="form-check-input" type="radio" v-model='gender'  id="female" value="female" checked>
          <label class="form-check-label" >
            Female
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" v-model='gender' id="male" value="male">
          <label class="form-check-label" >
            Male
          </label>  
        </div>
    
      </div>
  
              </div>

              <div class="form-group col-md-4">
                                <label >Birth Date<span style="color:red">*</span></label>
                               
                                 <input  class="form-control" type="date" v-model="birthdate" id="birthdate"  v-if="!birthdate==''" style="border-color:black" >                                                                                    
                                 <input  class="form-control" type="date" v-model="birthdate"  id="birthdate" v-if="birthdate==''" >                                                                                    
                                   
              </div>


                 <div class="form-group col-md-4">
                   <!-- mahali -->
                                <label >Place<span style="color:red">*</span></label>
                                 <!-- <input  class="form-control" type="text" placeholder="eg.Mwanza" v-model="mahali"  v-if="!mahali==''" style="border-color:black">                                                                                    
                                 <input  class="form-control" type="text" placeholder="eg.Mwanza" v-model="mahali"  v-if="mahali=  -->
                                  <input  class="form-control" type="text" v-model="mahali" id="mahali" v-if="!mahali==''" style="border-color:black" placeholder="eg.mwanza">                                                                                    
                                 <input  class="form-control" type="text" v-model="mahali" id="mahali" v-if="mahali==''"  placeholder="eg.mwanza">                                                                                    
              </div>
 </div>

 <div class="form-row">
<div class="col-md-4"><span style="color:red">*</span> required</div>
<div class="col-md-4"></div>
<div class="col-md-4">
       <div class="checkbox">
           <label><input type="checkbox" v-model="baptized" @change="babptized()"> Baptized</label>
       </div>
</div>
 </div>




           </div>
           <!-- END OF PERSONAL DETAILS -->
<div v-if="baptized == true">
  
 
            
<!-- BAPTIZED DETAILS -->
           <div class="tile">
               <div class="tile" style="background-color:rgba(0, 0, 0, 0.09);"><center> <h5>baptized information</h5></center></div> 
 <div class="form-row">
              
               <div class="form-group col-md-4">
                                <label >Region</label>
                                 <input  class="form-control" type="text" v-model="mji" id="mji" v-if="!mji==''" style="border-color:black" placeholder="eg.mwanza">                                                                                    
                                 <input  class="form-control" type="text" v-model="mji" id="mji" v-if="mji==''"  placeholder="eg.mwanza">                                                                                    
              </div>

               <div class="form-group col-md-4">
                                <label >Baptized Date</label>
                                 <input  class="form-control" type="date" v-model="tarehe_kubatizwa" id="tarehe_kubatizwa" v-if="!tarehe_kubatizwa==''" style="border-color:black">                                                                                    
                                 <input  class="form-control" type="date" v-model="tarehe_kubatizwa" id="tarehe_kubatizwa" v-if="tarehe_kubatizwa==''" >                                                                                    
              </div>

              <div class="form-group col-md-4">
                                <label >Baptized No</label>
                                 <input  class="form-control" type="text" v-model="no_ubatizo" id="no_ubatizo" v-if="!no_ubatizo==''" style="border-color:black">                                                                                    
                                 <input  class="form-control" type="text" v-model="no_ubatizo" id="no_ubatizo"  v-if="no_ubatizo==''" >                                                                                    
              </div>

 </div>


  <div class="form-row">
              
               <div class="form-group col-md-6">
                                <label >Baptized Parish</label>
                                 <input  class="form-control" type="text" placeholder="eg.bugando" id="parokia_ubatizo" v-if="!parokia_ubatizo==''" style="border-color:black" v-model="parokia_ubatizo">                                                                                    
                                 <input  class="form-control" type="text" placeholder="eg.bugando" id="parokia_ubatizo" v-model="parokia_ubatizo" v-if="parokia_ubatizo==''" >                                                                                    
              </div>

               <div class="form-group col-md-6">
                                <label >Miz Baptized</label>
                                 <input  class="form-control" type="text" v-model="msimamizi_ubatizo"  id="msimamizi_ubatizo" v-if="!msimamizi_ubatizo==''" style="border-color:black">                                                                                    
                                 <input  class="form-control" type="text" v-model="msimamizi_ubatizo" id="msimamizi_ubatizo" v-if="msimamizi_ubatizo==''" >                                                                                    
              </div>

            

 </div>


 <div class="form-row">
     <div class="col-md-4"></div>
     <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                            
                                 <div class="checkbox">
                               <label><input type="checkbox" v-model="communion" @change="Communion()"> Communion</label>
                              </div>                                                                                 
              </div>
 </div>


           </div>
  <!-- END OF BAPTIZED DETAILS -->

<div v-if="communion == true">
           <!-- COMMUNION -->
           <div class="tile">
               <div class="tile" style="background-color:rgba(0, 0, 0, 0.09);"><center><h5>Communion Details</h5></center></div>
  <div class="form-row">
              
               <div class="form-group col-md-6">
                                <label >Communion Date</label>
                                 <input  class="form-control" type="date" v-model="komunyo_ya_kwanza" id="komunyo_ya_kwanza" v-if="!komunyo_ya_kwanza==''" style="border-color:black">                                                                                    
                                 <input  class="form-control" type="date" v-model="komunyo_ya_kwanza" id="komunyo_ya_kwanza" v-if="komunyo_ya_kwanza==''" >                                                                                    
              </div>

               <div class="form-group col-md-6">
                                <label >Communion Parish</label>
                                 <input  class="form-control" type="text" placeholder="eg. Bugando" v-model="komunyo_parish" id="komunyo_parish" v-if="!komunyo_parish==''" style="border-color:black">                                                                                    
                                 <input  class="form-control" type="text" placeholder="eg. Bugando" v-model="komunyo_parish" id="komunyo_parish" v-if="komunyo_parish==''" >                                                                                    
              </div>

            

 </div>


  <div class="form-row">
     <div class="col-md-4"></div>
     <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                            
                                 <div class="checkbox">
                               <label><input type="checkbox" v-model="confimation" @change="Confimation()"> Confimation</label>
                              </div>                                                                                 
              </div>
 </div>

           </div>
           <!-- END OF COMMUNION -->

<div v-if="confimation == true">
           <!-- CONFIMATION  -->
                    <div class="tile">
               <div class="tile" style="background-color:rgba(0, 0, 0, 0.09);"><center><h5>Confimation Details</h5></center></div>
               <div class="form-row">
              
               <div class="form-group col-md-4">
                                <label >Confimation  Date</label>
                                 <input  class="form-control" type="date" v-model="kipaimara" id="kipaimara" v-if="!kipaimara==''" style="border-color:black">                                                                                    
                                 <input  class="form-control" type="date" v-model="kipaimara" id="kipaimara" v-if="kipaimara==''" >                                                                                    
              </div>

                <div class="form-group col-md-4">
                                <label >Confimation  No</label>
                                 <input  class="form-control" type="text" placeholder="eg. Lc 3434" v-model="no_kipaimara" id="no_kipaimara" v-if="!no_kipaimara==''" style="border-color:black">                                                                                    
                                 <input  class="form-control" type="text" placeholder="eg. Lc 3434" v-model="no_kipaimara" id="no_kipaimara" v-if="no_kipaimara==''">                                                                                    
              </div>

               <div class="form-group col-md-4">
                                <label >Confimation  Parish</label>
                                 <input  class="form-control" type="text" placeholder="eg. Bugando" v-model="parokia_kipaimara" id="parokia_kipaimara" v-if="!parokia_kipaimara==''" style="border-color:black">                                                                                    
                                 <input  class="form-control" type="text" placeholder="eg. Bugando" v-model="parokia_kipaimara" id="parokia_kipaimara" v-if="parokia_kipaimara==''">                                                                                    
              </div>

           </div>

            <div class="form-row">
               <div class="col-md-4"></div>
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                            
                                 <div class="checkbox">
                               <label><input type="checkbox" v-model="marriage" @change="Marriage()"> Marriage</label>
                              </div>                                                                                 
              </div>
          </div>

           </div>

           <!-- END OF COMFIMATION -->
<div v-if="marriage == true">
           <!-- MARRAGE -->
                        <div class="tile">
               <div class="tile" style="background-color:rgba(0, 0, 0, 0.09);"><center><h5>Marriage Details</h5></center></div>
               <div class="form-row">
               
               <div class="form-group col-md-3">
                                <label >With</label>
                                 <input  class="form-control" type="text"  placeholder="Please write fullname" v-model="partiner" id="partiner" v-if="!partiner==''" style="border-color:black">                                                                                    
                                 <input  class="form-control" type="text"  placeholder="Please write fullname" v-model="partiner" id="partiner" v-if="partiner==''">                                                                                    
              </div>

               <div class="form-group col-md-3">
                                <label >Marriage Date</label>
                                 <input  class="form-control" type="date" v-model="tarehe_ndoa" id="tarehe_ndoa" v-if="!tarehe_ndoa==''" style="border-color:black" >                                                                                    
                                 <input  class="form-control" type="date" v-model="tarehe_ndoa" id="tarehe_ndoa" v-if="tarehe_ndoa==''"  >                                                                                    
              </div>

                <div class="form-group col-md-3">
                                <label >Marriage No</label>
                                 <input  class="form-control" type="text" v-model="no_ndoa" id="no_ndoa" v-if="!no_ndoa==''" style="border-color:black">                                                                                    
                                 <input  class="form-control" type="text" v-model="no_ndoa" id="no_ndoa" v-if="no_ndoa==''">                                                                                    
              </div>

               <div class="form-group col-md-3">
                                <label >Marriage Parish</label>
                                 <input  class="form-control" type="text" v-model="parokia_ndoa" id="parokia_ndoa" placeholder="eg. Bugando" v-if="!parokia_ndoa==''" style="border-color:black">                                                                                    
                                 <input  class="form-control" type="text" v-model="parokia_ndoa" id="parokia_ndoa" placeholder="eg. Bugando" v-if="parokia_ndoa==''" >                                                                                    
              </div>


            

 </div>

           </div>
           <!--END  MARRAGE -->
           </div>
           </div>
           </div>
           </div>



                        <div class="tile-footer">
                            <div class="row">

                                <div class="col-md-5 col-md-offset-3" v-if="loading==false">
                                    <button @click="save_data()" class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save Member </button>&nbsp;&nbsp;&nbsp;
               
     
                                </div>

                                <div class="col-md-5">
                                  <div class='row'>
                                    <div class="col-sm-5">
                                              <RingLoader color="green" class="custom-class" :loading="loading" :size="25" :sizeUnit="px"></RingLoader>
                           
                                    </div>
                                    <div class="col-sm-7">
                                               <button @click="save_cancel()" class="btn btn-primary" v-if="loading==true" type="submit">Cancel </button>&nbsp;&nbsp;&nbsp;
                                    </div>
                                  </div>
                                </div>
                            </div>

                        </div>

                     


         
    </div>
</template>

<script>
    export default {
         data() {
           return  { 


            //  other data
            loading:false,
            //    form expansions
               baptized:false,
               communion:false,
               confimation:false,
               marriage:false,
              

            //    form data
            search:'',
             families:[],
            //  form values
             name:'',
             baba:'',
             mama:'',
             gender:'',
             birthdate:'',
             familia_id:'',
             mahali:'',

            //  ubatizo
            tarehe_kubatizwa:'',
            no_ubatizo:'',
            parokia_ubatizo:'',
            msimamizi_ubatizo:'',
            mji:'',

            // communion
            komunyo_ya_kwanza:'',
            komunyo_parish:'',

            // confirmation
            kipaimara:'',
            no_kipaimara:'',
            parokia_kipaimara:'',

            // ndoa
            partiner:'',
            tarehe_ndoa:'',
            parokia_ndoa:'',
            no_ndoa:'',

            
              

              
               
               }
        },
        methods:{
            search_family(){
                           
                          axios.post('https://bugandoparish.org/api/waumini_search',{
                          name:this.search
   
                        }).then(response => {
                            if(response.data.status == 404){
                                  // this.$swal("Oops!", "Input does not match our record! please try again!", "error")
                                 
                            }else{
                          
                              
                                this.families =  response.data.data;
                              //console.log(response.data.data)
   
                            }
                                            
                        })
                          },
                          save_cancel(){
                            this.loading=false
                          },
              save_data(){

                        this.loading=true;

                       axios.post('https://bugandoparish.org/api/waumini',{

                        //  for check
                         baptized:this.baptized,
                        communion:this.communion,
                      confimation:this.confimation,
                         marriage:this.marriage,

                          name:this.name,
                          baba:this.baba,
                          mama:this.mama,
                          gender:this.gender,
                          familia_id:this.familia_id,
                          birthdate:this.birthdate,
                          mahali:this.mahali,


                          tarehe_kubatizwa:this.tarehe_kubatizwa,
                          no_ubatizo:this.no_ubatizo,
                          parokia_ubatizo:this.parokia_ubatizo,
                          msimamizi_ubatizo:this.msimamizi_ubatizo,
                          mji:this.mji,


                          komunyo_ya_kwanza:this.komunyo_ya_kwanza,
                          komunyo_parish:this.komunyo_parish,
                          
                          kipaimara:this.kipaimara,
                          no_kipaimara:this.no_kipaimara,
                          parokia_kipaimara:this.parokia_kipaimara,


                          tarehe_ndoa:this.tarehe_ndoa,
                          no_ndoa:this.no_ndoa,
                          parokia_ndoa:this.parokia_ndoa,
                          partiner:this.partiner


                        }).then(response => {
                            if(response.data.status == 404){
                                  
                                 this.$swal("Oops!", response.data.message, "error");
                                 this.loading = false;
                                 
                            }
                             else if(response.data.status==201) {
                             this.$swal("Oops!", response.data.message, "error");
                             this.loading = false;
                        }
                             else{
                          
                              
                            this.$swal("Good job!",this.name +", "+response.data.message , "success");
                            this.loading = false;
             this.name=''
             this.gender=''
             this.birthdate=''
           

            //  ubatizo
            this.tarehe_kubatizwa=''
            this.no_ubatizo=''
            this.parokia_ubatizo=''
            this.msimamizi_ubatizo=''
            this.mji=''

            // communion
            this.komunyo_ya_kwanza=''
            this.komunyo_parish=''

            // confirmation
            this.kipaimara=''
           this.no_kipaimara=''
            this.parokia_kipaimara=''

            // ndoa
            this.partiner=''
            this.tarehe_ndoa=''
            this.parokia_ndoa=''
            this.no_ndoa=''
   
                            }
                                            
                        })

              },babptized(){
                if( this.baptized==true){
                  if(this.name==''||this.baba==''||this.mama==''||this.gender==''||this.birthdate==''||this.familia_id==''||this.mahali==''){
                       if(this.name==''){document.getElementById('name').style.borderColor="red";  this.baptized=false}
                        if(this.familia_id==''){document.getElementById('familia_id').style.borderColor="red"; this.baptized=false}
                        if(this.baba==''){document.getElementById('baba').style.borderColor="red";this.baptized=false}
                       if(this.mama==''){document.getElementById('mama').style.borderColor="red";this.baptized=false}
                       if(this.mahali==''){document.getElementById('mahali').style.borderColor="red"; this.baptized=false}
                       if(this.birthdate==''){document.getElementById('birthdate').style.borderColor="red"; this.baptized=false}
                  }

                 else{
                     this.baptized=true

                 }
                       }

                
              } ,Communion(){
                if(this.communion==true){
                  if(this.tarehe_kubatizwa==''||this.no_ubatizo==''||this.parokia_ubatizo==''||this.msimamizi_ubatizo==''||this.mji==''){
                       if(this.tarehe_kubatizwa==''){document.getElementById('tarehe_kubatizwa').style.borderColor="red";  this.communion=false}
                        if(this.no_ubatizo==''){document.getElementById('no_ubatizo').style.borderColor="red"; this.communion=false}
                        if(this.parokia_ubatizo==''){document.getElementById('parokia_ubatizo').style.borderColor="red";this.communion=false}
                       if(this.msimamizi_ubatizo==''){document.getElementById('msimamizi_ubatizo').style.borderColor="red";this.communion=false}
                       if(this.mji==''){document.getElementById('mji').style.borderColor="red"; this.communion=false}
                       

                  }else{
                     this.communion=true
                  }

                }
              },Confimation(){
                if(this.confimation==true){
                  if(this.komunyo_ya_kwanza==''||this. komunyo_parish==''){
                       if(this.komunyo_ya_kwanza==''){document.getElementById('komunyo_ya_kwanza').style.borderColor="red";  this.confimation=false}
                        if(this.komunyo_parish==''){document.getElementById('komunyo_parish').style.borderColor="red"; this.confimation=false}
                        
                  }else{
                     this.confimation=true
                  }

                }
              },Marriage(){
             
          
                if(this.marriage==true){
                  
                  if(this.kipaimara==''||this.no_kipaimara==''||this.parokia_kipaimara==''){
                       if(this.kipaimara==''){document.getElementById('kipaimara').style.borderColor="red";  this.marriage=false}
                        if(this.no_kipaimara==''){document.getElementById('no_kipaimara').style.borderColor="red"; this.marriage=false}
                        if(this.parokia_kipaimara==''){document.getElementById('parokia_kipaimara').style.borderColor="red"; this.marriage=false}
                       
                        
                  }else{
                     this.marriage=true
                  }

                }
              }          


        },
        
        mounted() {
           console.log('members')
           search_family()
                
                 
        },
       
    }
</script>
