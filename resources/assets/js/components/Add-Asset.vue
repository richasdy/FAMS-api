<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Add Asset</div>

                    <div class="panel-body">
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
            formAddAsset : {
              asset_origin : '',
              year : '',
              id_location : '',
              id_asset_type_detail : '',
            },
        }
      },
      mounted() {
        var self = this;
        self.fetchDetail(1);
      },
      methods:{
        addAsset(){
          var self = this;
          //console.log(self.formAddAsset);
          axios.post('/api/store/asset',self.formAddAsset)
          .then(response => {
            self.fetchAsset(1);
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
