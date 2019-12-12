<template>
    <div class="container">
        <form class="" action=''>
               
                   <div class="form-group row">
                                    <label for="title" class="col-md-1 control-label">FilterBy</label>
                                    <div class="col-md-6"> 
                                        <select v-model="selected" @change="check()"  class="form-control" id="description" name="select" >
                                       <option>--choose filter--</option>
                                        <option >Vigango</option>
                                        <option>Mtaa</option>
                                        <option>Jumuiya</option>
                                        

                                        </select>
                                    </div>


                                    <div class="col-md-5"> 
                                        <select   class="form-control" id="description" name="select" v-model="filter" @change="fun_filter()">
                                        <option v-for="(choice, index) in choices" :key="index" >{{choice.name}}</option>
                                        </select>
                                    </div>
                                
                                  
                     </div>

            </form>
            <div>
                <table class="table table-borderless table-hover">
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>

                    <tr v-for="(data, index) in datas" :key="index">
                        <td>{{data.name}}</td>
                        <td>{{data.name}}</td>
                        <td>{{data.name}}</td>
                        <td>{{data.name}}</td>
                    </tr>

                </table>
            </div>
    </div>
</template>

<script>
    export default {
         data() {
           return  { 
               selected: '',choices:[],filter:'',datas:[]
              
               
               }
        },
        methods:{

            check(){
               
                    if(this.selected=="Vigango"){
                        
                          axios.get('https://bugandoparish.org/api/filter')
                         .then(response =>this.choices = response.data.data)
                         

                
                    }
                   else if(this.selected=="Mtaa"){
                            axios.get('https://bugandoparish.org/api/mtaa')
                         .then(response =>this.choices = response.data.data)
                   }

                     else if(this.selected=="Jumuiya"){
                             axios.get('https://bugandoparish.org/api/jumuiya')
                         .then(response =>this.choices = response.data.data)
                   }
                  
                    else{
                        alert('check again')
                   }     


                    
            },
            fun_filter(){
                

                if(this.selected=="Vigango"){
                        
                     axios.post("https://bugandoparish.org/api/kigango_member",{
                         data:this.filter
                     }).then(response =>{
                        this.datas = response.data.data;
                        console.log(response.data.data);
                     })
                        //   alert("select vigango " +this.filter); 

                
                    }
                   else if(this.selected=="Mtaa"){
                           alert("select mitaa");  
                   }

                     else if(this.selected=="Jumuiya"){
                             alert("select jumuiya");
                          
                   }
                  
                    else{
                        alert('check again')
                   }     
            }

        },
        
        mounted() {
            axios.get('https://bugandoparish.org/api/filter')
                 .then(response =>this.vigango = response.data.data)

                
                 
        },
       
    }
</script>
