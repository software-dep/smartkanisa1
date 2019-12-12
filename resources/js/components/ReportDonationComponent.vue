<template>

    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
           
           
                  <div class="tile" >

                <div class='row tile-title'>
                   <h3 class="col-sm-10">Filter Donation Report By</h3>
                   <span class="pull-right col-sm-2"></span>
                </div>
               
                 
                  <div class="tile">
                      <div class="row">
                          <div class="col-md-4">
                                <!-- <label>Donation Type</label> -->
                                    <select  class="form-control"  v-model="donation_type" @change="main_donation()">
                                    <option   value="Member" >Member-Donation</option>
                                    <option   value="Family" >Family-Donation</option>
                                    <option   value="Jumuiya" >Jumuiya-Donation</option>
                                    <option   value="Mtaa" >Mtaa-Donation</option>
                                    <option   value="Kigango" >Kigango-Donation</option>
                                </select>
                          </div>

                          <div class="col-md-4" v-if="!donation_type==''">
                              <!-- <label>{{donation_type}} Donations List</label> -->
                                <select  class="form-control"  v-model="donations_specific" @change="donationList()">
                                    <option    v-for="(don, index) in donations_data" :key="index" v-bind:value="don.id">{{don.name}}</option>
                                </select>
                          </div>


                  <div class="col-md-4" v-if="!donations_specific==''">
                         
                          <button class="btn btn-primary" @click="generate_Report()">Report Generate</button> 
                          </div>
                      </div>

                  </div>


                    <div v-if="empty==''">
                        <div v-if="loading==true">
                                <!-- loading option -->
                                <center><RingLoader color="blue" class="custom-class" :loading="loading" :size="50" :sizeUnit="px"></RingLoader></center>
                        </div>
                        <div v-else>
                            <div class="table-responsive-sm table-responsive-md">
                                <table  class="table table-bordered table-hover" v-if="!donations_specific==''  " style="width:100%">
                        <thead>
                        <tr v-if="loading==false">
                            <th>No.</th>
                            <th>Name</th>
                       
                          
                            <th>Amount</th>
                            <th>Paid</th>
                            <th>Remained</th>
                            <th>Excess</th>
                           
                        </tr>

                        </thead>

                             
                        <tbody >
                            <span style="display:none">{{total=0}}</span>
                            <span style="display:none">{{remain=0}}</span>
                            <span style="display:none">{{excess=0}}</span>

                            <tr v-for="(rec, index) in records" :key="index" >
                                <td>{{index+1}} </td>
                                <td class="text-capitalize">{{rec.name}}</td>
                            
                                <td class="text-capitalize">{{record.amount}}</td>
                                <td class="text-capitalize">{{rec.pivot.amount}}</td>
                                <td class="text-capitalize">
                                    <span style="display:none">{{total+= rec.pivot.amount}}</span>
                                 <span class="text-success fa fa-handshake-o" v-if="(record.amount)-(rec.pivot.amount)<0"></span>
                                 <span class="fa fa-check" v-if="(record.amount)-(rec.pivot.amount)==0"></span>
                                 <span class="text-danger " v-if="(record.amount)-(rec.pivot.amount)>0"> 
                                     <span style="display:none">{{remain+=-(record.amount)+(rec.pivot.amount)}}</span>
                                     {{-(record.amount)+(rec.pivot.amount)}} </span>
                                    
                                    </td>

                                     <td class="text-capitalize">
                                    <span v-if="(record.amount)-(rec.pivot.amount)<0">
                                       <span style="display:none">{{excess+=(record.amount)-(rec.pivot.amount)}}</span>
                                      {{-(record.amount)+(rec.pivot.amount)}}
                                      </span>
                                      <span v-else>-</span>
                                  </td>   
                              
                               
                              

                            </tr>
                           
                            
                        </tbody>
                       <tfoot class="table-dark">
                             <tr class="lead">
                               
                                <td colspan="3">TOTAL</td>
                                <td colspan="1">{{total}}/=</td>
                                <td colspan="1" >{{-remain}}/=</td>
                                <td colspan="1" >{{-excess}}/=</td>
                            </tr>
                               <span style="display:none">{{jumla_makusanyo=total}}</span>
                               <span style="display:none">{{jumla_deni=-remain}}</span>
                               <span style="display:none">{{jumla_ziada=-excess}}</span>
                        </tfoot>
                    </table>
                        </div>
                        </div>

                    </div>
                    <div v-else>
                         <div class=" alert alert-info alert-dismissible">{{empty}}</div>
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
                //input data
                donation_type: '',
                donations_specific:'',
                donations_data:[],
                records:[],
                report:[],
                record:'',
                empty:'',
                jumla_makusanyo:'',
                jumla_deni:'',
                jumla_ziada:'',
                

            


               loading: false
              
               
               }

        },
       methods:{

        main_donation(){
            // alert(this.donations_specific)
            this.loading=true
            this.donations_specific=''
            
            axios.post('https://bugandoparish.org/api/donations_report',{
                donation:this.donation_type
            }).then(response=>{
                if(response.data.status==200){
                    this.loading=false
                    this.donations_data=response.data.data;
                  
                }
                else{
                    this.donation_type='';
                    this.loading=false
                    this.$swal("Oops!",response.data.message, "error" ) 
                }
            })

            

          
        },donationList(){
          this.loading=true
          axios.post('https://bugandoparish.org/api/donation_report',{
                donation:this.donation_type,
                id:this.donations_specific
            }).then(response=>{
                this.loading=false
                if(response.data.status==200){
                     this.empty = '';
                     this.record=response.data.data
                    // switch(this.donation_type){
                    //     case 'Member':return this.records=response.data.data.members
                    //     case 'Family':return this.records=response.data.data.families
                    //     case 'Jumuiya':return this.records=response.data.data.jumuiya
                    //     case 'Mtaa':return this.records=response.data.data.mtaa
                    //     case 'Kigango':return this.records=response.data.data.kigango
                    // }

                    if(this.donation_type=='Member'){ this.report=response.data.data.members; this.records=response.data.data.members}
                    else if(this.donation_type=='Family'){this.report=response.data.data.families; this.records=response.data.data.families}
                    else if(this.donation_type=='Jumuiya'){this.report=response.data.data.jumuiya; this.records=response.data.data.jumuiya}
                    else if(this.donation_type=='Mtaa'){this.report=response.data.data.mtaa; this.records=response.data.data.mtaa}
                    else if(this.donation_type=='Kigango'){this.report=response.data.data.kigango; this.records=response.data.data.kigango;}
                     
             
                }
                else if(response.data.status==201){
                    // this.donation_type='';
                    this.empty = response.data.message;

                }
               
            })
        },generate_Report(){


var parse_obj = this.report;
var donation_type = this.donation_type;
if(donation_type=='Jumuiya'){
    parse_obj.unshift({ "id": 12,
                "name": "Jumuiya",
                "jumuiya_id": "Remain",
                "created_at": "Excess",
                "updated_at": "2019-02-26 07:03:59",
                "pivot": {
                    "donation_id": 0,
                    "family_id": 0,
                    "amount": "Paid"
                },
                "mtaa": {
                    "id": 14,
                    "name": "Mtaa",
                    "kigango_id": 25,
                    "leader": "",
                    "contact": "",
                    "created_at": "2019-04-23 11:46:29",
                    "updated_at": "2019-04-23 11:46:29",
                    "kigango": {
                        "id": 25,
                        "name": "Kigango",
                        "leader": "geofrey",
                        "contact": "12312312",
                        "parokis_id": 1,
                        "created_at": "2019-04-23 11:22:31",
                        "updated_at": "2019-05-12 17:20:45"
                    }
                }})
}
else if(donation_type=='Family'){
     parse_obj.unshift(
          {
                "id": 309,
                "name": "Family",
                "jumuiya_id": "Remain",
                "created_at": "Excess",
                "updated_at": "2019-04-24 06:24:37",
                "pivot": {
                    "donation_id": 45,
                    "family_id": 309,
                    "amount": "Paid"
                },
                "jumuiya": {
                    "id": 131,
                    "name": "Jumuiya",
                    "mtaa_id": 14,
                    "leader": "",
                    "contact": "",
                    "created_at": "2019-04-23 12:02:58",
                    "updated_at": "2019-04-23 12:02:58",
                    "mtaa": {
                        "id": 14,
                        "name": "Mtaa",
                        "kigango_id": 25,
                        "leader": "",
                        "contact": "",
                        "created_at": "2019-04-23 11:46:29",
                        "updated_at": "2019-04-23 11:46:29",
                        "kigango": {
                            "id": 25,
                            "name": "Kigango",
                            "leader": "geofrey",
                            "contact": "12312312",
                            "parokis_id": 1,
                            "created_at": "2019-04-23 11:22:31",
                            "updated_at": "2019-05-12 17:20:45"
                        }
                    }
                }
            }
               )
}else if(donation_type=='Member'){

      parse_obj.unshift(
                   {
                "id": 5,
                "number": 105,
                "name": "Name",
                "baba": "In ipsa doloremque",
                "mama": "Et harum dolor conse",
                "gender": "female",
                "mahali": "axZX",
                "tarehe_kuzaliwa": "2019-04-30",
                "status": 1,
                "mji": "-",
                "tarehe_kubatizwa": "0001-01-01",
                "no_ubatizo": "00",
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
                "jumuiya_id": "Remain",
                "created_at": "Excess",
                "updated_at": "2019-04-25 09:46:17",
                "pivot": {
                    "donation_m_id": 42,
                    "member_m_id": 5,
                   "amount": "Paid"
                },
                "family": {
                    "id": 309,
                    "name": "Family",
                    "jumuiya_id": 131,
                    "created_at": "2019-04-24 06:24:37",
                    "updated_at": "2019-04-24 06:24:37",
                    "jumuiya": {
                        "id": 131,
                        "name": "Jumuiya",
                        "mtaa_id": 14,
                        "leader": "",
                        "contact": "",
                        "created_at": "2019-04-23 12:02:58",
                        "updated_at": "2019-04-23 12:02:58",
                        "mtaa": {
                            "id": 14,
                            "name": "Mtaa",
                            "kigango_id": 25,
                            "leader": "",
                            "contact": "",
                            "created_at": "2019-04-23 11:46:29",
                            "updated_at": "2019-04-23 11:46:29",
                            "kigango": {
                                "id": 25,
                                "name": "Kigango",
                                "leader": "geofrey",
                                "contact": "12312312",
                                "parokis_id": 1,
                                "created_at": "2019-04-23 11:22:31",
                                "updated_at": "2019-05-12 17:20:45"
                            }
                        }
                    }
                }
            }

      )

}
else{
    parse_obj.unshift({ "id": 12,
                "name": "Name",
                "jumuiya_id": "Remain",
                "created_at": "Excess",
                "updated_at": "2019-02-26 07:03:59",
                "pivot": {
                    "donation_id": 0,
                    "family_id": 0,
                    "amount": "Paid"
                }})
}
              
               // console.log(parse_obj);
        var sourceData = this.report
        var bodyData = [];


 
        var fixed_amount = this.record.amount;
        var mchango_title = this.record.name;
        var jumla = this.jumla_makusanyo;
        var deni = this.jumla_deni;
        var ziada = this.jumla_ziada;
      
      
// alert(this.record.amount)

// for data
sourceData.forEach(function(sourceRow) {
  var dataRow = [];

if(donation_type=='Jumuiya'){

  dataRow.push(sourceRow.name);    
  dataRow.push(sourceRow.mtaa.name);
  dataRow.push(sourceRow.mtaa.kigango.name);
  dataRow.push(sourceRow.pivot.amount);
  if(sourceRow.jumuiya_id=='Remain'){
      dataRow.push(sourceRow.jumuiya_id);
      }else{
             if(fixed_amount-sourceRow.pivot.amount>=0){
                        dataRow.push(fixed_amount-sourceRow.pivot.amount);
             }else{
                 dataRow.push('-');
             }
       
          
      }


      if(sourceRow.created_at=='Excess'){
      dataRow.push(sourceRow.created_at);
      }else{
        
        if(fixed_amount-sourceRow.pivot.amount<=0){
            dataRow.push(-fixed_amount+sourceRow.pivot.amount);
        }else{
            dataRow.push('-'); 
        }
         
      }

  }
  else if(donation_type=='Family'){
  dataRow.push(sourceRow.name);    
  dataRow.push(sourceRow.jumuiya.name);
  dataRow.push(sourceRow.jumuiya.mtaa.name);
  dataRow.push(sourceRow.jumuiya.mtaa.kigango.name);
  dataRow.push(sourceRow.pivot.amount);
  if(sourceRow.jumuiya_id=='Remain'){
      dataRow.push(sourceRow.jumuiya_id);
      }else{
             if(fixed_amount-sourceRow.pivot.amount>=0){
                        dataRow.push(fixed_amount-sourceRow.pivot.amount);
             }else{
                 dataRow.push('-');
             }
       
          
      }


      if(sourceRow.created_at=='Excess'){
      dataRow.push(sourceRow.created_at);
      }else{
        
        if(fixed_amount-sourceRow.pivot.amount<=0){
            dataRow.push(-fixed_amount+sourceRow.pivot.amount);
        }else{
            dataRow.push('-'); 
        }
         
      }
  }else if(donation_type=='Member'){
      dataRow.push(sourceRow.name);    
  dataRow.push(sourceRow.family.name);
  dataRow.push(sourceRow.family.jumuiya.name);
  dataRow.push(sourceRow.family.jumuiya.mtaa.name);
  dataRow.push(sourceRow.family.jumuiya.mtaa.kigango.name);
  dataRow.push(sourceRow.pivot.amount);
  if(sourceRow.jumuiya_id=='Remain'){
      dataRow.push(sourceRow.jumuiya_id);
      }else{
             if(fixed_amount-sourceRow.pivot.amount>=0){
                        dataRow.push(fixed_amount-sourceRow.pivot.amount);
             }else{
                 dataRow.push('-');
             }
       
          
      }


      if(sourceRow.created_at=='Excess'){
      dataRow.push(sourceRow.created_at);
      }else{
        
        if(fixed_amount-sourceRow.pivot.amount<=0){
            dataRow.push(-fixed_amount+sourceRow.pivot.amount);
        }else{
            dataRow.push('-'); 
        }
         
      }


  }
  else{
      dataRow.push(sourceRow.name);    
  dataRow.push(sourceRow.pivot.amount);

  if(sourceRow.jumuiya_id=='Remain'){
      dataRow.push(sourceRow.jumuiya_id);
      }else{
             if(fixed_amount-sourceRow.pivot.amount>=0){
                        dataRow.push(fixed_amount-sourceRow.pivot.amount);
             }else{
                 dataRow.push('-');
             }
       
          
      }


      if(sourceRow.created_at=='Excess'){
      dataRow.push(sourceRow.created_at);
      }else{
        
        if(fixed_amount-sourceRow.pivot.amount<=0){
            dataRow.push(-fixed_amount+sourceRow.pivot.amount);
        }else{
            dataRow.push('-'); 
        }
         
      }
  }


  bodyData.push(dataRow)
});


if(donation_type=='Jumuiya'){
var dd = {
     pageSize: 'A4',
    content: [
        	{
			text: 'BUGANDO PARISH REPORT\n\n',
			style: 'header'
		},
        {
            ul:[
                'Mchango kwa ajili ya : ' + mchango_title+'\n',
                'kiwango cha mchango : ' + fixed_amount+'Tsh\n',
                'Jumla ya makusanyo : '+jumla+'Tsh\n',
                'Kiwango kinachodaiwa : '+deni+'Tsh\n',
                'Kiwango kiwango kilicho zidishwa : '+ziada+'Tsh\n',
            ]
        },
        {
             table: {
                   headerRows: 1,
                    widths: [ '*' ,'*','*','*','*','*'],
                 body:bodyData
            }
        }
    ],	styles: {
		header: {
			fontSize: 18,
            bold: true,
            alignment: 'center'
		},}
}

}else if(donation_type=='Family'){
    var dd = {
         pageSize: 'A4',
    content: [
        	{
			text: 'BUGANDO PARISH REPORT\n\n',
			style: 'header'
		},
        {
            ul:[
                'Mchango kwa ajili ya : ' + mchango_title+'\n',
                'kiwango cha mchango : ' + fixed_amount+'Tsh\n',
                'Jumla ya makusanyo : '+jumla+'Tsh\n',
                'Kiwango kinachodaiwa : '+deni+'Tsh\n',
                'Kiwango kiwango kilicho zidishwa : '+ziada+'Tsh\n',
            ]
        },
        {
             table: {
                   headerRows: 1,
                    widths: [ '*' ,'*','*','*','*','*','*'],
                 body:bodyData
            }
        }
    ],	styles: {
		header: {
			fontSize: 18,
            bold: true,
            alignment: 'center'
		},}
}

}
else if(donation_type=='Member'){
    var dd = {
         pageSize: 'A4',
    content: [
        	{
			text: 'BUGANDO PARISH REPORT\n\n',
			style: 'header'
		},
        {
            ul:[
                'Mchango kwa ajili ya : ' + mchango_title+'\n',
                'kiwango cha mchango : ' + fixed_amount+'Tsh\n',
                'Jumla ya makusanyo : '+jumla+'Tsh\n',
                'Kiwango kinachodaiwa : '+deni+'Tsh\n',
                'Kiwango kiwango kilicho zidishwa : '+ziada+'Tsh\n',
            ]
        },
        {
             table: {
                   headerRows: 1,
                    widths: [ '*' ,'*','*','*','*','*','*','*'],
                 body:bodyData
            }
        }
    ],	styles: {
		header: {
			fontSize: 18,
            bold: true,
            alignment: 'center'
		},}
}
}
else{
    var dd = {
         pageSize: 'A4',
    content: [
        	{
			text: 'BUGANDO PARISH REPORT\n\n',
			style: 'header'
		},
        {
            ul:[
                'Mchango kwa ajili ya : ' + mchango_title+'\n',
                'kiwango cha mchango : ' + fixed_amount+'Tsh\n',
                'Jumla ya makusanyo : '+jumla+'Tsh\n',
                'Kiwango kinachodaiwa : '+deni+'Tsh\n',
                'Kiwango kiwango kilicho zidishwa : '+ziada+'Tsh\n',
            ]
        },
        {
             table: {
                   headerRows: 1,
                    widths: [ '*' ,'*','*','*'],
                 body:bodyData
            }
        }
    ],	styles: {
		header: {
			fontSize: 18,
            bold: true,
            alignment: 'center'
		},}
}
}
pdfMake.createPdf(dd).download("BugandoParish.pdf");
parse_obj.shift()
     
      
        },

              

       },
        mounted() {
             


                        
        },
       
    }
</script>
