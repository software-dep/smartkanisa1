<template>

    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
           
           
                  <div class="tile" >

                <div class='row tile-title'>
                   <h3 class="col-sm-10">Filter Member</h3>
                   <span class="pull-right col-sm-2"></span>
                </div>
                     
                  <div class="tile">
                      <div class="row">
                          <div class="col-md-3">
                                    <select  class="form-control"  v-model="kigango" @change="get_mtaa()" >
                                    <option   v-for="(k, index) in vigango" :key="index" v-bind:value="k.id">{{k.name}}</option>
                                   
                                </select>
                          </div>

                          <div class="col-md-3" >
                             
                                <select  class="form-control"  v-model="mtaa" @change="get_jumuiya()">
                                    <option    v-for="(don, index) in mitaa" :key="index" v-bind:value="don.id">{{don.name}}</option>
                                </select>
                          </div>

                             <div class="col-md-3" >
                                <select  class="form-control"  v-model="id" @change="view_jumuiya()">
                                    <option    v-for="(don, index) in jumuiyas" :key="index" v-bind:value="don.id" v-bind:j_name="don.name">{{don.name}}</option>
                                </select>
                          </div>

                          


                  <div class="col-md-3">
                         
                          <button class="btn btn-primary" @click="get_jumuiya_name()">Report Generate</button> 
                          </div>
                      </div> 

                  </div>
                  
                  
                  <div v-if="!mitaa.length==''">
                  <div v-if="!jumuiyas.length==''">
                    <div v-if="!members.length==''">
                          
                     <table  class="table table-bordered table-hover">
                        <thead>
                        <tr class="table-primary">
                            <th>No.</th>
                            <th>Name</th>
                            <th>Number</th>          
                        </tr>
                        </thead>

                             
                        <tbody>
                            <tr v-for="(m, index) in members" :key="index" >
                                <td>{{index+1}} </td>
                                <td>{{m.name}} </td>
                                <td>{{m.number}} </td>                      
                            </tr>     
                        </tbody>
                    
                    </table>
                       
                    </div>
                    <!-- <div v-else>
                         <div class=" alert alert-info alert-dismissible">There is no data at this time</div>
                    </div> -->
                    </div>
                    </div>
                   
               


            </div>
        </div>
<div class="col-md-1"></div>
     

      
           
    </div>
</template>

<script>
    var pdfMake = require('pdfmake/build/pdfmake.js');
    var pdfFonts = require('pdfmake/build/vfs_fonts.js');
    pdfMake.vfs = pdfFonts.pdfMake.vfs;
    export default {

        data(){

              return  { 
               vigango:[],
               mitaa:[],
               jumuiyas:[],
               members:[],
               kigango:'',
               mtaa:'',
               j_name:'',
               id:'',
               jumuiya_spec:'',


               loading: false
              
               
               }

        },
       methods:{

        get_kigango(){
         
            
axios.get('http://localhost:8000/api/filter').then(response=>{
    this.vigango = response.data.data;
});
          
        },get_mtaa(){
            // alert(this.kigango);
              axios.post('http://localhost:8000/api/get_mitaa',{
                           data:this.kigango
   
                        }).then(response => {
                            if(response.data.status == 404){
        
                            }else{
                            
                               
                               this.mitaa =  response.data.data; 
                               console.log(response.data.data)
                                   
                            }
                                            
                        })
          
        
        },get_jumuiya(){

                  axios.post('http://localhost:8000/api/get_jumuiya',{
                           
                           data:this.mtaa
   
                        }).then(response => {
                            if(response.data.status == 404){
                                // this.message2 =  "no data";
                            }else{
                            
                                // this.message2 ='';
                                this.jumuiyas =  response.data.data; 
                                   
                            }
                                            
                        })
                       

        },view_jumuiya(){

         this.loading = true;
               axios.post('http://localhost:8000/api/search_members_jumuiya',{
                           
                           id:this.id
   
                        }).then(response => {
                            if(response.data.status == 200){
                                this.members=response.data.data;
                                  this.loading = false;
                                
                            }else{
                                this.$swal("Oops!","there is no data at this time", "error")
                                 this.loading = false;
                                
                                   
                            }
                                            
                        })
        },generate_Report(){



       var parse_obj = this.members;
       parse_obj.unshift({ 
            "id": 16,
            "name": "JINA LA MUUMINI",
            "jumuiya_id": 91,
            "created_at": "2019-02-21 12:39:42",
            "updated_at": "2019-03-05 09:17:19",
            "number": "Number Ya Bahasha",
            "baba": "ddddd",
            "mama": "sssss",
            "gender": "male",
            "mahali": "sdd",
            "tarehe_kuzaliwa": "2019-02-18",
            "status": 1,
            "mji": "-",
            "tarehe_kubatizwa": "0001-01-01",
            "no_ubatizo": "-",
            "parokia_ubatizo": "-",
            "msimamizi_ubatizo": "-",
            "komunyo_ya_kwanza": "0001-01-01",
            "komunyo_parish": "-",
            "kipaimara": "0001-01-01",
            "no_kipaimara": "-",
            "parokia_kipaimara": "-",
            "tarehe_ndoa": "0001-01-01",
            "no_ndoa": "-",
            "partiner": "-",
            "parokia_ndoa": "-",
            "familia_id": 66
       })
              
                
        var sourceData = this.members
        var bodyData = [];

        var count = 0;
       
          var jumuiya = this.j_name;
        
     
        
       
      


// for data
sourceData.forEach(function(sourceRow) {
  var dataRow = [];

   if(count==0){
                 count++;
                  dataRow.push("NO")         
           } else{
              dataRow.push(count++);
           }  
  dataRow.push(sourceRow.name);    
  dataRow.push(sourceRow.number);


  bodyData.push(dataRow)
});



var dd = {
    pageSize: 'A4',
    content: [
        	{
			text: 'BUGANDO PARISH MEMBER REPORT\n\n',
			style: 'header'
		},
        	{
			text: 'JUMUIYA YA mt. '+jumuiya+'\n\n',
			style: 'header2'
		},
  
        {
             table: {
                   headerRows: 1,
         widths: [ 'auto','*' ,'*'],
                 body:bodyData
            }
        }
    ],	styles: {
		header: {
			fontSize: 18,
            bold: true,
            alignment: 'center'
		},
        header2:{
           fontSize: 13,
            bold: true,
            alignment: 'center'
        },
        }
}
pdfMake.createPdf(dd).download(" "+jumuiya+" members.pdf");
parse_obj.shift()
     
      
        },get_jumuiya_name(){
            // getting jumuiya name
  axios.post('http://localhost:8000/api/get_jumuiya_spec',{id:this.id}).then(response=>{
      this.jumuiya_spec = response.data.data;
    this.j_name = this.jumuiya_spec.name;
    
    // alert("check point station 1 "+this.j_name);
    this.generate_Report()
    

});


        }

              

       },
        mounted() {
             

this.get_kigango();
                        
        },
       
    }
</script>
