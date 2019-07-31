<template>
  <div id="UserDashboard">
    <div v-if="!isUserGood" class="row justify-content-center">
      <div class="col-md-10">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title">Forms Details</h3>
          </div>
          <div class="panel-body">
            <input
              type="text"
              class="form-control"
              id="dev-table-filter"
              data-action="filter"
              data-filters="#dev-table"
              placeholder="Filter Developers"
            />
          </div>
          <table class="table table-hover" id="dev-table">
            <thead>
              <tr>
                <th>#</th>
                <th>Field 1</th>
                <th>Field 2</th>
                <th>Field 3</th>
                <th>Field 4</th>
                <th>Field 5</th>
                <th>Field 6</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(item, index) in data" :key="index">
                <td>{{ index + 1 }}</td>
                <td>{{ item['formDetails'].site_type }}</td>
                <td>{{ item['formDetails'].cluster_enginner }}</td>
                <td>{{ item['formDetails'].date }}</td>
                <td>{{ item['formDetails'].location_latitude }}</td>
                <td>{{ item['formDetails'].site_ref }}</td>
                <td>{{ item['formDetails'].site_with_single_generator }}</td>
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
      isUserGood: false
    };
  },
  async created() {
    this.checkUser();
  },
  methods: {
    checkUser() {
      if (!window.localStorage.getItem("token"))
        return (window.location.href = "http://127.0.0.1:8000/");
      let config = {
        headers: {
          Authorization: `Bearer ${window.localStorage.getItem("token")}`
        }
      };
      console.log(config);
      axios.post("http://127.0.0.1:8000/api/v1/me", {}, config).then(res => {
        if (res.data["is_admin"] != 1) this.isUserGood = true;
        else window.location.herf = "http://127.0.0.1:8000/dashboard";
      });
    }
  }
};
</script>

<style>
</style>
