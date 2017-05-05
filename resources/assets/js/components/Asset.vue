<template lang="html">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Origin</th>
                        <th>Year</th>
                        <th>Location</th>
                        <th>Type</th>
                        <th>Order</th>
                      </tr>
                    </thead>
                    <tbody>
                        <tr v-for='asset in assets'>
                          <td>{{asset.id}}</td>
                          <td>{{asset.asset_origin}}</td>
                          <td>{{asset.year}}</td>
                          <td>{{asset.id_location}}</td>
                          <td>{{asset.id_asset_type_detail}}</td>
                          <td>{{asset.id_asset_order}}</td>
                        </tr>
                    </tbody>
                  </table>
                </div>
            </div>
            <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#myModal">Add Asset</button>
            <!-- Modal -->
            <div id="myModal" class="modal fade" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
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
          }
      }
    },
    mounted() {
      var self = this;
      axios.get('/api/asset?show=detail').then(function(response){
          //console.log(response);
          return self.assets=response.data.assets;
        });
      axios.get('/api/location').then(function(response){
          //console.log(response);
          return self.location=response.data.locations;
        });
      axios.get('/api/type-detail').then(function(response){
          //console.log(response);
          return self.asset_type=response.data.types;
        });
    },
    methods:{
      addAsset(){
        //console.log(self.formAddAsset);
        axios.post('/api/asset',self.formAddAsset).then(function(response){
          console.log(response);
        });
      },
    }
  }
</script>
