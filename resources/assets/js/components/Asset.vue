<template lang="html">
  <div class="page-content-col">
      <!-- BEGIN PAGE BASE CONTENT -->
      <div class="row">
          <div class="col-md-12">
              <div class="note note-success">
                  <p> Error/Notification Alert </p>
              </div>
              <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-cogs"></i>Asset's Table</div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse"> </a>
                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                        <a href="javascript:;" class="reload"> </a>
                        <a href="javascript:;" class="remove"> </a>
                    </div>
                </div>
                <div class="portlet-body flip-scroll">
                  <table class="table table-bordered table-striped table-condensed flip-content">
                    <thead class="flip-content">
                      <tr>
                        <th>ID</th>
                        <th>Origin</th>
                        <th>Year</th>
                        <th>Location</th>
                        <th>Type</th>
                        <th>Order</th>
                        <th colspan="2">Menu</th>
                      </tr>
                    </thead>
                    <tbody>
                        <tr v-for='asset in assets.data'>
                          <td>{{asset.id}}</td>
                          <td>{{asset.asset_origin}}</td>
                          <td>{{asset.year}}</td>
                          <td>{{asset.id_location}}</td>
                          <td>{{asset.id_asset_type_detail}}</td>
                          <td>{{asset.id_asset_order}}</td>
                          <td><i class="glyphicon glyphicon-pencil"></i></td>
                          <td><a @click="destroyAsset(asset.id)"><i class="glyphicon glyphicon-trash"></i></a></td>
                        </tr>
                    </tbody>
                  </table>
                  <div class="flip-content">
                    <div class="row">
                      <div class="col-md-5 col-sm-5">
                        Showing {{assets.from}} to {{assets.to}} from {{assets.total}} data
                      </div>
                      <div class="col-md-7 col-sm-7">
                        <div class="dataTables_paginate paging_bootstrap_full_number">
                          <ul class="pagination">
                            <li class="prev">
                              <a @click="fetchAsset(1)"><i class="fa fa-angle-double-left"></i></a>
                            </li>
                            <li class="prev">
                              <a @click="fetchAsset(assets.current_page-1)"><i class="fa fa-angle-left"></i></a>
                            </li>
                            <li v-for="n in assets.last_page"><a @click="fetchAsset(n)">{{n}}</a></li>
                            <li class="next">
                              <a @click="fetchAsset(assets.current_page+1)"><i class="fa fa-angle-right"></i></a>
                            </li>
                            <li class="next">
                              <a @click="fetchAsset(assets.last_page)"><i class="fa fa-angle-double-right"></i></a>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          </div>
      </div>
      <!--END BASE CONTENT -->

            <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#addAssetModal">Add Asset</button>
            <!-- Modal Add Begin-->
            <div id="addAssetModal" class="modal fade" role="dialog">
              <div class="modal-dialog">

                <!-- Modal Add content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add Asset</h4>
                  </div>
                  <div class="modal-body">
                    <form @submit.prevent="addAsset">
                     <div class="form-group">
                       <label for="">Source</label>
                       <select name="source" class="form-control" v-model="formAddAsset.asset_origin">
                         <option value="H">Hibah</option>
                         <option value="L">Logistik</option>
                        </select>
                     </div>
                     <div class="form-group">
                       <label for="">Year</label>
                       <input type="text" class="form-control" id="year" v-model="formAddAsset.year">
                     </div>
                     <div class="form-group">
                       <label for="">Location</label>
                       <select name="location" class="form-control" v-model="formAddAsset.id_location">
                         <option v-for="loc in location" v-bind:value="loc.id">{{loc.name}}</option>
                        </select>
                     </div>
                     <div class="form-group">
                       <label for="">Type</label>
                       <select name="location" class="form-control" v-model="formAddAsset.id_asset_type_detail">
                         <option v-for="type in asset_type" v-bind:value="type.id">{{type.name}}</option>
                        </select>
                     </div>

                     <button type="submit" class="btn btn-default">Submit</button>
                    </form>
                  </div>
                  <div class="modal-footer">

                  </div>
                </div>

              </div>
            </div>
            <!-- Modal Add End-->
        </div>
    </div>
</template>

<script>
  export default {
    data() {
      return {
          assets: [],
          location : [],
          asset_type : [],
          formAddAsset : {
            asset_origin : '',
            year : '',
            id_location : '',
            id_asset_type_detail : '',
          },
          modal :{
            delete_asset : false,
            update_asset : false,
            create_asset : false,
          },
          alert : {
            show : false,
            status : '',
            message : '',
          },
      }
    },
    mounted() {
      var self = this;
      self.fetchAsset(1);
    },
    methods:{
      addAsset(){
        var self = this;
        //console.log(self.formAddAsset);
        axios.post('/api/asset',self.formAddAsset)
        .then(response => {
          self.fetchAsset(1);
          console.log(response);
        })
        .catch(error => {
          console.log(error.response);
        });
      },
      fetchAsset(page){
        var self = this;
        var req = "?page="+page;
        axios.get('/api/fetch/asset-page'+req)
        .then(response =>{
            console.log(response);
            self.assets=response.data.assets;
            self.location=response.data.location;
            self.asset_type=response.data.type;
            return 'ok';
          });
      },
      destroyAsset(id){
        var self = this;
        var req = "?id="+id;
        axios.get('/api/destroy/asset'+req)
        .then(response => {
          self.fetchAsset(1);
        })
        .catch(error => {
          console.log(error.response);
        });
      },
    }
  }
</script>
