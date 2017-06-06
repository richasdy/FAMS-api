<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Add Location</div>

                    <div class="panel-body">
                        <form @submit.prevent="addLocation">
                           <div class="form-group">
                             <label for="">Location</label>
                             <input type="text" class="form-control" id="location" v-model="formAddLocation.location">
                           </div>
                           <button type="submit" class="btn btn-default">Submit</button>
                        </form>
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
            location : [],
            asset_type : [],
            formAddLocation : {
              location : '',
            },
        }
      },
      mounted() {
        //var self = this;
        console.log('mounted');
      },
      methods:{
        addLocation(){
          var self = this;
          //console.log(self.formAddAsset);
          axios.post('/api/store/location',self.formAddLocation)
          .then(response => {
            //self.fetchAsset(1);
            console.log(response);
            self.$route.router.go('/asset');
          })
          .catch(error => {
            console.log(error.response);
          });
        },
        fetchDetail(page){
          var self = this;
          var req = "?page="+page;
          axios.get('/api/fetch/asset-page'+req)
          .then(response =>{
              console.log(response);
              self.location=response.data.location;
              self.asset_type=response.data.type;
              return 'ok';
            });
        },
      },
    }
</script>
