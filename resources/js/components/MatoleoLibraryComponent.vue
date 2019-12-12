<template>

    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
           
           
                  <div class="tile" >

                <div class='row tile-title'>
                   <h3 class="col-md-10">Tarehe ya Kumbukumbu</h3>
                   <span class="pull-right col-md-2"><button class="btn btn-success" data-toggle="modal"  data-target="#add" ><i class="fa fa-fw fa-lg fa-plus"></i></button></span>
                </div>
                  
                  <div class="table-responsive-sm table-responsive-md" >
                    <table  class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Date</th>
                            <th colspan="2"><center>Matoleo</center></th>
                            <th>Action</th>
                        </tr>
                        <tr>
                            <th></th>
                            <th></th>
                            <th ><span class="fa fa-diamond"></span>&nbsp;Sadaka/shukrani</th>
                            <th ><span class="fa fa-handshake-o "></span>&nbsp; Harambee</th>
                            <th></th>
                        </tr>


                        </thead>

                               <tr v-if="loading==true">
                                   <th></th>                             
                                   <th> <center><RingLoader color="red" class="custom-class" :loading="loading" :size="50" :sizeUnit="px"></RingLoader></center></th>                             
                                   <th></th>
                                </tr>
                        <tbody v-if="loading==false">

                            <tr v-for="(lib,index) in  library.data" :key="index">
                                <td>{{(index+1)+((current_page-1)*per_page)}}  </td>
                                <td class="text-capitalize">{{lib.date}}</td>
                                <td class="text-capitalize">
                                     <a class="bs-popover-auto" @click="get_misa(lib.id)" data-toggle="modal" data-target="#add_sadaka"  title="click to add sadaka and shukrani"><button class="btn btn-secondary"><span class="fa fa-plus"></span></button></a>
                                     <a class="bs-popover-auto" @click="get_misa(lib.id)" data-toggle="modal" data-target="#view_sadaka" title="click to view sadaka and shukrani"><button class="btn btn-info"><span class="fa fa-eye"></span></button></a>
                                    
                                </td>
                                <td>
                                   <!-- <a><button class="btn btn-info">Harambee &nbsp;<span class="fa fa-handshake-o "></span></button></a> -->
                                     <a class="bs-popover-auto" @click="get_misa(lib.id)" data-toggle="modal" data-target="#add_harambee" title="click to add harambee"><button class="btn btn-secondary"><span class="fa fa-plus"></span></button></a>
                                     <a class="bs-popover-auto" @click="view_harambee(lib.id)" data-toggle="modal"  data-target="#view_harambee1" title="click to view all harambee"><button class="btn btn-info"><span class="fa fa-eye"></span></button></a>
                                </td>
                               
                                <td>
                                    <a data-toggle="modal" @click="showData(lib.id)" data-target="#edit" class='text-success bs-popover-auto' title="click to edit"><span class="fa fa-pencil "></span></a>
                                    <a  data-toggle="modal"  data-target="#delete" @click="get_id(lib.id)" class="text-danger bs-popover-auto" title="click to delete"> <span class="fa fa-trash"></span></a>

                                </td>

                            </tr>
                            
                        </tbody>

                    </table>
                   </div>
      
                   <pagination :data="library" :limit="1" v-if="loading==false" @pagination-change-page="getResults"></pagination>
               


            </div>
        </div>
<div class="col-md-1"></div>

<!-- EDIT MODEL -->
           <div class="modal fade modal-lg" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                         <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                      EDIT DATE  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                </div>
                                    
                                           <div class="modal-body">
                                     <input type="hidden" v-model="show.id">
                                    

                          <div class="form-group row">
                            <label class="control-label col-md-3">Date</label>
                            <div class="col-md-8">
                                <input id="section_name" class="form-control" type="date" placeholder="Enter mtaa Name"   v-model='show.date' required>
                            </div>

                               </div>


                                </div>

                                         <div class="modal-footer mx-auto">
                                   
                     
                        <div class="row">
                                <div class="col-md-7 col-md-offset-3">
                                    <button data-dismiss="modal" @click="updateData(show.id,show.date)" class="btn btn-primary" ><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Date</button>
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
       
<!-- ADD DATE LIBRARY -->
        <div class="modal fade modal-lg" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
             <div class="modal-dialog" role="document">
                  <div class="modal-content">
                                <div class="modal-header">
      
                        ADD DATE<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                          </div>
        
                          <div class="modal-body ">
                        
                    
                      
                        <div class="form-group row" >
                            <label class="control-label col-md-4">Date</label>
                            <div class="col-md-8">
                                <input  class="form-control" type="date" placeholder="Enter date of record" v-model="record_date"  required>
                            </div>

                        </div>

                          </div>

                       <div class="modal-footer ">
                            <div class="row">
                                <div class="col-md-7 ">
                                    <button  @click="storeData()" class="btn btn-primary" ><i class="fa fa-fw fa-lg fa-check-circle"></i>Save Date</button>
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
        <!-- END OF DATE LIBRARY -->
            
        <!-- ADD SADAKA -->
            <div class="modal fade" id="add_sadaka" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
             <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                        
        
                    

<section id="tabs" class="project-tab">
         
            <div >
                    <nav class="col-12">
                            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#bahasha" role="tab" aria-controls="nav-home" aria-selected="true">BAHASHA</a>
                                <a class="nav-item nav-link" id="nav-profile-tab" @click="get_vigango()" data-toggle="tab" href="#visonzo" role="tab" aria-controls="nav-profile" aria-selected="false">VISONZO</a>
                                
                            </div>
                        </nav>
                        
            </div>
                    
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="bahasha" role="tabpanel" aria-labelledby="nav-home-tab">
                                       <form>

                                               <div class="form-group row mt-5">
                                  <label class="control-label col-md-4">Search</label>
                                  <div class="col-md-8 row  ">
                                       <div class="col-auto">
                                        <i class="fa fa-search" ></i>
                                    </div>
                                       <div class="col">
                                        <input class="form-control  form-control-borderless" type="text" placeholder="please ,write member number here" v-on:keyup="search_function_member()" v-model="search">
                                    </div>
                                  </div>
                              </div>


                                 <div class="form-group row">
                                  <label class="control-label col-md-4">Choose Member</label>
                                  <div class="col-md-8">
                                          <select  class="form-control"  v-model="member_id"    id="description" >
                                    <option v-for="(m, index) in member" :key="index" v-bind:value="m.id" >{{m.name}}</option>
                                    
                                </select>
                                  </div>
                              </div>

                              <div class="form-group row">
                                  <label class="control-label col-md-4">Sadaka</label>
                                  <div class="col-md-8">
                                      <input type="text" class="form-control" id="sadaka" v-model="sadaka">
                                  </div>
                              </div>

                               <div class="form-group row">
                                  <label class="control-label col-md-4">Shukrani</label>
                                  <div class="col-md-8">
                                    <input type="text" class="form-control" id="shukrani" v-model="shukrani">
                                  </div>
                              </div>

                               <div class="modal-footer mb-2 ">
                            <div class="row">
                                <div class="col-md-7 ">
                                    <button  @click="storeBahashaData()" class="btn btn-primary" ><i class="fa fa-fw fa-lg fa-check-circle"></i>Save Record</button>
                                </div>

                                <div class="col-md-4">
                                   
                                   <button type="button" class="btn btn-secondary mx-auto" @click="cancel()" data-dismiss="modal">Cancel</button>
                                </div>

                            </div>


                        </div>
      
        </form>


                            </div>

                            <!-- visonzo -->
                            <div class="tab-pane fade" id="visonzo" role="tabpanel" aria-labelledby="nav-profile-tab">
                                                        
                  <div class="form-group row mt-5">
                                  <label class="control-label col-md-4">Choose Vigango</label>
                                  <div class="col-md-8">
                                          <select  class="form-control"  v-model="kigango"    id="description" >
                                    <option v-for="(v, index) in vigango.data" :key="index" >{{v.name}}</option>
                                    
                                </select>
                                  </div>
                              </div>

                              <div class="form-group row">
                                  <label class="control-label col-md-4">Sadaka</label>
                                  <div class="col-md-8">
                                      <input type="text" class="form-control" id="sadaka" v-model="sadaka">
                                  </div>
                              </div>

                               <div class="form-group row">
                                  <label class="control-label col-md-4">Shukrani</label>
                                  <div class="col-md-8">
                                    <input type="text" class="form-control" id="shukrani" v-model="shukrani">
                                  </div>
                              </div>

                               <div class="modal-footer mb-2 ">
                            <div class="row">
                                <div class="col-md-7 ">
                                    <button  @click="storeVisonzoData()" class="btn btn-primary" ><i class="fa fa-fw fa-lg fa-check-circle"></i>Save Record</button>
                                </div>

                                <div class="col-md-4">
                                   
                                   <button type="button" class="btn btn-secondary mx-auto" @click="cancel()" data-dismiss="modal">Cancel</button>
                                </div>

                            </div>


                        </div>


                            </div>
                          
                        </div>
                
           
        </section>

                          

                   

                </div>
                </div>
        </div>
        <!-- END OF SADAKA -->

        <!-- VIEW SADAKA -->
     
            <div class="modal fade" id="view_sadaka" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
             <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                        
        
                    

<section id="tabs" class="project-tab">
         
            <div >
                    <nav class="col-12">
                            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-home-tab" @click="view_bahasha()" data-toggle="tab" href="#bahasha1" role="tab" aria-controls="nav-home" aria-selected="true">BAHASHA</a>
                                <a class="nav-item nav-link" id="nav-profile-tab" @click="view_kisonzo()" data-toggle="tab" href="#visonzo1" role="tab" aria-controls="nav-profile" aria-selected="false">VISONZO</a>
                                
                            </div>
                        </nav>
                        
            </div>
                    
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="bahasha1" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div v-if="!records.length==0">
                                           <table  class="table mt-3 table-bordered table-hover"  style="width:100%">
                        <thead>
                        <tr >
                            <th>No.</th>
                            <th> Name</th>
                            <th>sadaka</th>
                            <th>shukrani</th>
                          
                            
                          
                        </tr>

                        </thead>

                               <tr v-if="loading==true">
                                   <th></th>                             
                                   <th> <center><RingLoader color="red" class="custom-class" :loading="loading" :size="50" :sizeUnit="px"></RingLoader></center></th>                             
                                   <th></th>
                                </tr>
                        <tbody 
                        >
                            <span style="display:none">{{total_sadaka=0}}</span>
                            <span style="display:none">{{total_shukrani=0}}</span>
                           

                            <tr v-for="(rec, index) in records" :key="index" >
                                <td>{{index+1}}</td>
                                <td class="text-capitalize">{{rec.name}}</td>
                                <td class="text-capitalize">{{rec.pivot.sadaka}}
                                    <span style="display:none">{{total_sadaka+=rec.pivot.sadaka}}</span>
                                </td>
                                <td class="text-capitalize">{{rec.pivot.shukrani}} 
                                     <span style="display:none">{{total_shukrani+=rec.pivot.shukrani}}</span>
                                </td>

                               

                                      
                            
                            </tr>
                           
                            
                        </tbody>
                        <tfoot class="table-success">
                             <tr class="lead">
                               
                                <td colspan="2">TOTAL</td>
                                <td colspan="1">{{total_sadaka}}/=</td>
                                <td colspan="1">{{total_shukrani}}/=</td>
                             
                            </tr>

                        </tfoot>
                    </table>
                        </div>
                        <div v-else>
                            <div class="alert alert-info mt-3">There is no  Bahasha record at this time</div>
                        </div>
                            </div>

                            <!-- visonzo -->
                            <div class="tab-pane fade" id="visonzo1" role="tabpanel" aria-labelledby="nav-profile-tab">
                                   <div v-if="!visonzo.length==0">
                                        <table class="table table-bordered mt-3">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kigango</th>
                                                <th>Sadaka</th>
                                                <th>Shukrani</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <span style="display:none">{{total_sadaka1=0}}</span>
                                            <span style="display:none">{{total_shukrani1=0}}</span>
                           

                            <tr v-for="(k, index) in visonzo" :key="index" >
                                <td>{{index+1}}</td>
                                <td class="text-capitalize">{{k.kigango}}</td>
                                <td class="text-capitalize">{{k.sadaka |currency(configSymbol, configSeparator, configFractionCount,
              configFractionSeparator, configSymbolPosition, configSymbolSpacing)}}
                                    <span style="display:none">{{total_sadaka1+=k.sadaka |currency(configSymbol, configSeparator, configFractionCount,
              configFractionSeparator, configSymbolPosition, configSymbolSpacing)}}</span>
                                </td>
                                <td class="text-capitalize">{{k.shukrani |currency(configSymbol, configSeparator, configFractionCount,
              configFractionSeparator, configSymbolPosition, configSymbolSpacing)}}
                                     <span style="display:none">{{total_shukrani1+=k.shukrani |currency(configSymbol, configSeparator, configFractionCount,
              configFractionSeparator, configSymbolPosition, configSymbolSpacing)}}</span>
                                </td>

                                      <td>
                                    <a data-toggle="modal" @click="showVSadaka(k.id)" data-target="#editsadakaVisonzo" class='text-success bs-popover-auto' title="click to edit"><span class="fa fa-pencil "></span></a> &nbsp;
                                    <a   @click="deleteSadaka(k.id)" class="text-danger bs-popover-auto" title="click to delete"> <span class="fa fa-trash"></span></a>

                                </td>
                               

                                      
                            
                            </tr>
                                        </tbody>

                                         <tfoot class="table-success">
                             <tr class="lead">
                               
                                <td colspan="2">TOTAL</td>
                                <td colspan="1">{{ total_sadaka1 |currency(configSymbol, configSeparator, configFractionCount,
              configFractionSeparator, configSymbolPosition, configSymbolSpacing)}}/=</td>
                                <td colspan="1">{{total_shukrani1 |currency(configSymbol, configSeparator, configFractionCount,
              configFractionSeparator, configSymbolPosition, configSymbolSpacing) }}/=</td>
                                <td></td>
                             
                            </tr>

                        </tfoot>

                                    </table>

                                   </div>
                                   <div v-else>
                                      <div class="alert alert-info">There is no Records data at this time</div>
                                   </div>
                            </div>
                          
                        </div>
                
           
        </section>

                          

                   

                </div>
                </div>
        </div>
      
        <!-- END OF VIEW SADAKA -->

        <!-- SHUKRANI -->
        <!-- ADD SHUKRANI -->
         <div class="modal fade " id="add_harambee" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
             <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                                <div class="modal-header">
      
                        ADD HARAMBEE<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                          </div>
        
                          <div class="modal-body ">
                        
                     <div class="form-group row">
                            <label class="control-label col-md-4">Choose Kigango</label>
                            <div class="col-md-8" >       
                                    <select  class="form-control"  v-model="kigango"    id="description" >
                                    <option v-for="(v, index) in vigango.data" :key="index" >{{v.name}}</option>
                                   </select>
                            </div>
                        </div>
                      
                        <div class="form-group row">
                            <label class="control-label col-md-4">Title</label>
                            <div class="col-md-8">
                                <input id="section_name" class="form-control" type="text" placeholder="please write a title" v-model="title"  required>
                            </div>
                        </div>

                          <div class="form-group row">
                            <label class="control-label col-md-4">Description</label>
                            <div class="col-md-8">
                                <!-- <textarea id="section_name" class="form-control" type="text" placeholder="please write description" v-model="description"  ><textarea> -->
                                    <textarea class="form-control" name="description" v-model="description" placeholder="please write description" row='5'></textarea>
                            </div>
                        </div>

                          <div class="form-group row">
                            <label class="control-label col-md-4">Amount</label>
                            <div class="col-md-8">
                                <input id="section_name" class="form-control" type="text" placeholder="please write amount" v-model="amount"  required>
                            </div>
                        </div>

                          </div>

                       <div class="modal-footer ">
                            <div class="row">
                                <div class="col-md-7 ">
                                    <button  @click="storeHarambeeData()" class="btn btn-primary" ><i class="fa fa-fw fa-lg fa-check-circle"></i>Save Harambee</button>
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
        <!-- END ADD SHUKRANI -->

        <!-- SHOW SHUKRANI -->
         <div class="modal fade " id="view_harambee1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
             <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                                <div class="modal-header">
      
                      List of Harambee <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                          </div>
        
                          <div class="modal-body ">
                        
                              <div v-if="!harambee.length==0">
                                  <table class="table table-bordered">
                                    <thead>
                                          <tr>
                                          <th>No</th>
                                          <th>Kigango</th>
                                          <th>Title</th>
                                          <th>Amount</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        <span style="display:none">{{total_harambee=0}}</span>
                                        <tr v-for="(k, index) in harambee" :key="index">
                                            <td>{{index+1}}</td>
                                            <td>{{k.kigango}}</td>
                                            <td>{{k.title}}</td>
                                            <td>{{k.amount |currency(configSymbol, configSeparator, configFractionCount,
              configFractionSeparator, configSymbolPosition, configSymbolSpacing)}}/=
                                                <span style="display:none">{{total_harambee+=k.amount |currency(configSymbol, configSeparator, configFractionCount,
              configFractionSeparator, configSymbolPosition, configSymbolSpacing)}}</span>
                                            </td>

                                        </tr>
                                    </tbody>
                                    <tfoot class="table-primary">
                                        <tr>
                                            <td colspan="3">TOTAL</td>
                                            <td >{{total_harambee |currency(configSymbol, configSeparator, configFractionCount,
              configFractionSeparator, configSymbolPosition, configSymbolSpacing)}}/=</td>
                                        </tr>
                                    </tfoot>

                                  </table>

                              </div>
                              <div v-else >
                                    <div class="alert alert-info">There is no harambee record at this time</div>
                              </div>

                </div>
                </div>
        </div>
        </div>
        <!-- END SHOW SHUKRANI -->
        <!-- END OF SHUKRANI -->
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

<!-- EDIT DAKAKA VISONZO -->
<div class="modal fade modal-lg" id="editsadakaVisonzo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                         <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                      Edit &nbsp; <span class="text-capitalize">{{showsadaka.kigango}}</span>  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                </div>
                                    
                                           <div class="modal-body">
                                     <input type="hidden" v-model="showsadaka.id">
                                    

                          <div class="form-group row">
                            <label class="control-label col-md-3">Kigango</label>
                                      <div class="col-md-8">
                                          <input id="section_name" class="form-control" type="text" placeholder="Enter mtaa Name"   v-model='showsadaka.kigango' required>
                                      </div>
                        </div>

                         <div class="form-group row">
                            <label class="control-label col-md-3">Sadaka</label>
                            <div class="col-md-8">
                                <input id="section_name" class="form-control" type="text" placeholder="Enter Sadaka amount"   v-model='showsadaka.sadaka' required>
                            </div>

                        </div>

                               <div class="form-group row">
                            <label class="control-label col-md-3">Shukrani</label>
                            <div class="col-md-8">
                                <input id="section_name" class="form-control" type="text" placeholder="Enter shukrani amount"   v-model='showsadaka.shukrani' required>
                            </div>

                               </div>


                                </div>

                                         <div class="modal-footer mx-auto">
                                   
                     
                        <div class="row">
                                <div class="col-md-7 col-md-offset-3">
                                    <button data-dismiss="modal" @click="updateVsadaka(showsadaka.id,showsadaka.kigango,showsadaka.sadaka,showsadaka.shukrani)" class="btn btn-primary" ><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Record</button>
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
<!-- END EDIT DAKAKA VISONZO -->
           
    </div>
</template>

<script>
    export default {

        data(){

              return  { 
               library:[],
               filter:'',
               record_date:'',    
               show:[],
               showsadaka:[],
               page_current:'',
               per_page:'',
            //    bahasha
            search:'',
            member_id:'',
            sadaka:'',
            shukrani:'',
            kigango:'',
            misa_id:'',
            member:[],
            vigango:[],
            records:[],
            visonzo:[],
            record:'',
            // harambee
            amount:'',
            title:'',
            description:'',
            harambee:[],
            id:'',

            
            

            


               loading: false,
  
              
               
               }

        },
       methods:{
             search_function_member(){
                 axios.post('http://localhost:8000/api/matoleo_data_search',{
                     number:this.search
                 }).then(response=>{
                        if(response.data.status==200){
                           this.member = response.data.data
                        }else{
                          this.$swal("Oops!", response.data.message, "error" );
                        }
                 });
                     
                       
                               
            },storeBahashaData(){
                axios.post('http://localhost:8000/api/matoleo_data_bahasha',{
                    matoleo_id:this.misa_id,
                    sadaka:this.sadaka,
                    shukrani:this.shukrani,
                    member_id:this.member_id
                }).then(response=>{
                   
                              this.$swal("Good job!", response.data.message, "success");
                            //   this.member_id=''
                            //   this.sadaka=''
                            //   this.shukrani=''
                   
                })
           
                  

            },storeVisonzoData(){
                 axios.post('http://localhost:8000/api/visonzo',{
                    misa_id:this.misa_id,
                    sadaka:this.sadaka,
                    shukrani:this.shukrani,
                    kigango:this.kigango
                }).then(response=>{
                    if(response.data.status==200){
                              this.$swal("Good job!", response.data.message, "success");
                              this.sadaka='';
                              this.shukrani='';
                              this.kigango='';
                              
                    }else{
                          this.$swal("Oops!", response.data.message, "error" );
                    }
                })

            },
            // pagination
            getResults(page = 1) {
                 this.loading=true
			axios.get('http://localhost:8000/api/Matoleo_lib?page=' + page)
				.then(response => {
                     this.loading=false
                    this.current_page=response.data.data.current_page
                    this.per_page=response.data.data.per_page
                    this.library = response.data.data;
                 
				});},
            // saving datas
            storeData(){
                
                   this.loading=true
                    axios.post('http://localhost:8000/api/Matoleo_lib',{
                        date:this.record_date
                    }).then(response=>{
                        if(response.data.status==200){
                             this.loading=false
                            this.get_alldata();
                            this.record_date='';
                            this.$swal("Good job!", response.data.message, "success");
                        }
                        else if(response.data.status==201) {
                              this.loading=false
                             this.$swal("Oops!", response.data.message, "error" );
                        }
                        else{
                             this.loading=false
                             this.$swal("Oops!", response.data.message, "error");
                        }
                        
                         
                    })

                   
            },
            get_alldata(){
                this.loading=true
                  axios.get('http://localhost:8000/api/Matoleo_lib')
                   .then(response => {
                        this.loading=false
                     this.current_page=response.data.data.current_page
                       this.per_page=response.data.data.per_page                
                       this.library=response.data.data;

                       
                   })
              
              
            },deleteData(){
             
     
                axios.delete('http://localhost:8000/api/Matoleo_lib/'+this.id).then(
                    response=>{
                        if(response.data.status==200){
                    
                            this.$swal("Poof! record has been deleted", response.data.message, "success");
                             this.get_alldata();
                        }
                    }
                )
                
                },deleteSadaka(id){
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

                                              axios.delete('http://localhost:8000/api/matoleo_data/'+id).then(
                                                 response=>{
                                          if(response.data.status==200){
                                                    this.$swal("Poof! record has been deleted", response.data.message, "success");
                                                    this.view_kisonzo();
                                                        }
                    }
                )
                                 
                                                      }
})

                },showVSadaka(id){
                    axios.get('http://localhost:8000/api/matoleo_data/'+id).then(
                        response=>{
                            if(response.data.status==200){
                             //this.get_alldata();
                            this.view_kisonzo();
                             this.showsadaka = response.data.data
                  }
                        }

                    )
                },showData(id){
                    
                     axios.get('http://localhost:8000/api/Matoleo_lib/'+id).then(
                    response=>{
                        if(response.data.status==200){
                             this.get_alldata();
                         this.show = response.data.data
          
                        }
                    }
                )
                },updateVsadaka(id,kigango,sadaka,shukrani){
                    var data={
                        id:id,
                        kigango:kigango,
                        sadaka:sadaka,
                        shukrani:shukrani
                    }

                    axios.put('http://localhost:8000/api/Sadaka_v_update',data).then(
                        response=>{
                            if(response.data.status==200){
                             this.$swal("Good job!", response.data.message, "success");
                               this.view_kisonzo();
          
                        }
                        else{
                            this.$swal("Oops!", response.data.message, "error")
                        }

                        })
                },
                updateData(id,date){
                   var data ={
                       id:id,
                       date:date
                       
                   }

                //    console.log(data);


                      axios.put('http://localhost:8000/api/Matoleo_lib_update',data).then(
                    response=>{
                        if(response.data.status==200){
                             this.$swal("Good job!", response.data.message, "success");
                                 this.get_alldata();
          
                        }
                        else{
                            this.$swal("Oops!", response.data.message, "error")
                        }
                    
                    });
                        
                    
                     
                },
                cancel(){
                    this.loading = false;
                }, get_misa(id){
                        this.misa_id=id;
                        this.view_bahasha();
                        this.view_kisonzo();
                },view_bahasha(){
                      this.loading=true
                     
                        // this.view_kisonzo();
                      axios.post('http://localhost:8000/api/view_bahasha',{
                        id:this.misa_id
                    }).then(response=>{
                        if(response.data.status==200){
                             this.loading=false
                             
                              this.record=response.data.data;
                              this.records=response.data.data.member_matoleo;
                            //    alert("bahasha")
                        }
                       
                        else{
                             this.loading=false
                             this.$swal("Oops!", "Fails to get data", "error");
                        }
                        
                         
                    })

                },storeHarambeeData(){

                    axios.post('http://localhost:8000/api/saveHarambee',{
                    misa_id:this.misa_id,
                    amount:this.amount,
                    description:this.description,
                    title:this.title, 
                    kigango:this.kigango
                }).then(response=>{
                    if(response.data.status==200){
                              this.$swal("Good job!", response.data.message, "success");
                              this.amount='';
                              this.title='';
                              this.description='';
                              this.kigango='';
                    }else{
                          this.$swal("Oops!", response.data.message, "error" );
                    }
                })
                }
                ,view_kisonzo(){
                    
                    axios.post('http://localhost:8000/api/view_visonzo',{
                        id:this.misa_id
                    }).then(response=>{
                        if(response.data.status==200){
                              this.visonzo = response.data.data
                            //   alert('visonzo')
                         
                              
                        }else{
                             this.loading=false
                            this.$swal("Oops!", "Fails to get data", "error");
                        }

                    });
                },view_harambee(id){
                          axios.post('http://localhost:8000/api/view_harambee',{
                        misa_id:id
                    }).then(response=>{
                        if(response.data.status==200){
                              this.harambee=response.data.data
                            //   alert(this.harambee)    
                        }else{
                             this.loading=false
                            this.$swal("Oops!", "Fails to get data", "error");
                        }
                        });

                },
                get_vigango(){
                    axios.get('http://localhost:8000/api/vigango')
                    .then(response=>{
                        if(response.data.status==200){
                            this.vigango = response.data.data;
                        }
                        else{
                             this.$swal("Oops!", response.data.message, "error")

                        }
                    })
                },get_id(id){
                    this.id=id
                }
       },
        mounted() {
                 this.get_alldata();
                 this.getResults();
                 this.view_bahasha();
                 this.get_vigango()
                
                 
                             
        },
       
    }
</script>
