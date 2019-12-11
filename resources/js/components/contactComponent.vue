<template>
   
    
<div class="row ">
<div class="col-md-1"></div>
<div class=" col-md-10">
  <center class="p-4"><h1>Bugando Parish Organization Chart</h1></center>
  <figure class="org-chart cf">
    <div class="board ">
      <ul class="columnThree">
        <li>
          <span>
               <strong>Paroko</strong>
               <br>Name Surname
               <br>phone
               </span>
        </li>
        <li>
          <span class="lvl-b">
               <strong>Bugando Parish</strong>
               <br style="color: rgb(195, 207, 199)">
               <br style="color: rgb(195, 207, 199)">
               </span>
        </li>
        <li>
          <span>
               <strong>Paroko msaidizi</strong>
               <br>Name Surname
               <br>phone
               </span>
        </li>
      </ul>
      <ul class="columnOne">
        <li>
          <span >
               <strong>Position Name</strong>
               <br>Caitus
               <br>+255 756 219 504
               </span>
        </li>
      </ul>
      <!-- <ul class="columnOne">
        <li>
          <span>
               <strong>kigango</strong>
               <br>Name Surname
               <br>phone
               </span>
        </li>
    
      </ul> -->
      <ul class="columnOne">
     
        <li>
          <span>
               <strong>Vigango</strong>
               <!-- <br>Name Surname
               <br>phone -->
               </span>
        </li>
      </ul>
    </div>
    <ul class="departments ">
      <li v-for="(kigango,index) in  vigango" :key="index" class="department">
      <div v-if="index==0">
             <span class="lvl-b" >
            <strong>{{kigango.name}}</strong>
            <br>{{kigango.leader}}
            <br>{{kigango.contact}}
            </span>
        <ul class="sections dep-a">
         <li v-for="(mtaa,index) in  kigango.mtaa" :key="index" class="section"> 
                <a data-toggle="modal" class='text-success bs-popover-auto' title="click to View Jumuiya " data-target="#jumuiya" @click="getJumuiya(mtaa.id)">
                <span>
                  <strong>{{mtaa.name}}</strong>
                  <br>{{mtaa.leader}}
                  <br>{{mtaa.contact}}
                  </span>
              </a>
          </li>
       
       
        </ul>
      </div>
      <div v-if="index==1">
           <span class="lvl-b" >
            <strong>{{kigango.name}}</strong>
            <br>{{kigango.leader}}
            <br>{{kigango.contact}}
            </span>
        <ul class="sections dep-b">
        <li v-for="(mtaa,index) in  kigango.mtaa" :key="index" class="section"> 
                <a data-toggle="modal" class='text-success bs-popover-auto' title="click to View Jumuiya " data-target="#jumuiya" @click="getJumuiya(mtaa.id)">
                <span>
                  <strong>{{mtaa.name}}</strong>
                  <br>{{mtaa.leader}}
                  <br>{{mtaa.contact}}
                  </span>
              </a>
          </li>
       
       
        </ul>
      </div>
      <div v-if="index==2">

               <span class="lvl-b" >
            <strong>{{kigango.name}}</strong>
            <br>{{kigango.leader}}
            <br>{{kigango.contact}}
            </span>
        <ul class="sections dep-c">
         <li v-for="(mtaa,index) in  kigango.mtaa" :key="index" class="section"> 
                <a data-toggle="modal" class='text-success bs-popover-auto' title="click to View Jumuiya " data-target="#jumuiya" @click="getJumuiya(mtaa.id)">
                <span>
                  <strong>{{mtaa.name}}</strong>
                  <br>{{mtaa.leader}}
                  <br>{{mtaa.contact}}
                  </span>
              </a>
          </li>
       
       
        </ul>
      </div>
      <div v-if="index==3">
               <span class="lvl-b" >
            <strong>{{kigango.name}}</strong>
            <br>{{kigango.leader}}
            <br>{{kigango.contact}}
            </span>
        <ul class="sections dep-d">
          <li v-for="(mtaa,index) in  kigango.mtaa" :key="index" class="section"> 
                <a data-toggle="modal" class='text-success bs-popover-auto' title="click to View Jumuiya " data-target="#jumuiya" @click="getJumuiya(mtaa.id)">
                <span>
                  <strong>{{mtaa.name}}</strong>
                  <br>{{mtaa.leader}}
                  <br>{{mtaa.contact}}
                  </span>
              </a>
          </li>
       
       
        </ul>
      </div>
      <div v-if="index==4">
               <span class="lvl-b" >
            <strong>{{kigango.name}}</strong>
            <br>{{kigango.leader}}
            <br>{{kigango.contact}}
            </span>
        <ul class="sections dep-e">
          <li v-for="(mtaa,index) in  kigango.mtaa" :key="index" class="section"> 
                <a data-toggle="modal" class='text-success bs-popover-auto' title="click to View Jumuiya " data-target="#jumuiya" @click="getJumuiya(mtaa.id)">
                <span>
                  <strong>{{mtaa.name}}</strong>
                  <br>{{mtaa.leader}}
                  <br>{{mtaa.contact}}
                  </span>
              </a>
          </li>
       
       
        </ul>
      </div>
      <div v-if="index==5">
               <span class="lvl-b" >
            <strong>{{kigango.name}}</strong>
            <br>{{kigango.leader}}
            <br>{{kigango.contact}}
            </span>
        <ul class="sections dep-f">
           <li v-for="(mtaa,index) in  kigango.mtaa" :key="index" class="section"> 
                <a data-toggle="modal" class='text-success bs-popover-auto' title="click to View Jumuiya " data-target="#jumuiya" @click="getJumuiya(mtaa.id)">
                <span>
                  <strong>{{mtaa.name}}</strong>
                  <br>{{mtaa.leader}}
                  <br>{{mtaa.contact}}
                  </span>
              </a>
          </li>
       
       
        </ul>
      </div>
      <div v-if="index==6">
               <span class="lvl-b" >
            <strong>{{kigango.name}}</strong>
            <br>{{kigango.leader}}
            <br>{{kigango.contact}}
            </span>
        <ul class="sections dep-g">
        
            <li v-for="(mtaa,index) in  kigango.mtaa" :key="index" class="section"> 
              <a data-toggle="modal" class='text-success bs-popover-auto' title="click to View Jumuiya " data-target="#jumuiya" @click="getJumuiya(mtaa.id)">
                <span>
                  <strong>{{mtaa.name}}</strong>
                  <br>{{mtaa.leader}}
                  <br>{{mtaa.contact}}
                  </span>
              </a>
          </li>
        
       
       
        </ul>
      </div>
      </li>
    
    </ul>
  </figure>

</div>
<div class="col-md-1"></div>

<!-- VIEW JUMUIYAS -->
   <div class="modal fade modal-lg" id="jumuiya"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div v-for="(m,index) in  mtaa" :key="index" class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Jumuiya za mtaa wa {{m.name}}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body " >
                                        
                                           <table v-if="!m.jumuiya.length == 0" class="table table-bordered table-hover ">
                                                  <thead>
                                                    <tr class="table-primary">
                                                      <th>No</th>
                                                      <th>Jumuiya Name</th>
                                                      <th>Leader</th>
                                                      <th>Contact</th>
                                                    </tr>
                                                  </thead>
                                                  
                                                  <tbody>
                                                          <tr v-for="(jum,index) in  m.jumuiya" :key="index">
                                                            <td >{{index+1}}</td>
                                                            <td class="text-capitalize">
                                                              <span v-if="!jum.name==''">{{jum.name}}</span>
                                                               <span v-if="jum.name==''">***</span>
                                                            </td>
                                                            <td class="text-capitalize">
                                                                <span v-if="!jum.leader==''">{{jum.leader}}</span>
                                                                <span v-if="jum.leader==''">***</span>
                                                              </td>
                                                            <td class="text-capitalize">
                                                                 <span v-if="!jum.contact==''">{{jum.contact}}</span>
                                                                 <span v-if="jum.contact==''">***</span>
                                                            </td>
                                                            
                                                          </tr>
                                                  </tbody>
                                           </table>
                                           <div v-if="m.jumuiya.length == 0" class="row d-flex mx-auto justify-content-center">
                                              <p class="lead">Sorry, there is no any Community at this time</p> 
                                           </div>


                                        </div>

                

                                    </div>
                                </div>
                            </div>
<!-- END OF VIEW JUMUIYAS -->
</div>
           
              
   
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

.content {
  font-family: Verdana;
  font-size: 14px;
  position: relative;
}
.content * {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}

.org-chart {
  display: block;
  clear: both;
  margin-bottom: 30px;
  position: relative;
  /**
  * For IE 6/7 only
  * Include this rule to trigger hasLayout and contain floats.
  */
  /* Box colors */
  /* 1 column */
  /* 2 column */
  /* 3 column */
  /* DEPARTMENTS COLUMNs */
}
.org-chart.cf:before, .org-chart.cf:after {
  content: " ";
  /* 1 */
  display: table;
  /* 2 */
}
.org-chart.cf:after {
  clear: both;
}
.org-chart.cf {
  *zoom: 1;
}
.org-chart ul {
  padding: 0;
  margin: 0;
  list-style: none;
}
.org-chart ul li {
  position: relative;
}
.org-chart ul li span {
  display: block;
  border: 4px solid #fff;
  text-align: center;
  overflow: hidden;
  text-decoration: none;
  color: black;
  font-size: 12px;
  box-shadow: 4px 4px 9px -4px rgba(0, 0, 0, 0.4);
  -webkit-transition: all linear .1s;
  -moz-transition: all linear .1s;
  transition: all linear .1s;
  background: rgb(107, 172, 189);
  padding: 4px;
}
.org-chart .lvl-b {
  background: rgb(195, 207, 199);
  color:black;
  	font-size: .9em;
	text-decoration: none;
	font-weight: bold;
}
.org-chart .board {
  width: 70%;
  margin: 0 auto;
  display: block;
  position: relative;
}
.org-chart .board:before {
  content: "";
  display: block;
  position: absolute;
  height: 600px;
  width: 0px;
  border-left: 3px solid #fff;
  margin-left: 49%;
  top: 15px;
}
.org-chart ul.columnOne {
  height: 90px;
  position: relative;
  width: 100%;
  display: block;
  clear: both;
}
.org-chart ul.columnOne li {
  width: 30%;
  margin: 0px auto;
  top: 20px;
}
.org-chart ul.columnTwo {
  position: relative;
  width: 100%;
  display: block;
  height: 90px;
  clear: both;
}
.org-chart ul.columnTwo li:first-child {
  width: 30%;
  float: left;
}
.org-chart ul.columnTwo li {
  width: 30%;
  float: right;
}
.org-chart ul.columnTwo:before {
  content: "";
  display: block;
  position: relative;
  width: 80%;
  height: 10px;
  border-top: 3px solid #fff;
  margin: 0 auto;
  top: 40px;
}
.org-chart ul.columnThree {
  position: relative;
  width: 100%;
  display: block;
  clear: both;
}
.org-chart ul.columnThree li:first-child {
  width: 30%;
  float: left;
  margin-left: 0;
}
.org-chart ul.columnThree li {
  width: 30%;
  margin-left: 5%;
  float: left;
}
.org-chart ul.columnThree li:last-child {
  width: 30%;
  float: right;
  margin-left: 0;
}
.org-chart ul.columnThree:before {
  content: "";
  display: block;
  position: relative;
  width: 80%;
  height: 10px;
  border-top: 3px solid #fff;
  margin: 0 auto;
  top: 40px;
}
.org-chart .departments {
  width: 100%;
  display: block;
  clear: both;
}
.org-chart .departments:before {
  content: "";
  display: block;
  width: 85%;
  height: 22px;
  border-top: 3px solid #fff;
  border-left: 3px solid #fff;
  border-right: 3px solid #fff;
  margin: 0 auto;
  top: 0px;
}
.org-chart .department {
  border-left: 3px solid #fff;
  width: 13.2%;
  float: left;
  margin: 0px 4px;
}
.org-chart .department:after {
  content: "";
  position: absolute;
  display: block;
  width: 10px;
  height: 22px;
  border-left: 3px solid #fff;
  left: 50%;
  top: -22px;
}
.org-chart .department:first-child:after {
  display: none;
}
.org-chart .department:last-child:after {
  display: none;
}
.org-chart .department.central {
  /* background: 3px solid #fff */
}
.org-chart .department.central:after {
  display: none;
}
.org-chart .department span {
  border-left: 2px solid #fff;
}
.org-chart .department li {
  padding-left: 25px;
  border-bottom: 3px solid #fff;
  height: 80px;
}
.org-chart .department li span {
  background: #92D4A8;
  top: 38px;
  position: absolute;
  z-index: 1;
  width: 95%;
  height: auto;
  vertical-align: middle;
  right: 0px;
  line-height: 14px;
  border: 4px solid #fff;
}
.org-chart .department .sections {
  margin-top: -20px;
}

/* MEDIA QUERIES */
@media all and (max-width: 767px) {
  .org-chart .board {
    margin: 0px;
    width: 100%;
  }
  .org-chart .departments:before {
    border: none;
  }
  .org-chart .department {
    float: none;
    width: 100%;
    margin-left: 0;
    background: #F5EEC9;
    margin-bottom: 40px;
  }
  .org-chart .department:before {
    content: "";
    display: block;
    position: absolute;
    width: 15px;
    height: 60px;
    border-left: 3px solid #fff;
    z-index: 1;
    top: -45px;
    left: 0%;
    margin-left: -2px;
  }
  .org-chart .department:after {
    display: none;
  }
  .org-chart .department:first-child:before {
    display: none;
  }
}
/*--------- TO BE REMOVED FROM YOUR CSS --*/
/* this is just to display the behaviour of responsive on codepen */
.responsive-content {
  width: 767px;
  margin: 0px auto;
}
.responsive-content .org-chart .board {
  margin: 0px;
  width: 100%;
}
.responsive-content .org-chart .departments:before {
  border: none;
}
.responsive-content .org-chart .department {
  float: none;
  width: 100%;
  margin-left: 0;
  background: #F5EEC9;
  margin-bottom: 40px;
}
.responsive-content .org-chart .department:before {
  content: "";
  display: block;
  position: absolute;
  width: 15px;
  height: 60px;
  border-left: 3px solid #fff;
  z-index: 1;
  top: -45px;
  left: 0%;
  margin-left: -2px;
}
.responsive-content .org-chart .department:after {
  display: none;
}
.responsive-content .org-chart .department:first-child:before {
  display: none;
}
/* Department/ section colors */
.department.dep-a span{ background: #FFD600; color: black}
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
.sections.dep-g li span{ background: #cf6b6b; }

/* .departments li span:first-child{ background: #FFD600; color: black}
.departments li span:nth-child(2){  background: #AAD4E7; color: black}
.departments li ul li:first-child{ background: #FFD600;} */


</style>
