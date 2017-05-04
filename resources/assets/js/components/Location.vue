<template lang="html">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
              <div class="panel panel-default">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Location</th>
                    </tr>
                  </thead>
                  <tbody>
                      <tr v-for='location in locations'>
                        <td>{{location.id}}</td>
                        <td>{{location.name}}</td>
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
          locations: []
      }
    },
    mounted() {
      var self = this;
      axios.get('/api/location').then(function(response){
          console.log(response);
          return self.locations=response.data.locations;
        });
    }
  }
</script>
