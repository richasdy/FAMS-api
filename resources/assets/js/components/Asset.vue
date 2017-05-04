<template lang="html">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
<<<<<<< HEAD
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
=======
                    <div class="panel-heading" @click="onGetAsset">Index Asset</div>

                    <div class="panel-body">
                        {{asset}}
                    </div>
>>>>>>> 74bda1c39f7d6d1e0a6af37b03932d2d2b6bc602
                </div>
            </div>
        </div>
    </div>
</template>

<script>
<<<<<<< HEAD

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
=======
    import axios from 'axios';

    export default {
        data() {
            return {
                asset : []
            }
        },
        methods: {
            onGetAsset() {
                axios.get('http://localhost:8000/api/asset/')
                    .then(function (response) {
                         this.data().asset = response.data;
                         console.log(this.data().asset);
                    })
                    .catch(
                        error => console.log(error)
                    );
            },
        }
>>>>>>> 74bda1c39f7d6d1e0a6af37b03932d2d2b6bc602
    }
  }
</script>
