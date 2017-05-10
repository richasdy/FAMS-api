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
                        <th>Location</th>
                      </tr>
                    </thead>
                    <tbody>
                        <tr v-for='location in locations.data'>
                          <td>{{location.id}}</td>
                          <td>{{location.name}}</td>
                        </tr>
                    </tbody>
                  </table>
                  <div class="flip-content">
                    <div class="row">
                      <div class="col-md-5 col-sm-5">
                        Showing {{locations.from}} to {{locations.to}} from {{locations.total}} data
                      </div>
                      <div class="col-md-7 col-sm-7">
                        <div class="dataTables_paginate paging_bootstrap_full_number">
                          <ul class="pagination">
                            <li class="prev">
                              <a @click="fetchLocation(1)"><i class="fa fa-angle-double-left"></i></a>
                            </li>
                            <li class="prev">
                              <a @click="fetchLocation(locations.current_page-1)"><i class="fa fa-angle-left"></i></a>
                            </li>
                            <li v-for="n in locations.last_page"><a @click="fetchLocation(n)">{{n}}</a></li>
                            <li class="next">
                              <a @click="fetchLocation(locations.current_page+1)"><i class="fa fa-angle-right"></i></a>
                            </li>
                            <li class="next">
                              <a @click="fetchLocation(locations.last_page)"><i class="fa fa-angle-double-right"></i></a>
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
      self.fetchLocation(1);
    },
    methods:{
      fetchLocation(page){
        var self = this;
        var req = "?page="+page;
        axios.get('/api/fetch/location-page'+req)
          .then(response=>{
            console.log(response);
            return self.locations=response.data.location;
          });
      },
    },
  }
</script>
