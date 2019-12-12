<template>
  <div class="row">
   
    <div class="col-md-12">

      <div class="tile">
        <div class="row tile-title">
          <h3 >All Street</h3>
          <div class="col-md-6">
           <div v-on:keyup="search_function()" >
                                             <vue-bootstrap-typeahead
                                                    v-model="search" 
                                                    :data="search_data"
                                                    :serializer="s => s.name"
                                                    @hit="search_family()" />
                                        </div>
                                        
                                        <div class="col-auto">
                                        <b-alert
                                        :show="showAlert"
                                        dismissible
                                        variant="danger"
                                        
                                        >
                                          Data not Found
                                        </b-alert>
                                      
                                    </div>
                                    </div>
          <span class="pull-right col-md-2">
            <button class="btn btn-success" data-toggle="modal" @click="check()" data-target="#add">
              <i class="fa fa-fw fa-lg fa-plus"></i>
            </button>
          </span>
        </div>

        <table class="table table-bordered table-hover">
          <thead>
            <tr>
                <th v-column-sortable:id>No</th>
                <th v-column-sortable:name>Mtaa</th>
                <th v-column-sortable: kigango_id>Kigango</th>
              <th>Action</th>
            </tr>
          </thead>

          <span v-if="loading==true">
           <center class="mt-4"><RingLoader color="red" class="custom-class" :loading="loading" :size="50" :sizeUnit="px"></RingLoader></center>
          </span>
          <tbody v-if="search =='' ">
            <tr v-for="(mtaa,index) in  vigango.data" :key="index">
              <td>{{(index+1)+((current_page-1)*per_page)}}</td>
              <td class="text-capitalize">{{mtaa.name}}</td>
              <td class="text-capitalize">{{ mtaa.kigango.name }}</td>


              <td>
                <a
                v-if="user_info.user_type=='paroko'"
                  data-toggle="modal"
                  @click="showData(mtaa.id)"
                  data-target="#edit"
                  class="text-success bs-popover-auto"
                  title="click to edit"
                >
                  <span class="fa fa-pencil"></span>
                </a>   &nbsp;&nbsp; &nbsp;
                <a
                 data-toggle="modal"  data-target="#delete"  @click="get_id(mtaa.id)"
                  class="text-danger bs-popover-auto"
                  title="click to delete"
                >
                  <span class="fa fa-trash"></span>
                </a>
              </td>
            </tr>
          </tbody>
          <tbody >
            <tr v-for="(mtaa,index) in  search_data" :key="index">
              <td>{{(index+1)+((current_page-1)*per_page)}}</td>
              <td class="text-capitalize">{{mtaa.name}}</td>
              <td class="text-capitalize">{{ mtaa.kigango.name }}</td>


              <td>
                <a
                v-if="user_info.user_type=='paroko'"
                  data-toggle="modal"
                  @click="showData(mtaa.id)"
                  data-target="#edit"
                  class="text-success bs-popover-auto"
                  title="click to edit"
                >
                  <span class="fa fa-pencil"></span>
                </a>   &nbsp;&nbsp; &nbsp;
                <a
                 data-toggle="modal"  data-target="#delete"  @click="get_id(mtaa.id)"
                  class="text-danger bs-popover-auto"
                  title="click to delete"
                >
                  <span class="fa fa-trash"></span>
                </a>
              </td>
            </tr>
          </tbody>
        </table>

        <pagination
          :data="vigango"
          :limit="1"
          v-if="loading==false"
          @pagination-change-page="getResults"
        ></pagination>
      </div>
    </div>
    <div class="col-md-1"></div>
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
    <!-- EDIT MODEL -->
    <div
      class="modal fade modal-lg"
      id="edit"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            EDIT STREET
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body   ">
            <input type="hidden" v-model="show.kigango_id">
            <input type="hidden" v-model="show.id">

            <div class="form-group row">
              <label class="control-label col-md-4">mtaa name</label>
              <div class="col-md-8">
                <input
                  id="section_name"
                  class="form-control"
                  type="text"
                  placeholder="Enter mtaa Name"
                  v-model="show.name"
                  required
                >
              </div>
              </div>






          </div>

          <div class="modal-footer mx-auto">
            <div class="row">
              <div class="col-md-7 col-md-offset-3">
                <button
                  data-dismiss="modal"
                  @click="updateData(show.id,show.kigango_id,show.name)"
                  class="btn btn-primary"
                  v-if="!message"
                >
                  <i class="fa fa-fw fa-lg fa-check-circle"></i>Update mtaa
                </button>
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

    <div
      class="modal fade modal-lg"
      id="add"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            ADD STREET
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body">
            <div class="form-group row">
              <label class="control-label col-md-4">Choose Kigango</label>
              <div class="col-md-8">
                <select class="form-control" v-model="selected" id="description">
                  <option
                    v-for="(ki,index) in  vigangoList"
                    :key="index"
                    v-bind:value="ki.id"
                  >{{ki.name}}</option>
                </select>
              </div>
            </div>

            <div class="form-group row" v-if="!message">
              <label class="control-label col-md-4">mtaa</label>
              <div class="col-md-8">
                <input
                  id="section_name"
                  class="form-control"
                  type="text"
                  placeholder="weka jina la mtaa"
                  v-model="name"
                  required
                >
              </div>
            </div>





          </div>

          <div class="modal-footer">
            <div class="row">
              <div class="col-md-7">
                <button @click="storeData()" class="btn btn-primary" v-if="!message">
                  <i class="fa fa-fw fa-lg fa-check-circle"></i>Save mtaa
                </button>
              </div>

              <div class="col-md-4">
                <button
                  type="button"
                  class="btn btn-secondary mx-auto"
                  @click="cancel()"
                  data-dismiss="modal"
                >Cancel</button>
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
import columnSortable from 'vue-column-sortable'
export default {
   props: ['user_info'],
  data() {
    return {
      selected: "",
      vigango: [],
      filter: "",
      mitaa: [],
      vigangoList:[],
      message: "",
      parokia_id: "",
      mtaa: "",
     search:'',
      name: "",
      show: [],
      page_current: "",
      per_page: "",
      id:'',
       search:false, 
               member_signal:false,
               family_signal:false,

      loading: false
    };
  },
  methods: {
    check() {
      axios.get('http://localhost:8000/api/vigango').then(response=>{
            this.vigangoList = response.data.data.data;

           })
    },
          orderBy(fn) {
      this.vigango.data.sort(fn);
    },

    // pagination
    getResults(page = 1) {
      this.loading = true;
      axios
        .get("http://localhost:8000/api/mitaa?page=" + page)
        .then(response => {
          this.loading = false;
          this.current_page = response.data.data.current_page;
          this.per_page = response.data.data.per_page;
           this.vigango = response.data.data;
        });
    },
    // saving datas
    storeData() {
      this.loading = true;
      axios
        .post("http://localhost:8000/api/mitaa", {
          name: this.name,
          kigango: this.selected

        })
        .then(response => {
          if (response.data.status == 200) {
            this.loading = false;
            this.get_alldata();
            this.$swal("Good job!", response.data.message, "success");
          } else if (response.data.status == 201) {
            this.loading = false;
            this.$swal("Oops!", response.data.message, "error");
          }
        });
    },
      search_family(){
                // this.loading=true
                    axios.post('http://localhost:8000/api/search_street',{
                    name:this.search  
                        

                    }).then(response=>{
                        if(response.data.status==200){
                              this.loading=false;
                              this.search_data = response.data.data

                        }
                        else {
                              this.loading=false
                             this.$swal("Oops!", response.data.message, "error");
                        }


                    })

            },
// 
             search_function(){   
                  // this.loading=true 
                      axios.post('http://localhost:8000/api/search_street',{
                        name:this.search
                      }).then(response=>{
                        if(response.data.status == 200){
                                this.loading=false
                                this.search_data=response.data.data;
                               this.showAlert = false;

                              
                        } 
                       else  {
                              this.showAlert = true;
                          
                        }
                      })
                    

            },
    get_alldata() {
      this.loading = true;
      axios.get("http://localhost:8000/api/mitaa").then(response => {
        this.loading = false;
        this.current_page = response.data.data.current_page;
        this.per_page = response.data.data.per_page;
        this.vigango = response.data.data;
      });
    },
    deleteData() {
      axios.delete("http://localhost:8000/api/mitaa/" + this.id).then(response => {
        if (response.data.status == 200) {
          this.$swal(
            "Poof! record has been deleted",
            response.data.message,
            "success"
          );
          this.get_alldata();
        }
      });
    },
    showData(id) {
      axios.get("http://localhost:8000/api/mitaa/" + id).then(response => {
        if (response.data.status == 200) {
          this.get_alldata();
          this.show = response.data.data;
        }
      });
    },
    updateData(id, kigango, mtaa) {
      var data = {
        id: id,
        kigango: kigango,
        name: mtaa

      };

      console.log(data);

      // sdfsdf
      axios
        .put("http://localhost:8000/api/mtaa_update", data)
        .then(response => {
          if (response.data.status == 200) {
            this.$swal("Good job!", response.data.message, "success");
            this.get_alldata();
          } else {
            this.$swal("Oops!", response.data.message, "error");
          }
        });
    },
    cancel() {
      this.loading = false;
    },get_id(id){
      this.id=id;
    }
  },

     directives: {
    columnSortable,
  },

  mounted() {
    this.get_alldata();
    this.getResults();
  }
};
</script>
