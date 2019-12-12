<template>
<div class="row ">

    <div class=" col-md-12">
        <div class="tile">

            <div class='row tile-title'>
                <h3 class="col-md-5">All Member</h3>

                <div class="col-md-6">
                    <!-- {{selected}} -->

                    <div class=" row no-gutters align-items-center">
                        <div class="col-auto">
                            <i class="fa fa-search"></i>
                        </div>

                        <!--end of col-->
                        <div class="col-auto">
                            <select class="form-control form-control-borderless" v-model="selected">

                                <option v-bind:value="1">Family</option>

                                <option v-bind:value="2">Member</option>
                            </select>

                        </div>

                        <!--end of col-->
                        <!--end of col-->
                        <div class="col">
                            <!-- <input class="form-control form-control form-control-borderless" type="text" placeholder="Search Here" v-on:keyup="search_function()" v-model="query"> -->
                            <div v-on:keyup="search_function()">
                                <vue-bootstrap-typeahead v-model="search" :data="search_data" :serializer="s=>s.name" @hit="search_family()" />

                            </div>
                            <div class="col-auto">
                                <b-alert :show="showAlert" dismissible variant="danger" ref="comp">
                                    <strong> Data not Found </strong>

                                </b-alert>

                            </div>

                        </div>

                    </div>

                    <!--end of col-->

                </div>
                <span class="fa fa-times col-md-1 search_btn" v-if="!search ==false" @click='closebtn()' aria-hidden="true"></span>

            </div>
            <div class="table-responsive-sm table-responsive-md" >
                <table class="table table-hover table-bordered" >
                    <thead class="table-active">
                        <tr>
                            <th> No</th>
                            <th v-column-sortable:name>Name</th>
                            <th v-column-sortable:id>Family</th>
                            <th v-column-sortable:number>Number</th>
                            <th v-column-sortable:id>Jumuiya</th>
                            <th v-column-sortable:id>Street</th>
                            <th v-column-sortable:id>Kigango</th>
                            <th>Details</th>
                            <th>status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody v-if="search =='' " ref="table">
                        <tr v-for="(member,index) in  members.data" :key="index" ref="table">
                            <td>{{(index+1)+((current_page-1)*per_page)}}.</td>
                            <td class="text-capitalize">{{member.name}}</td>
                            <td class="text-capitalize">{{member.family.name}}</td>
                            <td class="text-capitalize">{{member.number}}</td>
                            <td class="text-capitalize">{{member.family.jumuiya.name}}</td>
                            <td class="text-capitalize">{{member.family.jumuiya.mtaa.name}}</td>
                            <td class="text-capitalize">{{member.family.jumuiya.mtaa.kigango.name}}</td>
                            <td class="text-capitalize"><a data-toggle="modal" @click='more_details(member.id)' data-target="#more">More</a>
                            </td>
                            <td class="text-capitalize"><span v-if='member.status==1' class="badge badge-success">active</span><span v-else class="badge badge-warning">Diactive</span></td>
                            <td>
                                <div class="row">

                                    <div class="col-md-4"> <a data-toggle="modal" @click="edit_details(member.id)" data-target="#more" class='text-success bs-popover-auto' title="click to edit"><span class="fa fa-pencil "></span></a></div>
                                    <div class="col-md-4"> <a v-if="user_info.user_type=='paroko'" data-toggle="modal" @click="status(member.id)" data-target="#edit" class='text-primary bs-popover-auto' title="click to activate or diactivate"><span class="fa fa-eye "></span></a></div>
                                    <div class="col-md-4"><a v-if="user_info.user_type=='paroko'" data-toggle="modal" data-target="#delete" @click="get_id(member.id)" class="text-danger bs-popover-auto" title="click to delete"> <span class="fa fa-trash "></span></a></div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                    <tbody>
                        <tr v-for="(member,index) in  search_data" :key="index" ref="table">
                            <td>{{(index+1)+((current_page-1)*per_page)}}.</td>
                            <td class="text-capitalize">{{member.name}}</td>
                            <td class="text-capitalize">{{member.family.name}}</td>
                            <td class="text-capitalize">{{member.number}}</td>
                            <td class="text-capitalize">{{member.family.jumuiya.name}}</td>
                            <td class="text-capitalize">{{member.family.jumuiya.mtaa.name}}</td>
                            <td class="text-capitalize">{{member.family.jumuiya.mtaa.kigango.name}}</td>
                            <td class="text-capitalize"><a data-toggle="modal" @click='more_details(member.id)' data-target="#more">More</a>
                            </td>
                            <td class="text-capitalize"><span v-if='member.status==1' class="badge badge-success">active</span><span v-else class="badge badge-warning">Diactive</span></td>
                            <td>
                                <div class="row">

                                    <div class="col-md-4"> <a data-toggle="modal" @click="edit_details(member.id)" data-target="#more" class='text-success bs-popover-auto' title="click to edit"><span class="fa fa-pencil "></span></a></div>
                                    <div class="col-md-4"> <a v-if="user_info.user_type=='paroko'" data-toggle="modal" @click="status(member.id)" data-target="#edit" class='text-primary bs-popover-auto' title="click to activate or diactivate"><span class="fa fa-eye "></span></a></div>
                                    <div class="col-md-4"><a v-if="user_info.user_type=='paroko'" data-toggle="modal" data-target="#delete" @click="get_id(member.id)" class="text-danger bs-popover-auto" title="click to delete"> <span class="fa fa-trash "></span></a></div>
                                </div>
                            </td>
                        </tr>
                    </tbody>

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
                                    <div class="col-md-12" style="color: black">
                                        <h4>Are sure you want to delete?</h4>
                                    </div>

                                </div>

                                <div class="modal-footer mx-auto">
                                    <button type="button" class="btn btn-secondary mx-auto" data-dismiss="modal">Cancel</button>

                                    <button class="btn btn-danger" @click="deleteData()" data-dismiss="modal"><span class="fa fa-trash"></span> Delete</button>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- END OF DELETE FUNCTIONALITY -->
                    <!-- show more details -->
                    <div class="modal fade" id="more" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg " role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">{{more.name}}'s Details</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- personal details -->
                                    <div class="tile" style="background-color:rgba(0, 0, 0, 0.09);">
                                        <center>
                                            <h5>personal information</h5>
                                        </center>
                                    </div>
                                    <div class="row" v-if="edit_mode==false">
                                        <div class="col-md-4">Full name:<strong>{{more.name}}</strong></div>
                                        <div class="col-md-4">Father name:<strong>{{more.baba}}</strong></div>
                                        <div class="col-md-4">Mother name:<strong>{{more.mama}}</strong></div>
                                    </div>

                                    <div class="row" v-if="edit_mode==true">
                                        <div class="form-group row col-md-4">
                                            <label class="control-label col-md-4"> name</label>
                                            <div class="col-md-8">
                                                <input id="section_name" class="form-control" type="text" v-model="more.name" required>
                                            </div>
                                        </div>

                                        <div class="form-group row col-md-4">
                                            <label class="control-label col-md-4">Father </label>
                                            <div class="col-md-8">
                                                <input id="section_name" class="form-control" type="text" v-model="more.baba" required>
                                            </div>
                                        </div>

                                        <div class="form-group row col-md-4">
                                            <label class="control-label col-md-4">Mother</label>
                                            <div class="col-md-8">
                                                <input id="section_name" class="form-control" type="text" v-model="more.mama" required>
                                            </div>
                                        </div>
                                 
                                

                                        

                                     
                                            
                               
              
                                    </div>

                                    <div class="row" v-if="edit_mode==false">
                                        <div class="col-md-4">Gender:<strong>{{more.gender}}</strong></div>
                                        <div class="col-md-4">Mahali:<strong>{{more.mahali}}</strong></div>
                                        <div class="col-md-4">Tarehe kuzaliwa:<strong>{{more.tarehe_kuzaliwa}}</strong></div>
                                    </div>

                                    <div class="row" v-if="edit_mode==true">
                                        <div class="form-group row col-md-4">
                                            <label class="control-label col-md-4"> Gender</label>
                                            <div class="col-md-8">
                                                <input id="section_name" class="form-control" type="text" v-model="more.gender" required>
                                            </div>
                                        </div>

                                        <div class="form-group row col-md-4">
                                            <label class="control-label col-md-4">Mahali </label>
                                            <div class="col-md-8">
                                                <input id="section_name" class="form-control" type="text" v-model="more.mahali" required>
                                            </div>
                                        </div>

                                        <div class="form-group row col-md-4">
                                            <label class="control-label col-md-4">Birth date</label>
                                            <div class="col-md-8">
                                                <input id="section_name" class="form-control" type="date" v-model="more.tarehe_kuzaliwa" required>
                                            </div>
                                        </div>

                                        <div class="form-group row col-md-4">
                                            <label class="control-label col-md-4">Family name</label>
                                            <div class="col-md-8">
                                                <input id="section_name" class="form-control" type="text" v-model="more.id" required>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="tile" style="background-color:rgba(0, 0, 0, 0.09);">
                                        <center>
                                            <h5>baptized information</h5>
                                        </center>
                                    </div>
                                    <!-- kubatizwa details -->
                                    <div class="row" v-if="edit_mode==false">
                                        <div class="col-md-4">Mji:<strong>{{ more }}.mji}}</strong></div>
                                        <div class="col-md-4">Tarehe ubatizo:<strong v-if="more.tarehe_kubatizwa=='0001-01-01'">-</strong><strong v-else>{{ more }}.tarehe_kubatizwa}}</strong></div>
                                        <div class="col-md-4">Number ubatizo:<strong>{{ more }}.no_ubatizo}}</strong></div>
                                    </div>

                                    <div class="row" v-if="edit_mode==true">
                                        <div class="form-group row col-md-4">
                                            <label class="control-label col-md-4"> Mji</label>
                                            <div class="col-md-8">
                                                <input id="section_name" class="form-control" type="text" v-model="more.mji" required>
                                            </div>
                                        </div>

                                        <div class="form-group row col-md-4">
                                            <label class="control-label col-md-4">Date ubatizo </label>
                                            <div class="col-md-8">
                                                <input id="section_name" class="form-control" type="date" v-model="more.tarehe_kubatizwa" required>
                                            </div>
                                        </div>

                                        <div class="form-group row col-md-4">
                                            <label class="control-label col-md-4">No ubatizo</label>
                                            <div class="col-md-8">
                                                <input id="section_name" class="form-control" type="text" v-model="more.no_ubatizo" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row" v-if="edit_mode==false">
                                        <div class="col-md-4">parokia :<strong>{{ more }}.parokia_ubatizo}}</strong></div>
                                        <div class="col-md-4">Msimamizi ubatizo:<strong>{{ more }}.msimamizi_ubatizo}}</strong></div>
                                        <div class="col-md-4"></div>
                                    </div>

                                    <div class="row" v-if="edit_mode==true">
                                        <div class="form-group row col-md-4">
                                            <label class="control-label col-md-4"> Parokia</label>
                                            <div class="col-md-8">
                                                <input id="section_name" class="form-control" type="text" v-model="more.parokia_ubatizo" required>
                                            </div>
                                        </div>

                                        <div class="form-group row col-md-4">
                                            <label class="control-label col-md-4">Msi ubatizo </label>
                                            <div class="col-md-8">
                                                <input id="section_name" class="form-control" type="text" v-model="more.msimamizi_ubatizo" required>
                                            </div>
                                        </div>

                                        <div class="form-group row col-md-4">
                                            <div class="col-md-8">
                                                <input id="section_name" class="form-control" type="hidden">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- komunyo -->
                                    <div class="tile" style="background-color:rgba(0, 0, 0, 0.09);">
                                        <center>
                                            <h5>Communion information</h5>
                                        </center>
                                    </div>
                                    <div class="row" v-if="edit_mode==false">
                                        <div class="col-md-4">komunyo tarehe :<strong v-if='more.komunyo_ya_kwanza=="0001-01-01"'>-</strong><strong v-else>{{ more }}.komunyo_ya_kwanza}}</strong></div>
                                        <div class="col-md-4">komunyo parokia:<strong>{{ more }}.komunyo_parish}}</strong></div>
                                        <div class="col-md-4"></div>
                                    </div>

                                    <div class="row" v-if="edit_mode==true">
                                        <div class="form-group row col-md-4">
                                            <label class="control-label col-md-4"> Date komunyo</label>
                                            <div class="col-md-8">
                                                <input id="section_name" class="form-control" type="date" v-model="more.komunyo_ya_kwanza" required>
                                            </div>
                                        </div>

                                        <div class="form-group row col-md-4">
                                            <label class="control-label col-md-4">komunyo p </label>
                                            <div class="col-md-8">
                                                <input id="section_name" class="form-control" type="text" v-model="more.komunyo_parish" required>
                                            </div>
                                        </div>

                                        <div class="form-group row col-md-4">
                                            <label class="control-label col-md-4"></label>
                                            <div class="col-md-8">
                                                <input id="section_name" class="form-control" type="hidden">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- kipaimara -->
                                    <div class="tile" style="background-color:rgba(0, 0, 0, 0.09);">
                                        <center>
                                            <h5>Confimation information</h5>
                                        </center>
                                    </div>
                                    <div class="row" v-if="edit_mode==false">
                                        <div class="col-md-4">kipaimara tarehe:<strong v-if='more.kipaimara =="0001-01-01"'>-</strong><strong v-else>{{ more }}.kipaimara}}</strong></div>
                                        <div class="col-md-4">kipaimara No:<strong>{{ more }}.no_kipaimara}}</strong></div>
                                        <div class="col-md-4">parokia kipaimara:<strong>{{ more }}.parokia_kipaimara}}</strong></div>
                                    </div>

                                    <div class="row" v-if="edit_mode==true">
                                        <div class="form-group row col-md-4">
                                            <label class="control-label col-md-4">Date kipairama</label>
                                            <div class="col-md-8">
                                                <input id="section_name" class="form-control" type="date" v-model="more.kipaimara" required>
                                            </div>
                                        </div>

                                        <div class="form-group row col-md-4">
                                            <label class="control-label col-md-4">No kipaimara </label>
                                            <div class="col-md-8">
                                                <input id="section_name" class="form-control" type="text" v-model="more.no_kipaimara" required>
                                            </div>
                                        </div>

                                        <div class="form-group row col-md-4">
                                            <label class="control-label col-md-4">p kipaimara</label>
                                            <div class="col-md-8">
                                                <input id="section_name" class="form-control" type="text" v-model="more.parokia_kipaimara" required>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- ndoa -->
                                    <div class="tile" style="background-color:rgba(0, 0, 0, 0.09);">
                                        <center>
                                            <h5>Marriage information</h5>
                                        </center>
                                    </div>
                                    <div class="row" v-if="edit_mode==false">
                                        <div class="col-md-3">Partiner:<strong>{{ more }}.partiner}}</strong></div>
                                        <div class="col-md-3">Ndoa Tarehe:<strong v-if="more.tarehe_ndoa=='0001-01-01'">-</strong><strong v-else>{{ more }}.tarehe_ndoa}}</strong></div>
                                        <div class="col-md-3">Ndoa No:<strong>{{ more }}.no_ndoa}}</strong></div>
                                        <div class="col-md-3">Parokia Ndoa:<strong>{{ more }}.parokia_ndoa}}</strong></div>
                                    </div>

                                    <div class="row" v-if="edit_mode==true">
                                        <div class="form-group row col-md-4">
                                            <label class="control-label col-md-4"> Partiner</label>
                                            <div class="col-md-8">
                                                <input id="section_name" class="form-control" type="text" v-model="more.partiner" required>
                                            </div>
                                        </div>

                                        <div class="form-group row col-md-4">
                                            <label class="control-label col-md-4">Date Ndoa </label>
                                            <div class="col-md-8">
                                                <input id="section_name" class="form-control" type="date" v-model="more.tarehe_ndoa" required>
                                            </div>
                                        </div>

                                        <div class="form-group row col-md-4">
                                            <label class="control-label col-md-4"> Ndoa No</label>
                                            <div class="col-md-8">
                                                <input id="section_name" class="form-control" type="text" v-model="more.no_ndoa" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row" v-if="edit_mode==true">
                                        <div class="form-group row col-md-4">
                                            <label class="control-label col-md-4"> Parokia ndoa</label>
                                            <div class="col-md-8">
                                                <input id="section_name" class="form-control" type="text" v-model="more.parokia_ndoa" required>
                                            </div>
                                        </div>

                                        <div class="form-group row col-md-4">
                                            <label class="control-label col-md-4"> </label>
                                            <div class="col-md-8">
                                                <input id="section_name" class="form-control" type="hidden">
                                            </div>
                                        </div>

                                        <div class="form-group row col-md-4">
                                            <label class="control-label col-md-4"></label>
                                            <div class="col-md-8">
                                                <input id="section_name" class="form-control" type="hidden">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row" v-if="edit_mode==true">
                                        <div class="col-md-7 col-md-offset-3"> 
                                        <button @click="updateData(more.id,more.name,more.baba,more.mama,more.gender,more.mahali,more.tarehe_kuzaliwa,more.mji,more.tarehe_kubatizwa,more.no_ubatizo,more.msimamizi_ubatizo,more.parokia_ubatizo,more.komunyo_ya_kwanza,more.komunyo_parish,more.kipaimara,more.no_kipaimara,more.parokia_kipaimara,more.partiner,more.parokia_ndoa,more.tarehe_ndoa,more.no_ndoa) " ref="table" class="btn btn-primary" data-dismiss="modal" ><i class="fa fa-fw fa-lg fa-check-circle"></i><a href="#"></a>Update Member</button>                                                                                
                                        </div>

                                        <div class="col-md-4">
                                            <button type="button" class="btn btn-danger mx-auto" data-dismiss="modal">Cancel</button>
                                        </div>
                                   </div>

                                    <div >
                                        
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </table>
            </div>

            <div v-if="search==true">
                <div v-if="family_signal==true">
                    <div class="table-responsive-sm table-responsive-md">
                        <table class="table table-bordered" ref="table">
                            <thead>
                                <tr>
                                    <th> No</th>
                                    <th v-column-sortable:name>Name</th>
                                    <th v-column-sortable:id>Family</th>
                                    <th v-column-sortable:number>Number</th>
                                    <th v-column-sortable:id>Jumuiya</th>
                                    <th v-column-sortable:id>Street</th>
                                    <th v-column-sortable:id>Kigango</th>
                                    <th>Details</th>
                                    <th>status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                        </table>
                    </div>
                </div>
                <div v-if="member_signal==true">
                    <div class="table-responsive-sm table-responsive-md">
                        <table class="table table-bordered">
                            <thead class="table-active">
                                <tr>
                                    <th>No.</th>
                                    <th>Name</th>
                                    <th>Number</th>
                                    <th>Baba</th>
                                    <th>Mama</th>
                                    <th>Gender</th>
                                    <th>Action</th>

                                </tr>
                            </thead>

                        </table>

                    </div>
                </div>
            </div>

            <pagination :data="members" :limit="1" @pagination-change-page="getResults" v-if="search==false"></pagination>
        </div>
    </div>

</div>
</template>

<script>
import columnSortable from 'vue-column-sortable'
export default {
    props: ['user_info'],

    data() {

        return {
            members: [],
            page_current: '',
            loading: false,
            search_status: false,
            more: [],

            edit_mode: false,
            selected: '1',
            search: '',
            query: '',
            search_data: [],
            fam_member: [],
            search_member: [],
            search: false,
            display_vigango: '',
            selected: '',
            selected_j: '',
            choices: [],
            filter: '',
            mitaa: [],
            jumuiyas: [],
            message1: '',
            message2: '',
            mitaa_id: '',
            jumuiya_id: '',
            name: '',
            families: [],
            show: [],
            id: '',
            per_page: '',
            search_member: [],
            member_signal: false,
            family_signal: false,
            renderComponent: true,
            page: '',
        }

    },
    methods: {
        // pagination
        getResults(page) {
            axios.get('http://localhost:8000/api/members?page=' + page)
                .then(response => {
                    this.current_page = response.data.data.current_page
                    this.per_page = response.data.data.per_page
                    this.members = response.data.data;
                    this.$refs.table.refresh;
                });
        },
    
        orderBy(fn) {
            this.members.data.sort(fn);
        },
    
        onUpdate() {
        this.$refs.table.refresh();
       },
         
        get_alldata() {
            this.loading = true;
            axios.get('http://localhost:8000/api/members')
                .then(response => {
                    this.loading = false
                    this.current_page = response.data.data.current_page
                    this.per_page = response.data.data.per_page
                    this.members = response.data.data;
                })

        },
        search_function() {
            this.loading = true
            axios.post('http://localhost:8000/api/family_member_search', {
                name: this.search
            }).then(response => {
                if (response.data.status == 200) {
                    this.loading = false
                    this.search_data = response.data.data;
                    this.showAlert = false;

                } else {
                    this.showAlert = true;

                }
            })

        },

        search_family() {
            this.loading = true
            axios.post('http://localhost:8000/api/family_member_search', {
                name: this.search

            }).then(response => {
                if (response.data.status == 200) {
                    this.loading = false;
                    this.search_data = response.data.data

                } else {
                    this.loading = false
                    this.$swal("Oops!", response.data.message, "error");
                }

            })

        },
        search_family1() {

            if (this.selected == 1) {
                axios.post('http://localhost:8000/api/family_member_search1', {
                    data: this.query
                }).then(response => {
                    if (response.data.status == 200) {
                        this.search_data = response.data.data;
                        this.member_signal = false;
                        this.family_signal = true;
                        this.showAlert = false;
                    } else {

                        this.showAlert = true;
                        // this.$refs.comp.inputValue = []; 

                    }
                })
            } else {
                axios.post('http://localhost:8000/api/members_search_data', {
                    data: this.query
                }).then(response => {
                    if (response.data.status == 200) {

                        this.search_data = response.data.data;
                        this.member_signal = true;
                        this.family_signal = false;
                    } else {
                        this.$swal("Oops!", "no member with that name", "error")
                    }
                })
            }
        },

        search_function21() {
            if (this.selected == 1) {
                axios.post('http://localhost:8000/api/family_member_search1', {
                    name: this.search
                }).then(response => {
                    if (response.data.status == 200) {
                        this.search_data = response.data.data;
                        this.member_signal = false;
                        this.family_signal = true;
                        this.showAlert = false;
                    } else {

                        this.showAlert = true;
                        //this.$refs.comp.inputValue = []; 
                    }
                })
            } else {
                axios.post('http://localhost:8000/api/members_search_data', {
                    name: this.search
                }).then(response => {
                    if (response.data.status == 200) {

                        this.search_data = response.data.data;
                        this.member_signal = true;
                        this.family_signal = false;
                    } else {
                        this.$swal("Oops!", "no member with that name", "error")
                    }
                })
            }

        },
        DeleteMember(id) {
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

                    axios.delete('http://localhost:8000/api/members/' + id).then(
                        response => {
                            if (response.data.status == 200) {
                                this.get_family_id(name)
                                this.$swal("Poof! record has been deleted", response.data.message, "success");

                            }
                        }
                    )

                }

            })
        }

        ,
        deleteData() {

            this.loading = true
            axios.delete('http://localhost:8000/api/members/' + this.id).then(
                response => {
                    if (response.data.status == 200) {
                        this.loading = false

                        this.$swal("Poof! record has been deleted", response.data.message, "success");
                        this.get_alldata();
                    }
                }
            )

        }, 
        updateData(id, name, baba, mama, gender, mahali, tarehe_kuzaliwa,family, mji, tarehe_kubatizwa, no_ubatizo, msimamizi_ubatizo, parokia_ubatizo, komunyo_ya_kwanza, komunyo_parish, kipaimara, no_kipaimara, parokia_kipaimara, partiner, parokia_ndoa, tarehe_ndoa, no_ndoa) {
            var data = {

                id: id,
                name: name,
                baba: baba,
                mama: mama,
                gender: gender,
                mahali: mahali,
                tarehe_kuzaliwa: tarehe_kuzaliwa,
                mji: mji,
                family:family.name,
                tarehe_kubatizwa: tarehe_kubatizwa,
                no_ubatizo: no_ubatizo,
                msimamizi_ubatizo: msimamizi_ubatizo,
                parokia_ubatizo: parokia_ubatizo,
                komunyo_ya_kwanza: komunyo_ya_kwanza,
                komunyo_parish: komunyo_parish,
                kipaimara: kipaimara,
                no_kipaimara: no_kipaimara,
                parokia_kipaimara: parokia_kipaimara,
                partiner: partiner,
                parokia_ndoa: parokia_ndoa,
                tarehe_ndoa: tarehe_ndoa,
                no_ndoa: no_ndoa
            }
            this.loading = true

            axios.put('http://localhost:8000/api/update_member', data).then(
                response => {
                    if (response.data.status == 200) {
                       this.$swal("Good job!", response.data.message, "success");
                       this.getResults(page);

                    } else {
                        this.loading = false
                        this.$swal("Oops!", response.data.message, "error")
                    }
                });
        },

        more_details(id) {
            this.edit_mode = false
            axios.get('http://localhost:8000/api/members/' + id).then(
                response => {
                    if (response.data.status == 200) {
                        this.more = response.data.data

                    }
                }
            )

        },
        edit_details(id) {
            this.edit_mode = true
            axios.get('http://localhost:8000/api/members/' + id).then(
                response => {
                    if (response.data.status == 200) {
                        this.more = response.data.data

                    }
                }
            )

        },
         showData(id){
                      this.loading=true
                     axios.get('http://localhost:8000/api/family_show/'+id).then(
                    response=>{
                        if(response.data.status==200){
                              this.loading=false
                    this.show = response.data.data

                        }
                    }
                )
                },

        status(id) {
            axios.put('http://localhost:8000/api/status', {
                id
            }).then(
                response => {
                    if (response.data.status == 200) {
                        this.getResults();
                        this.$swal("Good job!", response.data.message, "success");

                    } else {
                        this.$swal("Oops!", response.data.message, "error")
                    }

                });
        },
        closebtn() {
            this.get_alldata();
            this.search = false;
            this.member_signal = false;
            this.family_signal = false;
            this.fam_member = [];
            this.query = '';
        },

        get_family_id(name) {
            if (this.selected == 1) {
                axios.post('http://localhost:8000/api/search_family_members', {
                        id: name.id
                    })
                    .then(response => {
                        if (response.data.status == 200) {
                            this.search = true;
                            this.fam_member = response.data.data;
                            this.member_signal = false;
                            this.family_signal = true;

                        } else {
                            this.$swal("Oops!", "That family has no member", "error")
                        }

                    });

            } else {

                //this.loading=true
                axios.post('http://localhost:8000/api/members_search_data', {
                    data: name.name
                }).then(response => {
                    if (response.data.status == 200) {
                        this.search = true;
                        this.member_signal = true;
                        this.family_signal = false;
                        this.search_member = response.data.data;

                        //  alert(this.family_signal)
                    }
                })

            }

        },
        get_id(id) {
            this.id = id

        }

    },
    directives: {
        columnSortable,
    },
    mounted() {
        this.get_alldata();
        this.getResults();
        //  this.search_function()

    },

}
</script>
                                        