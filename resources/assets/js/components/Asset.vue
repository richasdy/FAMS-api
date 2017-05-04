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
        </div>
    </div>
</template>

<script>

  export default {
    data() {
      return {
          assets: []
      }
    },
    mounted() {
      var self = this;
      axios.get('/api/asset?show=detail').then(function(response){
          console.log(response);
          return self.assets=response.data.assets;
        });
    }
  }
</script>
