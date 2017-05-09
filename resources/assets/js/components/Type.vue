<template lang="html">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Type</th>
                      </tr>
                    </thead>
                    <tbody>
                        <tr v-for='type in types'>
                          <td>{{type.id}}</td>
                          <td>{{type.name}}</td>
                          <td>{{type.id_asset_type}}</td>
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
          types: []
      }
    },
    mounted() {
      var self = this;
      axios.get('/api/type-detail?show=detail').then(function(response){
          console.log(response);
          return self.types=response.data;
        });
    }
  }
</script>
